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
class Organismo extends CI_Model {
	    public $id;
        public $nombre;
        public $siglas;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
        }
}
