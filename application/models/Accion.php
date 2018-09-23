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
class Accion extends CI_Model {
	    public $id;
        public $accion;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'accion';
        }
}
