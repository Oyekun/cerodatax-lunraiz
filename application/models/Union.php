<?php
/**
 * @class User
 */
class Union extends CI_Model {
	    public $id;
        public $nombre;  
        public $abreviatura;  
        public $activo;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
