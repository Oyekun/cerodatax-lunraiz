<?php
/**
 * @class User
 */
class Nivel_Educacional extends CI_Model {
	    public $id;
        public $orden; 
        public $nombre; 
        public $abreviatura; 
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
