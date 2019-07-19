<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class CuentaContable extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'tipocuenta_id'=> 'nomenclador_contabilidad_tipocuenta',
'clasificaciontipocuenta_id'=> 'nomenclador_contabilidad_clasificaciontipocuenta',
              ); 
               
        }
    }
    