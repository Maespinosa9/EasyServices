<?php

class index extends CI_Controller {

    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('home', 'refresh');
        }
        $this->load->helper(['form']);
        $this->load->view('templates/Header');
        $this->load->view('pages/index');
        $this->load->view('templates/Footer');
    }

    function cerrar() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('index', 'refresh');
    }

}

?>