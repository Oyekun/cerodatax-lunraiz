<?php

        /**
 * NombreClase
 *
 * @package     rh
 * @subpackage  Calendario
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_rh_calendario extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'tipocalendario_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'ano'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'descripcion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
                                'null' => TRUE
                        ),
                                'dias_feriados_enero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_enero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_enero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_enero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_enero'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5304-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_febrero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_febrero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_febrero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_febrero'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_febrero'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5313-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_marzo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_marzo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_marzo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_marzo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_marzo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5322-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_abril'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_abril'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_abril'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_abril'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_abril'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5331-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_mayo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_mayo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_mayo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_mayo'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_mayo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5340-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_junio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_junio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_junio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_junio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_junio'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5349-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_julio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_julio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_julio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_julio'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_julio'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5358-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_agosto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_agosto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_agosto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_agosto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_enero'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5367-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_septiembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_septiembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_septiembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_septiembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_septiembre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5376-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_octubre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_octubre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_octubre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_octubre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_octubre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5385-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_noviembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_noviembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_noviembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_noviembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_noviembre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5394-inputEl'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'dias_feriados_diciembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'primera_quincena_diciembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'segunda_quincena_diciembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => FALSE
                        ),
                                'domingos_diciembre'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'mes_diciembre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'datefield-5403-inputEl'=> array(
                                'type' => 'DATE',
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
        $this->dbforge->add_key('tipocalendario_id');
$this->dbforge->add_field('CONSTRAINT tipocalendario_id FOREIGN KEY (tipocalendario_id) REFERENCES rh_tipocalendario (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('rh_calendario');
               
    }

    public function down() {
        $this->dbforge->drop_table('rh_calendario');
    }

}