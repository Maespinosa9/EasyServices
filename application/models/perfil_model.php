<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class perfil_model extends CI_Model {

    private $table = 'perfil';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getPerfile($nIdPerfil = NULL) {
        if ($nIdPerfil != NULL) {
            $arrDatos = ['ID_PERFIL' => $nIdPerfil];
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

    function AddPerfil($arrData) {
        $bBan = $this->db->insert($this->table, [ 'NOMBRE' => $arrData['NOMBRE'],
            'DESCRIPCION' => $arrData['DESCRIPCION']
        ]);
        return $bBan;
    }

    function UpdatePerfil($arrData, $nID) {
        $this->db->where('ID_PERFIL', $nID);
        $this->db->update('perfil', $arrData);
        return $this->db->affected_rows();
    }

}

?>
 