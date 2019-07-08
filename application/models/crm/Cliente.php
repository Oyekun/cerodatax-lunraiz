<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Cliente extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'contacto_id';
               $this->relacion = array('contacto_id' =>'crm_contacto','apellidos' =>'crm_contacto','direccion' =>'crm_contacto','correo' =>'crm_contacto','telefono' =>'crm_contacto','celular' =>'crm_contacto','web' =>'crm_contacto');
              
        }
    }
    