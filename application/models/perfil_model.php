<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class perfil_model extends CI_Model {

    private $table = 'perfil';
    public $error = array();

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

    public function getPerfilModulo($nIdPerfil = NULL) {
        if ($nIdPerfil != NULL) {
            $arrDatos = ['ID_PERFIL' => $nIdPerfil];
            $query = $this->db->get_where('perfil_modulo', $arrDatos);
        } else {
            $query = $this->db->get('perfil_modulo');
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

    function AddPerfilModulo($arrData) {
        try {
            $bBan = $this->db->insert('modulo_perfil', [ 'ID_PERFIL' => $arrData['ID_PERFIL'],
                'ID_MODULO' => $arrData['ID_MODULO']
            ]);
            if ($bBan !== TRUE) {
                $this->error = $this->db->error();
                throw new Exception('error');
            }
            return $bBan;
        } catch (Exception $e) {
            return false;
        }
    }

    function UpdatePerfil($arrData, $nID) {
        $this->db->where('ID_PERFIL', $nID);
        $this->db->update('perfil', $arrData);
        return $this->db->affected_rows();
    }

}

?>
 