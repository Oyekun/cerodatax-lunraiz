<?php

        /**
 * NombreClase
 *
 * @package     nomenclador_contabilidad
 * @subpackage  ClasificacionTipoCuenta
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_contabilidad_clasificaciontipocuenta extends CI_Migration {

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
                                'tipocuenta_id'=> array(
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
        $this->dbforge->add_key('tipocuenta_id');
$this->dbforge->add_field('CONSTRAINT tipocuenta_id FOREIGN KEY (tipocuenta_id) REFERENCES nomenclador_contabilidad_tipocuenta (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_contabilidad_clasificaciontipocuenta');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_contabilidad_clasificaciontipocuenta');
    }

}