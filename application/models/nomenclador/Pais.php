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
class Pais extends CI_Model {
	    public $id;
        public $nombre; 
        public $codigo;
        public $siglas; 
        public $moneda_id;  
        public $continente_id; 
		public $uuid;
        public $relacion;
		public function __construct()
        {
                parent::__construct();
                         
                               
				$this->uuid = 'nombre'; 
                $this->relacion = array('continente_id' =>'nomenclador_continente','moneda_id' =>'nomenclador_moneda');
                 
        }
}
