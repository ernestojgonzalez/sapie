<?php  if ( ! defined('BASEPATH')) exit('No hay acceso directo a la aplicación.');
/**********************************/
/* Vista Inicial de la aplicación */
/**********************************/
class Home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}

    function index(){
        $this->load->view("home");
    }

}
?>
