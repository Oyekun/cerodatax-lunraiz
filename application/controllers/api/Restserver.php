<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
 
require APPPATH .'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Restserver extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
		
		$this->load->model('Api_model');
        $this->load->library('uuid'); 
		$this->load->library('pagination');
        $this->load->library(array('ion_auth'));
		
		
		$this->methods['rests_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['rests_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['rests_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function rests_get()
    {
        // Rest from a data store e.g. database
		//print_r($_REQUEST);die;
		//print_r($this->config->config['enable_query_strings']);die;
		// $this->config->config['enable_query_strings'] = TRUE;
        $rests=FALSE;
        $_REQUEST = $this->security->xss_clean($_REQUEST);
        if($this->ion_auth->logged_in()) //Activar cuando se tenga usuario y contraseña
        $rests = $this->Api_model->get_all($_REQUEST); 
		//$config['base_url'] = 'http://localhost/cerodata/index.php/api/restserver/rests/?model='.$_REQUEST['model'].'&esquema='.$_REQUEST['esquema'];
		
		 
		
        $id = $this->get('id');
         
        // If the id parameter doesn't exist return all the rests
 
        if ($id === NULL)
        {
			
            // Check if the rests data store contains rests (in case the database result returns NULL)
            if ($rests)
            {
                // Set the response and exit
                $this->response($rests, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
			
                // Set the response and exit
                $this->response([
                    'success' => TRUE,
                    
                    'message' => 'No existen elementos'
                ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        
          $resl = $this->uuid->is_valid($id);
        // Validate the id.
        if ($resl)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the rest from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $rest = NULL;

        if (!empty($rests))
        {
            foreach ($rests as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $rest = $value;
                }
            }
        }

        if (!empty($rest))
        {
            $this->set_response($rest, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'success' => FALSE,
                'message' => 'El elemento no se ha encontrado'
            ], 
REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
//REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function rests_post()
    { 
	//  $_REQUEST = $this->security->xss_clean($_REQUEST);
        $id=NULL;
        if($this->ion_auth->logged_in())
    $id = $this->Api_model->posts($_REQUEST); 
	if ($id === NULL) 
	$messageText = 'El elemento no se ha creado.';
	else $messageText = 'El elemento a sido creado satisfactoriamente.';
	
        $message = [
            'id' => $id, // id is null false is data true
            'success' => TRUE,  
            'message' => $messageText
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
	 
    }
	
	public function rests_put($id)
    {    //Hubo q comentariar prk a la hora de enviar image eliminanva el data:etc
         //$this->_args = $this->security->xss_clean($this->_args);
         $id = $this->security->xss_clean($id);
         

		$datos =  Array();  
		$datos['esquema']=$this->_args['esquema'];
		$datos['model']=$this->_args['model'];  
		$datos['data']=$this->_args['data'];
		//$id = '';
        if($this->ion_auth->logged_in())
        if(!isset($this->_args['parent_id']))		
        {$id =$this->Api_model->row_update($datos,$id);  
        
        }
        else{
			//arbol
			$id = 0;
			$parent_id = $this->_args['parent_id'];
		if($this->ion_auth->logged_in())	 
		if($parent_id!="") 		
        {$id =$this->Api_model->row_update($datos,$id);  
       // print_r($id);die;	
		}
    }

		if ($id==1 ||$id==Null) 
        $messageText = 'El elemento a sido modificado satisfactoriamente';
         else  {$messageText = 'El elemento no ha sido modificado';$id=Null;}
        $message = [
		    'id' => $id, // id is null false is data true
            'success' => TRUE,
            'message' => $messageText
        ]; 
        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function rests_delete($id)
    {
		 $this->_args = $this->security->xss_clean($this->_args);
          $id = $this->security->xss_clean($id);
        $datos =  Array();  
		$datos['esquema']=$this->_args['esquema'];
		$datos['model']=$this->_args['model'];

        $result=0;
        if($this->ion_auth->logged_in()) 
		if(!isset($this->_args['grid']))
        $result = $this->Api_model->row_delete($datos,$id); 
          
        // Validate the id.
		$success= FALSE;
        if ($result==1)
	    {$success= TRUE;
		$message = 'El elemento a sido eliminado satisfactoriamente';}
         else  $message = 'El elemento no ha sido eliminado';
        $message = [
            'success' => $success,
            'message' => $message
        ];

        $this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
    }

}
