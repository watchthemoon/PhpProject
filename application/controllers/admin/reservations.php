<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Reservations extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_reserve');
	}

	public function view($restaurantid)	{

		if ($this->online){
			$online = true;
		}

		$tables = $this->m_reserve->load($restaurantid);

		$data = array(
			'view' => '/admin/reservations',
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

		$this->load->view('/admin/reservations_detail',array_merge($this->data,$data));
	}

	public function check(){
		$data = $this->input->post();
		$this->load->model('m_reserve');

		$check = $this->m_reserve->check($data['restaurantid'],$data['date']);

		header('Content-type: application/json');
		echo json_encode($check);
	}

	public function reservetable(){

		$this->m_reserve->save($this->input->post());
		$data = array(
			'view' => '/admin/reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		
		);

		$this->load->view('index',array_merge($this->data,$data));

		//return $query;
	}

	public function customer(){

		$error = array();
		$post = $this->input->post();

			## Laad de model
			$this->load->model('m_customer');

			## Sla de gegevens op in de model
			$this->m_register->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','U hebt succesvol gereserveerd.');

			## Stuur door naar hoofd pagina
			redirect('/');

		}

}