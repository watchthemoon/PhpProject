<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Home extends Config {

	public function index()	{
		$data = array(
			'view' => 'home',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}

	public function error_404(){

		$data = array(
			'view' => '404'
		);

		$this->load->view('index',array_merge($this->data,$data));

	}

}