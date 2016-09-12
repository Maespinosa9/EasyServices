<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 06/09/2016
 * Proyecto: EasyServices 
 * Archivo: empleado.php
 * Codificación: UTF-8 
 * Autor: Jaime A. Boyaca Silva :: janbs.eco@hotmail.com
 * 2016 (C) Janbs.
 * 
 * Descripción:
 * Controlador Empleados
 */

/**
 * ******** CONTROLLERS *********
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Language $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Security $security
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Template $template
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property Image_Upload $image_upload
 * @property Lang_Detect $lang_detect

 * ******** MODELS *********
 * @property Cliente_model $cliente_model
 */
class Empleado extends CI_Controller {

    private $arrDatos = [
        'sTitulo' => 'Empleado',
        'sCallMode' => false,
        'sControlador' => 'Empleado'];

    function __construct() {
        parent::__construct();
        $this->load->model('cliente_model');
    }

    function index() {
        $this->load->view('templates/Header');
        $this->load->view('pages/Empleado');
        $this->load->view('templates/Footer');
    }

    function EditEmpleado() {
        $this->load->view('templates/Header');
        $this->load->view('pages/EditEmpleado');
        $this->load->view('templates/Footer');
    }

    function saveClient() {
        $data = array('DOC_CLIENTE' => $this->input->post('DOC_CLIENTE'));
        $this->cliente_model->AddCliente($data);
    }

    function Form($sCallMode = false) {
        switch ($sCallMode) {
            case false:
//                $this->setAlerta(true, 'CallMode no  se encuentra definido', 'alert-danger', true);
                redirect('Empleado');
            case 'Crea':
                $this->load->view('templates/Header');
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Creación de Empleado']));
                $this->load->view('templates/Footer');
                break;
            case 'Modifica':
                //Usar Modelo para cargar informacion
                $this->load->view('templates/Header');
                $this->load->view('pages/EmpleadoForm', array_merge($this->arrDatos, ['sCallMode' => $sCallMode, 'sTitulo' => 'Modificación de Empleado']));
                $this->load->view('templates/Footer');
                break;
            case 'Elimina':
                $this->Elimina();
                break;
            default :
                redirect('Empleado');
        }
    }

    function Crea() {
        print_r($_POST);
    }

    function Modifica() {
        
    }

    function Elimina() {
        
    }

}

?>
