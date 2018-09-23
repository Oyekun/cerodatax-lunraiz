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
class Actualizacion extends CI_Model {
	    public $id;
        public $version;  
        public $fecha_actualizacion;  
        public $usuario;  
        public $usuario_id;  
        public $descripcion;  
        public $nombre_fichero;  
		public $uuid;
		public function __construct()
        {
                parent::__construct();
                $this->load->model('Usuario'); 
				$this->usuario_id = $this->Usuario->id;
				$this->uuid = 'nombre';
        }
}
