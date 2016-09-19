<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
 * 
 * ******** MODELS *********
 * @property Cliente_model $cliente_model
 */
class Cliente_model extends CI_Model {

    private $table = 'cliente';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function getClients() {
        
    }
   
            
    function AddCliente($data) {
        $this->db->insert('cliente', array('DOC_CLIENTE' => $data['DOC_CLIENTE'],
            'NOMBRES' => $data['NOMBRES'],
            'APELLIDOS' => $data['APELLIDOS'],
            'CIUDAD_ID' => $data['CIUDAD_ID'],
            'BARRIO' => $data['BARRIO'],
            'DIRECCION' => $data['DIRECCION'],
            'TELEFONO' => $data['TELEFONO'],
            'CELULAR' => $data['CELULAR'],
            'TIPO_VIVIENDA' => $data['TIPO_VIVIENDA'],
            'CANT_ADULTOS' => $data['CANT_ADULTOS'],
            'CANT_NIÑOS' => $data['CANT_NIÑOS'],
            'CANT_TER_EDAD' => $data['CANT_TER_EDAD'],
            'EDAD_NIÑOS' => $data['EDAD_NIÑOS'],
            'OFERTA_SALARIO' => $data['OFERTA_SALARIO'],
            'DIAS_DESCANSO' => $data['DIAS_DESCANSO'],
            'MASCOTAS' => $data['MASCOTAS'],
            'HORARIO' => $data['HORARIO'],
            'CORREO_PERSONAL' => $data['CORREO_PERSONAL'],
            'CORREO_CORPORATIVO' => $data['CORREO_CORPORATIVO'],
            'REQUERIMIENTO' => $data['REQUERIMIENTO'],
            'EMPRESA_CONTRATANTE' => $data['EMPRESA_CONTRATANTE'],
            'HARCK_OBSERVACIONES' => $data['HARCK_OBSERVACIONES'],
            'OBSERVACIONES' => $data['OBSERVACIONES']));
    }

}

?>