<?php

        /**
 * NombreClase
 *
 * @package     crm
 * @subpackage  ProductosServicios
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_crm_productosservicios extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
                                'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'unsigned' => TRUE
                        ),
                                'foto'=> array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                                'foto1'=> array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                                'um_almacen_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'um_venta_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'tipo_producto_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'categoria_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'subcategoria_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'marca_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'destino_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'tipo_costo_id'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'codigo'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'codigo_barra'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                                'nombre'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => FALSE
                        ),
                                'fecha_entrada'=> array(
                                'type' => 'DATE',
                                'null' => TRUE
                        ),
                                'peso_bruto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'peso_neto'=> array(
                                'type' => 'FLOAT',
                                'constraint' => '10',
                                'null' => TRUE
                        ),
                                'oferta'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'activo'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'producto_servicio'=> array(
                                'type' => 'INT',
                                'constraint' => '1',
                        ),
                                'descripcion'=> array(
                                'type' => 'VARCHAR',
                                'constraint' => '255',
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
                        )  ,
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
              $this->dbforge->add_key('ownerentidad_id');
              $this->dbforge->add_field('CONSTRAINT ownerentidad_id FOREIGN KEY (ownerentidad_id) REFERENCES estructura_entidad (id) ON UPDATE CASCADE');
             
             $this->dbforge->add_key('owner_id');
            $this->dbforge->add_field('CONSTRAINT owner_id FOREIGN KEY (owner_id) REFERENCES seguridad_usuario (id) ON UPDATE CASCADE');
                
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('um_almacen_id');
$this->dbforge->add_field('CONSTRAINT um_almacen_id FOREIGN KEY (um_almacen_id) REFERENCES nomenclador_unidadmedida (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('um_venta_id');
$this->dbforge->add_field('CONSTRAINT um_venta_id FOREIGN KEY (um_venta_id) REFERENCES nomenclador_unidadmedida (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipo_producto_id');
$this->dbforge->add_field('CONSTRAINT tipo_producto_id FOREIGN KEY (tipo_producto_id) REFERENCES nomenclador_tipoproducto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('categoria_id');
$this->dbforge->add_field('CONSTRAINT categoria_id FOREIGN KEY (categoria_id) REFERENCES nomenclador_categoria (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('subcategoria_id');
$this->dbforge->add_field('CONSTRAINT subcategoria_id FOREIGN KEY (subcategoria_id) REFERENCES nomenclador_subcategoria (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('marca_id');
$this->dbforge->add_field('CONSTRAINT marca_id FOREIGN KEY (marca_id) REFERENCES nomenclador_marca (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('destino_id');
$this->dbforge->add_field('CONSTRAINT destino_id FOREIGN KEY (destino_id) REFERENCES nomenclador_destinoproducto (id) ON UPDATE CASCADE ON DELETE CASCADE');
$this->dbforge->add_key('tipo_costo_id');
$this->dbforge->add_field('CONSTRAINT tipo_costo_id FOREIGN KEY (tipo_costo_id) REFERENCES nomenclador_tipocosto (id) ON UPDATE CASCADE ON DELETE CASCADE');

        $this->dbforge->create_table('crm_productosservicios');
               
    }

    public function down() {
        $this->dbforge->drop_table('crm_productosservicios');
    }

}