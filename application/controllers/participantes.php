<?php if ( ! defined('BASEPATH')) exit('No hay acceso directo al script');

class Participantes extends CI_Controller {

	public function index()
	{
		
	}

    public function getDataForGrid($plenariaId){
        $query = $this->db->get_where('plenarias_participantes', array('plenaria' => $plenariaId));
        $data = $query->result_array();
        header("Content-type: application/json");
        echo "{\"data\":" .json_encode($data). "}";
    }

    public function crud($action){
        //En este método usamos el método cud de la libreria Atajo function cud($campos, $table, $pkey, $valuePkey, $oper)    
        switch($action){
        case "edit":
            $campos    = $this->input->post();
            $tables    = 'plenarias';
            $pkey      = array('id');
            $valuePkey = $campos['id'];
            $oper      = 'edit';
            $response  = $this->atajo->cud($campos, $table, $pkey, $valuePkey, $oper);
            if (!$response) 
                echo json_encode(array('response' => 'success'));
            else {
                header("HTTP/1.1 500 Internal Server Error");
                echo "No se pudo ejecutar la modificación de los datos para la plenaria con ID " . $campos['id'];
            }
            break;
        case "create":
            
            break;
        case "destroy":

            break;
            
        }
    }
    
    
}