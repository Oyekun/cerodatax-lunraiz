<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  BajaEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_persona_bajaempleado extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'altaempleado_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'causa_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'fecha_baja'=> array(
                                'type' => 'DATE',
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
        $this->dbforge->add_key('altaempleado_id');
$this->dbforge->add_field('CONSTRAINT altaempleado_id FOREIGN KEY (altaempleado_id) REFERENCES persona_altaempleado (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('causa_id');
$this->dbforge->add_field('CONSTRAINT causa_id FOREIGN KEY (causa_id) REFERENCES nomenclador_rh_causa (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('persona_bajaempleado');
               
    }

    public function down() {
        $this->dbforge->drop_table('persona_bajaempleado');
    }

}