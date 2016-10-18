<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 06/09/2016
 * Proyecto: EasyServices 
 * Archivo: ciudad.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador ciudades
 * ******** MODELS *********
 * @property Cliente_model $cliente_model
 */

/**
 * 
 * @property Ciudad_model $ciudad_model
 */
class Ciudad extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ciudad_model');
        
    }

    function index() {
        
    }

    function getCiudades() {
        header('Content-Type: application/json');
        echo $this->ciudad_model->getCiudades();
    }

}
