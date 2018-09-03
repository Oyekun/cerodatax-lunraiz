<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_cargo extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/cargo.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
         
        
        foreach ($salida as $key => $value) {

            $salida_aux = explode(",", $value);
   
            
            $nombre = $salida_aux[0]; 
            $nivel='';
            $categoria='';
            $calificador='';
            $grupo_escala='';
            $periodo_prueba='';
            $documento_legal='';
            $documento_legal_fecha='';

            if($salida_aux[1]!='')
        $nivel = $salida_aux[1];
        if($salida_aux[2]!='')
        $categoria = $salida_aux[2];
         if($salida_aux[3]!='')
        $calificador = $salida_aux[3];
         if($salida_aux[4]!='')
        $grupo_escala = $salida_aux[4];
         if($salida_aux[5]!='')
        $periodo_prueba = $salida_aux[5];
         if($salida_aux[6]!='')
        $documento_legal = $salida_aux[6];
         if($salida_aux[7]!='')
        $documento_legal_fecha = $salida_aux[7];


            $tb='persona_cargo';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? True: False;
        
        if($existe==False)
        {$model = 'Cargo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        
          $tb='nomenclador_nivel_educacional';

           $this->db->where('nombre', $nivel);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $nivel_id = $aux_org_array[0]['id'];
          }


          $tb='nomenclador_categoria';

           $this->db->where('nombre', $categoria);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $categoria_id = $aux_org_array[0]['id'];
          } 

          $tb='nomenclador_calificador';

           $this->db->where('nombre', $calificador);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $calificador_id = $aux_org_array[0]['id'];
          } 


          $tb='nomenclador_grupoescala';

           $this->db->where('nombre', $grupo_escala);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $grupoescala_id = $aux_org_array[0]['id'];
          } 

          
          $tb='nomenclador_grupoescala';

           $this->db->where('nombre', $grupo_escala);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $grupoescala_id = $aux_org_array[0]['id'];
          } 
        $dataArray['nombre'] = $nombre;  
        $dataArray['niveleducacional_id'] = $nivel_id;               
        $dataArray['categoria_id'] = $categoria_id;               
        $dataArray['calificador_id'] = $calificador_id;               
        $dataArray['grupoescala_id'] = $grupoescala_id;               
        $dataArray['periodo_prueba'] = $periodo_prueba;               
                       
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