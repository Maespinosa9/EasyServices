<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Parametro extends CI_Controller {
    function __construct() {
        parent::__construct();
        //$this->load->model('cliente_model');
    }
    
    function index() {
        $this->load->view('templates/Header');
        $this->load->view('pages/Parametro');
        $this->load->view('templates/Footer');
    }
    
    function EditParametro(){
        $this->load->view('templates/Header');
        $this->load->view('pages/EditParam');
        $this->load->view('templates/Footer');
    } 
}