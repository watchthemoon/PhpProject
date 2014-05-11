<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Reserve extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_tables');
	}

	public function view($restaurantid)	{

		if ($this->online){
			$online = true;
		}

		$tables = $this->m_tables->load($restaurantid);

		$data = array(
			'view' => 'reserve',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'tables' => $tables,
			'restaurantid' => $restaurantid
		);

		$this->load->view('index',array_merge($this->data,$data));
	}

	public function form(){

		$post = $this->input->post();
		$table = $this->m_tables->load($data['restaurantid'],$data['tableid']);



		$data = array(
			'restaurantid' => $post['restaurantid'],
			'tableid' => $post['tableid'],
			'resdate' => $post['resdate']
		);

		$this->load->view('/reserve_form',array_merge($this->data,$data));
	}

	public function check(){
		$data = $this->input->post();
		$this->load->model('m_reserve');

		$check = $this->m_reserve->check($data['restaurantid'],$data['date']);

		header('Content-type: application/json');
		echo json_encode($check);
	}

	public function reservetable(){


		//$this->m_reserve->save($this->input->post());
		$data = array(
			'view' => '/admin/restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		
		);

		$this->load->view('index',array_merge($this->data,$data));
		//return $query;
	}

	/*public function reservetablecustomer(){


		//$this->m_reserve->save($this->input->post());
		$data = array(
			'view' => '/reservetable',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		
		);

		$this->load->view('index',array_merge($this->data,$data));
		//return $query;
	}*/

}