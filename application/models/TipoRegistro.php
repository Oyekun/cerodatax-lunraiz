<?php
/**
 * @class User
 */
class TipoRegistro extends CI_Model {
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
