<?php

        /**
 * NombreClase
 *
 * @package     nomenclador_rh
 * @subpackage  Antiguedad
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_rh_antiguedad extends CI_Migration {

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
                                'limiteinferior'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'limitesuperior'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'importe'=> array(
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
        
        $this->dbforge->create_table('nomenclador_rh_antiguedad');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_rh_antiguedad');
    }

}