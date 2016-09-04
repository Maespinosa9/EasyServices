<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {

	//Constants
	private $table = 'cliente';

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getClients(){
		$this->db->from($this->table);
	}


	function AddCliente($data){
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