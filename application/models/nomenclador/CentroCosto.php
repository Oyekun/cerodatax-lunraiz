<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class CentroCosto extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'grupo_centrocosto_id'=> 'nomenclador_grupocentrocosto',
'agrupacion_centrocosto_id'=> 'nomenclador_agrupacioncentrocosto',
              ); 
               
        }
    }
    