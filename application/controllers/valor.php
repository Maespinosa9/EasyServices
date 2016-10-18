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
class valor extends JB_Controller {

    private $arrDatos = [
        'sTitulo' => 'Parametro',
        'sCallMode' => false,
        'sControlador' => 'valor'];

    function __construct() {
        parent::__construct();
        $this->load->model('valor_model');
    }

    function index($nParametro) {
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/table_valor', array_merge(['nParametro' => $nParametro, 'alerta' => $this->alerta], $this->arrDatos));
        $this->load->view('templates/Footer');
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
                redirect('parametro');
            case 'Crea':
                $arr['alerta'] = '';
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/valor_form', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Valor', 'nParametro' => $this->input->post('PARAMETRO')]));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                $arrDatos = $this->valor_model->getValores(NULL, $_POST['ID_VALOR']);
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/valor_form', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Parametro', 'arrDatos' => $arrDatos]));
                $this->load->view('templates/Footer');
                break;
            default :
                redirect('parametro');
        }
    }

    function Datos($nParametro) {
        header('Content-Type: application/json');
        $arrDatos = $this->valor_model->getValores($nParametro);
        echo json_encode($arrDatos);
    }

    function Crea() {
        $arrDatos = [
            'ID_PARAMETRO' => $this->input->post('ID_PARAMETRO'),
            'DESCRIPCION' => $this->input->post('DESCRIPCION')
        ];
        ($this->valor_model->AddValor($arrDatos)) ? $this->setAlerta(TRUE, 'Creación exitosa del valor', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->valor_model->_error_message(), 'alert-warning', TRUE);
        redirect('valor/index/' . $this->input->post('ID_PARAMETRO'));
    }

    function Modifica() {
        $arrDatos = [
            'DESCRIPCION' => $this->input->post('DESCRIPCION'),
            'ACTIVO' => $this->input->post('ACTIVO')
        ];
        (($this->valor_model->UpdateValor($arrDatos, $this->input->post('ID_VALOR'))) > 0) ? $this->setAlerta(TRUE, 'Modificación exitosa del valor', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->valor_model->_error_message(), 'alert-warning', TRUE);
        redirect('valor/index/' . $this->input->post('ID_PARAMETRO'));
    }

}
