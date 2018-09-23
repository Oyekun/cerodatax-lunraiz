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


class Migration_Reordenar_entidades extends CI_Migration {

        public function up()
        {
                $this->load->helper('file');
                $this->load->database();
                $this->load->dbforge();
                $this->load->library('uuid'); 

        
            $tb='estructura_entidad';
           $result = $this->db->get("$tb");
         
        foreach ($result->result_array() as $entidad) {
 
            if(isset($entidad['codigo_parent']))
            {
            $codigo = $entidad['codigo_parent'];
           $this->db->where('codigo_registro', $codigo);   
           $result = $this->db->get("$tb");
          $existe = count($result->result_array())>0 ? TRUE: FALSE;
        
        if($existe==TRUE)
{
    $padre = $result->result_array()[0];
    $dataArray1 = array();
    
            $this->db->where('id', $entidad['id']);   
    $dataArray1['parent_id']=$padre['id'];
     
    $this->db->update("$tb",$dataArray1);

$dataArray1 = array();
    
            $this->db->where('id', $padre['id']);   
    $dataArray1['leaf']= 0;
     
    $this->db->update("$tb",$dataArray1);


}
            }
        } 

           
        
        }
        
                    public function down()
        {
            $tb = 'nomenclador_organismo';      
            $this->db->delete("$tb");
                 
        }
}