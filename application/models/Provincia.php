<?php
/**
 * @class User
 */
class Provincia extends CI_Model {
	    public $id;
        public $nombre;  
		public $uuid;
		public $relacion;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
				$this->relacion = array('pais_id' =>'nomenclador_pais');
                
        }
}
