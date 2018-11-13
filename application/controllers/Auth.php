<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth'));
		$this->load->helper(array('url', 'language'));
		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			$this->load->view('auth/login');
		}
 		else
		{
 
          $this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->_render_page('auth/index');
		 
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		 
		 $this->load->model("Ion_auth_model", "ionAuthModel");
 	        $remember = (bool)$this->input->post('remember');
             
             
             
			if ($this->ionAuthModel->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				 	 

			     $this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{ 
				if($this->input->post('identity')==$user->username)
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		//	$this->_render_page('auth/index');
			 
         $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>TRUE,'message' => 'El usuario o la contraseña son correctos.','data'=>$this->data)));
		 
		
			}
			else
			{

				 
				 $logins = $this->ionAuthModel->errors_array(false);

                 $mensaje = 'El usuario o la contraseña son incorrectos.';
				 if (count($logins)>0)
				 switch ($logins[0]) {
				 	case 'login_timeout':
				 		$mensaje = 'El usuario ha excedido la cantidad de intentos de autenticación.';
				 		break;
				 	case 'login_unsuccessful_not_active':
				 			$mensaje = 'El usuario no esta activo.';
				 		break;
				 	 
				 	default:
				 		$mensaje = 'El usuario o la contraseña son incorrectos.';
				 		break;
				 }
		 $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>FALSE,'message' => $mensaje)));
		 
		 	}
	 
	}
	public function arbol()
	{
		 $identity = $this->session->userdata['user_id'];

	

    $path ="resources/data/menu.json";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    

 
	    $tb = 'configuracion_menu'; 
         
		$this->load->model('menu');
		if(!$this->ion_auth->is_admin())
		{$this->db->select("configuracion_menu.*");
		$this->db->distinct();
	 	$this->db->join("seguridad_menurol","seguridad_menurol.menu_id=configuracion_menu.id"," right");
	 	$this->db->join("seguridad_rolusuario","seguridad_rolusuario.rol_id=seguridad_menurol.rol_id"," right");
		$this->db->where('usuario_id', $identity);   
	   }
        $this->db->order_by("orden", "asc"); 
        $this->db->order_by("modulo_id", "desc");
     $result = $this->db->get("$tb");
     	//print_r($this->db->queries);die;
    $model_template = "["; 
    if(count($result->result_array())>0)
    {	$menus = $result->result_array(); 
        
   foreach ($menus as $key => $value) {
   	$model_template .= "{
   		"; 
   	 foreach ($value as $key1 => $value1) {
   {
$model_template .=$key1.':';
$model_template .="'$value1',";
   	} 
   }
   	$model_template .= "
   },";
   }
    	  $model_template .="]";
    fwrite($my_model, $model_template);
    fclose($my_model);
    $tb = 'configuracion_modulo'; 
    $this->load->model('modulo');
	 	if(!$this->ion_auth->is_admin())
	 	{
	 	$this->db->select("configuracion_modulo.*");
		$this->db->distinct();
	 	$this->db->join("configuracion_menu","configuracion_modulo.id=configuracion_menu.modulo_id"," right");
		$this->db->join("seguridad_menurol","seguridad_menurol.menu_id=configuracion_menu.id"," right");
	 	$this->db->join("seguridad_rolusuario","seguridad_rolusuario.rol_id=seguridad_menurol.rol_id"," right");
		$this->db->where('usuario_id', $identity);   
		 }
		 $this->db->order_by("orden", "asc"); 
        
    $result = $this->db->get("$tb");
     
    	$path ="resources/data/modulo.json";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    if(count($result->result_array())>0)
    {	$modulos = $result->result_array();

    	 $model_template = "["; 
   
   foreach ($modulos as $key => $value) {
   	$model_template .= "{
   		"; 
   	 foreach ($value as $key1 => $value1) {
   {
$model_template .=$key1.':';
$model_template .="'$value1',";
   	} 
   }
   	$model_template .= "
   },";
   }
    	  $model_template .="]";
    fwrite($my_model, $model_template);
    fclose($my_model);


    	 
    $tb = 'nomenclador_tipomodulo'; 
    $this->load->model('tipomodulo');
if(!$this->ion_auth->is_admin())
{
    $this->db->select("nomenclador_tipomodulo.*");
		$this->db->distinct();
	 	$this->db->join("configuracion_modulo","nomenclador_tipomodulo.id=configuracion_modulo.tipo_modulo_id"," right");
		$this->db->join("configuracion_menu","configuracion_modulo.id=configuracion_menu.modulo_id"," right");
		$this->db->join("seguridad_menurol","seguridad_menurol.menu_id=configuracion_menu.id"," right");
	 	$this->db->join("seguridad_rolusuario","seguridad_rolusuario.rol_id=seguridad_menurol.rol_id"," right");
		$this->db->where('usuario_id', $identity);   
	 	 }
	 	 $this->db->order_by("orden", "asc"); 
        
    $result = $this->db->get("$tb");
    	
    if(count($result->result_array())>0)
    {	$tipomodulo = $result->result_array();


$path ="resources/data/tipomodulo.json";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    	$model_template = "["; 
   
   foreach ($tipomodulo as $key => $value) {
   	$model_template .= "{
   		"; 
   	 foreach ($value as $key1 => $value1) {
   {
$model_template .=$key1.':';
$model_template .="'$value1',";
   	} 
   }
   	$model_template .= "
   },";
   }
    	  $model_template .="]";
    fwrite($my_model, $model_template);
    fclose($my_model);

      $tb = 'configuracion_panel'; 
    $this->load->model('panel');
	 	if(!$this->ion_auth->is_admin())
	 	{
	 	$this->db->select("configuracion_panel.*");
		$this->db->distinct();
	 	$this->db->join("configuracion_menu","configuracion_panel.menu_id=configuracion_menu.id"," right");
		$this->db->join("seguridad_menurol","seguridad_menurol.menu_id=configuracion_menu.id"," right");
	 	$this->db->join("seguridad_rolusuario","seguridad_rolusuario.rol_id=seguridad_menurol.rol_id"," right");
		$this->db->where('usuario_id', $identity);   
		 }
		 $this->db->order_by("orden", "asc"); 
        

    $result = $this->db->get("$tb");
    	
    if(count($result->result_array())>0)
    {	$tipomodulo = $result->result_array();


$path ="resources/data/panel.json";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    	$model_template = "["; 
   
   foreach ($tipomodulo as $key => $value) {
   	$model_template .= "{
   		"; 
   	 foreach ($value as $key1 => $value1) {
   {
$model_template .=$key1.':';
$model_template .="'$value1',";
   	} 
   }
   	$model_template .= "
   },";
   }
    	  $model_template .="]";
    fwrite($my_model, $model_template);
    fclose($my_model);
    }
    	
    }

    }

	}
	 $this->output->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>TRUE)));
}

	/**
	 * Log the user out
	 */
	public function entidad()
	{
		   		  
		   		   $identity = $this->session->userdata['user_id'];

		  $path ="resources/data/escritorio.json";
    $my_model = fopen($path, "w") or die("Unable to create model file!");
    


    $model_template = "["; 
    
    $tb = 'configuracion_menu'; 
         
		$this->load->model('menu');
		
		if(!$this->ion_auth->is_admin())
		{$this->db->select("configuracion_menu.*");
			$this->db->distinct();
	 	$this->db->join("seguridad_menurol","seguridad_menurol.menu_id=configuracion_menu.id"," right");
	 	$this->db->join("seguridad_rolusuario","seguridad_rolusuario.rol_id=seguridad_menurol.rol_id"," right");
		$this->db->where('usuario_id', $identity);
	      }   
    $this->db->where('escritorio', 1);  
     $this->db->order_by("orden", "asc"); 
     $this->db->order_by("modulo_id", "desc"); 
    $result = $this->db->get("$tb");
    	
    if(count($result->result_array())>0)
    {	$menus = $result->result_array(); 
    $tb = 'nomenclador_icono'; 
$this->load->model('menu');
	 	
  //  $this->db->where('systema', 1);   
    $result = $this->db->get("$tb");
    	
    if(count($result->result_array())>0)
    {	$iconos = $result->result_array();
    }

    foreach ($menus as $key => $value) {
    	$icono_id='image';
    	$systema='false';
    	$type='image';
    	$color='black';
  if(isset($value['icono_id']))  	 
{    	foreach ($iconos as $row)
{
        if($row['id']==$value['icono_id'])
        	{
  
        		$icono_id=$row['foto']; 
        		if($row['systema']==1)
        		{$systema='true';
        		$type='svg';
        		$color=$value['color'];
        	     }
        	     
        	     break;
              
}
    }
}
	if($icono_id=='' || strlen($icono_id)< 50)
        	     	$type='svg';
        $name=$value['nombre']; 
        $url=$value['id_menu']; 
         $thumb=$icono_id; 
    	$model_template .= "
    	{
    		name: '$name',
    		thumb: '$thumb', 
    		url: '$url',
    		systema:'$systema',
    		color:'$color',
    		type: '$type'
    	},";	 
    }
   // $model_template .= "{name: 'Kitchen Sink',thumb: 'sink.png', url: 'kitchensink',type: 'Application'},";
    }


    $model_template .="]";

    fwrite($my_model, $model_template);

    fclose($my_model);
	// print_r($result->result_array());die;
    $nombre = '';
    $cantidad = '';
    if($identity!='')
    {   
       $tb = 'seguridad_entidadusuario'; 
         
		$this->load->model('entidadusuario');
	 	
    $this->db->where('usuario_id', $identity);   
    $result = $this->db->get("$tb");
    	
    if(count($result->result_array())>0)
    {	$entidades = $result->result_array()[0]; 
    	
	   $tb = 'estructura_entidad'; 
         
		$this->load->model('entidad');
	 	
    $this->db->where('id', $entidades['entidad_id']);   
    $result = $this->db->get("$tb");
     if( count($result->result_array())>0)
	 {$entidad = $result->result_array()[0];
     $nombre = $entidad['nombre'];
     $cantidad = strlen($entidad['nombre']);

     }
 }
       $tb = 'seguridad_usuario'; 
         
		$this->load->model('usuario');
	 	
    $this->db->where('id', $identity);   
    $result = $this->db->get("$tb");
    
    $usuarios=[];
	 if(count($result->result_array()))
	 $usuarios = $result->result_array()[0];
    $persona=''; 
     if(isset($usuarios['persona_id']))
     {$persona_id = $usuarios['persona_id'];
	 
	 $tb = 'persona_persona'; 
         
		$this->load->model('persona');
	 	
    $this->db->where('id', $persona_id);   
    $result = $this->db->get("$tb");
    
    if( count($result->result_array())>0)
	{ $persona = $result->result_array()[0];
      //$persona['username'] = $usuarios['username'];
      }
    }
    	$data = array('usuario' => $usuarios,'persona' => $persona,'entidad' => $nombre,'cantidad' =>$cantidad);
		 $this->output->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>TRUE,'data'=>$data)));
	
    }
    else{

 $this->output->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>FALSE)));

    }
     	 

	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		 $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>TRUE)));
		 

	}

	/**
	 * Change password
	 */
	public function change_password()
	{
	 
		if (!$this->ion_auth->logged_in())
		{
			$this->load->view('auth/login');
		}

		$user = $this->ion_auth->user()->row();
        $username = $this->input->post('username');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
		if ($username=='' && $new_password=='' && $old_password=='')
		{
			
			// display the form
			// set the flash data error message if there is one
			$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>FALSE,'message' => 'El usuario o la contraseña son incorrectos.')));
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old_password'), $this->input->post('new_password'));

			if ($change)
			{
				//if the password was successfully changed
				$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>TRUE,'message' => 'El usuario y la contraseña son correctos.')));
	
				$this->logout();
				//$this->load->view('auth/login');
			}
			else
			{
				$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>FALSE,'message' => 'El usuario o la contraseña son incorrectos.')));
	
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
			);

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				);
				$this->data['user_id'] = array(
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					return show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user', $this->data);
		}
	}
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			redirect('auth', 'refresh');
		}
		redirect('/', 'refresh');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = $this->lang->line('edit_user_heading');

		if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

		$user = $this->ion_auth->user($id)->row();
		$groups = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim|required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim|required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					// Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
						{
							$this->ion_auth->add_to_group($grp, $id);
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$this->redirectUser();

				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					$this->redirectUser();

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		);

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('group_name'),
			);
			$this->data['description'] = array(
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('description'),
			);

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_group', $this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('auth', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("auth", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';

		$this->data['group_name'] = array(
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => $this->form_validation->set_value('group_name', $group->name),
			$readonly => $readonly,
		);
		$this->data['group_description'] = array(
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('group_description', $group->description),
		);

		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue')){
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

}
