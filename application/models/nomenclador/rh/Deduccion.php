<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Deduccion extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'tipodeduccion_id'=> 'nomenclador_rh_tipodeduccion',
              ); 
               
        }
    }
    