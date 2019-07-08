<?php

        /**
 * NombreClase
 *
 * @package     nomenclador
 * @subpackage  Almacen
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_nomenclador_almacen extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'centrocosto_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipoentrada_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'criteriosalida_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'especificacioninsumo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'clasificacioncontable_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'cliente_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'vendedor_id'=> array(
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
                                'letra'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'telefono'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'direccion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'documento_ordenar'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'fecha_alta'=> array(
                                'type' => 'DATE',
                                'null' => FALSE
                        ),
                                'punto_venta'=> array(
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
        $this->dbforge->add_key('centrocosto_id');
$this->dbforge->add_field('CONSTRAINT centrocosto_id FOREIGN KEY (centrocosto_id) REFERENCES nomenclador_centrocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipoentrada_id');
$this->dbforge->add_field('CONSTRAINT tipoentrada_id FOREIGN KEY (tipoentrada_id) REFERENCES nomenclador_tipoentrada (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('criteriosalida_id');
$this->dbforge->add_field('CONSTRAINT criteriosalida_id FOREIGN KEY (criteriosalida_id) REFERENCES nomenclador_criteriosalida (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('especificacioninsumo_id');
$this->dbforge->add_field('CONSTRAINT especificacioninsumo_id FOREIGN KEY (especificacioninsumo_id) REFERENCES nomenclador_especificacioninsumo (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('clasificacioncontable_id');
$this->dbforge->add_field('CONSTRAINT clasificacioncontable_id FOREIGN KEY (clasificacioncontable_id) REFERENCES nomenclador_clasificacioncontable (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('cliente_id');
$this->dbforge->add_field('CONSTRAINT cliente_id FOREIGN KEY (cliente_id) REFERENCES crm_cliente (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('vendedor_id');
$this->dbforge->add_field('CONSTRAINT vendedor_id FOREIGN KEY (vendedor_id) REFERENCES persona_persona (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('nomenclador_almacen');
               
    }

    public function down() {
        $this->dbforge->drop_table('nomenclador_almacen');
    }

}