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
 * Controlador Parametro
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro extends CI_Controller {

    private $arrDatos = [
        'sTitulo' => 'Parametro',
        'sCallMode' => false,
        'sControlador' => 'Parametro'];
    private $arr = array();

    function __construct() {
        parent::__construct();
        $this->load->model('parametro_model');
        $arrSession = $this->session->get_userdata('logged_in');
        $this->arr['nav'] = $this->load->view('templates/Nav', ['usuario' => $arrSession['logged_in']['USUARIO']], true);
    }

    function index() {
        $arr['alerta'] = '';
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/table_parametrica',$this->arrDatos);
        $this->load->view('templates/Footer');
    }

    function Datos() {
        header('Content-Type: application/json');
        $arrDatos = $this->parametro_model->getParametros();
        echo ($arrDatos);
    }

}
