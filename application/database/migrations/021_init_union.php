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


class Migration_Init_union extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/union.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $cod = '';
        $nombre = ''; 
       
        $activo = ''; 
        
        foreach ($salida as $key => $value) {

            $salida = explode(";", $value);
   
            
            $cod = $salida[0]; 
            $nombre = $salida[1];  
            $activo = str_replace("\r", "", $salida[3]); 
            
         
            $tb='nomenclador_union';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Organismo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['codigo'] = $cod;  
        $dataArray['nombre'] = $nombre;  
        if ($activo=='No')
        $dataArray['activo'] = 0;  
        else $dataArray['activo'] = 1;               
                       
        $this->db->set('id', $uuid);
          $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_organismo';      
            $this->db->delete("$tb");
                 
        }
}