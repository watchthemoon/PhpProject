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

			redirect('/login');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_login');
			$this->load->model('m_reserve');

			## Sla de gegevens op in de model
			$result = $this->m_login->login($post);

			if($result){
				## Vul melding dat het gelukt is
				$this->session->set_userdata('meldingsuccess','U hebt succesvol gereserveerd.');

				$gegevens1 = array(
					'aantal' => $post['aantal1'],
					'tableid' => $post['tableid'],
					'restaurantid' => $post['restaurantid'],
					'resdate' => $post['resdate'],
				);

				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer1($gegevens1);

				$data = array(
					'view' => '/reservationoverview',
					'errors' => $this->session->userdata('error'),
					'post' => $this->session->userdata('post'),
				);

				$this->session->set_userdata('tafelnummer',$post['tableid']);
				$this->session->set_userdata('aantal1',$post['aantal1']);
				$this->session->set_userdata('resdate',$post['resdate']);
		
				## Stuur door naar login check pagina
				redirect('/reservationoverview');

				$this->session->unset_userdata('aantal1');
			}else{
				## Vul melding dat het niet gelukt is
				$this->session->set_userdata('meldingfail','Uw login gegevens zijn onjuist.');

				## Stuur door naar volgende pagina
				redirect('/login');
			}
		}
	}

	public function reservetablecustomer2(){
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['aantal2'])||$post['aantal1']>$post['vastaantal']){
			$error['aantal2'] = 'Vul het aantal personen in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/login');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_reserve');

				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer2($post);

				/*$gegevens1 = array(
					'aantal' => $post['aantal2'],
					'tafelid' => $post['tableid'],
					'resdate' => $post['resdate'],
				);*/

				## Vul melding dat het gelukt is
				$this->session->set_userdata('meldingsuccess','U hebt succesvol gereserveerd.');

				## variabelen om mee door te sturen naar de volgende pagina
				$this->session->set_userdata('tafelnummer',$post['tableid']);
				$this->session->set_userdata('aantal2',$post['aantal2']);
				$this->session->set_userdata('resdate',$post['resdate']);

				## Stuur door naar volgende pagina
				redirect('/reservationoverview');

			}

	}

}