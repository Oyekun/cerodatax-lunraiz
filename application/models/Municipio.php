<?php
/**
 * @class User
 */
class Municipio extends CI_Model {
	    public $id;
        public $nombre; 
        public $siglas;
        public $provincia; 
        public $provincia_id; 
		public $uuid;
                public $relacion;
		public function __construct()
        {
                parent::__construct();
				 $this->uuid = 'codigo';
                                $this->relacion = array('provincia_id' =>'nomenclador_provincia');
        }
}
