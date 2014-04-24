<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Contact extends Config {

	public function index()	{
		$data = array(
			'view' => 'contact',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}

}