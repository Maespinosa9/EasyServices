<?php

class home extends CI_Controller {

    public function index() {
        //Manera para luego hacer el menu dinamico
        $arr['nav'] = $this->load->view('templates/Nav', [], false);
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $arr['nav']);
        $this->load->view('pages/home');
        $this->load->view('templates/Footer');
    }

}
