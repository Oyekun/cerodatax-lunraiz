<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class BajaEmpleado extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'altaempleado_id';
$this->relacion = array(
'altaempleado_id'=> 'persona_altaempleado',
'causa_id'=> 'nomenclador_rh_causa', 
'entidad_id'=> ['model'=>'estructura_entidad','relacion'=>'persona_altaempleado'],
'sexo_id'=> ['model'=>'nomenclador_sexo','relacion'=>'persona_altaempleado'],
'organismo_id'=> ['model'=>'nomenclador_organismo','relacion'=>'persona_altaempleado'],
'expediente'=> 'persona_altaempleado',
'nombre'=> 'persona_altaempleado',
'apellidos'=> 'persona_altaempleado',
'edad'=> 'persona_altaempleado',
'area_id'=> ['model'=>'estructura_area','relacion'=>'persona_altaempleado'],
'plaza_id'=> ['model'=>'estructura_plaza','relacion'=>'estructura_area','campo'=>'area_id'],
'cargo_id'=> ['model'=>'persona_cargo','relacion'=>'estructura_plaza','id'=>'null'],

'carnet_identidad'=> 'persona_altaempleado',
//'entidad_id'=> ['model'=>'estructura_entidad','relacion'=>'persona_altaempleado'],

              ); 
               
        }
    }
    