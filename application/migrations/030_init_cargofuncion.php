<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_cargo_funcion extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/cargofuncion.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
         
       
         
        
        foreach ($salida as $key => $value) {

            $salida_aux = explode(",", $value);
   
            
            $nombre = $salida_aux[0]; 
            $cargo='';
             
            if($salida_aux[1]!='')
        $cargo = $salida_aux[1];
         
            $tb='persona_cargofuncion';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? True: False;
        
        if($existe==False)
        {$model = 'CargoFuncion';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        
          $tb='persona_cargo';

           $this->db->where('nombre', $cargo);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $cargo_id = $aux_org_array[0]['id'];
          }

 
        $dataArray['nombre'] = $nombre;  
        $dataArray['cargo_id'] = $cargo_id;               
                        
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'persona_cargo';      
            $this->db->delete("$tb");
                 
        }
}