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

}

?>
 