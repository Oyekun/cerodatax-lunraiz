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


class Migration_Init_area extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

 
        $string1 = read_file(APPPATH.'hooks/area.csv');
        
         
        $salida1 = explode("\n", $string1);
         
        
        $leaf = '';
        $nombre = ''; 
        $orden = ''; 
        $tb='estructura_area';
        
        $parent_id = ''; 
            
        foreach ($salida1 as $key => $value) {
            
        $salida_aux = explode(";", $value);
        $id = $salida_aux[0];
        $nombre = str_replace("\r", "", $salida_aux[1]); 
        $orden = str_replace("\r", "", $salida_aux[2]); 
        $area_id_aux= '';
        if(isset($salida_aux[3]))
        $area_id_aux = str_replace("\r", "", $salida_aux[3]);
         
        $datos["$id"]['nombre'] = $nombre;
        $datos["$id"]['orden'] = $orden;
        $datos["$id"]['parent_id'] = $area_id_aux;
         if($area_id_aux!='')
        $datos1["$area_id_aux"]['area_id'] = $area_id_aux;
        } 
         
        foreach ($salida1 as $key => $value) {
            
        $salida_aux = explode(";", $value);
        $parent_id = '';
        $parent = ''; 
        $area_id = ''; 
          if(isset($salida_aux[3]))
        $area_id = str_replace("\r", "", $salida_aux[3]);
         
        if($area_id!='')
        
        { 
   
          $area_id= $salida_aux[3];
          $str = str_replace("\r", "", $area_id);
            
             if(isset($datos["$str"]))
        { 

            $parent = $datos["$str"]['nombre'];
            $orden = $datos["$str"]['orden'];
            $parent_id_otro = $datos["$str"]['parent_id'];
                
        //print_r($datos["$str"]);die;
        
            $this->db->where('nombre',$parent);   
           $result = $this->db->get("$tb");
         $aux_parent_array = $result->result_array();
         if(count($aux_parent_array)==0)
         { 

            $this->insertArea($parent,$orden,$datos1,$parent_id_otro,$datos);
          
          }
        
        }
                        
       
        }
       $id_aux = $salida_aux[0];
        
        if(isset($datos1["$id_aux"]))
        $leaf = '0';
      else
        $leaf = '1';
        
        $nombre = str_replace("\r", "", $salida_aux[1]); 
        $orden = $salida_aux[2]; 
        
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {   $model = 'Area';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        if($parent!='') 
        $parent_id = $this->uuid->v5($parent,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        
          
        $dataArray['nombre'] = $nombre;                  
        $dataArray['orden'] = $orden;                  
       // $dataArray['parent'] = $parent;                  
        $dataArray['leaf'] = $leaf;    
        if($parent_id!='')              
        $dataArray['parent_id'] = $parent_id;                  
                 // print_r($dataArray);die;
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        } 
    }
        
                    public function down()
        {
            $tb = 'estructura_area';      
            $this->db->delete("$tb");
                 
        }

                      public function insertArea($nombre,$orden,$datos1,$parent_id_otro,$datos)
        {
        $leaf = '1';
       if($parent_id_otro!='')
       {

        if(isset($datos["$parent_id_otro"]))
          {$leaf = '0';
 
           $parent_q = $datos["$parent_id_otro"]['nombre'];
            $orden_q = $datos["$parent_id_otro"]['orden'];
            $parent_id_otro_q = $datos["$parent_id_otro"]['parent_id'];
          
        $this->insertArea($parent_q,$orden_q,$datos1,$parent_id_otro_q,$datos);
          }
  else $parent_id_otro='';

       }


          $tb = 'estructura_area';
 
        //$nombre = str_replace("\r", "", $salida_aux[1]); 
        //$orden = $salida_aux[2]; 
       
          $model = 'Area';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        $dataArray = array();
        if($parent_id_otro!='') 
        {$parent_id_otro = $this->uuid->v5($parent_q,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray['parent_id'] = $parent_id_otro;                  
        }
          
        $dataArray['nombre'] = $nombre;                  
        $dataArray['orden'] = $orden;                  
       // $dataArray['parent'] = $parent;                  
        $dataArray['leaf'] = $leaf;                  
                 
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
              
        }
}