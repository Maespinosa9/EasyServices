<?php

/*
 * 01/10/2016
 * Proyecto: EasyServices 
 * Archivo: parametro.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador configuracion
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class configuracion extends JB_Controller {

    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/configuracion', ['alerta' => $this->alerta]);
        $this->load->view('templates/Footer');
    }

}

?>