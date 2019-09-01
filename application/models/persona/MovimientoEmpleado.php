<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class MovimientoEmpleado extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'altaempleado_id';
$this->relacion = array(
'altaempleado_id'=> 'persona_altaempleado',
'tipocontrato_actual_id'=> 'nomenclador_rh_tipocontrato',
//'area_actual_id'=> 'estructura_area',
//'cargo_actual_id'=> 'estructura_plaza',
'tipocontrato_id'=> 'nomenclador_rh_tipocontrato',
'causamovimiento_id'=> 'nomenclador_rh_causamovimiento',
'area_id'=> ['model'=>'estructura_area','relacion'=>'persona_altaempleado'],
'plaza_id'=> ['model'=>'estructura_plaza','relacion'=>'estructura_area','campo'=>'area_id'],
'cargo_id'=> ['model'=>'persona_cargo','relacion'=>'estructura_plaza','id'=>'null'],
'tipopago_actual_id'=> 'nomenclador_rh_tipopago',
'regimensalarial_actual_id'=> 'nomenclador_rh_regimensalarial',
'antiguedad_actual_id'=> 'nomenclador_rh_antiguedad',
'tipocalendario_actual_id'=> 'rh_tipocalendario',
'salarioadicional_actual_id'=> 'nomenclador_rh_salarioadicional',
'centrocosto_actual_id'=> 'nomenclador_centrocosto',
'tipopago_id'=> 'nomenclador_rh_tipopago',
'regimensalarial_id'=> 'nomenclador_rh_regimensalarial',
'antiguedad_id'=> 'nomenclador_rh_antiguedad',
'tipocalendario_id'=> 'rh_tipocalendario',
'salarioadicional_id'=> 'nomenclador_rh_salarioadicional',
'centrocosto_id'=> 'nomenclador_centrocosto',
              ); 
               
        }
    }
    