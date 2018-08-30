<?php
/**
 * @class User
 */
class Usuario extends CI_Model {
	    public $id;
        public $usuario;  
        public $password;  
        public $entidad_id;  
        public $persona_id;  
        public $administrador;  
        public $habilitado;    
		public $uuid;
                public $relacion;
		public function __construct()
        {
                parent::__construct();
                $this->load->model('Entidad'); 
				$this->entidad_id = $this->Entidad->id;
				$this->load->model('Persona'); 
				$this->persona_id = $this->Persona->id;
				$this->uuid = 'nombre';
                                 $this->relacion = array('entidad_id' =>'estructura_entidad','persona_id' =>'persona_persona');
        }
}
