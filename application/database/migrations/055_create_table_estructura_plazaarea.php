<?php

        /**
 * NombreClase
 *
 * @package     estructura
 * @subpackage  AreaPlaza
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_estructura_plazaarea extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'plaza_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'area_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
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
        $this->dbforge->add_key('plaza_id');
$this->dbforge->add_field('CONSTRAINT plaza_id FOREIGN KEY (plaza_id) REFERENCES estructura_plaza (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('area_id');
$this->dbforge->add_field('CONSTRAINT area_id FOREIGN KEY (area_id) REFERENCES estructura_area (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('estructura_plazaarea');
               
    }

    public function down() {
        $this->dbforge->drop_table('estructura_plazaarea');
    }

}