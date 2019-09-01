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

class Migration_create_table_estructura_plaza extends CI_Migration {

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
                                'area_id'=> array(
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
         ,
                 'owner_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
            ),

                     'ownerentidad_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
                'null' => TRUE,   
                
            )
             ));
              $this->dbforge->add_key('ownerentidad_id');
              $this->dbforge->add_field('CONSTRAINT ownerentidad_id FOREIGN KEY (ownerentidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');
             
             $this->dbforge->add_key('owner_id');
            $this->dbforge->add_field('CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE');
                
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('cargo_id');
        $this->dbforge->add_field('CONSTRAINT cargo_id FOREIGN KEY (cargo_id) REFERENCES persona_cargo (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->dbforge->add_key('area_id');
        $this->dbforge->add_field('CONSTRAINT area_id FOREIGN KEY (area_id) REFERENCES estructura_area (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('estructura_plaza');
               
    }

    public function down() {
        $this->dbforge->drop_table('estructura_plaza');
    }

}