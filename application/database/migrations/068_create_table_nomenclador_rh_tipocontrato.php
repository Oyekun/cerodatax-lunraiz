<?php

        /**
 * NombreClase
 *
 * @package     nomenclador_rh
 * @subpackage  TipoContrato
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_rh_tipocontrato extends CI_Migration {

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
                                'identificacion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'plantilla'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'liquidar_vacaciones'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'ms_pago_medida'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'ms_estimulo_resultado'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'ms_estimulo_area_economica'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'excluir_pago_fecha_fin_contrato'=> array(
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
        ));
        $this->dbforge->add_key('id', TRUE);
        
        $this->dbforge->create_table('nomenclador_rh_tipocontrato');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_rh_tipocontrato');
    }

}