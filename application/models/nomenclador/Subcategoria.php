<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Subcategoria extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
$this->relacion = array(
'categoria_id'=> 'nomenclador_categoria',
              ); 
               
        }
    }
    