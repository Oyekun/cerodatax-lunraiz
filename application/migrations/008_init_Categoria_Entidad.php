<?php
/**
 * Niveleducacional
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Category
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_Categoria_Entidad extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/categorias_entidad.csv');
        
        $salida = explode("\n", $string);
        $cant=1;
      
        $sgl = '';
        $nombre = ''; 
        $orden = ''; 
        
        foreach ($salida as $key => $value1) {
              $value = str_replace("\r", "", $value1);
           
            
            $tb='nomenclador_categoriaentidad';
           $this->db->where('nombre', $value);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
         
        if($existe==FALSE)
        {$model = 'CategoriaEntidad';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $value;                  
        $dataArray['posicion'] = $cant;                  
                       
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         $cant++;
        }
 
        }

           
        
        }
                    public function down()
        {
            $tb = 'nomenclador_categoriaentidad';      
            $this->db->delete("$tb");
                 
        }
}