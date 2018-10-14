<?php
/**
 * Niveleducacional
 *
 * @package     CRM
 * @subpackage  Contacto
 * @category    Category
 * @author      Leandro L. Céspedes Lara
 * @link        https://cerodatax.com
 */
class  EntidadContacto extends CI_Model {
	    public $id;
        public $entidad_id;  
        public $contacto_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				 
				$this->uuid = 'nombre';
				
        }
}
