<?php
/**
 * @class User
 */
class SeccionNAE extends CI_Model {
	    public $id;
        public $nombre;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
