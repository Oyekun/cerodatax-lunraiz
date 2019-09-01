<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  MovimientoEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_persona_movimientoempleado extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'altaempleado_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipocontrato_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'area_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'cargo_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'tipocontrato_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'causamovimiento_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'area_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'cargo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipopago_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'regimensalarial_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'antiguedad_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipocalendario_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'salarioadicional_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'centrocosto_actual_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipopago_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'regimensalarial_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'antiguedad_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipocalendario_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'salarioadicional_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'centrocosto_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'expediente_actual'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'grupoescala'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'categoria_cargo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'expediente'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'basico_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulo_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'antiguedad_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'plus_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'tarifa_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'otros_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'porciento_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'salario_cargo_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'acumula_vacaciones_actual'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'dias_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'importe_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'divisa_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'tarifa_divisa_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'coeficiente_tarifa_divisa_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'dias_laborables_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'descontar_sabados_actual'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'idoneidad_fijo_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'idoneidad_movil_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'porciento_retribuicion_complementaria_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'pago_divisa_valor_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'pago_divisa_porciento_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulacion_valor_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulacion_porciento_actual'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'basico'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'antiguedad'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'plus'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'tarifa'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'otros'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'porciento'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'salario_cargo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'acumula_vacaciones'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'dias'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'importe'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'divisa'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'tarifa_divisa'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'coeficiente_tarifa_divisa'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'dias_laborables'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'descontar_sabados'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'idoneidad_fijo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'idoneidad_movil'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'porciento_retribuicion_complementaria'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'pago_divisa_valor'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'pago_divisa_porciento'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulacion_valor'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'estimulacion_porciento'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
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
        $this->dbforge->add_key('altaempleado_id');
$this->dbforge->add_field('CONSTRAINT altaempleado_id FOREIGN KEY (altaempleado_id) REFERENCES persona_altaempleado (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocontrato_actual_id');
$this->dbforge->add_field('CONSTRAINT tipocontrato_actual_id FOREIGN KEY (tipocontrato_actual_id) REFERENCES nomenclador_rh_tipocontrato (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('area_actual_id');
$this->dbforge->add_field('CONSTRAINT area_actual_id FOREIGN KEY (area_actual_id) REFERENCES estructura_area (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('cargo_actual_id');
$this->dbforge->add_field('CONSTRAINT cargo_actual_id FOREIGN KEY (cargo_actual_id) REFERENCES estructura_plaza (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocontrato_id');
$this->dbforge->add_field('CONSTRAINT tipocontrato_id FOREIGN KEY (tipocontrato_id) REFERENCES nomenclador_rh_tipocontrato (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('causamovimiento_id');
$this->dbforge->add_field('CONSTRAINT causamovimiento_id FOREIGN KEY (causamovimiento_id) REFERENCES nomenclador_rh_causamovimiento (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('area_id');
$this->dbforge->add_field('CONSTRAINT area_id FOREIGN KEY (area_id) REFERENCES estructura_area (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('cargo_id');
$this->dbforge->add_field('CONSTRAINT cargo_id FOREIGN KEY (cargo_id) REFERENCES estructura_plaza (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipopago_actual_id');
$this->dbforge->add_field('CONSTRAINT tipopago_actual_id FOREIGN KEY (tipopago_actual_id) REFERENCES nomenclador_rh_tipopago (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('regimensalarial_actual_id');
$this->dbforge->add_field('CONSTRAINT regimensalarial_actual_id FOREIGN KEY (regimensalarial_actual_id) REFERENCES nomenclador_rh_regimensalarial (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('antiguedad_actual_id');
$this->dbforge->add_field('CONSTRAINT antiguedad_actual_id FOREIGN KEY (antiguedad_actual_id) REFERENCES nomenclador_rh_antiguedad (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocalendario_actual_id');
$this->dbforge->add_field('CONSTRAINT tipocalendario_actual_id FOREIGN KEY (tipocalendario_actual_id) REFERENCES rh_tipocalendario (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('salarioadicional_actual_id');
$this->dbforge->add_field('CONSTRAINT salarioadicional_actual_id FOREIGN KEY (salarioadicional_actual_id) REFERENCES nomenclador_rh_salarioadicional (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('centrocosto_actual_id');
$this->dbforge->add_field('CONSTRAINT centrocosto_actual_id FOREIGN KEY (centrocosto_actual_id) REFERENCES nomenclador_centrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipopago_id');
$this->dbforge->add_field('CONSTRAINT tipopago_id FOREIGN KEY (tipopago_id) REFERENCES nomenclador_rh_tipopago (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('regimensalarial_id');
$this->dbforge->add_field('CONSTRAINT regimensalarial_id FOREIGN KEY (regimensalarial_id) REFERENCES nomenclador_rh_regimensalarial (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('antiguedad_id');
$this->dbforge->add_field('CONSTRAINT antiguedad_id FOREIGN KEY (antiguedad_id) REFERENCES nomenclador_rh_antiguedad (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocalendario_id');
$this->dbforge->add_field('CONSTRAINT tipocalendario_id FOREIGN KEY (tipocalendario_id) REFERENCES rh_tipocalendario (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('salarioadicional_id');
$this->dbforge->add_field('CONSTRAINT salarioadicional_id FOREIGN KEY (salarioadicional_id) REFERENCES nomenclador_rh_salarioadicional (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('centrocosto_id');
$this->dbforge->add_field('CONSTRAINT centrocosto_id FOREIGN KEY (centrocosto_id) REFERENCES nomenclador_centrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('persona_movimientoempleado');
               
    }

    public function down() {
        $this->dbforge->drop_table('persona_movimientoempleado');
    }

}