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
 * @property usuario_model $usuario_model
 */
class usuario extends JB_Controller {

    private $arrDatos = [
        'sTitulo' => 'Usuario',
        'sCallMode' => false,
        'sControlador' => 'usuario'];

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    function index() {
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/Usuario', array_merge(['alerta' => $this->alerta], $this->arrDatos));
        $this->load->view('templates/Footer');
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
                redirect('usuario');
            case 'Crea':
                $arr['alerta'] = '';
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/UsuarioForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Usuario']));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                $arrDatos = $this->usuario_model->getUsuarios($_POST['DOCUMENTO']);
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/UsuarioForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Usuario', 'arrDatos' => $arrDatos]));
                $this->load->view('templates/Footer');
                break;
            default :
                redirect('usuario');
        }
    }

    function Datos() {
        header('Content-Type: application/json');
        $arrDatos = $this->usuario_model->getUsuarios();
        echo json_encode($arrDatos);
    }

    function Crea() {
        $arrDatos = [
            'DOCUMENTO' => $this->input->post('DOCUMENTO'),
            'NOMBRES' => $this->input->post('NOMBRES'),
            'APELLIDOS' => $this->input->post('APELLIDOS'),
            'E_MAIL' => $this->input->post('E_MAIL'),
            'TELEFONO' => $this->input->post('TELEFONO'),
            'LOGIN' => $this->input->post('LOGIN'),
            'PASS' => '123456',
            'ID_PERFIL' => $this->input->post('ID_PERFIL')
        ];
        ($this->usuario_model->AddUsuario($arrDatos)) ? $this->setAlerta(TRUE, 'Creación exitosa del valor', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->usuario_model->_error_message(), 'alert-warning', TRUE);
        redirect('usuario');
    }

    function Modifica() {
        $arrDatos = [
            'NOMBRES' => $this->input->post('NOMBRES'),
            'APELLIDOS' => $this->input->post('APELLIDOS'),
            'E_MAIL' => $this->input->post('E_MAIL'),
            'TELEFONO' => $this->input->post('TELEFONO'),
            'LOGIN' => $this->input->post('LOGIN'),
            'PASS' => $this->input->post('PASS'),
            'ID_PERFIL' => $this->input->post('ID_PERFIL'),
            'ACTIVO' => $this->input->post('ACTIVO')
        ];
        (($this->usuario_model->UpdateUsuario($arrDatos, $this->input->post('DOCUMENTO'))) > 0) ? $this->setAlerta(TRUE, 'Modificación exitosa del usuario', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->usuario_model->_error_message(), 'alert-warning', TRUE);
        redirect('usuario');
    }

}
