<?php

class home extends CI_Controller {

    public function index() {
        //Valiadcion de sesion para cada pantalla
        if (!$this->session->userdata('logged_in')) {
            redirect('index', 'refresh');
        }
        //Manera para luego hacer el menu dinamico
        $arrSession = $this->session->get_userdata('logged_in');
        $arr['nav'] = $this->load->view('templates/Nav', ['usuario' => $arrSession['logged_in']['USUARIO']], false);
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $arr['nav']);
        $this->load->view('pages/home');
        $this->load->view('templates/Footer');
    }

}
