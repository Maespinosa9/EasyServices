<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {

   function __construct(){
      parent::__construct();
      $this->load->model('cliente_model');
   }


   function index(){
      $this->load->view('templates/Header');
      $this->load->view('pages/Cliente');
      $this->load->view('templates/Footer');
   }

   function saveClient(){
      $data = array('DOC_CLIENTE' => $this->input->post('DOC_CLIENTE'));
      $this->cliente_model->AddCliente($data);

   }
}
?>