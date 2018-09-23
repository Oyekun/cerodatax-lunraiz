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
class  PanelMenu extends CI_Model {
	    public $id;
        public $panel_id;  
        public $menu_id;  
		public $uuid;
		
		
		public function __construct()
        {
                parent::__construct();
                
				$this->load->model('Panel'); 
				$this->entidad_id = $this->Panel->id;
				$this->load->model('Menu'); 
				$this->persona_id = $this->Menu->id;
				 
				$this->uuid = 'nombre';
				
        }
}
