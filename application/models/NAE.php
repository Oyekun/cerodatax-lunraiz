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
class NAE extends CI_Model {
	    public $id;
        public $seccionnae;
        public $seccionnae_id;
        public $divisionnae;
        public $divisionnae_id;
        public $clase;
        public $nombre;
        public $descripcion;  
                public $uuid;
		public $relacion;
		public function __construct()
        {
                parent::__construct();
				$this->uuid = 'nombre';
                                 $this->relacion = array('seccionnae_id' =>'nomenclador_seccionnae','divisionnae_id' =>'nomenclador_divisionnae');
                
        }
}
