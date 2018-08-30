<?php
/**
 * @class User
 */
class AreaEntidad extends CI_Model {
	    public $id;
        public $entidad_id;  
        public $area_id;  
		public $uuid;
		
		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('Entidad'); 
				$this->entidad_id = $this->Entidad->id;
				$this->load->model('Area'); 
				$this->area_id = $this->Area->id;
				 
				$this->uuid = 'nombre';
        }
}
