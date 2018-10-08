<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Contacto extends CI_Model {

    	public $uuid;
		public $relacion;

        public function __construct() {
            parent::__construct();
               $this->uuid = 'nombre';
               $this->relacion = array('pais_id' =>'nomenclador_pais','provincia_id' =>'nomenclador_provincia','municipio_id' =>'nomenclador_municipio','entidad_id' =>'estructura_entidad','organismo_id' =>'nomenclador_organismo');
              
        }
    }
    