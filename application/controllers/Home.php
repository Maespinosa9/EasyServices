<?php

/**
* 
*/
class Home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('templates/Header');
		$this->load->view('pages/Home');
		$this->load->view('templates/Footer');
	}
}

?>