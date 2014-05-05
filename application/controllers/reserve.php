<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Reserve extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_tables');
	}

	public function view($restaurantid)	{

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
		$data = array(
			'data' => $this->input->post()
		);

		$this->load->view('/reserve_form',array_merge($this->data,$data));
	}

	public function check(){
		$data = $this->input->post();
		$this->load->model('m_reserve');

		$check = $this->m_reserve->check($data['restaurantid']);

		header('Content-type: application/json');
		echo json_encode($check);
	}

	public function reservetable($tableid){

		$tables = $this->m_tables->load($tableid);
		$query = $this->db->where('tableid',$tableid);


		$data = array(
			'view' => 'reservetable',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'tables' => $this->m_tables->load($tableid)

		);

		$this->load->view('index',array_merge($this->data,$data));

		return $query;
	}

}