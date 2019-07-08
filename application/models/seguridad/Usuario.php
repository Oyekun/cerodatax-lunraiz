<?php
/**
 * Niveleducacional
 *
 * @package     Nomenclador
 * @subpackage  Persona
 * @category    Category
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
class Usuario extends CI_Model {
	    public $id;
        public $usuario;  
        public $password;  
        
        public $persona_id;  
        public $administrador;  
        public $habilitado;    
		public $uuid;
                public $relacion;
		public function __construct()
        {
                parent::__construct();
               
				 
				$this->uuid = 'username';
                $this->relacion = array('persona_id' =>'persona_persona','organismo_id' =>'nomenclador_organismo');
        }
}
