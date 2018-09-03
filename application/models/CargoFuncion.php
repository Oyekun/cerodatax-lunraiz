<?php
/**
 * @class User
 */
class CargoFuncion extends CI_Model {
	    public $id;
        public $nombre;  
        public $cargo_id;  
        
                public $uuid;
		public $relacion;
		public function __construct()
        {
                parent::__construct();
                $this->load->model('Cargo'); 
				$this->cargo_id = $this->Cargo->id; 
				$this->uuid = 'nombre';
                                 $this->relacion = array('cargo_id' =>'persona_cargo'
         );
        }
}

