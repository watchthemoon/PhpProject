<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Reservations extends Config {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_reserve');
	}

	public function view($restaurantid)
		{
		$data = array(
			'restaurantid' => $restaurantid,
			'view' => '/admin/reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $query
		);

		$this->load->view('index',array_merge($this->data,$data));

	}



}