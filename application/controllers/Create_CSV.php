<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Create_CSV extends CI_Controller {
	
	public function init()
        {
			
                parent::__construct();
				echo 'Bienvenidos al Sistema CERODATA.'.PHP_EOL;
                $this->load->helper('file');	


 global $Tarray_municipios;
 $xml= '';
 foreach($Tarray_municipios as $pais => $provincias) {
           // $xml.= "$region,";
            
            foreach($provincias[1] as $code => $provincia) {
				 
                $xml.= "$pais,$code,$provincia,"."\n";
				
              }
              print_r($xml);
        }
	 
                 
		 if ( ! write_file(APPPATH.'hooks/municipios.csv', $xml))
{
        echo 'Unable to write the file';
}
else
{
        echo 'File written!';
}
        
		
	 
        }

        public function carga()
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
        //$this->db->truncate("$tb");
        $parent_id = ''; 
            
        foreach ($salida1 as $key => $value) {
            
        $salida_aux = explode(";", $value);
        $id = $salida_aux[0];
        $nombre = str_replace("\r", "", $salida_aux[1]); 
        $area_id_aux = str_replace("\r", "", $salida_aux[3]);
  //print_r($area_id_aux);
        $datos["$id"]['nombre'] = $nombre;
         if($area_id_aux!='')
        $datos1["$area_id_aux"]['area_id'] = $area_id_aux;
        } 
         
        foreach ($salida1 as $key => $value) {
            
        $salida_aux = explode(";", $value);
        $parent_id = 'root';
        $parent = ''; 
          
        $area_id = str_replace("\r", "", $salida_aux[3]);
        //print_r($salida_aux);die;
        if($area_id!='')
        //if(count(explode("-", $salida_aux[2]))>1)
        { 
   //       print_r($salida_aux[3]);die;
          $area_id= $salida_aux[3];
          $str = str_replace("\r", "", $area_id);
             //print_r($str);
             if($str)
        $parent = $datos["$str"]['nombre'];
        
       //$parent=$salida_aux[2]; 
        //$uuid = $this->uuid->v5($parent,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');   
       // $parent_id = $uuid;
       // print_r($uuid);die;                   
       
        }
       $id_aux = $salida_aux[0];
        //print_r(isset($datos1["$id_aux"]));die;
        if(isset($datos1["$id_aux"]))
        $leaf = '1';
      else
        $leaf = '0';
        
        $nombre = str_replace("\r", "", $salida_aux[1]); 
        $orden = $salida_aux[2]; 
       
          //        print_r($parent);die;        
        //$datos['id'] = $salida_aux[0];
        
         
            
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? True: False;
        
        if($existe==False)
        {   $model = 'Area';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        if($parent!='') 
        $parent_id = $this->uuid->v5($parent,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        //if($parent_id=='root')
          
        $dataArray['nombre'] = $nombre;                  
        $dataArray['orden'] = $orden;                  
        $dataArray['parent'] = $parent;                  
        $dataArray['leaf'] = $leaf;                  
        $dataArray['parent_id'] = $parent_id;                  
                       
 //print_r($dataArray);die;
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
 
        }/*
          $result = $this->db->get("$tb");
          $total =  $result->result_array();
          $total1 =  $result->result_array();
        $cont = 0;
        foreach ($total as $key => $value) {
        
        foreach ($total1 as $key1 => $value1) {
            
         $parent_name = $value1['parent'];
         $name = $value['nombre'];
         
         if($parent_name==$name)
         {

          
           $dataArray1 = array();
           $dataArray1['parent_id'] = $value['id'];  
           $this->db->where('id', $value1['id']);
           $this->db->update("$tb",$dataArray1);
          $cont++;
          // print_r(debug_backtrace());

         }


        }
        if($cont==1)
           {
          // print_r($value1);die;
           }
        // print_r($value2);die;
        }*/
 
    }
        
		
	 
	
}
