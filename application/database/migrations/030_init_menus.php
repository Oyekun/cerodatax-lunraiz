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


class Migration_Init_menus extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

$string = read_file(APPPATH.'hooks/menus.csv');
        
        $salida = explode("\n", $string);
        $cant=0;
       
        $nombre = ''; 
        $orden = ''; 
         $cont=0;
        $id_tipo_mod;
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
   
            $descripcion='';
            $descripcion_modulo='';
            $descripcion_menu='';
            $tipo_modulo = $salida[0];
            if(isset($salida[5])) 
            $descripcion = $salida[5];
             if(isset($salida[6])) 
            $descripcion_modulo = $salida[6];  
            if(isset($salida[7])) 
            $descripcion_menu = $salida[7];  
            
            $modulo = $salida[1]; 
            $idmenu = $salida[2]; 
            $menu = $salida[3]; 
            $tabpanel = $salida[4]; 
         
            $tb='nomenclador_tipomodulo';
           $this->db->where('nombre', $tipo_modulo);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'TipoModulo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($tipo_modulo,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $tipo_modulo;  
        $dataArray['orden'] = $cont;  
        $dataArray['descripcion'] = $descripcion;   
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
        $id_tipo_mod =$uuid;
        $cont++; 
       
        $cont_mod=0;
        $cont_men=0;
        
        } 
           $tb='configuracion_modulo';
           $this->db->where('nombre', $modulo);   
           $this->db->where('tipo_modulo_id', $id_tipo_mod);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Modulo';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($modulo.$id_tipo_mod,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $modulo;  
        $dataArray['orden'] = $cont_mod; 
        $dataArray['descripcion'] = $descripcion_modulo;  
        $dataArray['tipo_modulo_id'] = $id_tipo_mod;  
        $dataArray['activo'] = 1;               
                      
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
        $id_mod =$uuid;
        $cont_mod++; 
        }

         $tb='configuracion_menu';
           $this->db->where('nombre', $menu);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==FALSE)
        {$model = 'Menu';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($value,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $menu;  
        $dataArray['orden'] = $cont_men;
        $dataArray['descripcion'] = $descripcion_menu;  
        $dataArray['modulo_id'] =  $this->uuid->v5($modulo.$id_tipo_mod,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray['id_menu'] = $idmenu;  
        $dataArray['tabpanel'] = $tabpanel;  
        $dataArray['activo'] = 1;  
                       
                      
        $this->db->set('id', $uuid);
         $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
      //  $id_tipo_mod =$uuid;
        $cont_men++; 
        }

 
        }

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_sexo';      
            $this->db->delete("$tb");
                 
        }
}