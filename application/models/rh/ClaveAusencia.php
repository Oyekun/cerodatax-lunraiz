<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class ClaveAusencia extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'tipocausaausencia_id'=> 'nomenclador_tipocausaausencia',
'apagarpor_id'=> 'nomenclador_apagarpor',
              ); 
               
        }
    }
    