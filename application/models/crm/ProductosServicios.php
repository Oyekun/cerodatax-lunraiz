<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class ProductosServicios extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'um_almacen_id'=> 'nomenclador_unidadmedida',
'um_venta_id'=> 'nomenclador_unidadmedida',
'tipo_producto_id'=> 'nomenclador_tipoproducto',
'categoria_id'=> 'nomenclador_categoria',
'subcategoria_id'=> 'nomenclador_subcategoria',
'marca_id'=> 'nomenclador_marca',
'destino_id'=> 'nomenclador_destinoproducto',
'tipo_costo_id'=> 'nomenclador_tipocosto',
              ); 
               
        }
    }
    