<?php
/**
 * @class User
 */
class Sexo extends CI_Model {
	    public $id;
        public $nombre;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
