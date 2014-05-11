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
			redirect('/');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_login');
			$this->load->model('m_reserve');

			## Sla de gegevens op in de model
			$result = $this->m_login->login($post);

			if($result){
				## Vul melding dat het gelukt is
				$this->session->set_userdata('melding','U hebt succesvol gereserveerd.');

				$gegevens1 = array(
					'aantal1' => $post['aantal1'],
					'tafelid' => $post['tableid'],
					'restaurantid' => $post['restaurantid'],
					'resdate' => $post['resdate']
				);

				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer1($gegevens1);

				$data = array(
					'view' => '/reservations',
					'errors' => $this->session->userdata('error'),
					'post' => $this->session->userdata('post')
				);

				/*print_r($gegevens1);
				die();*/
			
				## Stuur door naar login check pagina
				redirect('/reservations');
			}else{
				## Vul melding dat het niet gelukt is
				$this->session->set_userdata('melding','Uw login gegevens zijn onjuist.');

				## Stuur door naar volgende pagina
				redirect('/');
			}
		}
	}

	public function reservetablecustomer2(){
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['aantal1'])){
			$error['aantal1'] = 'Vul het aantal personen in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_reserve');

				## Vul melding dat het gelukt is
				$this->session->set_userdata('melding','U hebt succesvol gereserveerd.');

				$gegevens2 = array(
					'aantal2' => $post['aantal2'],
					'tafelid' => $post['tableid'],
					'restaurantid' => $post['restaurantid'],
					'resdate' => $post['resdate']
				);

				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer2($gegevens2);

				$data = array(
					'view' => '/reservations',
					'errors' => $this->session->userdata('error'),
					'post' => $this->session->userdata('post')
				);

						
				## Stuur door naar volgende pagina
				redirect('/reservations');
			}

		//$this->view($gegevens['restaurantid']);

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