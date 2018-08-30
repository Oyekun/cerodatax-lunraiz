<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 require APPPATH .'libraries/TreeExtJS.php'; 
 
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
 
    public function get_all($request){
    
    $total = array();
		$limit= false;
		$parent_id= '';
		if(isset($request['page']))	
	    $page = $request['page']; 
		if(isset($request['start']))
		$offset = $request['start'];
		if(isset($request['limit']))
		$limit = $request['limit'];
	    

       $flagrelacion=false;
     	if(isset($request['parent_id']))
		{

if($request['parent_id']=='save')
	unset($request['parent_id']);
else
			$parent_id = $request['parent_id'];

}
		if(isset($request['combo']))
			{

				if($request['combo']=='combo')
				{$limit = false;
			if(isset($request['filter']))
			{
				if($request['filter']!='')
            {
				$filters = array();	 		
		        $filters= json_decode($request['filter'],true);
		       
		        foreach($filters as $query)
		{
		    $value_query = $query['value'];
            $name_query= $query['name_id'];;
			$this->db->where("$name_query", $value_query);
		}
           	}
			}
		}

			}
		if(isset($request['esquema'])&&isset($request['model']))
		{   $modelo = $request['model'];
			if(isset($request['asociados']))
			{$aux =	explode('_',$modelo);
		 
			$modelo = $aux[0];
			}
			$tb = $request['esquema'].'_'.$modelo;  
		
		if($limit)
		{         
        $this->load->model($request['model'],'', TRUE);
		$nameuuid = new $request['model']; 
		if(isset($nameuuid->relacion))
        {
$flagrelacion= true;
        	$this->db->select("$tb.*");
        	foreach ($nameuuid->relacion as $campo=>$tabla_campo)
					{
 				   $tabla_campo_id = $tabla_campo.'.id';
                   $igual = $tb.'.'.$campo;
                   $alias = str_replace("_id", "", $campo);
                   $ref = $tabla_campo.".nombre as ".$alias;
                   $this->db->select("$ref");
    			   $this->db->join(" $tabla_campo"," $tabla_campo_id = $igual"," left");
					}
				}
		 
			$q = $this->db->get("$tb",$limit, $offset);
		 
		}
		else
		{ 
		
		    
			
			
	if($parent_id!='')
	{

		  //  $this->db->order_by("parent", "desc");	
			$this->db->where('parent_id', $parent_id); 
		
	}
			$this->load->model($request['model'],'', TRUE);
		$nameuuid = new $request['model']; 
		if(isset($nameuuid->relacion))
        {

        	$this->db->select("$tb.*");
        	foreach ($nameuuid->relacion as $campo=>$tabla_campo)
					{
 				   $tabla_campo_id = $tabla_campo.'.id';
                   $igual = $tb.'.'.$campo;
                   $alias = str_replace("_id", "", $campo);
                   $ref = $tabla_campo.".nombre as ".$alias;
                   $this->db->select("$ref");
    			   $this->db->join(" $tabla_campo"," $tabla_campo_id = $igual"," left");
					}
				}
				
			$q = $this->db->get("$tb");

			}
		$q1 = $this->db->get("$tb");
		
        if(isset($q->row()->orden) && !isset($request['parent_id'] ))
        {
        	
        	//$this->db->group_by("orden");	
        	$this->db->order_by("orden", "asc");	
        	if(isset($request['parent_id']))
        	if($request['parent_id']!='')
        	{$this->db->where('parent_id', $parent_id); 
        	
        	$this->load->model($request['model'],'', TRUE);
		$nameuuid = new $request['model']; 
		if(isset($nameuuid->relacion))
        {

        	$this->db->select("$tb.*");
        	foreach ($nameuuid->relacion as $campo=>$tabla_campo)
					{
 				   $tabla_campo_id = $tabla_campo.'.id';
                   $igual = $tb.'.'.$campo;
                   $alias = str_replace("_id", "", $campo);
                   $ref = $tabla_campo.".nombre as ".$alias;
                   $this->db->select("$ref");
    			   $this->db->join(" $tabla_campo"," $tabla_campo_id = $igual"," left");
					}
				}
        	$q = $this->db->get("$tb");
       }
        }
  
        if(isset($q->row()->posicion) && !isset($request['parent_id']))
        {


        	$this->db->order_by("posicion", "asc");	
        	if(isset($request['parent_id']))
        		if($request['parent_id']!='')
        	$this->db->where('parent_id', $parent_id);  
        	$this->load->model($request['model'],'', TRUE);
		$nameuuid = new $request['model']; 
		if(isset($nameuuid->relacion))
        {

        	$this->db->select("$tb.*");
        	foreach ($nameuuid->relacion as $campo=>$tabla_campo)
					{
 				   $tabla_campo_id = $tabla_campo.'.id';
                   $igual = $tb.'.'.$campo;
                   $alias = str_replace("_id", "", $campo);
                   $ref = $tabla_campo.".nombre as ".$alias;
                   //$this->db->select("$ref");
    			   $this->db->join(" $tabla_campo"," $tabla_campo_id = $igual"," left");
					}
				}
        	$q = $this->db->get("$tb");
        }
        

		$total['data'] = $q->result_array();
		$total_actual = count($q->result_array()); 	
 
		$total['total']= count($q1->result_array());
		/*if(isset($request['asociados'])&&isset($request['id_asociado'])&&isset($request['esquema_asociado'])&&isset($request['detalles']))
		{
			if($request['asociados']!=''&&$request['id_asociado']==''&&$request['detalles']=='')
			{
				$total['total'] = $total_actual;
				return $total;
			}

		}*/

		if($total['total']>0)
		{ 
			if((isset($total['data'][0]['parent_id']) && $parent_id!='') || isset($request['id_asociado']))
			{

				


//print_r($total['data']);die;				
 

				 // Creating the Tree
    $tree = new TreeExtJS();
	$cant=0;
	 
for($i=0;$i<$total_actual;$i++){
	$nodo = $total['data'][$i];
	
	if(isset($request['asociados'])&&isset($request['id_asociado']))
	{ 

$nodo['checked']=False;

if($request['asociados']!=''&&$request['id_asociado']!=''||($request['detalles']=='detalles'||$request['detalles']=='edit'))  
{  

$tbDos = $request['esquema_asociado'].'_'.$modelo.$request['asociados'];  
$idasociadoUno = $modelo.'_id';
$idasociadoDos = $request['asociados'].'_id';
		$this->db->where("$idasociadoUno", $nodo['id']);
		$this->db->where("$idasociadoDos", $request['id_asociado']);
	    $r = $this->db->get("$tbDos");
		$nodo['checked']=count($r->result_array())>0 ? True: False;
		
	}
	//else $tree->addChild($nodo,$nodo["parent_id"],$parent_id);
		}
		//print_r($request);die;

	$nodo['model']=$modelo;
	if(isset($request['detalles']))
	{ 
        if($request['detalles']=='detalles')  
		{
		 if($nodo['checked']!='')
		 {unset($nodo['checked']);
			$tree->addChild($nodo,$nodo["parent_id"],$parent_id);
	     }
		 
		 
	   }
	   if($request['detalles']=='edit')  
		{ 
			 
			$tree->addChild($nodo,$nodo["parent_id"],$parent_id);
	     
		 
		 
	   }
	   else {
	   if($request['detalles']==''){
		    $nodo['checked']=False;
 
		   $tree->addChild($nodo,$nodo["parent_id"],$parent_id);
	   }
	   }//
		
	}
	else {
$cant++;

		$tree->addChild($nodo,$nodo["parent_id"],$parent_id);
//print_r($nodo["parent_id"]."\n");
}
}
//print_r($tree->tree);die;

			$total['data'] = 	$tree->tree;
			$total['total'] = 	$tree->cont;
			return $total;
			}
			
		}
		
		
		}
		return $total;
        
		}
 
    public function posts($request){
	 
	 
	 $rsl = $this->row_existe($request);
	  
	    if(!$this->row_existe($request))
	    {
	    	$tb = $request['esquema'].'_'.$request['model']; 		
		$dataArray=json_decode($request['data'],true); 
		
		foreach($dataArray as $key=>$nodo)
		{
			if($nodo=='' || $nodo=='NULL' )
			{
				     if(is_bool($nodo)===false)
				unset($dataArray["$key"]);
			}
			if(is_bool($nodo)===true)
			{
				$dataArray["$key"] = 0;
				if($nodo)
				$dataArray["$key"] = 1;	
			}
			 
		}

		$this->load->model($request['model']);
		$nameuuid = new $request['model']; 
		$uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"],'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');  
		unset($dataArray['id']);  

		unset($dataArray['parentId']);
		unset($dataArray['expanded']);		
		unset($dataArray['checked']);		
		unset($dataArray['model']);
		$asociados=false;
if(isset($dataArray['asociados']))		
{
	
		$dataArray2 = array();	 		
		$dataArray2= $dataArray['asociados'];
		$asociados=true;
		unset($dataArray['asociados']);
}	
	$this->db->set('id', $uuid);
		$this->db->insert("$tb", $dataArray); 
        if(isset($dataArray['parent_id']))		
		if($dataArray['parent_id']!='')
		{$dataArray1 = array();
	
			$this->db->where('id', $dataArray['parent_id']);   
	$dataArray1['leaf']=0;
	 
    $this->db->update("$tb",$dataArray1);
	
			
			
		}
		 if($asociados)	
		 { 
		 
		$modeloLogico = $dataArray2[0]['model'].$request['model'];
		$modelofisico = ucwords($dataArray2[0]['model']).ucwords($request['model']);
		$tb1 = $request['esquema'].'_'.$modeloLogico;
		
		$this->load->model($modelofisico);
		
		$nameuuidUno = new $modelofisico; 
		foreach($dataArray2 as $nodo)
		{
			 
		
		//print_r(mt_rand(0, 0xffff));die;
		$rand=mt_rand(0, 0xffff);
		$uuidUno = $this->uuid->v5($rand,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
		$this->db->set('id', $uuidUno);
		$dataArray3 = array();
		
		$modeluno = $dataArray2[0]['model'].'_id';
		$modeldos = $request['model'].'_id';
		$dataArray3["$modeluno"]=$nodo['id'];
		$dataArray3["$modeldos"]=$uuid;
	 
          	
		$this->db->insert("$tb1", $dataArray3); 
		}
			 
		 }
			 
		return $uuid;}
		else
		return NULL;
    } 
	
	public function row_delete($request,$id) { 
	$tb = $request['esquema'].'_'.$request['model']; 		
    $this->db->where('id', $id);   
    $this->db->delete("$tb");
    return $this->db->affected_rows();
}
public function row_update($request,$id) { 
 
	$tb = $request['esquema'].'_'.$request['model']; 

    $dataArray=json_decode($request['data'],true); 
    foreach($dataArray as $key=>$nodo)
		{

    


			if($nodo=='' || $nodo=='NULL' )
			{
                if(is_bool($nodo)===false)
				unset($dataArray["$key"]);
			//print_r($key);
			}
			if(is_bool($nodo)===true)
			{
				$dataArray["$key"] = 0;
				if($nodo)
				$dataArray["$key"] = 1;	
			}

	

		}
		$this->load->model($request['model']);
		$nameuuid = new $request['model']; 	
		$uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"],'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        if($id==0)
		$id=$dataArray['id'];
		$dataArray['id'] = $uuid;
		$arbol = false;
		 
	 if(isset($dataArray['parentId']))
	  $arbol = true;
		 
		
	 
		unset($dataArray['parentId']);
		unset($dataArray['leaf']);
		unset($dataArray['expanded']);
		unset($dataArray['checked']);
		unset($dataArray['model']);
		
			$asociados=false;
if(isset($dataArray['asociados']))		
{
	
		$dataArray2 = array();	 		
		$dataArray2= $dataArray['asociados'];
		$asociados=true;
		unset($dataArray['asociados']);
}


    $this->db->where('id', $id);   
	 
    $sl = $this->db->update("$tb",$dataArray);
	 
	if($asociados)	
		 { 
		 
		$modeloLogico = $dataArray2[0]['model'].$request['model'];
		$modelofisico = ucwords($dataArray2[0]['model']).ucwords($request['model']);
		 
		$tb1 = $request['esquema'].'_'.$modeloLogico;
		$modeluno = $dataArray2[0]['model'].'_id';
		$modeldos = $request['model'].'_id';
		$this->db->where("$modeldos", $id);   
        $sal = $this->db->delete("$tb1");
    
		foreach($dataArray2 as $nodo)
		{
			 
		$this->load->model($modelofisico);
		
		$nameuuidUno = new $modelofisico; 
		$rand=mt_rand(0, 0xffff);
		$uuidUno = $this->uuid->v5($rand,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
		$this->db->set('id', $uuidUno);
		$dataArray3 = array();
		
		
		$dataArray3["$modeluno"]=$nodo['id'];
		$dataArray3["$modeldos"]=$uuid;
		 
		//$dataArray3['entidad_id']=$nodo['id'];
		//$dataArray3['area_id']=$uuidUno;
		//print_r($dataArray3);die;
		$this->db->insert("$tb1", $dataArray3); 
          	
		}
			 
		 }
	
	if($arbol)
	{
		 $q = $this->db->get("$tb");
		 $arbol = $q->result_array();
		 
		 foreach($arbol as $nodo)
		 {
			 if($nodo['parent_id']==$id)
			 {   $cambio = array();
		         //$cambio['parent'] = $dataArray['nombre'];
		         $cambio['parent_id'] = $uuid;
				 
				 $this->db->where('id', $nodo['id']);
				 $this->db->update("$tb",$cambio);
				 
			 }
			 
		 }
		 return 1;
	}
	//print_r($this->db->affected_rows());die;
    return $this->db->affected_rows();
}

public function row_existe($request) { 
	$tb = $request['esquema'].'_'.$request['model']; 
    $dataArray=json_decode($request['data'],true); 
		$this->load->model($request['model']);
		$nameuuid = new $request['model']; 	
		$uuid = $this->uuid->v5($dataArray["$nameuuid->uuid"],'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
		
    $this->db->where('id', $uuid);   
    $result = $this->db->get("$tb");
	 
    return count($result->result_array())>0 ? True: False;
}


	
	public function get_db(){
         
        echo $this->db;
    }
}