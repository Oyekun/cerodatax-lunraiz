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


class Migration_Init_provincia extends CI_Migration {

        public function up()
        {
            $this->load->helper('file');
          $this->load->database();
        $this->load->dbforge();
        $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/provincias.csv');
        
        $salida = explode("\n", $string);
        
        $codigo = '';
        $sgl = '';
        $nombre = '';
        $continente = '';
        
         
        foreach ($salida as $key => $value) {
 $salida = explode(",", $value);
   
        $continente_id = '';    
             $continente = $salida[0]; 
             $codigo = $salida[2]; 
             $sgl = $salida[1]; 
             $nombre = $salida[3]; 
           
            $tb='nomenclador_pais';
             
           $this->db->where('codigo', $continente);   
           $result = $this->db->get("$tb");
   
           $aux_municipio_array = $result->result_array();
         if(count($aux_municipio_array)>0)
         { 
          $continente_id = $aux_municipio_array[0]['id'];
     
        }
        
   
            $tb='nomenclador_provincia';
            
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Provincia';
          $this->load->model($model);
    $nameuuid = new $model; 
    $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
    
    $dataArray = array();
    $dataArray['nombre'] = $nombre;     
    $dataArray['codigo'] = $codigo;     
    $dataArray['siglas'] = $sgl;      
    
    //$dataArray['continente'] = $continente;     
  if($continente_id!='')
    $dataArray['pais_id'] = $continente_id;     
        if($nombre!='' && $continente_id!='')
        {$this->db->set('id', $uuid);
    $this->db->insert("$tb", $dataArray); 
     }
        }
 
        }

       
    }
    
    
            public function down()
        {
      $tb = 'nomenclador_provincia';     
            $this->db->delete("$tb");
                 
        }
}