<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Oferente extends CI_Model {

    	  public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre'; 
                $this->relacion = array('continente_id' =>'nomenclador_continente','moneda_id' =>'nomenclador_moneda');
              
        }
    }
    