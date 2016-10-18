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

class parametro_model extends CI_Model {

    private $table = 'parametro';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    public function getParametros() {
        $query = $this->db->get($this->table);
        $arr = [];
        foreach ($query->result() as $row) {
            $arr[] = $row;
        }
        return json_encode($arr);
    }

}

?>