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

}