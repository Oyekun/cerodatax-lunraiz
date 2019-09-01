<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  IdiomaAltaEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_persona_idiomaaltaempleado extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'idioma_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'altaempleado_id'=> array(
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
        $this->dbforge->add_key('idioma_id');
$this->dbforge->add_field('CONSTRAINT idioma_id FOREIGN KEY (idioma_id) REFERENCES nomenclador_general_idioma (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('altaempleado_id');
$this->dbforge->add_field('CONSTRAINT altaempleado_id FOREIGN KEY (altaempleado_id) REFERENCES persona_altaempleado (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('persona_idiomaaltaempleado');
               
    }

    public function down() {
        $this->dbforge->drop_table('persona_idiomaaltaempleado');
    }

}