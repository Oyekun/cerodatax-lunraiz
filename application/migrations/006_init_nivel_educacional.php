<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_nivel_educacional extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/nivel_educacional.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
        $orden = ''; 
        
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            $orden = $salida[0]; 
            $nombre = $salida[1]; 
            
            $sgl = str_replace("\r", "", $salida[2]); 
            $tb='nomenclador_nivel_educacional';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? True: False;
        
        if($existe==False)
        {$model = 'Nivel_Educacional';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['abreviatura'] = $sgl;               
        $dataArray['orden'] = $orden;               
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
    		        public function down()
        {
			$tb = 'nomenclador_nivel_educacional'; 		
            $this->db->delete("$tb");
                 
        }
}