<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class Plaza extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'cargo_id';
$this->relacion = array(
'cargo_id'=> 'persona_cargo','area_id'=> 'estructura_area','grupoescala_id'=>['model'=>'nomenclador_grupoescala','relacion'=>'persona_cargo'],
'categoria_cargo_id'=>['model'=>'nomenclador_categoriacargo','relacion'=>'persona_cargo'],
'salario'=>['model'=>'nomenclador_grupoescala','relacion'=>'persona_cargo']
              ); 
               
        }
    }
    