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
class Union extends CI_Model {
	    public $id;
        public $nombre;  
        public $abreviatura;  
        public $activo;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
