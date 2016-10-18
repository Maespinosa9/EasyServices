<?php

/*
 * 06/09/2016
 * Proyecto: EasyServices 
 * Archivo: empleado.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador Empleados
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property empleado_model $empleado_model
 */
class Empleado extends JB_Controller {

    private $arrDatos = [
        'sTitulo' => 'Empleado',
        'sCallMode' => false,
        'sControlador' => 'Empleado'];

    function __construct() {
        parent::__construct();
        $this->load->model('empleado_model');
    }

    function index() {
        $arr['alerta'] = '';
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $this->arr);
        $this->load->view('pages/Empleado');
        $this->load->view('templates/Footer');
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
//                $this->setAlerta(true, 'CallMode no  se encuentra definido', 'alert-danger', true);
                redirect('Empleado');
            case 'Crea':
                $arr['alerta'] = '';
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Empleado']));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                $arrDatos = $this->empleado_model->getEmpleados($_POST['DOC_EMPLEADO']);
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                $this->load->view('templates/Header', $this->arr);
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Usuario', 'arrDatos' => $arrDatos]));
                $this->load->view('templates/Footer');
                break;
            case 'Elimina':
                $this->Elimina();
                break;
            default :
                redirect('Empleado');
        }
    }

    function Crea() {
        $sRutaFoto = '';
        $sRutaHuella = '';
        $config['upload_path'] = 'assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $this->load->library('upload', $config);
        $sFoto = $this->upload->do_upload('RUTA_FOTO');
        if (!$sFoto || empty($sFoto)) {
            $this->setAlerta(TRUE, $this->upload->display_errors(), 'alert-warning', TRUE);
            redirect('Empleado');
        } else {
            $data['archivo'] = $this->upload->data();
            $sRutaFoto = $data['archivo']['full_path'];
        }
        $sHuella = $this->upload->do_upload('RUTA_HUELLA');
        if (!$sHuella || empty($sHuella)) {
            $this->setAlerta(TRUE, $this->upload->display_errors(), 'alert-warning', TRUE);
            redirect('Empleado');
        } else {
            $data['archivo'] = $this->upload->data();
            $sRutaHuella = $data['archivo']['full_path'];
        }

        $arrDatos = [
            'DOC_EMPLEADO' => $this->input->post('DOC_EMPLEADO'),
            'NOMBRES' => $this->input->post('NOMBRES'),
            'APELLIDOS' => $this->input->post('APELLIDOS'),
            'DIRECCION' => $this->input->post('DIRECCION'),
            'TELEFONO' => $this->input->post('TELEFONO'),
            'CIUDAD_ID' => $this->input->post('CIUDAD_ID'),
            'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
            'E_MAIL' => $this->input->post('E_MAIL'),
            'ESTADO_CIVIL' => $this->input->post('ESTADO_CIVIL'),
            'CANT_HIJOS' => $this->input->post('CANT_HIJOS'),
            'NIVEL_ACADEMICO' => $this->input->post('NIVEL_ACADEMICO'),
            'TIPO_EMPLEADO' => $this->input->post('TIPO_EMPLEADO'),
            'RUTA_FOTO' => $sRutaFoto,
            'RUTA_HUELLA' => $sRutaHuella,
        ];
        ($this->empleado_model->AddEmpleado($arrDatos)) ? $this->setAlerta(TRUE, 'Creación exitosa del Empleado', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->usuario_model->_error_message(), 'alert-warning', TRUE);
        redirect('Empleado');
    }

    function Modifica() {
        $arrDatos = [
            'NOMBRES' => $this->input->post('NOMBRES'),
            'APELLIDOS' => $this->input->post('APELLIDOS'),
            'DIRECCION' => $this->input->post('DIRECCION'),
            'CELULAR' => $this->input->post('CELULAR'),
            'TELEFONO' => $this->input->post('TELEFONO'),
            'CIUDAD_ID' => $this->input->post('CIUDAD_ID'),
            'FECHA_NACIMIENTO' => $this->input->post('FECHA_NACIMIENTO'),
            'EDAD' => $this->input->post('EDAD'),
            'E_MAIL' => $this->input->post('E_MAIL'),
            'ESTADO_CIVIL' => $this->input->post('ESTADO_CIVIL'),
            'CANT_HIJOS' => $this->input->post('CANT_HIJOS'),
            'NIVEL_ACADEMICO' => $this->input->post('NIVEL_ACADEMICO'),
            'TIPO_EMPLEADO' => $this->input->post('TIPO_EMPLEADO'),
            'RUTA_FOTO' => $this->input->post('RUTA_FOTO'),
            'RUTA_HUELLA' => $this->input->post('RUTA_HUELLA'),
            'ESTADO' => $this->input->post('ESTADO')
        ];
        (($this->usuario_model->UpdateUsuario($arrDatos, $this->input->post('DOCUMENTO'))) > 0) ? $this->setAlerta(TRUE, 'Modificación exitosa del usuario', 'alert-info', TRUE) : $this->setAlerta(TRUE, $this->usuario_model->_error_message(), 'alert-warning', TRUE);
        redirect('usuario');
    }

    function Elimina() {
        
    }

    function Datos() {
        header('Content-Type: application/json');
        $arrDatos = $this->empleado_model->getEmpleados();
        echo json_encode($arrDatos);
    }

}

?>
