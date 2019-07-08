<?php

        /**
 * NombreClase
 *
 * @package     nomenclador
 * @subpackage  CentroCosto
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_centrocosto extends CI_Migration {

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
                                'grupo_centrocosto_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'agrupacion_centrocosto_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'activo'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'descripcion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
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
        $this->dbforge->add_key('grupo_centrocosto_id');
$this->dbforge->add_field('CONSTRAINT grupo_centrocosto_id FOREIGN KEY (grupo_centrocosto_id) REFERENCES nomenclador_grupocentrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('agrupacion_centrocosto_id');
$this->dbforge->add_field('CONSTRAINT agrupacion_centrocosto_id FOREIGN KEY (agrupacion_centrocosto_id) REFERENCES nomenclador_agrupacioncentrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_centrocosto');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_centrocosto');
    }

}