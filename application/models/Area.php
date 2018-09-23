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
class Area extends CI_Model {
	    public $id;
        public $nombre;
		public $parent;
		public $parent_id;  
        public $leaf;  
		public $uuid;
		//public $relacion;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
				// $this->relacion = array('parent_id' =>'estructura_area');
                
        }
}
