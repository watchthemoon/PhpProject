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
			'userid' => $this->session->userdata['user_id']
		);

		$query = $this->m_reserve->weergaveuser();

		
		$this->load->view('/reservatons.php',array_merge($this->data,$data));

		

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

		if (empty($post['aantal1'])||$post['aantal1']>$post['vastaantal']){
		$error['aantal1'] = 'Fout aantal personen.';
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


				print_r($gegevens1);
				die();

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

		if (empty($post['aantal2']||$post['aantal1']>$post['vastaantal'])){
			$error['aantal2'] = 'Vul het aantal personen in.';
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

				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer2($post);

				## Vul melding dat het gelukt is
				$this->session->set_userdata('melding','U hebt succesvol gereserveerd.');

				$data = array(
					'view' => '/reservations',
					'errors' => $this->session->userdata('error'),
					'post' => $this->session->userdata('post')
				);


						
				## Stuur door naar volgende pagina
				redirect('/reservations');
			}

	}

}