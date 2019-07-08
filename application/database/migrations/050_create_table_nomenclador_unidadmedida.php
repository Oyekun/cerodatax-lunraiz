<?php

        /**
 * NombreClase
 *
 * @package     nomenclador
 * @subpackage  UnidadMedida
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_unidadmedida extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'simbolo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'valor_si'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'magnitud_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'descripcion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
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
        $this->dbforge->add_key('magnitud_id');
$this->dbforge->add_field('CONSTRAINT magnitud_id FOREIGN KEY (magnitud_id) REFERENCES nomenclador_magnitud (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_unidadmedida');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_unidadmedida');
    }

}