<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); include "config.php";
class Register extends Config {

	public function index()	{

		if ($this->online){
			redirect('/');
		}

		$data = array(
			'view' => 'register',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',$data);
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

	public function save(){

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['firstname'])){
			$error['firstname'] = 'Vul een voornaam in.';
		}
		if (empty($post['name'])){
			$error['name'] = 'Vul een achternaam in.';
		}
		if (empty($post['email'])){
			$error['email'] = 'Vul een emailadres in.';
		}
		if (empty($post['phonenumber'])){
			$error['phonenumber'] = 'Vul een telefoonnummer in.';
		}
		if (empty($post['password'])){
			$error['password'] = 'Vul een wachtwoord in.';
		}

		## Is het wachtwoord minimaal 6 tekens lang?
		if(strlen($post['password']) > 0 && strlen($post['password']) < 6){
			$error['password'] = 'Vul een wachtwoord van minimaal 6 tekens in.';
		}

		## Controleren of aantal dagen in de maand zitten

		if (!empty($post['month'])){
			$max_days = cal_days_in_month(0, $post['month'], $post['year']);
			if ($post['day'] > $max_days){
				$error['day'] = 'De ingevoerde datum is niet geldig.';
			}
		}

		## Controleren of het een superuser is of niet
		if($post['isAdmin'] != 'yes'){
			$post['isAdmin'] = 'no';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/register');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_register');

			## Sla de gegevens op in de model
			$this->m_register->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','U bent succesvol geregistreerd.');

			## Stuur door naar login pagina
			redirect('/login');

		}

	}

	public function savereserve(){

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['firstname'])){
			$error['firstname'] = 'Vul een voornaam in.';
		}
		if (empty($post['name'])){
			$error['name'] = 'Vul een achternaam in.';
		}
		if (empty($post['email'])){
			$error['email'] = 'Vul een emailadres in.';
		}
		if (empty($post['phonenumber'])){
			$error['phonenumber'] = 'Vul een telefoonnummer in.';
		}
		if (empty($post['password'])){
			$error['password'] = 'Vul een wachtwoord in.';
		}

		## Is het wachtwoord minimaal 6 tekens lang?
		if(strlen($post['password']) > 0 && strlen($post['password']) < 6){
			$error['password'] = 'Vul een wachtwoord van minimaal 6 tekens in.';
		}

		## Controleren of aantal dagen in de maand zitten

		if (!empty($post['month'])){
			$max_days = cal_days_in_month(0, $post['month'], $post['year']);
			if ($post['day'] > $max_days){
				$error['day'] = 'De ingevoerde datum is niet geldig.';
			}
		}

		## Controleren of het een superuser is of niet
		if($post['isAdmin'] != 'yes'){
			$post['isAdmin'] = 'no';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/reserve/reserve_form');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_register');

			## Sla de gegevens op in de model
			$this->m_register->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','U bent succesvol geregistreerd.');

			## Stuur door naar login pagina
			redirect('/reserve/reservetable');

		}

	}
}
