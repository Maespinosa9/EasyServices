<?php

/*
 * 11/10/2016
 * Proyecto: EasyServices 
 * Archivo: JB_Controller.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador Propio
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class JB_Controller extends CI_Controller {

    public $alerta = '';
    public $arr = array();

    public function __construct() {
        parent::__construct();
        if (!$this->session->get_userdata('logged_in') || $this->session->get_userdata('logged_in') === null) {
            redirect('index');
        }
        $arrSession = $this->session->get_userdata('logged_in');
        $this->arr['nav'] = $this->load->view('templates/Nav', ['usuario' => $arrSession['logged_in']['USUARIO']], true);
        $arrAlerta = $this->session->userdata('alerta');
        if ($arrAlerta !== null) {
            $this->alerta = $this->load->view('templates/Alertas', $arrAlerta, true);
        }
    }

    /**
     * <p>
     * Este metodo asigna  las alertas <b>CRITICAS</b>.
     * Usarse en excepciones de Modelo o de Controlador
     * En caso contrario usar alertas.js vista
     * <p>
     * @param boolean $bEstado Estado de notificación  de la alerta  TRUE = Desplegable  FALSE = No  Desplegable
     * @param string $sMensaje Mensaje asignado ala alerta
     * @param claseCSS $clTipo Tipo de alerta  <b>{alert-success,alert-info,alert-warning,alert-danger}</b>
     * @param boolean $bIntermitencia  Manipulacion de la alerta TRUE = Permanente con opcion de cierre  FALSE = Permanente 
     */
    public function setAlerta($bEstado = false, $sMensaje = NULL, $clTipo = NULL, $bIntermitencia = NULL) {
        $Alerta = [
            'bEstado' => $bEstado,
            'sMensaje' => $sMensaje,
            'clTipo' => $clTipo,
            'bIntermitencia' => $bIntermitencia];
        $this->session->set_flashdata('alerta', $Alerta);
    }

}
