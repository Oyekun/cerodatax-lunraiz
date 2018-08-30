<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_grupo_escala extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/grupo_escala.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
        $orden = ''; 
        $salario = ''; 
        
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            
            $orden = $salida[0]; 
            $nombre = $salida[1]; 
            
            $salario = str_replace("\r", "", $salida[2]); 
         
            $tb='nomenclador_grupoescala';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? True: False;
        
        if($existe==False)
        {$model = 'GrupoEscala';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['orden'] = $orden;  
        $dataArray['nombre'] = $nombre;  
        $dataArray['salario'] = $salario;  
                       
                       
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_grupoescala';      
            $this->db->delete("$tb");
                 
        }
}