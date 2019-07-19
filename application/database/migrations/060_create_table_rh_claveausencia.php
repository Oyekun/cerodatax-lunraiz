<?php

        /**
 * NombreClase
 *
 * @package     rh
 * @subpackage  ClaveAusencia
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rh_claveausencia extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'tipocausaausencia_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'apagarpor_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
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
                                'deducible'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'no_acumala_vacaciones_dias_importe'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_subsidio'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_tarjeta_dias_importe'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_evaluacion'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_estimulo'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_reporte_ausencia'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'afecta_promedio_total_trab'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'fondo_tiempo'=> array(
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
        $this->dbforge->add_key('tipocausaausencia_id');
$this->dbforge->add_field('CONSTRAINT tipocausaausencia_id FOREIGN KEY (tipocausaausencia_id) REFERENCES nomenclador_tipocausaausencia (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('apagarpor_id');
$this->dbforge->add_field('CONSTRAINT apagarpor_id FOREIGN KEY (apagarpor_id) REFERENCES nomenclador_apagarpor (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('rh_claveausencia');
               
    }

    public function down() {
        $this->dbforge->drop_table('rh_claveausencia');
    }

}