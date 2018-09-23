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


class Migration_Init_monedas extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/monedas.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
      
        $sgl = '';
        $nombre = ''; 
         
      
        foreach ($salida as $key => $value) {

            $salida = explode(";", $value);
   
            
            $pais = $salida[0]; 
            $nombre = $salida[1]; 
            $sgl = str_replace("\r", "", $salida[2]); 
            $tb='nomenclador_moneda';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        $tb='nomenclador_pais';
           $this->db->where('nombre', $pais);   
           $result = $this->db->get("$tb");
         $aux_pais_array = $result->result_array();
         
       
        if($existe==FALSE)
        {$model = 'Moneda';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['codigo_iso'] = $sgl;               
           $tb='nomenclador_moneda';
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
         
        }
          if(count($aux_pais_array)>0)
         {
$tb='nomenclador_pais';
          
          $pais_id = $aux_pais_array[0]['id'];  
           $this->db->where('id', $pais_id);
            $dataArrayMoneda = array();   
          
          $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
         $dataArrayMoneda['moneda_id'] = $uuid;
            $sl = $this->db->update("$tb",$dataArrayMoneda);

          }
 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_moneda';      
            $this->db->delete("$tb");
                 
        }
}