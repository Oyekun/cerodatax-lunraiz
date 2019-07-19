<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class TipoDeduccion extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'cuentacontable_id'=> 'nomenclador_contabilidad_cuentacontable',
              ); 
               
        }
    }
    