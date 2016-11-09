<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class modulo_model extends CI_Model {

    private $table = 'modulo';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getModulo($nIdModulo= NULL) {
        if ($nIdModulo != NULL) {
            $arrDatos = ['ID_MODULO' => $nIdModulo];
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

    function AddModulo($arrData) {
        $bBan = $this->db->insert($this->table, [ 'NOMBRE' => $arrData['NOMBRE']   
        ]);
        return $bBan;
    }

    function UpdatePerfil($arrData, $nID) {
        $this->db->where('ID_MODULO', $nID);
        $this->db->update($this->table, $arrData);
        return $this->db->affected_rows();
    }

}

?>
 