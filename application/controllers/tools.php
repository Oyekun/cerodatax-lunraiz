<?php

//include_once('../../vendor/autoload.php')

class Tools extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // can only be called from the command line
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed. This is a command line tool, use the terminal');
        }

        $this->load->dbforge();

        // initiate faker
       // $this->faker = Factory::create();
    }

    public function create_database()
    {
            echo 'Bienvenidos al Sistema CERODATA.'.PHP_EOL;
                echo 'Realizando coneccion con la BD cerodata'.PHP_EOL;;
        $this->load->dbutil();
        echo 'Inicializando Utility dbutil...'.PHP_EOL;;
                if ($this->dbutil->database_exists('cerodatax'))
{
        $this->load->database();
        echo 'Conectado con la BD: cerodata'.PHP_EOL;;
        $this->load->dbforge();
        echo 'Inicializando Utility dbforge...'.PHP_EOL;;
        
         
}
else {echo 'No existe la BD cerodata o no se conecto a la BD, contacte con el administrador.'.PHP_EOL;;}
    }

    public function message($to = 'World') {
        echo "Hello {$to}!" . PHP_EOL;
    }

    public function help() {
        $result = "The following are the available command line interface commands\n\n";
        $result .= "php index.php tools migration \"file_name\"         Create new migration file\n";
        $result .= "php index.php tools migrate [\"version_number\"]    Run all migrations. The version number is optional.\n";
        $result .= "php index.php tools seeder \"file_name\"            Creates a new seed file.\n";
        $result .= "php index.php tools seed \"file_name\"              Run the specified seed file.\n";

        echo $result . PHP_EOL;
    }

    public function migration($name) {
        $this->make_migration_file($name);
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
                   echo('Corriendo Migraciones CERODATAX'."\n");
                  $row = $this->db->select('version')->get('migrations')->row();
                  $version = $row ? $row->version : '0';
                   print_r('Version Actual: '.$version."\n");
                   foreach($datos as $migra => $dato)
                  {   
                    $cant=$migra;
                    if($migra[0]==0);
                        $cant = $migra[1].$migra[2];
                        
                        
                    if($cant>=$version)     
                        {
                        $otro=  explode('/', $dato)[2];
                        $otro=  explode('.', $otro)[0];
echo($otro."\n");
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

    protected function make_migration_file($name) {
        $date = new DateTime();
        $timestamp = $date->format('YmdHis');
        $row = $this->db->select('version')->get('migrations')->row();
                  $version = $row ? $row->version : '0';
                
                    if(count($version)==2);
                        $version = '0'.$version;
        $table_name = strtolower($name);

        $path = APPPATH . "database/migrations/$version" . "_" . "$name.php";

        $my_migration = fopen($path, "w") or die("Unable to create migration file!");

        $migration_template = "<?php

        /**
 * NombreClase
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Sexo
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_$name extends CI_Migration {

    public function up() {
        \$this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'unique' => TRUE,
                                'null' => FALSE
                        ),
                        'leaf' => array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '1'
                        ),
                        'orden' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'parent_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ) 
        ));
        \$this->dbforge->add_key('id', TRUE);
        \$this->dbforge->create_table('$table_name');
        \$this->dbforge->add_key('parent_id');
        \$this->dbforge->add_field('CONSTRAINT parent_id FOREIGN KEY (parent_id) REFERENCES estructura_area (id) ON UPDATE CASCADE');
               
    }

    public function down() {
        \$this->dbforge->drop_table('$table_name');
    }

}";

        fwrite($my_migration, $migration_template);

        fclose($my_migration);

        echo "$path migration has successfully been created." . PHP_EOL;
    }

    protected function make_seed_file($name) {
        $path = APPPATH . "database/seeds/$name.php";

        $my_seed = fopen($path, "w") or die("Unable to create seed file!");

        $seed_template = "<?php

class $name extends Seeder {

    private \$table = 'users';

    public function run() {
        \$this->db->truncate(\$this->table);

        //seed records manually
        \$data = [
            'user_name' => 'admin',
            'password' => '9876'
        ];
        \$this->db->insert(\$this->table, \$data);

        //seed many records using faker
        \$limit = 33;
        echo \"seeding \$limit user accounts\";

        for (\$i = 0; \$i < \$limit; \$i++) {
            echo \".\";

            \$data = array(
                'user_name' => \$this->faker->unique()->userName,
                'password' => '1234',
            );

            \$this->db->insert(\$this->table, \$data);
        }

        echo PHP_EOL;
    }
}
";

        fwrite($my_seed, $seed_template);

        fclose($my_seed);

        echo "$path seeder has successfully been created." . PHP_EOL;
    }

    public function model($name) {
    $this->make_model_file($name);
}

protected function make_model_file($name) {
  //  $path = APPPATH . "modules/admin/models/$name.php"; Esyo es importante hacer las modelos por modulos
    $path = APPPATH . "models/$name.php";
    $my_model = fopen($path, "w") or die("Unable to create model file!");

    $model_template = "<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class $name extends CI_Model {
        public \$uuid;
        public \$relacion;
        public function __construct() {
            parent::__construct();
                \$this->uuid = 'nombre'; 
                \$this->relacion = array('continente_id' =>'nomenclador_continente','moneda_id' =>'nomenclador_moneda');
              
        }
    }
    ";

    fwrite($my_model, $model_template);

    fclose($my_model);

    echo "$path model has successfully been created." . PHP_EOL;
}

 public function updatemenu() {
     
          $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/menus.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
       
        $nombre = ''; 
        $orden = ''; 
         $cont=0;
        $id_tipo_mod;
       
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            $descripcion='';
            $descripcion_modulo='';
            $descripcion_menu='';
            $tipo_modulo = $salida[0];
            if(isset($salida[5])) 
            $descripcion = $salida[5];
             if(isset($salida[6])) 
            $descripcion_modulo = $salida[6];  
            if(isset($salida[7])) 
            $descripcion_menu = $salida[7];  
            
            $modulo = $salida[1]; 
            $idmenu = $salida[2]; 
            $menu = $salida[3]; 
            $tabpanel = $salida[4]; 
         
            $tb='nomenclador_tipomodulo';
           $this->db->where('nombre', $tipo_modulo);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
         $model = 'TipoModulo';
            $this->load->model($model);
       
         $nameuuid = new $model; 
        $uuid = $this->uuid->v5($tipo_modulo,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $result1 = $this->db->get("$tb");
    $cont = count($result1->result_array());

        if($existe==FALSE)
        {
        $dataArray = array();
        $dataArray['nombre'] = $tipo_modulo;  
        $dataArray['orden'] = $cont;  
        $dataArray['descripcion'] = $descripcion;   
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
        
        $cont++; 
       
        $cont_mod=0;
        $cont_men=0;
        
        } 
        $id_tipo_mod =$uuid;
           $tb='configuracion_modulo';
           $this->db->where('nombre', $modulo);   
           $this->db->where('tipo_modulo_id', $id_tipo_mod);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
          $result = $this->db->get("$tb");
         $cont_mod = count($result->result_array());
        $model = 'Modulo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($modulo.$id_tipo_mod,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
         $id_mod =$uuid;
        if($existe==FALSE)
        {
        $dataArray = array();
        $dataArray['nombre'] = $modulo;  
        $dataArray['orden'] = $cont_mod; 
        $dataArray['descripcion'] = $descripcion_modulo;  
        $dataArray['tipo_modulo_id'] = $id_tipo_mod;  
        $dataArray['activo'] = 1;               
                      
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
       
        $cont_mod++; 
        }

         $tb='configuracion_menu';
           $this->db->where('nombre', $menu);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        $model = 'Menu';
            $this->load->model($model);
        $nameuuid = new $model;
        $result = $this->db->get("$tb");
        $cont_men = count($result->result_array()); 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        if($existe==FALSE)
        {
        $dataArray = array();
        $dataArray['nombre'] = $menu;  
        $dataArray['orden'] = $cont_men;
        $dataArray['descripcion'] = $descripcion_menu;  
        $dataArray['modulo_id'] =  $this->uuid->v5($modulo.$id_tipo_mod,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray['id_menu'] = $idmenu;  
        $dataArray['tabpanel'] = $tabpanel;  
        $dataArray['activo'] = 1;  
                       
                      
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
      //  $id_tipo_mod =$uuid;
        $cont_men++; 
        }

 
        }

        $string = read_file(APPPATH.'hooks/panel.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
       
        $nombre = ''; 
        $orden = ''; 
         $cont=0;
        $id_tipo_mod;
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            
            $menu = $salida[0]; 
            $id_contenedor = $salida[1]; 
            $nombre = $salida[2]; 
            $orden = $salida[3]; 
            $alias = $salida[4]; 
         
            $tb='configuracion_panel';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {
            $tb='configuracion_menu';
           $this->db->where('id_menu',$menu);   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $menu_id = $aux_union_array[0]['id'];
          }

            $model = 'Panel';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['orden'] = $orden;  
        $dataArray['menu_id'] = $menu_id;   
        $dataArray['activo'] = TRUE;
        $dataArray['alias'] = $alias;   
        $dataArray['id_contenedor'] = $id_contenedor;   
        $this->db->set('id', $uuid);
         $tb='configuracion_panel';
          $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
         
          
         
        }

        } 
}


     

}