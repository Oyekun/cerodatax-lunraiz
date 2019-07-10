<?php

        /**
 * NombreClase
 *
 * @package     rh
 * @subpackage  TipoCalendario
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rh_tipocalendario extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'codigo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'dias_laborables'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'fondo_tiempo_mes'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'fondo_tiempo_dia'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'date_created' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'date_updated' => array(
                                'type' => 'TIMESTAMP',  
                                'null' => FALSE,    
                        ),
                                'created_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        ),
                                'updated_from_ip' => array(
                                'type' => 'VARCHAR',  
                                'constraint' => '100',
                                'null' => FALSE,    
                        )
        ));
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('rh_tipocalendario');
               
    }

    public function down() {
        $this->dbforge->drop_table('rh_tipocalendario');
    }

}