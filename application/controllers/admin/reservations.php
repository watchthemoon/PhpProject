<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Reservations extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_reserve');
	}

	public function view($restaurantid)	{


			$tables = $this->m_reserve->load($restaurantid);	
		$data = array(
			'view' => '/admin/reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $restaurantid,
			'tables' => $tables	
		);


		$this->load->view('index',array_merge($this->data,$data));
	}

	public function form(){
		
		$query = $this->m_reserve->showRes($this->input->post());
		$data = array(
			'data' => $this->input->post(),
			'query' => $query
		);

		$this->load->view('/admin/reservations_detail',array_merge($this->data,$data));
}	

	public function deleteRes(){

		$data = $this->input->post();

			$this->m_reserve->delete($data);

			$this->session->set_userdata('meldingsuccess', 'Reservatie succesvol verwijderd.');

$this->view($data['restaurantid']);
		

	}

		public function editRes(){

		$data = $this->input->post();

			$this->m_reserve->edit($data);

			$this->session->set_userdata('meldingsuccess', 'Reservatie succesvol aangepast.');

		$this->view($data['restaurantid']);

	}

	public function check(){
		$data = $this->input->post();
		$this->load->model('m_reserve');

		$check = $this->m_reserve->check($data['restaurantid'],$data['date']);

		header('Content-type: application/json');
		echo json_encode($check);
	}

	public function reservetable(){
		$gegevens = ($this->input->post());
		$this->m_reserve->save($gegevens);
		$data = array(
			'view' => '/admin/Reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $gegevens['restaurantid']
		);

		$this->view($gegevens['restaurantid']);
		//return $query;
	}
}