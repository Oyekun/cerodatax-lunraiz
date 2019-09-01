<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  CentroCostoAltaEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_persona_centrocostoaltaempleado extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'centrocosto_id'=> array(
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
        $this->dbforge->add_key('centrocosto_id');
$this->dbforge->add_field('CONSTRAINT centrocosto_id FOREIGN KEY (centrocosto_id) REFERENCES nomenclador_centrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('altaempleado_id');
$this->dbforge->add_field('CONSTRAINT altaempleado_id FOREIGN KEY (altaempleado_id) REFERENCES persona_altaempleado (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('persona_centrocostoaltaempleado');
               
    }

    public function down() {
        $this->dbforge->drop_table('persona_centrocostoaltaempleado');
    }

}