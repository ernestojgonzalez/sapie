<?php  if ( ! defined('BASEPATH')) exit('No se vista que no va!');
/*Probando Grocery CRUD*/
class Test_grocery extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function employees(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Empleados");		
		$this->grocery_crud->set_table('employees');
		$this->grocery_crud->columns('lastName', 'firstName', 'email');
		$this->grocery_crud->fields('lastName','firstName','extension');
		$this->grocery_crud->display_as('lastName','Apellido');
		$this->grocery_crud->display_as('firstName','Nombre');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	
	function test_add_fields(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Empleados");		
		$this->grocery_crud->set_table('employees');
		$this->grocery_crud->columns('lastName', 'firstName', 'email');
		$this->grocery_crud->add_fields('lastName','firstName','extension');
		$this->grocery_crud->display_as('lastName','Apellido');
		$this->grocery_crud->display_as('firstName','Nombre');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	
	function test_edit_fields(){	
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Empleados");		
		$this->grocery_crud->set_table('employees');
		$this->grocery_crud->columns('lastName', 'firstName', 'email');
		$this->grocery_crud->edit_fields('lastName','firstName','extension');
		$this->grocery_crud->display_as('lastName','Apellido');
		$this->grocery_crud->display_as('firstName','Nombre');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}

	function test_required_fields(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Empleados");		
		$this->grocery_crud->set_table('employees');
		$this->grocery_crud->columns('lastName', 'firstName', 'email');
		$this->grocery_crud->add_fields('lastName','firstName','extension');
		$this->grocery_crud->display_as('lastName','Apellido');
		$this->grocery_crud->display_as('firstName','Nombre');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->required_fields('email', 'lastName');
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	
	function test_callback_add_field(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Empleados");		
		$this->grocery_crud->set_table('employees');
		$this->grocery_crud->columns('lastName', 'firstName', 'email');
		$this->grocery_crud->add_fields('lastName','firstName','extension');
		$this->grocery_crud->display_as('lastName','Apellido');
		$this->grocery_crud->display_as('firstName','Nombre');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->required_fields('lastName');
		$this->grocery_crud->callback_add_field('lastName',array($this, 'addCallbackLastname'));
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	function addCallbackLastname(){
		return '<span style="color:ffffff">*</span> <input type="text" maxlength="50" value="" name="phone" style="width:200px">';
	}
		
	function invocaVista($output){
		$this->load->view('test_grocery', $output);
	}
	
	function showMessage($pkey){
		$query = $this->db->get_where("employees", array("employeeNumber" => $pkey));
		$row = $query->row_array();
		echo "hola {$row['firstName']} como te va? ";
	}
}
?>
