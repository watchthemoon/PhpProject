<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Reservations extends Config {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_reserve');
	}

	public function view($restaurantid)	{


	
		$data = array(
			'view' => '/admin/reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $restaurantid
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

			$this->session->set_userdata('melding', 'Reservatie succesvol verwijderd');

$this->view($data['restaurantid']);
		

	}

		public function editRes(){

		$data = $this->input->post();

			$this->m_reserve->edit($data);

			$this->session->set_userdata('melding', 'Reservatie succesvol Aangepast');

		$this->view($data['restaurantid']);
		

	}

	public function loadres(){
	$gegevens= $this->input->post();

	if($gegevens['weergave'] == 'tabel'){
	
	$tables = $this->m_reserve->load($gegevens['restaurantid']);

		$data = array(
			'tables' => $tables,
			'restaurantid' => $gegevens['restaurantid']
		);

		$this->load->view('/admin/reservations_tabelview',array_merge($this->data,$data));
	} elseif($gegevens['weergave'] == 'lijst'){

		$data = array(
		'restaurantid' => $gegevens['restaurantid']
		);
		$this->load->view('/admin/reservations_listview',array_merge($this->data,$data));
	} else{
				$query = $this->m_reserve->lijstRes($gegevens);
		$data = array(
		'query' => $query,
		'restaurantid' => $gegevens['restaurantid'],
		'resdate' => $gegevens['date']
		);
		$this->load->view('/admin/reservations_list',array_merge($this->data,$data));

	}

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

	public function reservetablecustomer1(){
		$gegevens = ($this->input->post());
		$this->m_reserve->savecustomer1($gegevens);
		$data = array(
			'view' => '/reservetable',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $gegevens['restaurantid']
		);

		$this->view($gegevens['restaurantid']);
		//return $query;
	}

	public function reservetablecustomer2(){
		$gegevens = ($this->input->post());
		$this->m_reserve->savecustomer2($gegevens);
		$data = array(
			'view' => '/reservetable',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $gegevens['restaurantid']
		);

		$this->view($gegevens['restaurantid']);
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