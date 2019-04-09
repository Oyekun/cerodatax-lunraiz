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
require APPPATH . 'libraries/TreeExtJS.php';

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

        $total = array();
        $limit = FALSE;
        $parent_id = '';
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
                    $this->load->model($request['model'], '', TRUE);
                    $nameuuid = new $request['model'];

                    if (isset($nameuuid->relacion)) {

                        $this->db->select("$tb.*");
                        $tablas_relacion = [];
                        foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                            $tabla_campo_id = $tabla_campo . '.id';
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
                    }
                    $this->db->order_by("date_updated", "desc");//verificar bien
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
                        $request['model'] = $request['asociados'] . $request['model'];
                        $tb = $request['esquema_asociado'] . '_' . $request['model'];

                        $idasociadoDos = $request['asociados'] . '_id';
                        // $this->db->where("$idasociadoUno", $total[$i]['id']);
                        $this->db->where("$idasociadoDos", $request['id_asociado']);
                    }
                }
                $this->load->model($request['model'], '', TRUE);
                $nameuuid = new $request['model'];

                if (isset($nameuuid->relacion)) {
                    $flagrelacion = TRUE;
                    $this->db->select("$tb.*");

                    $tablas_relacion = [];
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        $tabla_campo_id = $tabla_campo . '.id';
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
                }
                $this->db->order_by("date_updated", "desc");
                //verificar bien
                $q = $this->db->get("$tb", $limit, $offset);

            } else {


                if ($parent_id != '') {

                    //  $this->db->order_by("parent", "desc");
                    $this->db->where('parent_id', $parent_id);

                }
                $this->load->model($request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    $tablas_relacion = [];
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        $tabla_campo_id = $tabla_campo . '.id';
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
                }
                $this->db->order_by("date_updated", "desc");//verificar bien
                $q = $this->db->get("$tb");

            }

            $this->db->order_by("date_updated", "desc");//verificar bien
            $q1 = $this->db->get("$tb");

            if (isset($q->row()->orden) && !isset($request['parent_id'])) {

                //$this->db->group_by("orden");

                $this->db->order_by("orden", "asc");
                if (isset($request['parent_id']))
                    if ($request['parent_id'] != '')
                        $this->db->where('parent_id', $parent_id);

                $this->load->model($request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    $tablas_relacion = [];
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        $tabla_campo_id = $tabla_campo . '.id';
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
                }
                // $this->db->order_by("date_updated", "asc");//verificar bien
                //	print_r($q->row());die;
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
                $this->load->model($request['model'], '', TRUE);
                $nameuuid = new $request['model'];
                if (isset($nameuuid->relacion)) {

                    $this->db->select("$tb.*");
                    foreach ($nameuuid->relacion as $campo => $tabla_campo) {
                        $tabla_campo_id = $tabla_campo . '.id';
                        $igual = $tb . '.' . $campo;
                        $alias = str_replace("_id", "", $campo);
                        $ref = $tabla_campo . ".nombre as " . $alias;
                        //$this->db->select("$ref");
                        $this->db->join(" $tabla_campo", " $tabla_campo_id = $igual", " left");
                    }
                }
                // $this->db->order_by("date_updated", "asc");//verificar bien
                if ($limit)
                    $q = $this->db->get("$tb", $limit, $offset);
                else
                    $q = $this->db->get("$tb");
            }


            $total['data'] = $q->result_array();


            $total_actual = count($q->result_array());

            $total['total'] = count($q1->result_array());
            /*if(isset($request['asociados'])&&isset($request['id_asociado'])&&isset($request['esquema_asociado'])&&isset($request['detalles']))
            {
                if($request['asociados']!=''&&$request['id_asociado']==''&&$request['detalles']=='')
                {
                    $total['total'] = $total_actual;
                    return $total;
                }

            }*/

            if ($total['total'] > 0) {

                if ((isset($total['data'][0]['parent_id']) && $parent_id != '') || isset($request['id_asociado']) && !isset($request['gridasociado'])) {


                    // Creating the Tree
                    $tree = new TreeExtJS();
                    $cant = 0;

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
//print_r($nodo["parent_id"]."\n");
                        }
                    }
//print_r($tree->tree);die;

                    $total['data'] = $tree->tree;
                    $total['total'] = $tree->cont;
                    return $total;
                }

            }


        }
        return $total;

    }

    /**
     * Encodes string for use in XML
     *
     * @param       string $str Input string
     * @return      string
     */

    public function posts($request)
    {


        $rsl = $this->row_existe($request);

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
                    unset($dataArray["$key"]);

            }


            $this->load->model($request['model']);
            $nameuuid = new $request['model'];

            $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
            unset($dataArray['id']);

            unset($dataArray['parentId']);
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
                    $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->update("$tb", $dataArray1);


                }
            if (isset($request['gridasociado'])) {

                $dataArray3 = array();


                $modeloLogico = $request['asociados'] . $request['model'];
                $tb1 = $request['esquema_asociado'] . '_' . $modeloLogico;

                $this->load->model($modeloLogico);
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


                $modeloLogico = $dataArray2[0]['model'] . $request['model'];
                $modelofisico = ucwords($dataArray2[0]['model']) . ucwords($request['model']);
                $tb1 = $request['esquema'] . '_' . $modeloLogico;

                $this->load->model($modelofisico);

                $nameuuidUno = new $modelofisico;
                foreach ($dataArray2 as $nodo) {


                    $rand = mt_rand(0, 0xffff);
                    $uuidUno = $this->uuid->v5($rand, '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
                    $this->db->set('id', $uuidUno);
                    $dataArray3 = array();

                    $modeluno = $dataArray2[0]['model'] . '_id';
                    $modeldos = $request['model'] . '_id';
                    $dataArray3["$modeluno"] = $nodo['id'];
                    $dataArray3["$modeldos"] = $uuid;
                    $escritura = 0;
                    if ($nodo['escritura'])
                        $escritura = 1;
                    $dataArray3['escritura'] = $escritura;

                    $dataArray3['date_created'] = $dataArray3['date_updated'] = date('Y-m-d H:i:s');
                    $dataArray3['created_from_ip'] = $dataArray3['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

                    $this->db->insert("$tb1", $dataArray3);
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


        $tb = $request['esquema'] . '_' . $request['model'];
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


        }

        $this->load->model($request['model']);
        $nameuuid = new $request['model'];
        $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
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


        $this->db->where('id', $id);
        $dataArray['date_updated'] = date('Y-m-d H:i:s');
        $dataArray['updated_from_ip'] = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';

        if ($tb == 'seguridad_usuario') {
            $this->load->model("Ion_auth_model", "ionAuthModel");
            $sl = $this->ionAuthModel->update($id, $dataArray);

        } else {

            $sl = $this->db->update("$tb", $dataArray);
        }

        if (isset($dataArray['gridasociado'])) {

            $dataArray3 = array();


            $modeloLogico = $request['asociados'] . $request['model'];
            $tb1 = $request['esquema_asociado'] . '_' . $modeloLogico;

            $this->load->model($modelofisico);
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

                $this->load->model($modelofisico);

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
        return $this->db->affected_rows();
    }

    public function row_existe($request)
    {
        $tb = $request['esquema'] . '_' . $request['model'];
        $dataArray = json_decode($request['data'], TRUE);
        $this->load->model($request['model']);
        $nameuuid = new $request['model'];
        $uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"], '8d3dc6d8-3a0d-4c03-8a04-1155445658f7');

        $this->db->where('id', $uuid);
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
}