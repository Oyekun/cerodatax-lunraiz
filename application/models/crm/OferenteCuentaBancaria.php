<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class OferenteCuentaBancaria extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() { 
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('cuentabancaria_id' =>'nomenclador_cuentabancaria','nombre'=>'nomenclador_cuentabancaria',
               	'numero'=>'nomenclador_cuentabancaria','banco_id'=>['model'=>'nomenclador_banco','relacion'=>'nomenclador_cuentabancaria'],
               	'moneda_id'=>['model'=>'nomenclador_moneda','relacion'=>'nomenclador_cuentabancaria'],
               	'activo'=>'nomenclador_cuentabancaria','descripcion'=>'nomenclador_cuentabancaria');
              
        }
    }
    