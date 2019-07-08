<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Banco extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('pais_id' =>'nomenclador_pais','provincia_id' =>'nomenclador_provincia','municipio_id' =>'nomenclador_municipio','tipo_banco_id' =>'nomenclador_tipobanco');
              
        }
    }
    