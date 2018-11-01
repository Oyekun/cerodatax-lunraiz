<?php
/**
 * @class User
 */
class TipoBanco extends CI_Model {
	    public $id;
        public $nombre;  
        public $descripcion;  
          
		public $uuid;
	public function __construct()
        {
                parent::__construct();
                
                                
                                $this->uuid = 'nombre';
        }
}
