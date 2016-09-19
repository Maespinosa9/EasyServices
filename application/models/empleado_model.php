<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {

    private $table = 'empleado';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function AddEmpleado($data) {
        $bBan = $this->db->insert('empleado', array('DOC_EMPLEADO' => $data['DOC_EMPLEADO'],
            'NOMBRES' => $data['NOMBRES'],
            'APELLIDOS' => $data['APELLIDOS'],
            'CIUDAD_ID' => $data['CIUDAD_ID'],
            'DIRECCION' => $data['DIRECCION'],
            'TELEFONO' => $data['TELEFONO'],
            'FECHA_NACIMIENTO' => $data['FECHA_NACIMIENTO'],
            'E_MAIL' => $data['E_MAIL'],
            'ESTADO_CIVIL' => $data['ESTADO_CIVIL'],
            'CANT_HIJOS' => $data['CANT_HIJOS'],
            'RUTA_FOTO' => $data['RUTA_FOTO'],
            'RUTA_HUELLA' => $data['RUTA_HUELLA'],
            'NIVEL_ACADEMICO' => $data['NIVEL_ACADEMICO'],
            'TIPO_EMPLEADO' => $data['TIPO_EMPLEADO']));

        return $bBan;
    }

    public function getEmpleados() {
        $query = $this->db->get('empleado');
        $arr = [];
        foreach ($query->result() as $row) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

}

?>