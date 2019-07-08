<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class UnidadMedida extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'magnitud_id'=> 'nomenclador_magnitud',
              ); 
               
        }
    }
    