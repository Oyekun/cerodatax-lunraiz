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


class Migration_Init_cargo extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/cargo.csv');

  //$cargos = [];
        
   
  
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
         
       
        foreach ($salida as $key => $value) {

            $salida_aux = explode(",", $value);
   
          if(count($salida_aux)<=7)
           {

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
         
            $tb='persona_cargo';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Cargo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        
          $tb='nomenclador_niveleducacional';

           $this->db->where('nombre', $nivel);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         $nivel_id = '';
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $nivel_id = $aux_org_array[0]['id'];
          }


          $tb='nomenclador_categoria';

           $this->db->where('nombre', $categoria);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         $categoria_id = '';
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $categoria_id = $aux_org_array[0]['id'];
          } 

          $tb='nomenclador_calificador';

           $this->db->where('nombre', $calificador);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         $calificador_id = '';
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $calificador_id = $aux_org_array[0]['id'];
          } 


          $tb='nomenclador_grupoescala';

           $this->db->where('nombre', $grupo_escala);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         $grupoescala_id = '';
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $grupoescala_id = $aux_org_array[0]['id'];
          } 
 
        $dataArray['nombre'] = $nombre;  
         if($periodo_prueba!='')
        $dataArray['periodo_prueba'] = $periodo_prueba;        
        if($nivel_id!='')
        $dataArray['nivel_educacional_id'] = $nivel_id;               
        if($categoria_id!='')
        $dataArray['categoria_id'] = $categoria_id;               
        if($calificador_id!='')
        $dataArray['calificador_id'] = $calificador_id;               
        if($grupoescala_id!='')
        $dataArray['grupoescala_id'] = $grupoescala_id;               
        
                        $tb='persona_cargo';
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         }
        }
 
        }

        $string1 = read_file(APPPATH.'hooks/cargo_funcion.csv');
        
        $salida1 = explode("\n", $string1);
        $cant=0;
      
         
       
         
        
        foreach ($salida1 as $key => $value) {

            $salida_aux = explode("|", $value);
   
           
            $cargo = $salida_aux[0]; 
            
            $nombre = $salida_aux[1]; 
          
               
              
            $tb='persona_cargofuncion';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'CargoFuncion';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        
          $tb='persona_cargo'; 
         
           $this->db->where('id', $cargo);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $cargo_id = $aux_org_array[0]['id'];
          }
          if($cargo!='' && $cargo_id=='')
          {
        $uuid_cargo = $this->uuid->v5($cargo,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $this->db->set('id', $uuid_cargo);

        $dataArray_cargo = array();
        $dataArray_cargo['nombre'] = $cargo;  
        $this->db->insert("$tb", $dataArray_cargo); 
         $cargo_id = $uuid_cargo ;

          }

        
        $tb='persona_cargofuncion';
        $dataArray['nombre'] = $nombre;  
        $dataArray['cargo_id'] = $cargo_id;               
                  if($nombre!='')      
        {$this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         }
        }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'persona_cargo';      
            $this->db->delete("$tb");
                 
        }
}