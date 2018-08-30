<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_nae extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

 
        $string1 = read_file(APPPATH.'hooks/nae.csv');
        
         
        $salida1 = explode("\n", $string1);
         
        
         
        $seccion = ''; 
        $division = '';
        $clase = '';
        $nombre = '';
        $descripcion = '';  
        $tbseccion='nomenclador_seccionnae';
        $tbdivision='nomenclador_divisionnae';
        $tbnae='nomenclador_nae';
        
          
            
        foreach ($salida1 as $key => $value) 
        {
        $value1 = str_replace("\r", "", $value);    
        $salida_aux = explode(";", $value1);
          
        if($salida_aux[0]!=''||$salida_aux[1]!=''||$salida_aux[2]!=''||$salida_aux[3]!='')
        {if($salida_aux[0]!='')
        $seccion = $salida_aux[0];
        if($salida_aux[1]!='')
        {$division = $salida_aux[1];
        $descripcion='';
        }if($salida_aux[2]!='')
        $clase = $salida_aux[2];
        if($salida_aux[2]!=''&&$salida_aux[3]!='')
        $nombre = $salida_aux[3]; 
         if($salida_aux[0]==''&&$salida_aux[1]==''&&$salida_aux[2]==''&&$salida_aux[3]!='') 
        $descripcion =   $salida_aux[3];           
        if($salida_aux[0]!=''&&$salida_aux[3]!='')
        {$datoseccion["$seccion"]['nombre'] = $salida_aux[3];
         $descripcion='';
         $clase= '';
         $division= '';
        }
        if($salida_aux[0]==''&&$salida_aux[1]==''&&$salida_aux[2]=='' &&$division=='')
        {
                if(isset($datoseccion["$seccion"]['descripcion']))
        $datoseccion["$seccion"]['descripcion'] .= " ".$descripcion;
                else
                        $datoseccion["$seccion"]['descripcion'] =$descripcion;
                $descripcion='';

        }
       if($salida_aux[1]!=''&&$salida_aux[3]!='')
        {$datosdivion["$division"]['nombre'] = $salida_aux[3];
        $descripcion='';
        $clase='';
        }
        if($salida_aux[0]==''&&$salida_aux[1]==''&&$salida_aux[2]=='' &&$clase=='' &&$division!='')
        {
                if(isset($datosdivion["$division"]['descripcion']))
        $datosdivion["$division"]['descripcion'] .= " ".$descripcion;
                else
                        $datosdivion["$division"]['descripcion'] =$descripcion;
                $descripcion='';
        }
        if($salida_aux[2]!=''&&$salida_aux[3]!='' &&$clase!='')
        {$datosnae["$clase"]['nombre'] = $nombre;
$datosnae["$clase"]['seccion'] = $seccion;
$datosnae["$clase"]['division'] = $division;
        $descripcion='';
        }
        if($salida_aux[0]==''&&$salida_aux[1]==''&&$salida_aux[2]=='' &&$clase!='')
        {
                if(isset($datosnae["$clase"]['descripcion']))
        {        
                $datosnae["$clase"]['descripcion'] .= " ".$descripcion;
         
         }       else
                        $datosnae["$clase"]['descripcion'] =$descripcion;
                        $descripcion='';
        }
 
        } 
    }
    
    foreach ($datosdivion as $key => $value) 
        {
                $nombre = $value['nombre'];
                $descripcion='';
                if(isset($value['descripcion']))
                $descripcion = $value['descripcion'];
             $model = 'DivisionNAE';
        $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        $dataArray = array();
        $dataArray['nombre'] = $nombre;                  
        $dataArray['descripcion'] = $descripcion;                  
        $dataArray['division'] = $key;                  
        $this->db->set('id', $uuid);
        $this->db->insert("$tbdivision", $dataArray); 
        $datosdivion["$key"]['id']= $uuid;

        }
   
        foreach ($datoseccion as $key => $value) 
        {
                $nombre = $value['nombre'];
                $descripcion='';
                if(isset($value['descripcion']))
                $descripcion = $value['descripcion'];
             $model = 'SeccionNAE';
        $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        $dataArray = array();
        $dataArray['nombre'] = $nombre;                  
        $dataArray['descripcion'] = $descripcion;                  
        $dataArray['seccion'] = $key;                  
        $this->db->set('id', $uuid);
        $this->db->insert("$tbseccion", $dataArray); 
        $datoseccion["$key"]['id']= $uuid;

        }
         foreach ($datosnae as $key => $value) 
        { 
                
                $seccionnae = $value['seccion'];
                $seccionnae_id = $datoseccion["$seccionnae"]['id'];
                $divisionnae = $value['division'];
                $divisionnae_id = $datosdivion["$divisionnae"]['id'];
                $clase = $key;
                $nombre = $value['nombre'];
                $descripcion='';
                if(isset($value['descripcion']))
                $descripcion = $value['descripcion'];
             $model = 'SeccionNAE';
        $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        $dataArray = array();
        $dataArray['nombre'] = $nombre;                  
       // $dataArray['seccionnae'] = $seccionnae;                  
        $dataArray['seccionnae_id'] = $seccionnae_id;                  
       // $dataArray['divisionnae'] = $divisionnae;                  
        $dataArray['divisionnae_id'] = $divisionnae_id;                  
        $dataArray['clase'] = $clase;                  
        $dataArray['descripcion'] = $descripcion;                  
        $this->db->set('id', $uuid);
        $this->db->insert("$tbnae", $dataArray); 
        }
    
}
        
                    public function down()
        {
            $tb = 'estructura_area';      
            $this->db->delete("$tb");
                 
        }
}