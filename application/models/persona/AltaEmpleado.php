<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    class AltaEmpleado extends CI_Model {
        public $uuid;
        public $relacion;
        public function __construct() {
            parent::__construct();
                $this->uuid = 'nombre';
                
$this->relacion = array(
'persona_id'=> 'persona_persona',
'sexo_id'=> 'nomenclador_sexo',
'color_piel_id'=> 'nomenclador_colorpiel',
'pais_id'=> 'nomenclador_pais',
'provincia_id'=> 'nomenclador_provincia',
'municipio_id'=> 'nomenclador_municipio',
'estado_civil_id'=> 'nomenclador_estadocivil',
'situacion_defensa_id'=> 'nomenclador_defensa',
'nivel_educacional_id'=> 'nomenclador_niveleducacional',
'organismo_id'=> 'nomenclador_organismo',
'grupo_sanguineo_id'=> 'nomenclador_gruposanguineo',
'pais_registro_civil_id'=> 'nomenclador_pais',
'provincia_registro_civil_id'=> 'nomenclador_provincia',
'municipio_registro_civil_id'=> 'nomenclador_municipio',
'tipocontrato_id'=> 'nomenclador_rh_tipocontrato',
'causa_id'=> 'nomenclador_rh_causa',
'fundamentacionalta_id'=> 'nomenclador_rh_fundamentacionalta',
'area_id'=> 'estructura_area',
//'cargo_id'=> 'estructura_plaza',
'plaza_id'=> ['model'=>'estructura_plaza','relacion'=>'estructura_area','campo'=>'area_id'],
'cargo_id'=> ['model'=>'persona_cargo','relacion'=>'estructura_plaza','id'=>'null'],
'categoriadocente_id'=> 'nomenclador_categoriadocente',
'categoriacientifica_id'=> 'nomenclador_categoriacientifica',
'tipojefe_id'=> 'nomenclador_rh_tipojefe',
'profesion_id'=> 'nomenclador_rh_profesion',
'tipopago_id'=> 'nomenclador_rh_tipopago',
'regimensalarial_id'=> 'nomenclador_rh_regimensalarial',
'tipocalendario_id'=> 'rh_tipocalendario',
'salarioadicional_id'=> 'nomenclador_rh_salarioadicional',
              ); 
               
        }
    }
    