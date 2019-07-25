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


class Migration_Init_pais extends CI_Migration {

        public function up()
        {
        		$this->load->helper('file');
        	$this->load->database();
				$this->load->dbforge();
				$this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/paises.csv');
        
        $salida = explode("\n", $string);
        
        $codigo = '';
        $sgl = '';
        $nombre = '';
        $continente = '';
        $continente_id = '';
         
        foreach ($salida as $key => $value) {
 $salida = explode(",", $value);
   
            
             $continente = $salida[0]; 
             $codigo = $salida[1]; 
             $sgl = $salida[2]; 
             $nombre = $salida[3]; 
        	 
            $tb='nomenclador_continente';
             
           $this->db->where('nombre', $continente);   
           $result = $this->db->get("$tb");
	 
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        if($existe==FALSE)
        {
            $model = 'Continente';
            $dirmodel = 'nomenclador/continente';
        	
            $this->load->model($dirmodel);
		$nameuuid = new $model; 
		$uuid = $this->uuid->v5($continente,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
		$dataArray = array();
		$dataArray['nombre'] = $continente;
		  	 		
		$continente_id = $uuid;
		if($continente!='') 	 		
        {$this->db->set('id', $uuid);
        $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1'; 
		$this->db->insert("$tb", $dataArray); 
        }
        }
        
   
            $tb='nomenclador_pais';
            
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {   
            $model = 'Pais';
            $dirmodel = "nomenclador/$model";
            $this->load->model($dirmodel);
		$nameuuid = new $model; 
		$uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
		$dataArray = array();
		$dataArray['nombre'] = $nombre;	 		
		$dataArray['codigo'] = $codigo;	 		
		$dataArray['siglas'] = $sgl;	 		
		//$dataArray['continente'] = $continente;	 		
		$dataArray['continente_id'] = $continente_id;	 		
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
			$tb = 'nomenclador_continente'; 		
            $this->db->delete("$tb");
                 
        }
}