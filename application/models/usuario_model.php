<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model {

    private $table = 'usuario';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($sUsario, $pContraseña) {
        $this->db->select('DOCUMENTO, NOMBRES, APELLIDOS,LOGIN,PASS');
        $this->db->from($this->table);
        $this->db->where('LOGIN', $sUsario);
        $this->db->where('PASS', $pContraseña);
        $this->db->where('ACTIVO', 1);
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getUsuarios($nDocumento = NULL) {
        if ($nDocumento != NULL) {
            $arrDatos = ['DOCUMENTO' => $nDocumento];
            $query = $this->db->get_where($this->table, $arrDatos);
        } else {
            $query = $this->db->get($this->table);
        }

        $arr = [];
        foreach ($query->result() as $row) {
            $arr[] = $row;
        }
        return ($arr);
    }

    function AddUsuario($arrData) {
        $bBan = $this->db->insert($this->table, [
            'DOCUMENTO' => $arrData['DOCUMENTO'],
            'NOMBRES' => $arrData['NOMBRES'],
            'APELLIDOS' => $arrData['APELLIDOS'],
            'E_MAIL' => $arrData['E_MAIL'],
            'TELEFONO' => $arrData['TELEFONO'],
            'LOGIN' => $arrData['LOGIN'],
            'PASS' => $arrData['PASS'],
            'ID_PERFIL' => $arrData['ID_PERFIL'],
            'PERSONA_CREACION' => $this->session->get_userdata('logged_in')['logged_in']['LOGIN']
        ]);
        return $bBan;
    }

    function UpdateUsuario($arrData, $nDocumento) {
        $this->db->where('DOCUMENTO', $nDocumento);
        $this->db->update($this->table, $arrData);
        return $this->db->affected_rows();
    }

}

?>
 