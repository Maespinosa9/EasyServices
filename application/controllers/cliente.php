<?php
class cliente extends CI_Controller {
   function index(){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');
      
      // // //cargo el modelo de artículos
      $this->load->model('cliente_model');
      
      // // //pido los ultimos artículos al modelo
      $Clients = $this->Cliente->get_clients();
      
      // // //creo el array con datos de configuración para la vista
      $datos_vista = array('clients' => $Clients);
      $this->load->view('templates/Header');
      //cargo la vista pasando los datos de configuacion
      $this->load->view('pages/Cliente');
      $this->load->view('templates/Footer');
   }

   function AddClient(){
      $this->load->view('templates/Header');
      //cargo la vista pasando los datos de configuacion
      $this->load->view('pages/EditClient');
      $this->load->view('templates/Footer');
   }
}
?>