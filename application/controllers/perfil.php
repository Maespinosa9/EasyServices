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
 * @property valor_model $db
 */
class perfil extends JB_Controller {

    private $arrDatos = [
        'sTitulo' => 'Parametro',
        'sCallMode' => false,
        'sControlador' => 'perfil'];

    function __construct() {
        parent::__construct();
        $this->load->model('perfil_model');
    }

    function index() {
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/Perfil', array_merge(['alerta' => $this->alerta], $this->arrDatos));
        $this->load->view('templates/Footer');
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
        $arrDatos = $this->perfil_model->getPerfile();
        echo json_encode($arrDatos);
    }

    function Crea() {
        $arrDatos = [
            'NOMBRE' => $this->input->post('NOMBRE'),
            'DESCRIPCION' => $this->input->post('DESCRIPCION')
        ];
        ($this->perfil_model->AddPerfil($arrDatos)) ? $this->setAlerta(TRUE, 'Creación exitosa del pefil', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->valor_model->_error_message(), 'alert-warning', TRUE);
        redirect('perfil');
    }

    function Modifica() {
        $arrDatos = [
            'DESCRIPCION' => $this->input->post('DESCRIPCION'),
            'ACTIVO' => $this->input->post('ACTIVO'),
            'NOMBRE' => $this->input->post('NOMBRE')
        ];
        (($this->perfil_model->UpdatePerfil($arrDatos, $this->input->post('ID_PERFIL'))) > 0) ? $this->setAlerta(TRUE, 'Modificación exitosa del valor', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->valor_model->_error_message(), 'alert-warning', TRUE);
        redirect('perfil');
    }

}
