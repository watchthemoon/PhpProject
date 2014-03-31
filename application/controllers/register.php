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

		if (empty($post['firstname'])){
			$error['firstname'] = 'Vul een voornaam in.';
		}
		if (empty($post['lastname'])){
			$error['lastname'] = 'Vul een achternaam in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			redirect('/register');

		}else{

			## Geen errors, bende opslaan

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
