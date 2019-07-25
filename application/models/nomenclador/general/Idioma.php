<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Idioma extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'pais_id'=> 'nomenclador_pais',
              ); 
               
        }
    }
    