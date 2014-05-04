<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Reserve extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_tables');
	}

	public function view($restaurantid)	{
		$data = array(
			'view' => '/reserve/',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'tables' => $this->m_tables->load($restaurantid)
		);

		$this->load->view('index',array_merge($this->data,$data));
	}

	public function form(){
		$data = array(
			'data' => $this->input->post()
		);

		$this->load->view('/reserve_form',array_merge($this->data,$data));
	}

	public function check(){
		$data = $this->input->post();
		$this->load->model('m_reserve');

		$this->m_reserve->check($data['restaurantid']);
	}

}