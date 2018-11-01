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


class Migration_init_banco_cuenta extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

  $string = read_file(APPPATH.'hooks/banco_cuenta.sql');
        
        $salida = explode("\n", $string);
        $nombre = ''; 
        $this->db->simple_query('TRUNCATE nomenclador_tipobanco CASCADE;');
        $this->db->simple_query('TRUNCATE nomenclador_banco CASCADE;');
        $this->db->simple_query('TRUNCATE nomenclador_cuentabancaria CASCADE;');
     
         foreach ($salida as $key => $value) {

            $salida = explode(" ", $value);
            $nombre = $salida[0];  
           // $codigo = $salida[1];  
            if($nombre=='INSERT')
        {
            if ( ! $this->db->simple_query($value))
{
        $error = $this->db->error(); // Has keys 'code' and 'message'
}
        }
        } 
        }
                    public function down()
        {
                  
        }
}