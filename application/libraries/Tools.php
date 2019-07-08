<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This class creates a Tree structure of information for the TreePanel component
 * of the ExtJS library.
 *
 * @author Crysfel Villa
 * @date 12/18/2009
 *
 */
class Tools extends CI_Model  {

   public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('uuid');
        // Your own constructor code
    }

    public function migrate($version = null) {
       

              $this->load->library('migration');
/*
                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }*/
                  $datos = $this->migration->find_migrations();
                   // print_r($datos);die;
                  // echo('Corriendo Migraciones CERODATAX'."\n");
                  $row = $this->db->select('version')->get('migrations')->row();
                  $version = $row ? $row->version : '0';
                 //  print_r('Version Actual: '.$version."\n");
                   foreach($datos as $migra => $dato)
                  {   
                    $cant=$migra;
                    if($migra[0]==0);
                        $cant = $migra[1].$migra[2];
                        
                        
                    if($cant>=$version)     
                        {
                        $otro=  explode('/', $dato)[2];
                        $otro=  explode('.', $otro)[0];
//echo($otro."\n");
                            $salida = $this->migration->version("$migra");
                     }
                   
                   
                  }
    }

    public function seeder($name) {
        $this->make_seed_file($name);
    }

    public function seed($name) {
        $seeder = new Seeder();

        $seeder->call($name);
    }

    public function make_migration_file($esquema,$name,$dataArray) {
        $date = new DateTime();
        $timestamp = $date->format('YmdHis');
        $row = $this->db->select('version')->get('migrations')->row();
                  $version = $row ? $row->version+1 : '0';
                
                    if(count($version)==2);
                        $version = '0'.$version;
        $table_name = strtolower($esquema.'_'.$name);

        $path = APPPATH . "database/migrations/$version" . "_" . "create_table_$table_name.php";

        $my_migration = fopen($path, "w") or die("Unable to create migration file!");
//print_r($dataArray);die;
        $code='';
$foreign = "";
foreach ($dataArray as $campo) {
$nombre = $campo['nombre'];
$tipo = $campo['tipo'];
if(isset($campo['tabla']))
       { $nameCampo = $campo['nombre'];
        $auxUno = explode("_id", $nameCampo);
        if(count($auxUno)>1)
        { 
         $tablaCampo = $campo['tabla'];
          $foreign .="\$this->dbforge->add_key('$nameCampo');\n";      
          $foreign .="\$this->dbforge->add_field('CONSTRAINT $nameCampo FOREIGN KEY ($nameCampo) REFERENCES $tablaCampo (id) ON UPDATE CASCADE ON DELETE CASCADE');\n";      
        }
    }
    
        


    $field = "\n"."                                '$nombre'=> array(
                                'type' => '$tipo',"."\n";
    if(isset($campo['constraint']))
    {
       $constraint=  $campo['constraint'];
    $field .="                                'constraint' => '$constraint',"."\n";
    }
     if(isset($campo['nullfield']))
       {$nullfield=  $campo['nullfield'];
    
    $field .="                                'null' => $nullfield"."\n";
    }
    $field .="                        ),";
    
    $code.=$field;
}
 
        $migration_template = "<?php

        /**
 * NombreClase
 *
 * @package     $esquema
 * @subpackage  $name
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_$table_name extends CI_Migration {

    public function up() {
        \$this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),"
                        .$code."
                                'date_created' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'date_updated' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'created_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        ),
                                'updated_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        )
        ));
        \$this->dbforge->add_key('id', TRUE);
        ".$foreign."
        \$this->dbforge->create_table('$table_name');
               
    }

    public function down() {
        \$this->dbforge->drop_table('$table_name');
    }

}";

               // $this->dbforge->add_key('cuenta_bancaria_id');
               // $this->dbforge->add_field('CONSTRAINT cuenta_bancaria_id FOREIGN KEY (cuentabancaria_id) REFERENCES nomenclador_cuentabancaria (id) ON UPDATE CASCADE ON DELETE CASCADE');


/*\$this->dbforge->add_key('parent_id');
        \$this->dbforge->add_field('CONSTRAINT parent_id FOREIGN KEY (parent_id) REFERENCES estructura_area (id) ON UPDATE CASCADE');
*/

        fwrite($my_migration, $migration_template);

        fclose($my_migration);

        //echo "$path migration has successfully been created." . PHP_EOL;
    }

     

 

public function make_model_file($modulo,$name,$dataArray) {
        $subdireccion =  $modulo . '/' . $name;

  //  $path = APPPATH . "modules/admin/models/$name.php"; Esyo es importante hacer las modelos por modulos
    $existFolder = APPPATH . "models/$modulo";
    if(!is_dir($existFolder))
        mkdir($existFolder);
    $path = APPPATH . "models/$subdireccion.php";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    $existeRelacion=FALSE;
    $relacion ="\$this->relacion = array(\n";
    $nameuuid = '';
    foreach ($dataArray as $campo) {
       if($campo['nombre']=='nombre')
            $nameuuid =$campo['nombre'];
if(isset($campo['tabla']))
       { $nameCampo = $campo['nombre'];
         
         
         $auxUno = explode("_id", $nameCampo);
        if(count($auxUno)>1)
        { if ($nameuuid=='')
            $nameuuid =$campo['nombre'];
            $existeRelacion=TRUE;
            $tablaCampo = $campo['tabla'];
          $relacion .="'$nameCampo'=> '$tablaCampo',\n";      
        }
    }
    if ($nameuuid=='')
            $nameuuid =$campo['nombre'];
    
    }
     $relacion .="              );";
 

    $model_template = "<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class $name extends CI_Model {
        public \$uuid;
        public \$relacion;
        public function __construct() {
            parent::__construct();
                \$this->uuid = '$nameuuid';\n";

    if($existeRelacion)
    $model_template .=$relacion;   
    $model_template .=" 
               
        }
    }
    ";
 //\$this->relacion = array('continente_id' =>'nomenclador_continente','moneda_id' =>'nomenclador_moneda');
              
    fwrite($my_model, $model_template);

    fclose($my_model);

   //  echo "$path model has successfully been created." . PHP_EOL;
}
/*public function create_backup()
{
   $this->load->dbutil();
       // echo 'Inicializando Utility dbutil...'.PHP_EOL;;
         
     //   $this->load->database();
        
$prefs = array(
        'tables'        => array('nomenclador_icono','nomenclador_tipomodulo', 'configuracion_modulo','configuracion_menu','configuracion_panel','nomenclador_alias'),   // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'txt',                       // gzip, zip, txt
        'filename'      => 'alias_menu_modulo_panel_tipomodulo_icono1.sql',              // File name - NEEDED ONLY WITH ZIP FILES
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
);

$this->dbutil->backup($prefs);

  }*/



     

}