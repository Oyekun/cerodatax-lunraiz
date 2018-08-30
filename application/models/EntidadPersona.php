<?php
/**
 * @class User
 */
class  EntidadPersona extends CI_Model {
	    public $id;
        public $entidad_id;  
        public $persona_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('Entidad'); 
				$this->entidad_id = $this->Entidad->id;
				$this->load->model('Persona'); 
				$this->persona_id = $this->Persona->id;
				 
				$this->uuid = 'nombre';
				
        }
}
