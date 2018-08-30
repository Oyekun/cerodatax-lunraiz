<?php
/**
 * @class User
 */
class Moneda extends CI_Model {
	    public $id;
        public $nombre;  
        public $codigo_iso;  
       
		public $uuid;
		public function __construct()
        {
                parent::__construct(); 
				$this->uuid = 'nombre';
        }
}
