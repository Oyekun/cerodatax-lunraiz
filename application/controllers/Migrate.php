<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
 
class Migrate extends CI_Controller
{

           public function index()
        {
                $this->load->library('migration');
/*
                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }*/
				  $dato = $this->migration->find_migrations();
				    //print_r($dato);die;
				   echo('Corriendo Migraciones CERODATAX'."\n");
				  $row = $this->db->select('version')->get('migrations')->row();
				  $version = $row ? $row->version : '0';
				   print_r('Version Actual: '.$version."\n");
				   foreach($dato as $migra => $dato)
				  {   
				  	$cant=$migra;
				  	if($migra[0]==0);
				  	  	$cant = $migra[1].$migra[2];
				  	  	
				  	  	
				  	if($cant>=$version)  	
				      	{
echo($migra."\n");
				      		$salida = $this->migration->version("$migra");
					 }
				   
				   
				  }
				  
				  
				 
				
				
        }
		 

}