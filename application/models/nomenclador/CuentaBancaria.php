<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class CuentaBancaria extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('moneda_id' =>'nomenclador_moneda','banco_id' =>'nomenclador_banco');
              
        }
    }
    