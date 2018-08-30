<?php
/**
 * @class User
 */
class Modulo extends CI_Model {
	    public $id;
        public $modulo;  
        public $habilitado;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'modulo';
        }
}
