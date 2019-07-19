<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class ClaveSubsidio extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'tipocausasubsidio_id'=> 'nomenclador_tipocausasubsidio',
'claveausencia_id'=> 'rh_claveausencia',
              ); 
               
        }
    }
    