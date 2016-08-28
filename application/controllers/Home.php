<?php

/**
* 
*/
class home extends CI_Controller
{
	
	public function index()
	{
		$this->load->view('templates/Header');
		$this->load->view('pages/home');
		$this->load->view('templates/Footer');
	}
}

?>