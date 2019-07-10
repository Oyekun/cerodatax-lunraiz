<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Plaza extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'cargo_id';
$this->relacion = array(
'cargo_id'=> 'persona_cargo',
              ); 
               
        }
    }
    