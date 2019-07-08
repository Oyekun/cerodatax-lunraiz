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
class  RolUsuario extends CI_Model {
	    public $id;
        public $rol_id;  
        public $usuario_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				 
				 
				$this->uuid = 'nombre';
			
				
        }
}
