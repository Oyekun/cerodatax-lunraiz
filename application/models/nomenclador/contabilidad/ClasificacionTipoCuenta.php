<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class ClasificacionTipoCuenta extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
            $this->unique = True;
                $this->uuid = 'nombre';
                $this->uuid2 = 'tipocuenta_id';
$this->relacion = array(
'tipocuenta_id'=> 'nomenclador_contabilidad_tipocuenta',
              ); 
               
        }
    }
    