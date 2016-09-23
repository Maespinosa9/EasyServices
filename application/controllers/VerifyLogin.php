<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', '', TRUE);
    }

    function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'usuario', 'trim|required');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'trim|required|callback_check_database');
        $this->form_validation->run();
        if (count($this->form_validation->error_array()) > 0) {
            echo json_encode(['estado' => false, 'errores' => $this->form_validation->error_array()]);
        } else {
            echo json_encode(['estado' => true]);
        }
    }

    function check_database($password) {
        $username = $this->input->post('usuario');
        $result = $this->usuario_model->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'DOCUMENTO' => $row->DOCUMENTO,
                    'LOGIN' => $row->LOGIN
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Usuario o Contraseña Invalida');
            return false;
        }
    }

}

?>