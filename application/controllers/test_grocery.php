<?php  if ( ! defined('BASEPATH')) exit('No se vista que no va!');
/*Probando Grocery CRUD*/
class Test_grocery extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

    function plenarias(){
		$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("plenarias");		
		$this->grocery_crud->set_table('plenarias');
		$this->grocery_crud->columns('eje','municipio','parroquia','fecha','observacion');
		$this->grocery_crud->fields('eje','municipio','parroquia','fecha','observacion');
		$this->grocery_crud->add_fields('eje','municipio','parroquia','fecha','observacion');
		$this->grocery_crud->edit_fields('fecha','observacion');
		$this->grocery_crud->display_as('eje','Eje de la Plenaria');
		$this->grocery_crud->display_as('municipio','Municipio de la Plenaria');
		$this->grocery_crud->display_as('parroquia','Parroquia de la Plenaria');
		$this->grocery_crud->display_as('fecha','Fecha de la Plenaria');
		$this->grocery_crud->display_as('observacion','Observaciones realizadas en la Plenaria');
		$this->grocery_crud->required_fields('eje','municipio','parroquia','fecha','observacion');
		$this->grocery_crud->add_action('Propuestas', base_url().'application/assets/images/txt.png', 'test_grocery/propuestas');
		$this->grocery_crud->add_action('Participantes', base_url().'application/assets/images/person.png', 'test_grocery/plenarias_participantes');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	
	function propuestas(){
		$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("propuestas");		
		$this->grocery_crud->set_table('propuestas');
		$this->grocery_crud->columns('nombre','area_inversion','plenaria','municipio','parroquia', 'razon', 'representante','representante_tlf','representante_tlf2','representante_email','colectivo','descripcion');
		$this->grocery_crud->fields('nombre','area_inversion','plenaria','municipio','parroquia','razon','representante','representante_tlf','representante_tlf2','representante_email','colectivo','descripcion');
		$this->grocery_crud->add_fields('nombre','area_inversion','plenaria','municipio','parroquia','razon','representante','representante_tlf','representante_tlf2','representante_email','colectivo','descripcion');
		$this->grocery_crud->edit_fields('nombre','descripcion', 'representante_tlf','representante_tlf2');
		$this->grocery_crud->display_as('nombre','Nombre de la Propuesta');
		$this->grocery_crud->display_as('area_inversion','Area de Inversion');
		$this->grocery_crud->display_as('plenaria','Plenaria Movil');
		$this->grocery_crud->display_as('municipio','Municipio de la propuesta');
		$this->grocery_crud->display_as('parroquia','Parroquia de la propuesta');
		$this->grocery_crud->display_as('razon','Razon Social');
		$this->grocery_crud->display_as('representante','Representante');
		$this->grocery_crud->display_as('representante_tlf','Telefono del Representante');
		$this->grocery_crud->display_as('representante_tlf2','Telefono opcional del Representante');
		$this->grocery_crud->display_as('representante_email','Correo del Representante');
		$this->grocery_crud->display_as('colectivo','Colectivo Presente');
		$this->grocery_crud->display_as('descripcion','Descripcion de la Propuesta');
		$this->grocery_crud->required_fields('nombre','area_inversion','plenaria','municipio','parroquia', 'razon');
		$this->grocery_crud->add_action('Participantes', base_url().'application/assets/images/person.png', 'test_grocery/plenarias_participantes');
		$this->grocery_crud->callback_field('representante_tlf',array($this,'field_callback_1'));
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
		
	} 
	
	function field_callback_1($value = '', $primary_key = null)
{
    return '+58 <input type="text" maxlength="50" value="'.$value.'" name="phone" style="width:462px">';
} 
	
	function plenarias_participantes(){	
		$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("Participante");		
		$this->grocery_crud->set_table('plenarias_participantes');
		$this->grocery_crud->columns('nombre', 'colectivo', 'tlf','email','plenaria');
		$this->grocery_crud->edit_fields('tlf','email');
		$this->grocery_crud->display_as('nombre','Nombre y Apellido');
		$this->grocery_crud->display_as('coletivo','Colectivo al que pertenece');
		$this->grocery_crud->display_as('tlf','Telefono');
		$this->grocery_crud->display_as('email','Correo');
		$this->grocery_crud->display_as('plenaria','Plenaria participante');
		$this->grocery_crud->required_fields('nombre','tlf','plenaria');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}

	function test_required_fields(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("propuestas");		
		$this->grocery_crud->set_table('propuestas');
		$this->grocery_crud->columns('nombre', 'razon', 'representante','representante_tlf','representante_email','descripcion');
		$this->grocery_crud->add_fields('nombre','razon','representante','representante_tlf','representante_email','descripcion');
		$this->grocery_crud->display_as('nombre','Nombre de la Propuesta');
		$this->grocery_crud->display_as('razon','Razon Social');
		$this->grocery_crud->display_as('representante','Representante');
		$this->grocery_crud->display_as('representante_tlf','Telefono del Representante');
		$this->grocery_crud->display_as('representante_email','Correo del Representante');
		$this->grocery_crud->display_as('descripcion','Descripcion de la Propuesta');
		$this->grocery_crud->required_fields('nombre', 'razon');
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	
	function test_callback_add_field(){
		//$this->grocery_crud->set_theme("datatables");		
		$this->grocery_crud->set_subject("propuestas");		
		$this->grocery_crud->set_table('propuestas');
		$this->grocery_crud->columns('nombre', 'razon', 'representante','representante_tlf','representante_email','descripcion');
		$this->grocery_crud->add_fields('nombre','razon','representante','representante_tlf','representante_email','descripcion');
		$this->grocery_crud->display_as('nombre','Nombre de la Propuesta');
		$this->grocery_crud->display_as('razon','Razon Social');
		$this->grocery_crud->display_as('representante','Representante');
		$this->grocery_crud->display_as('representante_tlf','Telefono del Representante');
		$this->grocery_crud->display_as('representante_email','Correo del Representante');
		$this->grocery_crud->display_as('descripcion','Descripcion de la Propuesta');
		$this->grocery_crud->required_fields('nombre', 'razon');
		$this->grocery_crud->callback_add_field('representante_tlf',array($this, 'addCallbackrepresentante_tlf'));
		$this->grocery_crud->add_action('Ver Mensaje', base_url().'application/assets/images/msg.png', 'test_grocery/showMessage');
		$output = $this->grocery_crud->render();
		$this->invocaVista($output);
	}
	function addCallbackrepresentante_tlf(){
		return '<span style="color:ffffff">(+58)</span> <input type="text" maxlength="50" value="" name="phone" style="width:200px">';
	}
		
	function invocaVista($output){
		$this->load->view('test_grocery', $output);
	}
}
?>
