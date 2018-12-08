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
class  Licencia extends CI_Model {
	    public $id;
        public $entidad_id;  
        public $menu_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('Entidad'); 
				$this->rol_id = $this->Entidad->id;  
				$this->uuid = 'nombre';
			
				
        }
}
