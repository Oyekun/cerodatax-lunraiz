<?php
/**
 * @class User
 */
class Rol extends CI_Model {
	    public $id;
        public $rol;  
        public $habilitado;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'rol';
        }
}
