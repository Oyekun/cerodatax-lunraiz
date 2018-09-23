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


class Migration_Init_tipo_registro extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/tipo_registro.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
         
        
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            
            $nombre = $salida[0]; 
            $sgl = str_replace("\r", "", $salida[1]); 
            $tb='nomenclador_tiporegistro';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'TipoRegistro';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['descripcion'] = $sgl;               
                       
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_tiporegistro';      
            $this->db->delete("$tb");
                 
        }
}