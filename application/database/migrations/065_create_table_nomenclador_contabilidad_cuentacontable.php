<?php

        /**
 * NombreClase
 *
 * @package     nomenclador_contabilidad
 * @subpackage  CuentaContable
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_contabilidad_cuentacontable extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'tipocuenta_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'clasificaciontipocuenta_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'subcuenta'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'analisis'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'subanalisis'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'epigrafe'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'partida'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'naturaleza'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'analisis_elemento_subelemento'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'cuenta_banco'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'ultimo_nivel_anotacion'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'descontuinada'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'enviar_no_resumida'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'incluir_a_gastos'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'reguladora'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'cuenta_base'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
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
             ));
             $this->dbforge->add_key('owner_id');
            $this->dbforge->add_field('CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE');
                
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('tipocuenta_id');
$this->dbforge->add_field('CONSTRAINT tipocuenta_id FOREIGN KEY (tipocuenta_id) REFERENCES nomenclador_contabilidad_tipocuenta (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('clasificaciontipocuenta_id');
$this->dbforge->add_field('CONSTRAINT clasificaciontipocuenta_id FOREIGN KEY (clasificaciontipocuenta_id) REFERENCES nomenclador_contabilidad_clasificaciontipocuenta (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_contabilidad_cuentacontable');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_contabilidad_cuentacontable');
    }

}