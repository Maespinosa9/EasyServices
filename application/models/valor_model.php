<?php

/*
 * 01/10/2016
 * Proyecto: EasyServices 
 * Archivo: parametro_model.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador Empleados
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class valor_model extends CI_Model {

    private $table = 'valor';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getValores($nParametro = NULL, $nIdValor = NULL) {
        $arrDatos = (($nIdValor == NULL && $nParametro != NULL) ? ['ID_PARAMETRO' => $nParametro] : ['ID_VALOR' => $nIdValor]);
        $query = $this->db->get_where($this->table, $arrDatos);
        $arr = [];
        foreach ($query->result() as $row) {
            $arr[] = $row;
        }
        return ($arr);
    }

    function AddValor($arrData) {
        $bBan = $this->db->insert($this->table, [ 'ID_PARAMETRO' => $arrData['ID_PARAMETRO'],
            'DESCRIPCION' => $arrData['DESCRIPCION'],
            'PERSONA_CREACION' => $this->session->get_userdata('logged_in')['logged_in']['LOGIN']
        ]);
        return $bBan;
    }

    function UpdateValor($arrData, $nID) {
        $this->db->where('ID_VALOR', $nID);
        $this->db->update('valor', $arrData);
        return $this->db->affected_rows();
    }

}

?>