<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * This class creates a Tree structure of information for the TreePanel component
 * of the ExtJS library.
 *
 * @author Crysfel Villa
 * @date 12/18/2009
 *
 */
class TreeExtJS  {
	public $tree = array();
	public $salida = array();
	public $index = array(); 
	public $cont = 0;
	
	/**
	 * 	This method inserts a node to the Tree, the child param may contain an
	 * 	"id" property that will be use as a "key", if the child param doesn't contains
	 *	an "id" property a generated "key" is given to the node.
	 *
	 *	@child the node to insert
	 *	@parentKey(optional) The parent key where the node will be inserted, if null 
	 *	the node is inserted in the root of the Tree
	 */
	public function addChild($child,$parentKey = null,$parent_id){
		$key = isset($child["id"])?$child["id"]:'item_'.$this->cont;
		//$child["leaf"]  = true;
		if($child["leaf"]==1)
		$child["leaf"]  = true;
		else
			$child["leaf"]  = false;
		if($this->containsKey($parentKey)){
			 
			$this->index[$key] =& $child;
			$parent =& $this->index[$parentKey];
			if(isset($parent["children"])){
				$parent["children"][] =& $child;
				
			}else{
				//$parent["leaf"] = false;
				//$child["leaf"]  = false;
				$parent["children"] = array();
				$parent["children"][] =& $child;
			}
			
		}else{
			//added to the root
			
			$this->index[$key] =& $child;
			if($parentKey==''||$parent_id!='' &&$parent_id!='')
			$this->tree[] =& $child;
		}
		$this->cont++;
		sort($this->tree);
	}
	
	/**
	 *	Return a node by the given key
	 *	@key
	 */
	public function getNode($key){
		return $this->index[key];
	}
	
	/**
	 *	@TODO Remove the node from the Tree
	 *	@key
	 */
	public function removeNode($key){
		//unset($this->index[key]);
	}
	
	/**
	 *	Check if exist a node with the given key
	 */
	public function containsKey($key){
		return isset($this->index[$key]);
	}
	
	/**
	 *	Return a representation of the Tree structure in JSON format
	 */
	public function toJson(){
		return json_encode($this->tree);
	}
	//Ordenar los hijos y los padres
     public function order($arreglo,$cant){
	 
	 
	/*foreach($arreglo as $nodo)
	{
		
		
	}*/
   }
}