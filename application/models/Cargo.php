<?php
/**
 * @class User
 */
class Cargo extends CI_Model {
	    public $id;
        public $nombre;  
        public $niveleducacional_id;  
        public $categoria_id;  
        public $calificador_id;  
        public $codigo;  
        public $codigo_reup;  
        public $periodo_prueba;  
        public $funcionario;  
        public $grupoescala_id;  
                public $uuid;
		public $relacion;
		public function __construct()
        {
                parent::__construct();
                $this->load->model('NivelEducacional'); 
				$this->niveleducacional_id = $this->NivelEducacional->id;
				$this->load->model('Categoria'); 
				$this->categoria_id = $this->Categoria->id;
				$this->load->model('Calificador'); 
				$this->calificador_id = $this->Calificador->id;
				$this->load->model('GrupoEscala'); 
				$this->grupoescala_id = $this->GrupoEscala->id;
				$this->uuid = 'nombre';
                                 $this->relacion = array('niveleducacional_id' =>'nomenclador_nivel_educacional'
        ,'categoria_id' =>'nomenclador_categoria'
        ,'calificador_id' =>'nomenclador_calificador'
        ,'grupoescala_id' =>'nomenclador_grupoescala'
        );
        }
}

                