<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ******** MODELS *********
 * @property Cliente_model $cliente_model
 */
class Cliente extends CI_Controller {

    private $arr;
    function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->library('session');
        $this->arr['nav'] = $this->load->view('templates/Nav', [], true);
    }

    function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('index', 'refresh');
        }
        //Manera para luego hacer el menu dinamico
        $arrSession = $this->session->get_userdata('logged_in');
        //Manera para luego hacer el menu dinamico
        $arr['nav'] = $this->load->view('templates/Nav', ['usuario' => $arrSession['logged_in']['USUARIO']], false);
        //Puedo necesitar pantallas con header pero sin nav
        $this->load->view('templates/Header', $this->arr['nav']);
        $this->load->view('pages/Cliente');
        $this->load->view('templates/Footer');
    }
            
    function EditClient() {
        $this->load->view('templates/Header', $this->arr['nav']);
        $this->load->view('pages/EditClient', $Title = "Crear Cliente");
        $this->load->view('templates/Footer');
    }

    function saveClient() {
        $data = json_decode($_POST['data']);
        //$this->cliente_model->AddCliente($data);
        print_r($data);
        return $data;
    }

    function getClients() {
        $arrDatos = $this->cliente_model->getClients();
        echo ($arrDatos);
    }
    
    function GetTypeHouse(){
        header('Content-Type: application/json');
        echo $this->cliente_model->getTipoVivienda();
    }
   
}

?>
