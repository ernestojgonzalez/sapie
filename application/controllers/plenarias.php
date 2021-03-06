<?php if ( ! defined('BASEPATH')) exit('No hay acceso directo al script');

class Plenarias extends CI_Controller {

	public function index()
	{
		
	}

    public function getDataForGrid(){
        $this->db->select('plenarias.id, eje.nombre eje, municipio.nombre municipio, parroquia.nombre parroquia, lugar, fecha, observacion');
        $this->db->from('plenarias');
        $this->db->join('parroquia', 'parroquia.id = plenarias.parroquia');
        $this->db->join('municipio', 'municipio.id = parroquia.id_municipio');
        $this->db->join('eje', 'eje.id = municipio.id_eje');        
        $query = $this->db->get();
        $data = $query->result_array();
        header("Content-type: application/json");
        echo "{\"data\":" .json_encode($data). "}";
    }

    public function crud($action){
        //En este método usamos el método cud de la libreria Atajo function cud($campos, $table, $pkey, $valuePkey, $oper)    
        switch($action){
        case "edit":
            $campos    = $this->input->post();
            $table     = 'plenarias';
            $pkey      = array('id');
            $valuePkey = $campos['id'];
            $oper      = 'edit';
            unset($campos['eje'], $campos['municipio']);
            $response  = $this->atajo->cud($campos, $table, $pkey, $valuePkey, $oper);
            if (!$response) 
                echo json_encode(array('response' => 'success'));
            else {
                header("HTTP/1.1 500 Internal Server Error");
                echo "No se pudo ejecutar la modificación de los datos para la plenaria con ID " . $campos['id'];
            }
            break;
        case "create":
            $campos    = $this->input->post();
            $table     = 'plenarias';
            $oper      = 'add';
            unset($campos['eje'], $campos['municipio']);
            $response  = $this->atajo->cud($campos, $table, null, null, $oper);
            if (!$response) 
                echo json_encode(array('response' => 'success'));
            else {
                header("HTTP/1.1 500 Internal Server Error");
                echo "No se pudo ejecutar la inserción de la plenaria";
            }
        case "destroy":

            break;
            
        }
    }
    
}
