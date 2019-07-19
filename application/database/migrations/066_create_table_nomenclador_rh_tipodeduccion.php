<?php

        /**
 * NombreClase
 *
 * @package     nomenclador_rh
 * @subpackage  TipoDeduccion
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_rh_tipodeduccion extends CI_Migration {

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
                                'cuentacontable_id'=> array(
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
        $this->dbforge->add_key('cuentacontable_id');
$this->dbforge->add_field('CONSTRAINT cuentacontable_id FOREIGN KEY (cuentacontable_id) REFERENCES nomenclador_contabilidad_cuentacontable (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_rh_tipodeduccion');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_rh_tipodeduccion');
    }

}