<?php

        /**
 * NombreClase
 *
 * @package     crm
 * @subpackage  CuentaBancariaProveedor
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_crm_cuentabancariaproveedor extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'cuentabancaria_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'proveedor_id'=> array(
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
        $this->dbforge->add_key('cuentabancaria_id');
$this->dbforge->add_field('CONSTRAINT cuentabancaria_id FOREIGN KEY (cuentabancaria_id) REFERENCES nomenclador_cuentabancaria (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('proveedor_id');
$this->dbforge->add_field('CONSTRAINT proveedor_id FOREIGN KEY (proveedor_id) REFERENCES crm_proveedor (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('crm_cuentabancariaproveedor');
               
    }

    public function down() {
        $this->dbforge->drop_table('crm_cuentabancariaproveedor');
    }

}