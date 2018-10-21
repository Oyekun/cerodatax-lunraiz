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


class Migration_init_menu_modulo_panel_tipomodulo_icono extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

  $string = read_file(APPPATH.'hooks/menu_modulo_panel_tipomodulo_icono.sql');
        
        $salida = explode("\n", $string);
        $nombre = ''; 
        $this->db->simple_query('TRUNCATE configuracion_panel CASCADE;');
        $this->db->simple_query('TRUNCATE configuracion_menu CASCADE;');
        $this->db->simple_query('TRUNCATE configuracion_modulo CASCADE;');
        $this->db->simple_query('TRUNCATE nomenclador_tipomodulo CASCADE;');
        $this->db->simple_query('TRUNCATE nomenclador_icono CASCADE;');
     
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