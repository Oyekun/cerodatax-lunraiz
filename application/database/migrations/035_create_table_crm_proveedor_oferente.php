  <?php

        /**
 * NombreClase
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Sexo
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_crm_proveedor_oferente extends CI_Migration {


    public function up() {

             
         $this->dbforge->drop_table('crm_proveedorcuentabancaria',TRUE);
         $this->dbforge->drop_table('crm_oferentecuentabancaria',TRUE);

 $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ), 
                                'cuentabancaria_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),  
                                'proveedor_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
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
                $this->dbforge->add_key('cuenta_bancaria_id');
                $this->dbforge->add_field('CONSTRAINT cuenta_bancaria_id FOREIGN KEY (cuentabancaria_id) REFERENCES nomenclador_cuentabancaria (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('proveedor_id');
                $this->dbforge->add_field('CONSTRAINT proveedor_id FOREIGN KEY (proveedor_id) REFERENCES crm_proveedor (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('crm_proveedorcuentabancaria',TRUE);



 $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE,
                        ), 
                                'cuentabancaria_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
                        ),  
                                'oferente_id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE,
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
                $this->dbforge->add_key('cuenta_bancaria_id');
                $this->dbforge->add_field('CONSTRAINT cuenta_bancaria_id FOREIGN KEY (cuentabancaria_id) REFERENCES nomenclador_cuentabancaria (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('oferente_id');
                $this->dbforge->add_field('CONSTRAINT oferente_id FOREIGN KEY (oferente_id) REFERENCES crm_oferente (id) ON UPDATE CASCADE ON DELETE CASCADE');
                $this->dbforge->add_key('id', TRUE);  
                $this->dbforge->create_table('crm_oferentecuentabancaria',TRUE);
  
    }

      public function down() {
        $this->dbforge->drop_table('crm_oferentecuentabancaria');
        $this->dbforge->drop_table('crm_proveedorcuentabancaria');
    }
}
