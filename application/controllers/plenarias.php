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
        switch($action){
        case "edit":
            callback();
            break;
        case "create":
            callback();
            break;
        case "destroy":
            callback();
            break;
            
        }
    }
    
    public function getParticipantesPlenarias($plenariaId){
        $query = $this->db->get_where('plenarias_participantes', array('plenaria' => $plenariaId));
        $data = $query->result_array();
        header("Content-type: application/json");
        echo "{\"data\":" .json_encode($data). "}";
    }
}
