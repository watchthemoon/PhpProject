<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()	{

		$data = array(
			'view' => 'register',
			'errors' => $this->session->userdata('error')
		);

		$this->load->view('index',$data);
		$this->session->unset_userdata('error');

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
			redirect('/register');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_register');

			## Sla de gegevens op in de model
			$this->m_register->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','U bent succesvol geregistreerd');

			## Stuur door naar login pagina
			redirect('/login');

		}

	}

}
