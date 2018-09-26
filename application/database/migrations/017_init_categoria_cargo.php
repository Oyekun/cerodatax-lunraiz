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


class Migration_Init_categoria_cargo extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/categoria_cargo.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
        $orden = ''; 
        $abreviatura = ''; 
        
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            
            $orden = $salida[0]; 
            $nombre = $salida[1]; 
             
             $abreviatura = str_replace("\r", "", $salida[2]); 
         
            $tb='nomenclador_categoriacargo';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'CategoriaCargo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['orden'] = $orden;  
        $dataArray['nombre'] = $nombre;  
        $dataArray['abreviatura'] = $abreviatura;  
                       
                       
        $this->db->set('id', $uuid);
          $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_categoriacargo';      
            $this->db->delete("$tb");
                 
        }
}