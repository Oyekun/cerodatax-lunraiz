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
class Rol extends CI_Model {
	    public $id;
        public $rol;  
        public $habilitado;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'name';
        }
}
