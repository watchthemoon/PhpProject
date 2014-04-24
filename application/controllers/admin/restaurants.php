<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Restaurants extends Config {

	public function index()	{
		$data = array(
			'view' => '/admin/restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}
}