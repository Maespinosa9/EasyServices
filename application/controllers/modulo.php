<?php

/*
 * 09/10/2016
 * Proyecto: EasyServices 
 * Archivo: valor.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador Valor
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property modulo_model $modulo_model
 */
class modulo extends JB_Controller {

    private $arrDatos = [
        'sTitulo' => 'Modulo',
        'sCallMode' => false,
        'sControlador' => 'modulo'];

    function __construct() {
        parent::__construct();
        $this->load->model('modulo_model');
    }

    function index() {
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
                redirect('Perfil');
            case 'Crea':
                $arr['alerta'] = '';
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/PerfilForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Perfil']));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                $arrDatos = $this->perfil_model->getPerfile($_POST['ID_PERFIL']);
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/PerfilForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Perfil', 'arrDatos' => $arrDatos]));
                $this->load->view('templates/Footer');
                break;
            default :
                redirect('Perfil');
        }
    }

    function Datos() {
        header('Content-Type: application/json');
        $arrDatos = $this->modulo_model->getModulo();
        echo json_encode($arrDatos);
    }

    function Crea() {
    }

    function Modifica() {
    }

}
