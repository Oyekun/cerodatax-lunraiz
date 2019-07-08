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
                
				$this->uuid = 'codigo_registro';
         $this->relacion = array('tipo_id' =>'nomenclador_tipoentidad'
        ,'categoria_entidad_id' =>'nomenclador_categoriaentidad'
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

                
                