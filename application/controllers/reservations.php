<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class reservations extends Config {

	public function index()	{
		$data = array(
			'view' => 'reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}


	public function loadrescustomer(){
		$gegevens= $this->input->post();

		$data = array(
		'userid' => $gegevens['userid']
		);
		$this->load->view('/reservatons.php',array_merge($this->data,$data));

		$query = $this->m_reserve->lijstRes($gegevens);

	}

}