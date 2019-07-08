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
class Modulo extends CI_Model {
	    public $id;
     
		public $uuid;
                public $relacion;
		public function __construct()
        {
                parent::__construct();
               
				 
				$this->uuid = 'nombre';
                $this->relacion = array('tipo_modulo_id' =>'nomenclador_tipomodulo','icono_id' =>'nomenclador_icono');
        }
}
