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


class Migration_init_iconos extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

  $string = read_file(APPPATH.'hooks/iconos.csv');
        
        $salida = explode("\n", $string);
        $nombre = ''; 
        foreach ($salida as $key => $value) {

            $salida = explode(",", $value);
            $nombre = $salida[0];  
            $tb='nomenclador_icono';
           $this->db->where('nombre', $nombre);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        if($existe==FALSE)
        {
            $model = 'Icono';
            $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($nombre,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
        $dataArray = array();
        $dataArray['nombre'] = $nombre;  
        $dataArray['descripcion'] = $nombre;  
        $dataArray['foto'] = $nombre;   
        $dataArray['systema'] = 1;   
        $this->db->set('id', $uuid);
          $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s'); 
       $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']: '127.0.0.1';
        $this->db->insert("$tb", $dataArray); 
        }
        } 
        }
                    public function down()
        {
                  
        }
}