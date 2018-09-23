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
class Entidad extends CI_Model {
	public $id;
        public $nombre;  
        public $abreviatura;  
        public $tipo_id;  
        public $categoria;  
        public $categoria_id;  
        public $municipio;  
        public $municipio_id;  
        public $codigo;  
        public $codigo_registro;  
        public $tipo_registro;  
        public $tipo_registro_id;  
        public $perfeccionamiento;  
        public $telefono;  
        public $correo;  
        public $direccion;  
        public $clasificacion;  
        public $clasificacion_id;  
        public $logotipo;  
        public $organismo;  
        public $organismo_id;  
        public $parent_id;
		public $parent;		
        public $leaf;  
                public $uuid;
		public $relacion;

		public function __construct()
        {
                parent::__construct();
                $this->load->model('TipoEntidad'); 
				$this->tipo_id = $this->TipoEntidad->id;
				$this->load->model('CategoriaEntidad'); 
				$this->categoria_id = $this->CategoriaEntidad->id;
				$this->load->model('Municipio'); 
				$this->municipio_id = $this->Municipio->id;
				$this->load->model('Clasificacion'); 
				$this->clasificacion_id = $this->Clasificacion->id;
				$this->load->model('Organismo'); 
				$this->organismo_id = $this->Organismo->id;
                                $this->load->model('TipoRegistro'); 
                                $this->tipo_registro_id = $this->TipoRegistro->id;
				$this->uuid = 'codigo_registro';
         $this->relacion = array('tipo_id' =>'nomenclador_tipoentidad'
        ,'categoria_id' =>'nomenclador_categoriaentidad'
        ,'pais_id' =>'nomenclador_pais'
        ,'provincia_id' =>'nomenclador_provincia'
        ,'municipio_id' =>'nomenclador_municipio'
        ,'nae_id' =>'nomenclador_nae'
        ,'clasificacion_id' =>'nomenclador_clasificacion'
        ,'organismo_id' =>'nomenclador_organismo'
        ,'union_id' =>'nomenclador_union',
        'tipo_registro_id' =>'nomenclador_tiporegistro'
       // ,'parent_id' =>'estructura_entidad'
        );
        }
}

                
                