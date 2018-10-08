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


class Migration_Init_paneles extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

  $string = read_file(APPPATH.'hooks/panel.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
       
        $nombre = ''; 
        $orden = ''; 
         $cont=0;
        $id_tipo_mod;
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            
            $menu = $salida[0]; 
            $id_contenedor = $salida[1]; 
            $nombre = $salida[2]; 
            $orden = $salida[3]; 
            $alias = $salida[4]; 
         
            $tb='configuracion_panel';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {
            $tb='configuracion_menu';
           $this->db->where('id_menu',$menu);   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $menu_id = $aux_union_array[0]['id'];
          }

            $model = 'Panel';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['orden'] = $orden;  
        $dataArray['menu_id'] = $menu_id;   
        $dataArray['alias'] = $alias;   
        $dataArray['id_contenedor'] = $id_contenedor;   
        $this->db->set('id', $uuid);
         $tb='configuracion_panel';
          $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
         
          
         
        }

        } 
           
 
        }

           
        
        
        
                    public function down()
        {
            $tb = 'nomenclador_sexo';      
            $this->db->delete("$tb");
                 
        }
}