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
                
				 
				 
				$this->uuid = 'nombre';
			
				
        }
}
