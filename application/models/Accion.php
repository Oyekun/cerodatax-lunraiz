<?php
/**
 * @class User
 */
class Accion extends CI_Model {
	    public $id;
        public $accion;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'accion';
        }
}
