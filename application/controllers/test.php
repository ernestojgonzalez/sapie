<?php
	class Test extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->library("form_validation");
		}
		
		function index(){
			$this->load->view("test-view");
		}
		
		function recibeDatos(){
			
			$name = $this->input->post("name");
			$email = $this->input->post("email");
			$birth = $this->input->post("birth");
			
			//Rules
			$this->form_validation->set_rules("name","Nombre","required");
			$this->form_validation->set_rules("email","Correo","valid_email|required");
			$this->form_validation->set_rules("birth","Fecha de Nacimiento","required");
			
			//Personalizando Mensajes
			$this->form_validation->set_message("required", "El campo %s es requerido"); //Requerido
			$this->form_validation->set_message("valid_email", "El correo no es válido!"); //email válido
			
			if($this->form_validation->run() === FALSE)
				$this->load->view("test-view");	
			else{
				$datos = array(
					"name" => $name,
					"email" => $email,
					"birth" => $birth,
				);
				$this->db->insert("test", $datos);
				$this->load->view("success", $datos);	
			}
		}
	}
?>
