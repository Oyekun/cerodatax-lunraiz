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
class  MenuRol extends CI_Model {
	    public $id;
        public $rol_id;  
        public $menu_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('Rol'); 
				$this->rol_id = $this->Rol->id;
				$this->load->model('Menu'); 
				$this->modulo_id = $this->Menu->id;
				 
				$this->uuid = 'nombre';
			
				
        }
}
