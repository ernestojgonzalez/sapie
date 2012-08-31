<?php
if ( ! defined('BASEPATH')) exit('No hay acceso directo al script.');
/**
   En esta clase se encuentran metodos que facilitan la vida para trabajar de forma integrada con el framework
   php CodeIgniter y el framework jqGrid.   
*/
/**
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 <http://www.gnu.org/licenses/>.

 *********************************************************************************
 Este programa es software libre: usted puede redistribuirlo y / o modificar
 * Bajo los términos de la GNU General Public License publicada por
 * la Free Software Foundation, bien de la versión 3 de la Licencia, o
 * cualquier versión posterior.
 *
 * Este programa se distribuye con la esperanza de que sea útil,
 * pero SIN NINGUNA GARANTÍA, incluso sin la garantía implícita de
 * COMERCIALIZACIÓN o IDONEIDAD PARA UN PROPÓSITO PARTICULAR. Consulte la
 * Licencia Pública General GNU para más detalles.
 <http://www.gnu.org/licenses/>.
 * 
 * @author Manuel Alejandro Marquez Ortiz <punketo28@gmail.com>
 * A.K.A. @punketo28
 * @date 2011/01/07
 */

class Atajo
{  
    function __construct()
    {
        $this->CI = & get_instance();
    }
  
    //Metodo que me hace las operaciones CUD (Create, Update, Delete). 
    function cud($campos, $table, $pkey, $valuePkey, $oper){    

        //Nos aseguramos que los campos a trabajar tengan algún valor
        foreach ($campos as $key => $value){
            if (!empty($value))
                $arrayCampos[$key] = $value;
        }    

        switch($oper){

        case 'edit':	  
            $this->CI->db->trans_start();
            $this->CI->db->where($pkey[0], $valuePkey)->update($table, $arrayCampos);
            $this->CI->db->trans_complete();
            return $this->db->trans_status();
            break;                                                         

        case 'add':	  
            $this->CI->db->trans_start();
            $this->CI->db->insert($table, $arrayCampos);          	  
            $this->CI->db->trans_complete();
            return $this->db->trans_status();
            break;
            
        case 'del':
            $this->CI->db->trans_start();
            if(count($pkey) > 1){
                foreach($pkey as $key => $value)
                    $this->CI->db->where($key, $value);
                $this->CI->db->delete($table);
            }
            else{
                $this->CI->db->delete($table, array($pkey[0] => $valuePkey));
                break;    
            }          
            $this->CI->db->trans_complete();
            return $this->db->trans_status();
        }

    }
  
    //Método para obetener las opciones de un select cuyos valores estan en base de datos.
    function getOptionsForSelect($data, $keyOnValue=false, $optionSelected=false){		
        $query=$this->CI->db->query($data['SQL']);
        if($query->num_rows()>0){
            $options = "<option value=''>SELECCIONE</option>";      
            foreach($query->result() AS $fila ){
                if($optionSelected != false){
                    if($fila->$data['KEY'] == $optionSelected)
                        $cierre = " selected>";
                    else
                        $cierre = " >";  
                }
                else
                    $cierre = " >";
                if($keyOnValue)
                    $options .= "<option value='".$fila->$data['KEY']."' $cierre".$fila->$data['KEY'].' '.$fila->$data['VALUE']."</option>";
                else    
                    $options .= "<option value='".$fila->$data['KEY']."' $cierre".$fila->$data['VALUE']."</option>";
            }
        }else $options = "<option value=''>NO HAY REGISTROS DISPONIBLES</option>";
        return $options;
    }
  
}
?>
