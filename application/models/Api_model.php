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

defined('BASEPATH') OR exit('No direct script access allowed');
define('DS', DIRECTORY_SEPARATOR); 
require APPPATH . 'libraries/TreeExtJS.php';
require APPPATH . 'libraries/Tools.php';
class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
        $this->load->library('uuid');
        // Your own constructor code
    }

    /**
     * Encodes string for use in XML
     *
     * @param       string $str Input string
     * @return      string
     */
    public function get_all($request)
    {
        //Para filtrar por owner
         
         if(isset($this->session->userdata['entidad_id']))
         $identity = $this->session->userdata['entidad_id'];
         //print_r($this->session);die;
         $is_admin = $this->ion_auth->is_admin();
         //Para la tabla
         $esquema = $request['esquema'];
         $esquema = str_replace('.',DS,$esquema);
         $request['esquema'] = str_replace('.','_',$request['esquema']);
         $existFolder = APPPATH . "models/$esquema";
    if(!is_dir($existFolder))
        mkdir($existFolder);

$subdireccion =  $esquema . '/' . $request['model'];
$existFile = APPPATH . "models/$subdireccion.php";
//print_r($existFile);die;
$existefile=FALSE;
if (file_exists($existFile)) 
    $existefile=TRUE;
    else
        { $total = array();
            $total['data'] = '';
                    $total['total'] = 0;
                    return $total;}
    
        if ($existefile) 
        {
        
        $total = array();
        $limit = FALSE;
        $parent_id = NULL;
        if (isset($request['page']))
            $page = $request['page'];
        if (isset($request['start']))
            $offset = $request['start'];
        if (isset($request['limit']))
            $limit = $request['limit'];


        $flagrelacion = FALSE;
        //---Para definir el padre del TREE
        if (isset($request['parent_id'])) {

            if ($request['parent_id'] == 'save')
                unset($request['parent_id']);
            else
                $parent_id = $request['parent_id'];

        }

        //////////Para crear modelo relacional prueba////////////// hAY Q MADURARLO LA CREACION DE MODELO
        if(isset($request['asociados']))
                {

                    $modelo = $request['model']; 
                    $asociados = $request['asociados']; 
                    $modelClass =  $request['model'] .$request['asociados'];
                    //$subdireccion = $request['model'].$request['asociados'];
                    $esquemaA = str_replace('.',DS,$request['esquema_asociado']);

                    $existFile = APPPATH . "models".DS.$request['esquema_asociado'].DS."$modelClass.php";
                    $existFileM = APPPATH . "models".DS.$esquema.DS."$modelo.php";
                    $existFileA = APPPATH . "models".DS.$esquemaA.DS."$asociados.php";
                   

        if (!file_exists($existFile)&&file_exists($existFileM)&&file_exists($existFileA))
        {       $loadM = $esquema.'/'.$modelo;
                    $this->load->model($loadM, '',TRUE);
                    $modelM = new $modelo;
                    $nameClassM = get_class($modelM);

                    $loadA = $esquemaA.'/'. $asociados;
                    $this->load->model($loadA, '',TRUE);
                      $modelA = new  $asociados;
                    $nameClassA = get_class($modelA);
                    $modelClass =  $nameClassM.$nameClassA;
                    //var_dump($modelClass);die;
             $dataMigration = array();   
             $esquema_asociado = str_replace('.','_',$request['esquema_asociado']);
             $dataMigration[0]= ['nombre'=>$modelo.'_id','tabla'=>$request['esquema'].'_'.$modelo,"tipo"=>"VARCHAR","constraint"=>"100","nullfield"=>"FALSE"];
             $dataMigration[1]= ['nombre'=>$request['asociados'].'_id','tabla'=>$esquema_asociado.'_'.$request['asociados'],"tipo"=>"VARCHAR","constraint"=>"100","nullfield"=>"FALSE"];
             $tools = new Tools();
           
             
             $tools->make_model_relation_file($request['esquema_asociado'], $modelClass,$dataMigration);
             $tools->make_migration_file($request['esquema_asociado'],$modelClass,$dataMigration);
            // print_r($dataMigration);die;
            
             $tools->migrate();

}
}

//print_r($existFile);die;

        //////////////////////////////////////////////////////////


        if (isset($request['esquema']) && isset($request['model'])) {
            $modelo = $request['model'];
            if (isset($request['asociados'])) {
                $aux = explode('_', $modelo);

                $modelo = $aux[0];
            }
            $tb = $request['esquema'] . '_' . $modelo;


            if (isset($request['combo'])) {
                if ($request['combo'] == 'combo') {
                    $limit = FALSE;
                    if (isset($request['filter'])) {
                        if ($request['filter'] != '') {
                            $filters = array();
                            $filters = json_decode($request['filter'], TRUE);

                            foreach ($filters as $query) {
                                $value_query = $query['value'];
                                $name_query = $query['name_id'];;
                                $this->db->where("$name_query", $value_query);
                            }
                        }
                    }
                    $this->load->model($esquema.'/'.$request['model'], '', TRUE);
                    
                    $nameuuid = new $request['model'];

                    if (isset($nameuuid->relacion)) {

                        $this->db->select("$tb.*");
                        $tablas_relacion = [];
                        foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                           if(!is_array($tabla_campo))
                        {$tabla_campo_id = $tabla_campo . '.id';                        
                        $igual = $tb . '.' . $campo;

                        $alias = str_replace("_id", "", $campo);
                         $pos = strpos($campo,"_id");
                        if($pos!==FALSE)
                        {
                            $len = strlen($campo);//die;
                            //print_r($len);die;
                            if(($len-$pos)!=3)
                        $alias = $campo;       

                        
                        }
                        if ($alias != $campo)
                            $ref = $tabla_campo . ".nombre as " . $alias;
                        else
                            $ref = $tabla_campo . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo])) {
                            $tablas_relacion[$tabla_campo] = $tabla_campo;
                            $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                        }
                     }
                     else{
/*
                        $tabla_campo_id = $tabla_campo['model'] . '.id';                        
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            {$ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }*/

                           $tabla_campo_id = $tabla_campo['model'] . '.id';   
                        if(isset($tabla_campo['campo']))
                        $tabla_campo_id = $tabla_campo['model'] . '.'.$tabla_campo['campo'];   

                         $igual = $tb . '.' . $campo;
                         if(isset($tabla_campo['relacion']))                         
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                    if(isset($tabla_campo['campo']))
                        $igual = $tabla_campo['relacion'] . '.id';
                    
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            { 
                                   $ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             if(!isset($tabla_campo['id'])) 
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        if(!isset($tabla_campo['campo']))
                        $this->db->select("$ref");
                           
                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            //if(isset($tabla_campo['relacion']))  
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }
                        
                        


                     }
                        }
                    }
                    $this->db->order_by("date_updated", "desc");//verificar bien
                if ($this->db->field_exists("visible", "$tb") !== FALSE)
                    $this->db->where('visible',1);
if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
                if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where('ownerentidad_id',$identity);
                    $q = $this->db->get("$tb");


                    if (isset($request['asociados']) && isset($request['id_asociado'])) {
                        $total_actual = count($q->result_array());
                        $total = $q->result_array();
                        $arrayS = array();;
                        for ($i = 0; $i < $total_actual; $i++) {

                            if ($request['asociados'] != '' && $request['id_asociado'] != '' || ($request['detalles'] == 'detalles' || $request['detalles'] == 'edit')) {


                                $tbDos = $request['esquema_asociado'] . '_' . $modelo . $request['asociados'];
                                $idasociadoUno = $modelo . '_id';
                                $idasociadoDos = $request['asociados'] . '_id';
                                $this->db->where("$idasociadoUno", $total[$i]['id']);
                                $this->db->where("$idasociadoDos", $request['id_asociado']);
                               
                                $r = $this->db->get("$tbDos");

                                $total[$i]['checked'] = count($r->result_array()) > 0 ? TRUE : FALSE;

                                //
                            } else $total[$i]['checked'] = FALSE;
                            $total[$i]['model'] = $modelo;
                            if (isset($request['grid']))
                                if ($request['grid'] == TRUE)
                                    if ($total[$i]['checked'] === FALSE)
                                        unset($total[$i]);
                                    else {
                                        $arrayS[] = $total[$i];
                                    }

                        }
                        if (isset($request['grid']))
                            if ($request['grid'] == TRUE)
                                return $arrayS;

                        return $total;

                    }

                    return $q->result_array();
                }

            }

            if ($limit) {

                if (isset($request['gridasociado'])) {
                    if (isset($request['asociados'])) {
                        //$request['model'] = $request['asociados'] . $request['model'];
                       // $esquema = $request['esquema_asociado'];
                        $modelasoc = $request['asociados'] . $request['model'];
                        $tb = $request['esquema_asociado'] . '_' . $modelasoc;

                        $idasociadoDos = $request['asociados'] . '_id';
                        // $this->db->where("$idasociadoUno", $total[$i]['id']);
                        $this->db->where("$idasociadoDos", $request['id_asociado']);
                    }
                }
                if(isset($request['asociados']))
                { 

                $request['esquema_asociado'] = str_replace('.',DS,$request['esquema_asociado']);
                //print_r($request);die;
                $existFile = $request['esquema_asociado'].'/'. $request['asociados'];
                 if (file_exists($existFile)) 
                $this->load->model($existFile, '', TRUE);//.$request['asociados'] verificar si es asociados o model
                
                }
if (isset($request['gridasociado']))
{
                $this->load->model($request['esquema_asociado'].'/'.$request['asociados'] . $request['model'], '', TRUE);
                        $modelasoc = $request['asociados'] . $request['model'];
                
                $nameuuid = new $modelasoc;
}
    else
             {  $this->load->model($esquema.'/'.$request['model'], '', TRUE);
                $nameuuid = new $request['model'];
            }
//print_r($nameuuid);die;
                if (isset($nameuuid->relacion)) {
                    $flagrelacion = TRUE;
                    $this->db->select("$tb.*");

                    $tablas_relacion = [];

                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        
                        if(!is_array($tabla_campo))
                        {$tabla_campo_id = $tabla_campo . '.id';                        
                        $igual = $tb . '.' . $campo;

                        //$alias = str_replace("_id", "", $campo);
                       
                        $alias = str_replace("_id", "", $campo);
                         $pos = strpos($campo,"_id");
                        if($pos!==FALSE)
                        {
                            $len = strlen($campo);//die;
                            //print_r($len);die;
                            if(($len-$pos)!=3)
                        $alias = $campo;       

                        
                        }
                        
                        if ($alias != $campo)
                            $ref = $tabla_campo . ".nombre as " . $alias;
                        else
                            $ref = $tabla_campo . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo])) {
                            $tablas_relacion[$tabla_campo] = $tabla_campo;
                            $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                        }
                     }
                     else{
                        $tabla_campo_id = $tabla_campo['model'] . '.id';   
                        if(isset($tabla_campo['campo']))
                        $tabla_campo_id = $tabla_campo['model'] . '.'.$tabla_campo['campo'];   

                         $igual = $tb . '.' . $campo;
                         if(isset($tabla_campo['relacion']))                         
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                    if(isset($tabla_campo['campo']))
                        $igual = $tabla_campo['relacion'] . '.id';
                    
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            { 
                                   $ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             if(!isset($tabla_campo['id'])) 
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        if(!isset($tabla_campo['campo']))
                        $this->db->select("$ref");
                           
                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            //if(isset($tabla_campo['relacion']))  
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }
                        
                        


                     }

                    }
                }
                
               //print_r($this->db);die; 
                $this->db->order_by("date_updated", "desc");
                //verificar bien
                if ($this->db->field_exists("visible", "$tb") !== FALSE)
                    $this->db->where('visible',1);
                if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
                 if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where("$tb.ownerentidad_id",$identity);
               // print_r($this->db);die; 
                $q = $this->db->get("$tb", $limit, $offset);

            } else {

                if ($parent_id === '') {
 

                    //  $this->db->order_by("parent", "desc");
                    $parent_id=NULL;

                    $this->db->where('parent_id', $parent_id);//verificar

                }
                else
                    {

                         if ($parent_id != NULL)
                        {$this->db->where('parent_id', $parent_id);

                }

}

                $this->load->model($request['esquema'].'/'.$request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    $tablas_relacion = [];
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        

                        if(!is_array($tabla_campo))
                        {$tabla_campo_id = $tabla_campo . '.id';                        
                        $igual = $tb . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            $ref = $tabla_campo . ".nombre as " . $alias;
                        else
                            $ref = $tabla_campo . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo])) {
                            $tablas_relacion[$tabla_campo] = $tabla_campo;
                            $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                        }
                     }
                     else{

                        $tabla_campo_id = $tabla_campo['model'] . '.id';                        
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            {$ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }


                     }
                    }
                }

                $this->db->order_by("date_updated", "desc");
                if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
                if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
                 if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where('ownerentidad_id',$identity);
                //verificar bien
                $q = $this->db->get("$tb");

            }

            $this->db->order_by("date_updated", "desc");//verificar bien
            if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
                if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
              if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where('ownerentidad_id',$identity);   
                
            $q1 = $this->db->get("$tb");

            if (isset($q->row()->orden) && !isset($request['parent_id'])) {

                //$this->db->group_by("orden");

                $this->db->order_by("orden", "asc");
                if (isset($request['parent_id']))
                    if ($request['parent_id'] != '')
                        $this->db->where('parent_id', $parent_id);

                $this->load->model($request['esquema'].'/'.$request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    $tablas_relacion = [];
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                      if(!is_array($tabla_campo))
                        {$tabla_campo_id = $tabla_campo . '.id';                        
                        $igual = $tb . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            $ref = $tabla_campo . ".nombre as " . $alias;
                        else
                            $ref = $tabla_campo . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo])) {
                            $tablas_relacion[$tabla_campo] = $tabla_campo;
                            $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                        }
                     }
                     else{

                        $tabla_campo_id = $tabla_campo['model'] . '.id';                        
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            {$ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }


                     }
                    }
                }
                // $this->db->order_by("date_updated", "asc");//verificar bien
                //  print_r($q->row());die;
                 if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
                if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
                 if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where('ownerentidad_id',$identity);
                if ($limit)
                    $q = $this->db->get("$tb", $limit, $offset);
                else
                    $q = $this->db->get("$tb");


            }


            if (isset($q->row()->posicion) && !isset($request['parent_id'])) {

                $this->db->order_by("posicion", "asc");
                if (isset($request['parent_id']))
                    if ($request['parent_id'] != '')
                        $this->db->where('parent_id', $parent_id);
                $this->load->model($request['esquema'].'/'.$request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                          if(!is_array($tabla_campo))
                        {$tabla_campo_id = $tabla_campo . '.id';                        
                        $igual = $tb . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            $ref = $tabla_campo . ".nombre as " . $alias;
                        else
                            $ref = $tabla_campo . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo])) {
                            $tablas_relacion[$tabla_campo] = $tabla_campo;
                            $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                        }
                     }
                     else{

                        $tabla_campo_id = $tabla_campo['model'] . '.id';                        
                        $igual = $tabla_campo['relacion'] . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        if ($alias != $campo)
                            {$ref = $tabla_campo['model'] . ".nombre as " . $alias;
                             $ref .=  "," .$tabla_campo['model'] . ".id"." as " . $campo;
                            }
                        else
                            $ref = $tabla_campo['model'] . "." . $alias . " as " . $alias;
                        $this->db->select("$ref");

                        if (!isset($tablas_relacion[$tabla_campo['model']])) {
                            $tablas_relacion[$tabla_campo['model']] = $tabla_campo['model'];
                            $tbcampo= $tabla_campo['model'];
                            $this->db->join(" $tbcampo", " $tabla_campo_id = $igual", " left");
                        }


                     }
                    }
                }
                // $this->db->order_by("date_updated", "asc");//verificar bien
                 if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
                if(isset($this->session->userdata['entidad_id']))
                if(!$is_admin)
                 if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)
                    $this->db->where('ownerentidad_id',$identity);
                if ($limit)
                    $q = $this->db->get("$tb", $limit, $offset);
                else
                    $q = $this->db->get("$tb");
            }

  
            $total['data'] = $q->result_array();


            $total_actual = count($q->result_array());

            $total['total'] = count($q1->result_array());
            

            if ($total['total'] > 0) {

                   //quite esto && $parent_id != '' estaba asi ((isset($total['data'][0]['parent_id']) && $parent_id != '')
                    //var_dump(exist($total['data'][0]['parent_id']));die;
                if ((isset($total['data'][0]['parent_id'])) || isset($request['id_asociado']) && !isset($request['gridasociado'])) {

                    // Creating the Tree
                    $cant = 0;
                    $tree = new TreeExtJS();

                    for ($i = 0; $i < $total_actual; $i++) {
                        $nodo = $total['data'][$i];

                        if (isset($request['asociados']) && isset($request['id_asociado'])) {

                            $nodo['checked'] = FALSE;


                            //else $tree->addChild($nodo,$nodo["parent_id"],$parent_id);
                        }
                        //print_r($request);die;

                        $nodo['model'] = $modelo;
                        if (isset($request['detalles'])) {
                            if ($request['detalles'] == 'detalles') {
                                if ($nodo['checked'] != '') {
                                    unset($nodo['checked']);

                                    $tree->addChild($nodo, $nodo["parent_id"], $parent_id);
                                }


                            }
                            if ($request['detalles'] == 'edit') {
                                //var_dump($tree);die;
                                if (isset($nodo["parent_id"]))
                                    $tree->addChild($nodo, $nodo["parent_id"], $parent_id);


                            } else {
                                if ($request['detalles'] == '') {
                                    $nodo['checked'] = FALSE;

                                    $tree->addChild($nodo, $nodo["parent_id"], $parent_id);
                                }
                            }//

                        } else {
                            $cant++;

                            $tree->addChild($nodo, $nodo["parent_id"], $parent_id);
 
                        }
                    }
 

                    $total['data'] = $tree->tree;
                    $total['total'] = $tree->cont;
                    return $total;
                }

            }


        }
        return $total;
}
    }

    /**
     * Encodes string for use in XML
     *
     * @param       string $str Input string
     * @return      string
     */

    public function posts($request)
    {

         //$esquema = $request['esquema'];
         //$esquema = str_replace('.',DS,$esquema);
        //print_r($identity);die;
// $is_admin = $this->ion_auth->is_admin();

         $request['esquema'] = str_replace('.','_',$request['esquema']);
        //$rsl = $this->row_existe($request);

        if (!$this->row_existe($request)) {
            $tb = $request['esquema'] . '_' . $request['model'];

            $dataArray = json_decode($request['data'], TRUE);
            foreach ($dataArray as $key => $nodo) {
                if ($nodo === '' || $nodo === 'NULL') {

                    if (is_bool($nodo) === FALSE)
                        unset($dataArray["$key"]);
                }
                if (is_bool($nodo) === TRUE) {

                    $dataArray["$key"] = 0;
                    if ($nodo)
                        $dataArray["$key"] = 1;
                }
                if ($this->db->field_exists("$key", "$tb") == FALSE)
                    {
                        if ($key !== 'asociados' && $key !== 'updatecolumtable')
                        unset($dataArray["$key"]);
            }

            }
 //print_r($dataArray);die;


            $this->load->model($request['esquema'].'/'.$request['model']);
            $nameuuid = new $request['model'];
            if(isset($nameuuid->uuid2)) 
            $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"].$dataArray["$nameuuid->uuid2"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
            else    
            $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
            unset($dataArray['id']);

            unset($dataArray['parentId']);
            unset($dataArray['expanded']);
            unset($dataArray['checked']);
            unset($dataArray['model']);
            $asociados = FALSE;
             
            $dataArray2 = array();
            if (isset($dataArray['asociados'])) {
 
                $dataArray2 = $dataArray['asociados'];
                $asociados = TRUE;
                unset($dataArray['asociados']);
            }

              $isupdatecolumtable = FALSE;
             
            $updatecolumtable = array();
            if (isset($dataArray['updatecolumtable'])) {
 
                $updatecolumtable = $dataArray['updatecolumtable'];
                $isupdatecolumtable = TRUE;
                unset($dataArray['updatecolumtable']);
            }
            if(isset($this->session->userdata['entidad_id']))
                
            {  if ($this->db->field_exists("owner_id", "$tb") === TRUE)     
                $dataArray['owner_id'] = $this->session->userdata['user_id'];
                if ($this->db->field_exists("ownerentidad_id", "$tb") === TRUE)  
                $dataArray['ownerentidad_id'] = $this->session->userdata['entidad_id'];
            }

            $dataArray['date_created'] = $dataArray['date_updated'] = date('Y-m-d H:i:s');
            $dataArray['created_from_ip'] = $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
            $this->db->set('id', $uuid);
            //print_r($tb);die;

            if ($tb == 'seguridad_usuario') {
                // $this->load->model("Register_model", "registerModel");
                // $generate = $this->registerModel->new_api_key($level = 0,$ignore_limits = 0,$is_private_key = 0,$ip_addresses = "",$uuid);
                $this->load->model("Ion_auth_model", "ionAuthModel");
                $password = $dataArray['password'];
                $email = $dataArray['email'];
                $identity = $dataArray['username'];
                $dataArray['ip_address'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                unset($dataArray['password']);
                unset($dataArray['email']);
                unset($dataArray['username']);
                $salida = $this->ionAuthModel->register($uuid, $identity, $password, $email, $dataArray, $groups = array());
                if ($salida == FALSE)
                    return NULL;
            } else {

                $this->db->insert("$tb", $dataArray);
            }

            if (isset($dataArray['parent_id']))
                if ($dataArray['parent_id'] != '') {
                    $dataArray1 = array();

                    $this->db->where('id', $dataArray['parent_id']);
                    $dataArray1['leaf'] = 0;
                    $dataArray1['date_updated'] = date('Y-m-d H:i:s');
                    $dataArray1['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->update("$tb", $dataArray1);


                }
            if (isset($request['gridasociado'])) {

                $dataArray3 = array();


                $modeloLogico = $request['asociados'] . $request['model'];
                $tb1 = $request['esquema_asociado'] . '_' . $modeloLogico;

                $this->load->model($request['esquema_asociado'].'/'.$modeloLogico);
                $rand = mt_rand(0, 0xffff);
                $uuidUno = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
                $this->db->set('id', $uuidUno);

                $modeluno = $request['model'] . '_id';
                $modeldos = $request['asociados'] . '_id';
                $dataArray3["$modeluno"] = $uuid;
                $dataArray3["$modeldos"] = $request["id_asociado"];

                $dataArray3['date_created'] = $dataArray3['date_updated'] = date('Y-m-d H:i:s');
                $dataArray3['created_from_ip'] = $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
                // print_r($dataArray3);die;
                $this->db->insert("$tb1", $dataArray3);
            }

            if ($asociados) {


               
                foreach ($dataArray2 as $nodo) {
                     $modeloLogico = $nodo['model'] . $request['model'];
                $modelofisico = ucwords($nodo['model']) . ucwords($request['model']);
                $tb1 = $request['esquema'] . '_' . $modeloLogico;

                $this->load->model($request['esquema'].'/'.$modelofisico);

                $nameuuidUno = new $modelofisico;


                    $rand = mt_rand(0, 0xffff);
                    $uuidUno = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
                    $this->db->set('id', $uuidUno);
                    $dataArray3 = array();

                    $modeluno = $nodo['model'] . '_id';
                    $modeldos = $request['model'] . '_id';
                    $dataArray3["$modeluno"] = $nodo['id'];
                    $dataArray3["$modeldos"] = $uuid;
                    $escritura = 0;
                    if(isset($nodo['escritura']))
                    {if ($nodo['escritura'])
                        $escritura = 1;
                    $dataArray3['escritura'] = $escritura;
                }
                    $dataArray3['date_created'] = $dataArray3['date_updated'] = date('Y-m-d H:i:s');
                    $dataArray3['created_from_ip'] = $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->insert("$tb1", $dataArray3);
                }


            }

             if ($isupdatecolumtable) {


               
                foreach ($updatecolumtable as $nodo) {
                

                     $tabla = $nodo['tabla'];
                     $tabla_id = $nodo['tabla_id'];
                     $campo = $nodo['campo'];
                     $value = $nodo['value'];


                      $dataArray = array();
                      $dataArray["$campo"] = $value;
                      $dataArray['date_updated'] = date('Y-m-d H:i:s');
                      $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';


                      $this->db->where('id', $tabla_id);
                      $sl = $this->db->update("$tabla", $dataArray);
               
                }


            }

            return $uuid;
        } else
            return NULL;
    }

    /**
     * Encodes string for use in XML
     *
     * @param       string $str Input string
     * @return      string
     */
    public function row_delete($request, $id)
    {

         //$esquema = $request['esquema'];
         //$esquema = str_replace('.',DS,$esquema);

         $request['esquema'] = str_replace('.','_',$request['esquema']);
        $tb = $request['esquema'] . '_' . $request['model'];
        $this->db->where('id', $id);

        //$this->db->where('id', $id);
        $result = $this->db->get("$tb");
        $salida = $result->result_array();
       
        if (isset($salida[0]['parent_id'])) {
            # code...
        $parent_id= $salida[0]['parent_id'];
        if ($parent_id != '') {
                    $dataArray1 = array();
 
                    $this->db->where('id', $parent_id);
                    $dataArray1['leaf'] = 1;
                    $dataArray1['date_updated'] = date('Y-m-d H:i:s');
                    $dataArray1['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->update("$tb", $dataArray1);

        }
    }

        $this->db->where('id', $id);
              
        $this->db->delete("$tb");

      
        return $this->db->affected_rows();

    }

    /**
     * Encodes string for use in XML
     *
     * @param       string $str Input string
     * @return      string
     */
    public function row_update($request, $id)
    {
         //$esquema = $request['esquema'];
         $esquema = str_replace('.',DS,$request['esquema']);
         $request['esquema'] = str_replace('.','_',$request['esquema']);
        $tb = $request['esquema'] . '_' . $request['model'];

        $dataArray = json_decode($request['data'], TRUE);

        foreach ($dataArray as $key => $nodo) {


            if ($nodo == '' || $nodo == 'NULL') {
                if (is_bool($nodo) === FALSE)
                    unset($dataArray["$key"]);
                //print_r($key);
            }
            if (is_bool($nodo) === TRUE) {
                $dataArray["$key"] = 0;
                if ($nodo)
                    $dataArray["$key"] = 1;
            }
             if ($this->db->field_exists("$key", "$tb") == FALSE)
                    {
                        if ($key !== 'asociados' && $key !== 'updatecolumtable')
                        unset($dataArray["$key"]);
            }


        }

        $this->load->model($esquema.'/'.$request['model']);
        $nameuuid = new $request['model'];
       // print_r($nameuuid);die;
        if(isset($nameuuid->uuid2)) 
            $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"].$dataArray["$nameuuid->uuid2"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
            else  
       {
        if(isset($dataArray["$nameuuid->uuid"]))
        $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
        else
        {
            $rand = mt_rand(0, 0xffff);
            $uuid = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');

        }
        }
        if ($id == 0)
            $id = $dataArray['id'];
        $dataArray['id'] = $uuid;
        $arbol = FALSE;

        if (isset($dataArray['parentId']))
            $arbol = TRUE;


        unset($dataArray['parentId']);
        //unset($dataArray['leaf']); verificar despues si esto afecta
        unset($dataArray['expanded']);
        unset($dataArray['checked']);
        unset($dataArray['model']);
       

        $asociados = FALSE;
        if (isset($dataArray['asociados'])) {

            $dataArray2 = array();
            $dataArray2 = $dataArray['asociados'];
            $asociados = TRUE;
            unset($dataArray['asociados']);
        }

          $isupdatecolumtable = FALSE;
             
            $updatecolumtable = array();
            if (isset($dataArray['updatecolumtable'])) {
 
                $updatecolumtable = $dataArray['updatecolumtable'];
                $isupdatecolumtable = TRUE;
                unset($dataArray['updatecolumtable']);
            }


          if (isset($dataArray['migration'])) {

            
            unset($dataArray['migration']);
        }
        


     //if ($this->db->field_exists("owner_id", "$tb") === TRUE)    
    //     unset($dataArray['owner_id']);
 //print_r($dataArray);die;
        $this->db->where('id', $id);
        $dataArray['date_updated'] = date('Y-m-d H:i:s');
        $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

        if ($tb == 'seguridad_usuario') {
            $this->load->model("Ion_auth_model", "ionAuthModel");
            $sl = $this->ionAuthModel->update($id, $dataArray);

        } else {
//print_r($dataArray);die;
            $sl = $this->db->update("$tb", $dataArray);
        }

        if (isset($dataArray['gridasociado'])) {

            $dataArray3 = array();


            $modeloLogico = $request['asociados'] . $request['model'];
            $tb1 = $request['esquema_asociado'] . '_' . $modeloLogico;

            $this->load->model($esquema.'/'.$modelofisico);
            $rand = mt_rand(0, 0xffff);
            $uuidUno = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');


            $modeluno = $request['model'] . '_id';
            $modeldos = $request['asociados'] . '_id';
            $dataArray3["$modeluno"] = $uuid;
            $asociado_id = $dataArray["id_asociado"];
            $dataArray3["$modeldos"] = $asociado_id;

            $dataArray3['date_created'] = $dataArray3['date_updated'] = date('Y-m-d H:i:s');
            $dataArray3['created_from_ip'] = $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
            $this->db->where("$modeldos", $id);
            $sal = $this->db->delete("$tb1");

            //print_r($dataArray3);die;
            $this->db->set('id', $uuidUno);
            $this->db->insert("$tb1", $dataArray3);
        }


        if ($asociados) {

            $modeloLogico = $dataArray2[0]['model'] . $request['model'];
            $modelofisico = ucwords($dataArray2[0]['model']) . ucwords($request['model']);

            $tb1 = $request['esquema'] . '_' . $modeloLogico;
            $modeluno = $dataArray2[0]['model'] . '_id';
            $modeldos = $request['model'] . '_id';
            $this->db->where("$modeldos", $id);
            $sal = $this->db->delete("$tb1");

            foreach ($dataArray2 as $nodo) {

                $this->load->model($esquema.'/'.$modelofisico);

                $nameuuidUno = new $modelofisico;
                $rand = mt_rand(0, 0xffff);
                $uuidUno = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
                $this->db->set('id', $uuidUno);
                $dataArray3 = array();


                $dataArray3["$modeluno"] = $nodo['id'];
                $dataArray3["$modeldos"] = $uuid;
                if (isset($nodo['escritura'])) {
                    $escritura = 0;
                    if ($nodo['escritura'])
                        $escritura = 1;
                    $dataArray3['escritura'] = $escritura;
                }//$dataArray3['area_id']=$uuidUno;
                //print_r($dataArray3);die;
                $dataArray3['date_created'] = $dataArray3['date_updated'] = date('Y-m-d H:i:s');
                $dataArray3['created_from_ip'] = $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                $this->db->insert("$tb1", $dataArray3);

            }

        }

        if ($arbol) {
             if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
            $q = $this->db->get("$tb");
            $arbol = $q->result_array();

            foreach ($arbol as $nodo) {
                if ($nodo['parent_id'] == $id) {
                    $cambio = array();
                    //$cambio['parent'] = $dataArray['nombre'];
                    $cambio['parent_id'] = $uuid;

                    $this->db->where('id', $nodo['id']);
                    $dataArray1['date_updated'] = date('Y-m-d H:i:s');
                    $dataArray1['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->update("$tb", $cambio);

                }

            }
            return 1;
        }
        //print_r($this->db->affected_rows());die;
         if ($isupdatecolumtable) {


               
                foreach ($updatecolumtable as $nodo) {
                

                     $tabla = $nodo['tabla'];
                     $tabla_id = $nodo['tabla_id'];
                     $campo = $nodo['campo'];
                     $value = $nodo['value'];


                      $dataArray = array();
                      $dataArray["$campo"] = $value;
                      $dataArray['date_updated'] = date('Y-m-d H:i:s');
                      $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';


                      $this->db->where('id', $tabla_id);
                      $sl = $this->db->update("$tabla", $dataArray);
               
                }


            }

        return $this->db->affected_rows();
    }

    public function row_existe($request)
    {
//print_r($request);die;
         $esquema = str_replace('_',DS,$request['esquema']);
         $request['esquema'] = str_replace('.','_',$request['esquema']);

        $tb = $request['esquema'] . '_' . $request['model'];
        $dataArray = json_decode($request['data'], TRUE);
        //$existtable = $this->db->get($tb);
        //print_r($existtable);die;
       // print_r($dataArray);die;
        $subdireccion =  $esquema . DS . $request['model'];
        //$subdireccion =  /*$request['esquema'] . '/' .*/ $request['model'];
$existFile = APPPATH . "models".DS."$subdireccion.php";
        if (!file_exists($existFile)) 
        //if (!class_exists($subdireccion)) 
        {
            $tools = new Tools();
            $aux = explode('.', $dataArray['id']);
if(count($aux)>0)
{//print_r($aux[count($aux)-1]);die;
    $aux1 = explode('-', $aux[count($aux)-1]);
if(count($aux1)>0)
    {$modelClass = $aux1[0]; 
         
        $existFileOrigen = APPPATH . "models".DS."$modelClass.php";
       // print_r($dataArray);die;
        if (file_exists($existFileOrigen)) 
        {
            
            $destino=  $esquema . DS . "$modelClass.php";
        //$subdireccion =  /*$request['esquema'] . '/' .*/ $request['model'];
            $existFile = APPPATH . "models".DS. "$destino";
           // print_r($existFile);
           // print_r($existFileOrigen);die;
            rename($existFileOrigen, $existFile);

            
        
        }
        else{
           // print_r($request['migration']);die;
            if(isset($request['migration']))
             {$dataMigration = json_decode($request['migration'], TRUE);
             $tools->make_model_file($request['esquema'],$modelClass,$dataMigration);
             $tools->make_migration_file($request['esquema'],$modelClass,$dataMigration);
             $tools->migrate();
         }else 
            if(isset($dataArray['migration']))
            {
                 
                $dataMigration = $dataArray['migration'];
             if(count($dataMigration)>0)
             {$tools->make_model_file($request['esquema'],$modelClass,$dataMigration);
             $tools->make_migration_file($request['esquema'],$modelClass,$dataMigration);
             $tools->migrate();
            }
            }
          
           
}
}
}
        }
        //$this->verificar_model($request['esquema'],$modelClass);
        $this->load->model($esquema.'/'.$request['model']);
        $nameuuid = new $request['model'];
        if(isset($nameuuid->uuid2)) 
            $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"].$dataArray["$nameuuid->uuid2"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
            else  
        $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
        
        //print_r($request['model']);
        //print_r($nameuuid);die;
        
        if(isset($nameuuid->unique))
        {//print_r('ddd');die;
            return FALSE;
        }
        $this->db->where('id', $uuid);
//print_r($this->db);die;
         if ($this->db->field_exists("visible", "$tb") === TRUE)
                    $this->db->where('visible',1);
        $result = $this->db->get("$tb");

        return count($result->result_array()) > 0 ? TRUE : FALSE;
    }


    public function get_db()
    {

        echo $this->db;
    }

    private function get_relaciones()
    {


    }

     private function verificar_model($esquema,$model)
    {
         //$esquema = $request['esquema'];
         $esquema = str_replace('.',DS,$esquema);
         $esquema = str_replace('_',DS,$esquema);
        // $request['esquema'] = str_replace('.','_',$request['esquema']);
        
         $existFolder = APPPATH . "models/$esquema";
    if(!is_dir($existFolder))
        mkdir($existFolder);
        $subdireccion =  $esquema . DS . $model;
        //$subdireccion =  /*$request['esquema'] . '/' .*/ $request['model'];
        $existFileEsquema = APPPATH . "models/$subdireccion.php";
        if (!file_exists($existFileEsquema)) 
        //if (!class_exists($subdireccion)) 
        {
            $existFile = APPPATH . "models/$model.php";
        if (file_exists($existFile)) 
            rename($existFile, $existFileEsquema);
        }
      

    }
}