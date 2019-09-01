<?php

        /**
 * NombreClase
 *
 * @package     persona
 * @subpackage  AltaEmpleado
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_persona_altaempleado extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'persona_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'foto'=> array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                                'foto1'=> array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                                'sexo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'color_piel_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'pais_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'provincia_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'municipio_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'estado_civil_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'situacion_defensa_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'nivel_educacional_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'organismo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'grupo_sanguineo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'pais_registro_civil_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'provincia_registro_civil_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'municipio_registro_civil_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'tipocontrato_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'causa_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'fundamentacionalta_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'area_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                 'entidad_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'cargo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'categoriadocente_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'categoriacientifica_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'tipojefe_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'profesion_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
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
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'apellidos'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'carnet_identidad'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'edad'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'camisa'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                   'expediente'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'saya'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'pantalon'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'zapato'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'direccion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'correo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'telefono'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'celular'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'padre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'madre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'estatura'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'peso'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'trabaja'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'fecha_nacimiento'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'cantidad_hijos'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'donante'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'tomo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'folio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'ano'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'no_solapin'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'no_tarjeta_asistencia'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'ano_inicio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'ano_interrupto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'fecha_alta_cargo'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'fecha_alta_entidad'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'fecha_terminacion_cargo'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'fecha_firma_designado'=> array(
                                'type' => 'DATE',
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
                                ,

                     'antiguedad_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
                'null' => TRUE,   
                
            )             ,

                     'centrocosto_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
                'null' => TRUE,   
                
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
                                'visible'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                                'default' => '1',
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
         ,
                 'owner_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
            ),

                     'ownerentidad_id' => array(
                'type'       => 'VARCHAR',
                'constraint' => '100', 
                'null' => TRUE,   
                
            )
             ));

 $this->dbforge->add_key('centrocosto_id');
              $this->dbforge->add_field('CONSTRAINT centrocosto_id FOREIGN KEY (centrocosto_id) REFERENCES nomenclador_centrocosto (id) ON UPDATE CASCADE');
             
 $this->dbforge->add_key('antiguedad_id');
              $this->dbforge->add_field('CONSTRAINT antiguedad_id FOREIGN KEY (antiguedad_id) REFERENCES nomenclador_rh_antiguedad (id) ON UPDATE CASCADE');
             
              $this->dbforge->add_key('ownerentidad_id');
              $this->dbforge->add_field('CONSTRAINT ownerentidad_id FOREIGN KEY (ownerentidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');
             
             $this->dbforge->add_key('owner_id');
            $this->dbforge->add_field('CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE');
                
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('persona_id');
$this->dbforge->add_field('CONSTRAINT persona_id FOREIGN KEY (persona_id) REFERENCES persona_persona (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('sexo_id');
$this->dbforge->add_field('CONSTRAINT sexo_id FOREIGN KEY (sexo_id) REFERENCES nomenclador_sexo (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('color_piel_id');
$this->dbforge->add_field('CONSTRAINT color_piel_id FOREIGN KEY (color_piel_id) REFERENCES nomenclador_colorpiel (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('pais_id');
$this->dbforge->add_field('CONSTRAINT pais_id FOREIGN KEY (pais_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('provincia_id');
$this->dbforge->add_field('CONSTRAINT provincia_id FOREIGN KEY (provincia_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('municipio_id');
$this->dbforge->add_field('CONSTRAINT municipio_id FOREIGN KEY (municipio_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('estado_civil_id');
$this->dbforge->add_field('CONSTRAINT estado_civil_id FOREIGN KEY (estado_civil_id) REFERENCES nomenclador_estadocivil (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('situacion_defensa_id');
$this->dbforge->add_field('CONSTRAINT situacion_defensa_id FOREIGN KEY (situacion_defensa_id) REFERENCES nomenclador_defensa (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('nivel_educacional_id');
$this->dbforge->add_field('CONSTRAINT nivel_educacional_id FOREIGN KEY (nivel_educacional_id) REFERENCES nomenclador_niveleducacional (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('organismo_id');
$this->dbforge->add_field('CONSTRAINT organismo_id FOREIGN KEY (organismo_id) REFERENCES nomenclador_organismo (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('grupo_sanguineo_id');
$this->dbforge->add_field('CONSTRAINT grupo_sanguineo_id FOREIGN KEY (grupo_sanguineo_id) REFERENCES nomenclador_gruposanguineo (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('pais_registro_civil_id');
$this->dbforge->add_field('CONSTRAINT pais_registro_civil_id FOREIGN KEY (pais_registro_civil_id) REFERENCES nomenclador_pais (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('provincia_registro_civil_id');
$this->dbforge->add_field('CONSTRAINT provincia_registro_civil_id FOREIGN KEY (provincia_registro_civil_id) REFERENCES nomenclador_provincia (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('municipio_registro_civil_id');
$this->dbforge->add_field('CONSTRAINT municipio_registro_civil_id FOREIGN KEY (municipio_registro_civil_id) REFERENCES nomenclador_municipio (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocontrato_id');
$this->dbforge->add_field('CONSTRAINT tipocontrato_id FOREIGN KEY (tipocontrato_id) REFERENCES nomenclador_rh_tipocontrato (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('causa_id');
$this->dbforge->add_field('CONSTRAINT causa_id FOREIGN KEY (causa_id) REFERENCES nomenclador_rh_causa (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('fundamentacionalta_id');
$this->dbforge->add_field('CONSTRAINT fundamentacionalta_id FOREIGN KEY (fundamentacionalta_id) REFERENCES nomenclador_rh_fundamentacionalta (id) ON UPDATE CASCADE ON DELETE CASCADE');

$this->dbforge->add_key('entidad_id');
$this->dbforge->add_field('CONSTRAINT entidad_id FOREIGN KEY (entidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE ON DELETE CASCADE');

$this->dbforge->add_key('area_id');
$this->dbforge->add_field('CONSTRAINT area_id FOREIGN KEY (area_id) REFERENCES estructura_area (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('cargo_id');
$this->dbforge->add_field('CONSTRAINT cargo_id FOREIGN KEY (cargo_id) REFERENCES estructura_plaza (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('categoriadocente_id');
$this->dbforge->add_field('CONSTRAINT categoriadocente_id FOREIGN KEY (categoriadocente_id) REFERENCES nomenclador_categoriadocente (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('categoriacientifica_id');
$this->dbforge->add_field('CONSTRAINT categoriacientifica_id FOREIGN KEY (categoriacientifica_id) REFERENCES nomenclador_categoriacientifica (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipojefe_id');
$this->dbforge->add_field('CONSTRAINT tipojefe_id FOREIGN KEY (tipojefe_id) REFERENCES nomenclador_rh_tipojefe (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('profesion_id');
$this->dbforge->add_field('CONSTRAINT profesion_id FOREIGN KEY (profesion_id) REFERENCES nomenclador_rh_profesion (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipopago_id');
$this->dbforge->add_field('CONSTRAINT tipopago_id FOREIGN KEY (tipopago_id) REFERENCES nomenclador_rh_tipopago (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('regimensalarial_id');
$this->dbforge->add_field('CONSTRAINT regimensalarial_id FOREIGN KEY (regimensalarial_id) REFERENCES nomenclador_rh_regimensalarial (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipocalendario_id');
$this->dbforge->add_field('CONSTRAINT tipocalendario_id FOREIGN KEY (tipocalendario_id) REFERENCES rh_tipocalendario (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('salarioadicional_id');
$this->dbforge->add_field('CONSTRAINT salarioadicional_id FOREIGN KEY (salarioadicional_id) REFERENCES nomenclador_rh_salarioadicional (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('persona_altaempleado');
               
    }

    public function down() {
        $this->dbforge->drop_table('persona_altaempleado');
    }

}