<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_database extends CI_Controller {
	
	public function init()
        {
			
                parent::__construct();
				echo 'Bienvenidos al Sistema CERODATA.'.PHP_EOL;
				echo 'Realizando coneccion con la BD cerodata'.PHP_EOL;;
		$this->load->dbutil();
		echo 'Inicializando Utility dbutil...'.PHP_EOL;;
				if ($this->dbutil->database_exists('cerodata'))
{
	    $this->load->database();
		echo 'Conectado con la BD: cerodata'.PHP_EOL;;
		$this->load->dbforge();
		echo 'Inicializando Utility dbforge...'.PHP_EOL;;
		
         
}
else {echo 'No existe la BD cerodata o no se conecto a la BD, contacte con el administrador.'.PHP_EOL;;}
                // Your own constructor code
				
		 
        
		
		/*
foreach ($dbs as $db)
{
        echo $db;
}*/
        }
		
	 
	
}