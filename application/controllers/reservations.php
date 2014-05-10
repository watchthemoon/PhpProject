<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class reservations extends Config {

	public function index()	{
		$data = array(
			'view' => 'reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}


	public function loadrescustomer(){
		$gegevens= $this->input->post();

		$data = array(
		'userid' => $gegevens['userid']
		);
		$this->load->view('/reservatons.php',array_merge($this->data,$data));

		$query = $this->m_reserve->weergaveuser($gegevens);

	}

		public function reservetablecustomer1(){
		$gegevens = ($this->input->post());
		$this->m_reserve->savecustomer1($gegevens);
		
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['email'])){
			$error['email'] = 'Vul een emailadres in.';
		}
		if (empty($post['password'])){
			$error['password'] = 'Vul een paswoord in.';
		}

		if (empty($post['aantal1'])){
		$error['aantal1'] = 'Vul het aantal personen in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/reserve/reserve_form');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_login');
	
			## Sla de gegevens op in de model
			$result = $this->m_login->login($post);


		$data = array(
			'view' => '/reservations',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurantid' => $gegevens['restaurantid']
		);


		print_r($data);
		die();

		$this->view($gegevens['restaurantid']);

		}
	}

	public function reservetablecustomer2(){
		$gegevens = ($this->input->post());
		$this->m_reserve->savecustomer2($gegevens);
		$data = array(
			'view' => '/reservations',
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

	

			## Stuur door naar hoofd pagina
			redirect('/');

		}


}