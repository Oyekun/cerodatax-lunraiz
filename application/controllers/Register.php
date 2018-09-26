<?php
class Register extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Register_model", "registerModel");
    }

    public function index(){
        $data = array("titulo" => "Formulario para obtener una api key");
        $this->load->helper('url');
        $this->load->view("register_view", $data);
    }

    public function newApiKey()
    {
        if($this->input->post("miApiKey") != "")
        {
            //creamos una api key de forma super sencilla
            /*
             * level a false
             * ignore_limits a false, así pueden acceder sin límites
             * is_private_key a false, la api es pública
             * al ser pública, ip_addresses no debe contener ninguna ip para poder acceder
             */
            $generate = $this->registerModel->new_api_key($level = 0,$ignore_limits = 0,$is_private_key = 0,$ip_addresses = "",$user_id = "");
            if($generate){
                //imprimimos de mala manera la api key para poder utilizarla, está claro que esto hay que cambiarlo
                echo $generate;
            }else{
                show_404("Ha ocurrido un error");
            }
        }else{
            show_404("Ha ocurrido un error");
        }
    }
}