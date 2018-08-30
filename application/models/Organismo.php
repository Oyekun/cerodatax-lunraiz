<?php
/**
 * @class User
 */
class Organismo extends CI_Model {
	    public $id;
        public $nombre;
        public $siglas;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
