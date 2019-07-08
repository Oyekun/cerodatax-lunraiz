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
class Persona extends CI_Model {
	public $id;
        public $nombre;  
        public $carnet_identidad;  
        public $sexo;  
        public $sexo_id;  
        public $apellidos;  
        public $estadocivil;  
        public $estadocivil_id;  
        public $colorpiel;  
        public $colorpiel_id;  
        public $registrocivil;
        public $pais_registro_civil;  
        public $pais_registro_civil_id;
        public $provincia_registro_civil;  
        public $provincia_registro_civil_id;  
        public $municipio_registro_civil;  
        public $municipio_registro_civil_id;      
        public $padre;  
        public $madre;  
        public $tomo;  
        public $folio;  
        public $ano;  
        public $telefono;  
        public $correo;  
        public $direccion;  
        public $estatura;  
        public $peso;  
        public $pais;  
        public $pais_id;
        public $provincia;  
        public $provincia_id;  
        public $municipio;  
        public $municipio_id;    
        public $niveleducacional;  
        public $niveleducacional_id_id;  
        public $situaciondefensa;  
        public $situaciondefensa_id;  
        public $foto;  
        public $donante;  
        public $trabaja;  
        public $fecha_nacimiento;  
        public $cantidad_hijos;  
        public $gruposanguineo;  
        public $gruposanguineo_id;  
        public $estado_actual;  
        public $entidad;  
        public $entidad_id;  
        public $organismo;  
        public $organismo_id;  
                public $uuid;
		public $relacion;
		public function __construct()
        {
                parent::__construct();
                
				$this->uuid = 'carnet_identidad';
                                 $this->relacion = array('sexo_id' =>'nomenclador_sexo'
        ,'estado_civil_id' =>'nomenclador_estadocivil'
        ,'color_piel_id' =>'nomenclador_colorpiel'
        ,'pais_id' =>'nomenclador_pais'
        ,'provincia_id' =>'nomenclador_provincia'
        ,'municipio_id' =>'nomenclador_municipio'
         
        ,'nivel_educacional_id' =>'nomenclador_niveleducacional'
        ,'situacion_defensa_id' =>'nomenclador_defensa'
        ,'grupo_sanguineo_id' =>'nomenclador_gruposanguineo'
        ,'organismo_id' =>'nomenclador_organismo'
        );
        
        }
}
 
