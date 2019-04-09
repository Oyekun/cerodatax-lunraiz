<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class ClienteCuentaBancaria extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('cuentabancaria_id' =>'nomenclador_cuentabancaria','nombre'=>'nomenclador_cuentabancaria');
              
        }
    }
    