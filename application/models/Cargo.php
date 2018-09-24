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
				$this->load->model('CategoriaCargo'); 
				$this->categoria_cargo_id = $this->CategoriaCargo->id;
				$this->load->model('Calificador'); 
				$this->calificador_id = $this->Calificador->id;
				$this->load->model('GrupoEscala'); 
				$this->grupoescala_id = $this->GrupoEscala->id;
				$this->uuid = 'nombre';
                                 $this->relacion = array('nivel_educacional_id' =>'nomenclador_niveleducacional'
        ,'categoria_cargo_id' =>'nomenclador_categoriacargo'
        ,'calificador_id' =>'nomenclador_calificador'
        ,'grupoescala_id' =>'nomenclador_grupoescala'
        );
        }
}

                