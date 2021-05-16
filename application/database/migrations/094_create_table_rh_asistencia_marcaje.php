<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  CentroCostoMovimientoEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rh_asistencia_marcaje extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'tarjeta'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'entidad_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'marca'=> array(
                                'type' => 'TIMESTAMP', 
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
        $this->dbforge->add_key('entidad_id');
        $this->dbforge->add_field('CONSTRAINT entidad_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('rh_asistencia_marcaje');
               
    }

    public function down() {
        $this->dbforge->drop_table('rh_asistencia_marcaje');
    }

}