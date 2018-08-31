<?php
/**
 * @class User
 */
class Pais extends CI_Model {
	    public $id;
        public $nombre; 
        public $codigo;
        public $siglas; 
        public $moneda_id;  
        public $continente_id; 
		public $uuid;
        public $relacion;
		public function __construct()
        {
                parent::__construct();
                         
                               $this->load->model('Continente'); 
				$this->continente_id = $this->Continente->id;
                                 $this->load->model('Moneda'); 
                                $this->moneda_id = $this->Moneda->id;
				$this->uuid = 'nombre'; 
                $this->relacion = array('continente_id' =>'nomenclador_continente','moneda_id' =>'nomenclador_moneda');
                 
        }
}
