<?php

        /**
 * NombreClase
 *
 * @package     estructura
 * @subpackage  Plazas
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_estructura_plazas extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'cargo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'aprobadas'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'ocupadas'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'activo'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
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
        $this->dbforge->add_key('cargo_id');
$this->dbforge->add_field('CONSTRAINT cargo_id FOREIGN KEY (cargo_id) REFERENCES persona_cargo (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('estructura_plazas');
               
    }

    public function down() {
        $this->dbforge->drop_table('estructura_plazas');
    }

}