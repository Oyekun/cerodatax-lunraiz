<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Almacen extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'centrocosto_id'=> 'nomenclador_centrocosto',
'tipoentrada_id'=> 'nomenclador_tipoentrada',
'criteriosalida_id'=> 'nomenclador_criteriosalida',
'especificacioninsumo_id'=> 'nomenclador_especificacioninsumo',
'clasificacioncontable_id'=> 'nomenclador_clasificacioncontable',
'cliente_id'=> 'crm_contacto',
'vendedor_id'=> 'persona_persona',
              ); 
               
        }
    }
    