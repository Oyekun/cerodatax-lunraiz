<?php
/**
 * @class User
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
                $this->load->model('Sexo'); 
				$this->sexo_id = $this->Sexo->id;
				$this->load->model('EstadoCivil'); 
				$this->estadocivil_id = $this->EstadoCivil->id;
				$this->load->model('ColorPiel'); 
				$this->colorpiel_id = $this->ColorPiel->id;
				$this->load->model('Pais'); 
				$this->pais_id = $this->Pais->id;
                                $this->load->model('Provincia'); 
                                $this->provincia_id = $this->Provincia->id;
                                $this->load->model('Municipio'); 
                                $this->municipio_id = $this->Municipio->id;
                                $this->pais_registro_civil_id = $this->Pais->id;
                                $this->provincia_registro_civil_id = $this->Provincia->id;
                                $this->municipio_registro_civil_id = $this->Municipio->id;
                                $this->load->model('NivelEducacional'); 
				$this->niveleducacional_id = $this->NivelEducacional->id;
				$this->load->model('Defensa'); 
				$this->situacion_defensa_id = $this->Defensa->id;
				$this->load->model('GrupoSanguineo'); 
				$this->gruposanguineo_id = $this->GrupoSanguineo->id;
				$this->load->model('Entidad'); 
				$this->entidad_id = $this->Entidad->id;
                                $this->load->model('Organismo'); 
                                $this->organismo_id = $this->Organismo->id;
				$this->uuid = 'nombre';
                                 $this->relacion = array('sexo_id' =>'nomenclador_sexo'
        ,'estado_civil_id' =>'nomenclador_estadocivil'
        ,'color_piel_id' =>'nomenclador_colorpiel'
        ,'pais_id' =>'nomenclador_pais'
        ,'provincia_id' =>'nomenclador_provincia'
        ,'municipio_id' =>'nomenclador_municipio'
        //,'pais_registro_civil_id' =>'nomenclador_pais'
       // ,'provincia_registro_civil_id' =>'nomenclador_provincia'
       // ,'municipio_registro_civil_id' =>'nomenclador_municipio'
        ,'nivel_educacional_id' =>'nomenclador_nivel_educacional'
        ,'situacion_defensa_id' =>'nomenclador_defensa'
        ,'grupo_sanguineo_id' =>'nomenclador_gruposanguineo'
        ,'organismo_id' =>'nomenclador_organismo'
        );
        
        }
}
 
