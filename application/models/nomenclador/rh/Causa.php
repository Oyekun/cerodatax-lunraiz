<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Causa extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
                $this->uuid2 = 'tipocausa_id';
$this->relacion = array(
'tipocausa_id'=> 'nomenclador_rh_tipocausa',
              ); 
               
        }
    }
    