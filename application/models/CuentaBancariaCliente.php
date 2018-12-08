<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class CuentaBancariaCliente extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('cuenta_bancaria_id' =>'nomenclador_cuentabancaria','nombre'=>'nomenclador_cuentabancaria');
              
        }
    }
    