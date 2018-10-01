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
class Panel extends CI_Model {
	    public $id;
        public $nombre;  
        
		public $uuid;
		 public $relacion;
		public function __construct()
        {
                parent::__construct(); 
				$this->uuid = 'nombre';
                $this->relacion = array('menu_id' =>'configuracion_menu');
      
        }
}
