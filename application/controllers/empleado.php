<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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

class Empleado extends CI_Controller {

    private $arrDatos = [
        'sTitulo' => 'Empleado',
        'sCallMode' => false,
        'sControlador' => 'Empleado'];

    function __construct() {
        parent::__construct();
        $this->load->model('empleado_model');
        $this->load->library('session');
    }

    function index() {
        $arr['alerta'] = '';
        //Manera para luego hacer el menu dinamico
        $arr['nav'] = $this->load->view('templates/Nav', [], true);
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $arr);
        $this->load->view('pages/Empleado');
        $this->load->view('templates/Footer');
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
//                $this->setAlerta(true, 'CallMode no  se encuentra definido', 'alert-danger', true);
                redirect('Empleado');
            case 'Crea':
                //Manera para luego hacer el menu dinamico
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $arr);
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Empleado']));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                //Usar Modelo para cargar informacion
                //Manera para luego hacer el menu dinamico
                $arr['nav'] = $this->load->view('templates/Nav', [], true);
                //Puedo necesitar pantallas con header pero sin nav
                $this->load->view('templates/Header', $arr);
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Empleado']));
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
            $data['archivo'] = $this->upload->display_errors();
            $this->session->set_tempdata('alerta', $data, 10);
            redirect('Empleado');
        } else {
            $data['archivo'] = $this->upload->data();
            $sRutaFoto = $data['archivo']['full_path'];
        }
        $sHuella = $this->upload->do_upload('RUTA_HUELLA');
        if (!$sHuella || empty($sHuella)) {
            $data['archivo'] = $this->upload->display_errors();
            $this->session->set_tempdata('alerta', $data, 10);
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
        $data['alerta'] = ($this->empleado_model->AddEmpleado($arrDatos)) ? 'OK' : $this->empleado_model->_error_message();
        $this->session->set_tempdata('alerta', $data, 10);
//        redirect('Empleado');
    }

    function Modifica() {
        $this->load->view('', '$data');
    }

    function Elimina() {
        
    }

    function Datos() {
        $arrDatos = $this->empleado_model->getEmpleados();
        echo ($arrDatos);
    }

}

?>
