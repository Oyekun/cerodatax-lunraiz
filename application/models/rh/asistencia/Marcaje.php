<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Marcaje extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'marca';
$this->relacion = array(
'entidad_id' =>'estructura_entidad',
              ); 
               
        }
    }
    