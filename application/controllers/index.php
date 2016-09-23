<?php

class index extends CI_Controller {

    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        $this->load->helper(['form']);
        $this->load->view('templates/Header');
        $this->load->view('pages/index');
        $this->load->view('templates/Footer');
    }

   

}

?>