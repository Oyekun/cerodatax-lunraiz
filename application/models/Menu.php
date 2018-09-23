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
class Menu extends CI_Model {
	    public $id;
     
		public $uuid;
                public $relacion;
		public function __construct()
        {
                parent::__construct();
               
			//	$this->load->model('TipoMenu'); 
			//$this->persona_id = $this->Persona->id;
				$this->uuid = 'nombre';
                $this->relacion = array('modulo_id' =>'configuracion_modulo','icono_id' =>'nomenclador_icono');
        }
}
