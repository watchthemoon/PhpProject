<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Reservations extends Config {

	public function index()	{
		$this->load->model('m_reserve');

		$resdata = $this->m_reserve->custRes();

		$data = array(
			'view' => 'reservations',
			'reservations' => $resdata,
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
		$error = '';
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['email'])){
			$error .= 'Vul een emailadres in.<br />';
		}
		if (empty($post['password'])){
			$error .= 'Vul een paswoord in.<br />';
		}

		if (empty($post['aantal']) || $post['aantal'] > $post['vastaantal']){
			$error .= 'Fout aantal personen.<br />';
		}

		if ($error != ''){

			## Errors gevonden
			$this->session->set_userdata('meldingfail',$error);
			redirect('/reserve/view/' . $post['restaurantid']);

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_login');
			$this->load->model('m_reserve');

			## Sla de gegevens op in de model
			$result = $this->m_login->login($post);

			if($result){
				## gegevens opslaan in reservatiedatabank
				$this->m_reserve->savecustomer($post);

				$this->session->set_userdata('tafelnummer',$post['tableid']);
				$this->session->set_userdata('aantal',$post['aantal']);
				$this->session->set_userdata('resdate',$post['resdate']);
				$this->session->set_userdata('restime',$post['restime']);
		
				## Stuur door naar login check pagina
				redirect('/reservationoverview');

				$this->session->unset_userdata('aantal1');

			}else{

				## Vul melding dat het niet gelukt is
				$this->session->set_userdata('meldingfail','Uw login gegevens zijn onjuist.');
				## Stuur door naar volgende pagina
				redirect('/reserve/view/' . $post['restaurantid']);

			}
		}
	}

	public function reservetablecustomer2(){
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['aantal'])||$post['aantal']>$post['vastaantal']){
			$error['aantal'] = 'Vul het aantal personen in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('meldingfail',$error);
			redirect('/reserve/view/' . $post['restaurantid']);

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_reserve');

			## gegevens opslaan in reservatiedatabank
			$this->m_reserve->savecustomer($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('meldingsuccess','U hebt succesvol gereserveerd.');

			## variabelen om mee door te sturen naar de volgende pagina
			$this->session->set_userdata('tafelnummer',$post['tableid']);
			$this->session->set_userdata('aantal',$post['aantal']);
			$this->session->set_userdata('resdate',$post['resdate']);
			$this->session->set_userdata('restime',$post['restime']);

			## Stuur door naar volgende pagina
			redirect('/reservationoverview');

		}

	}

}