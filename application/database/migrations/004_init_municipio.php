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


class Migration_Init_municipio extends CI_Migration {

        public function up()
        {
            $this->load->helper('file');
          $this->load->database();
        $this->load->dbforge();
        $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/municipios.csv');
        
        $salida = explode("\n", $string);
        
        $codigo = '';
        $sgl = '';
        $sglmun = '';
        $nombre = '';
        
         
        foreach ($salida as $key => $value) {
             $salida = explode(",", $value);
   
             $continente_id = '';    
             $continente = $salida[1]; 
             $codigo = $salida[0]; 
             $sgl = $salida[2]; 
             $nombre = $salida[3]; 
           
            $tb='nomenclador_provincia';
             
           $this->db->where('siglas', $continente);   
           $result = $this->db->get("$tb");
   
           $aux_municipio_array = $result->result_array();
         if(count($aux_municipio_array)>0)
         { 
          $continente_id = $aux_municipio_array[0]['id'];
     
        }
        
   
            $tb='nomenclador_municipio';
            
           $this->db->where('codigo', $codigo);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Municipio';
          $this->load->model($model);
    $nameuuid = new $model; 
    $uuid = $this->uuid->v5($codigo,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
    $dataArray = array();
    $dataArray['nombre'] = $nombre;     
    $dataArray['codigo'] = $codigo;     
    $dataArray['siglas'] = $sgl;      
    if($continente_id!='')
    $dataArray['provincia_id'] = $continente_id;     
        if($nombre!='')
        {$this->db->set('id', $uuid);
      $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
    $this->db->insert("$tb", $dataArray); 
     }
        }
 
        }

       
    }
    
    
            public function down()
        {
      $tb = 'nomenclador_municipio';     
            $this->db->delete("$tb");
                 
        }
}