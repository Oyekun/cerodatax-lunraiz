<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Migration_Init_entidades_cnoa extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

 
        $string1 = read_file(APPPATH.'hooks/entidades_cnoa.csv');
        
         
        $salida1 = explode("\n", $string1);
 
            
        foreach ($salida1 as $key => $value) 
        {
        $value1 = str_replace("\r", "", $value);    
        $salida_aux = explode(";", $value1);
       
        $reeup = ''; 
        $nombre = '';
        $siglas = '';
        $direccion = '';
        $dpa = '';
        $nae = '';
        $ep = '';
        $tipo = '';
        $sub = '';
        $org  = '';
        $ffi  = '';
        if($salida_aux[0]!='')
        $reeup = $salida_aux[0];
        if($salida_aux[1]!='')
        $nombre = $salida_aux[1];
       if($salida_aux[2]!='')
        $siglas = $salida_aux[2];
         if($salida_aux[3]!='')
        $direccion = $salida_aux[3]; 
      if($salida_aux[4]!='')
        $fecha_alta = $salida_aux[4]; 
 		if($salida_aux[5]!='')
        $dpa = $salida_aux[5]; 
 		if($salida_aux[6]!='')
        $nae = $salida_aux[6]; 
      if($salida_aux[7]!='')
        $ep = $salida_aux[7]; 
 		 if($salida_aux[8]!='')
        $org = $salida_aux[8];
       if($salida_aux[9]!='')
        $union = $salida_aux[9];  
      if($salida_aux[10]!='')
        $ffi = $salida_aux[10]; 
    if($salida_aux[11]!='')
        $tipo = $salida_aux[11]; 
        
        if($salida_aux[14]!='')
        $sub = $salida_aux[14]; 
                                      
 		$datosentidad["$reeup"]['nombre']= $nombre;
    $datosentidad["$reeup"]['abreviatura']= $siglas;
 		$datosentidad["$reeup"]['direccion']= $direccion;
    $datosentidad["$reeup"]['fecha_alta']= $fecha_alta;
 		$datosentidad["$reeup"]['dpa']= $dpa;
 		$datosentidad["$reeup"]['nae']= $nae;
 		$datosentidad["$reeup"]['ep']= $ep;
    $datosentidad["$reeup"]['tipo']= $tipo;
    $datosentidad["$reeup"]['sub']= $sub;
    $datosentidad["$reeup"]['org']= $org;
    $datosentidad["$reeup"]['union']= $union;
    $datosentidad["$reeup"]['ffi']= $ffi;
    $datosentidad["$reeup"]['leaf']= 1;

        if($sub!='')
         {  $tb='estructura_entidad';
           $this->db->where('codigo_registro',$sub);   
           $result = $this->db->get("$tb");
         $aux_pais_array = $result->result_array();
         
         if(count($aux_pais_array)>0)
         { 
        
  $datosentidad["$sub"]['nombre']=$aux_pais_array[0]['nombre'];
      $datosentidad["$sub"]['sub'] = '';
        
     $pais_id = $aux_pais_array[0]['id'];  
           $this->db->where('id', $pais_id);
            $dataArrayPais = array();   
         $dataArrayPais['leaf'] = 0; 
          $tb='estructura_entidad';
            $sl = $this->db->update("$tb",$dataArrayPais);

         }
       }
   		 
    }
    foreach ($datosentidad as $key => $value) 
    {

    $sub = $value['sub'];
    
    //   print_r($datosentidad["$key"]);die;
             if($sub!='' && $key !=$sub)
    {    
if(isset($datosentidad["$sub"]))
      {//$parent = $datosentidad["$sub"]['nombre'];
         
         $parent_id = $uuid = $this->uuid->v5($sub,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7');
          
    
    //$datosentidad["$key"]['leaf']= 1;
   //  $datosentidad["$key"]['parent']= $parent;
    $datosentidad["$key"]['parent_id']= $parent_id;

    $datosentidad["$sub"]['leaf']= 0;
   //  $datosentidad["$sub"]['parent_id']= 'root';
     }
     else{
     //   $datosentidad["$key"]['parent_id']= 'root';
         $datosentidad["$key"]['leaf']= 1;

     }
     }else{
       // $datosentidad["$key"]['parent_id']= 'root';
         $datosentidad["$key"]['leaf']= 1;

     } 


    }
         foreach ($datosentidad as $key => $value) 
        { 
                
        
        $nombre= $value['nombre'];
        $reeup= $key;
        $tb='estructura_entidad';

           $this->db->where('codigo_registro',"$reeup");   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)==0)
         { 
         $abreviatura= $value['abreviatura'];
         $leaf= $value['leaf'];
       // if(isset($value['parent']))
       // $parent= $value['parent'];
        if(isset($value['parent_id']))
        $parent_id= $value['parent_id'];
       $ep= $value['ep'];
        $ffi= $value['ffi'];
         if(isset($value['fecha_alta']))
        {$fecha = explode("/", $value['fecha_alta']);
        if(count($fecha)==3)
        $fecha_alta = $fecha[2].'-'.$fecha[1].'-'.$fecha[0]; 
        else
        {
          $fecha_alta= '';
        }
        }
        $sub = str_replace("\r", "", $value['sub']); 
 		 
 		     $direccion= $value['direccion'];
 		
 		     $tb='nomenclador_municipio';
           $dpa = $value['dpa'];
           $this->db->where('codigo', $dpa);   
           $result = $this->db->get("$tb");
         $aux_municipio_array = $result->result_array();
         if(count($aux_municipio_array)>0)
         {//$municipio = $aux_municipio_array[0]['nombre'];
          $municipio_id = $aux_municipio_array[0]['id'];
          $provincia_id = $aux_municipio_array[0]['provincia_id'];
          //$provincia  = $aux_municipio_array[0]['provincia'];
          $tb='nomenclador_provincia';
           $this->db->where('id', $provincia_id);   
           $result = $this->db->get("$tb");
         $aux_provincia_array = $result->result_array();
         
         if(count($aux_provincia_array)>0)
         {//$pais = $aux_provincia_array[0]['pais'];
          $pais_id = $aux_provincia_array[0]['pais_id'];
          }

          }
           $tb='nomenclador_nae';
           $this->db->where('clase', $value['nae']);   
           $result = $this->db->get("$tb");
         $aux_nae_array = $result->result_array();
         
         if(count($aux_nae_array)>0)
         {//$nae = $aux_nae_array[0]['nombre'];
          $nae_id = $aux_nae_array[0]['id'];  

          }
          $tb='nomenclador_organismo';
           $this->db->where('codigo', $value['org']);   
           $result = $this->db->get("$tb");
         $aux_org_array = $result->result_array();
         
         if(count($aux_org_array)>0)
         {//$org = $aux_org_array[0]['nombre'];
          $org_id = $aux_org_array[0]['id'];
          }

           $tb='nomenclador_union';
           $this->db->where('codigo', $value['union']);   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$union = $aux_union_array[0]['nombre'];
          $union_id = $aux_union_array[0]['id'];
          }

         
            $tb='nomenclador_tipoentidad';
            
           $this->db->where('abreviatura', $value['tipo']);   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
          
         if(count($aux_union_array)>0)
         {//$tipo = $aux_union_array[0]['nombre'];
          $tipo_id = $aux_union_array[0]['id'];
          }

              $tb='nomenclador_tiporegistro';
           $this->db->where('nombre','REEANE');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$tiporegistro = $aux_union_array[0]['nombre'];
          $tiporegistro_id = $aux_union_array[0]['id'];
          }
 		             
             $model = 'Entidad';
        $this->load->model($model);
        $nameuuid = new $model; 
        $uuid = $this->uuid->v5($key,'8d3dc6d8-3a0d-4c03-8a04-1155445658f7'); 
        $dataArray = array();
        $dataArray['codigo_registro']= $reeup;
        $dataArray['nombre']= $nombre;

         if(isset($value['abreviatura']))
    $dataArray['abreviatura']= $abreviatura;
    $dataArray['direccion']= $direccion;
    if(isset($value['fecha_alta']))
 		$dataArray['fecha_alta']= $fecha_alta;
 		
    $dataArray['leaf']= $leaf;
  //  if(isset($value['parent']))
  //  $dataArray['parent']= $parent;
    if(isset($value['parent_id']))
    $dataArray['parent_id']= $parent_id;

 		//$dataArray['pais']= $pais;
 		$dataArray['pais_id']= $pais_id;
 		//$dataArray['provincia']= $provincia;
 		$dataArray['provincia_id']= $provincia_id;
 		//$dataArray['municipio']= $municipio;
 		$dataArray['municipio_id']= $municipio_id;
    //$dataArray['nae']= $nae;
 		$dataArray['nae_id']= $nae_id; 
           
         if($ffi==1)
          {$tb='nomenclador_categoriaentidad';
           $this->db->where('nombre','Categoría I');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $categoria_id = $aux_union_array[0]['id'];
          }
        }
        if($ffi==2)
          {$tb='nomenclador_categoriaentidad';
           $this->db->where('nombre','Categoría II');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $categoria_id = $aux_union_array[0]['id'];
          }
        }

        if($ffi==3)
          {$tb='nomenclador_categoriaentidad';
           $this->db->where('nombre','Categoría III');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $categoria_id = $aux_union_array[0]['id'];
          }
        }

        if($ffi==4)
          {$tb='nomenclador_categoriaentidad';
           $this->db->where('nombre','Categoría IV');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $categoria_id = $aux_union_array[0]['id'];
          }
        }
        if($ep=='')
          {$tb='nomenclador_categoriaentidad';
           $this->db->where('nombre','Sin Categoría');   
           $result = $this->db->get("$tb");
         $aux_union_array = $result->result_array();
         
         if(count($aux_union_array)>0)
         {//$categoria = $aux_union_array[0]['nombre'];
          $categoria_id = $aux_union_array[0]['id'];
          }
        }
          $tb='nomenclador_clasificacion';
           $this->db->where('abreviatura','AF');   
           $result = $this->db->get("$tb");
         $aux_clasificacion_array = $result->result_array();
         
         if(count($aux_clasificacion_array)>0)
         {//$clasificacion = $aux_clasificacion_array[0]['nombre'];
          $clasificacion_id = $aux_clasificacion_array[0]['id'];
          }
        
        
    $dataArray['perfercionamiento']= 1;
    //$dataArray['organismo']= $org;
    $dataArray['organismo_id']= $org_id;
     //$dataArray['union']= $union;
    $dataArray['union_id']= $union_id;
    
    //$dataArray['clasificacion']= $clasificacion;
    $dataArray['clasificacion_id']= $clasificacion_id;
    //$dataArray['categoria']= $categoria;
    $dataArray['categoria_id']= $categoria_id;
    //$dataArray['tipo']= $tipo;
    $dataArray['tipo_id']= $tipo_id;
    //$dataArray['tipo_registro']= $tiporegistro;
    $dataArray['tipo_registro_id']= $tiporegistro_id;
   
              
       // print_r($dataArray);die;
        $tb='estructura_entidad';
        $this->db->set('id', $uuid);
        $this->db->insert("$tb", $dataArray); 
        }
        }
    
}
        
                    public function down()
        {
            $tb = 'estructura_entidad';      
            $this->db->delete("$tb");
                 
        }
}