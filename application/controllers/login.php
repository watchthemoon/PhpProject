<?php

class Login extends CI_Controller {

	public function index(){

		$data = array(
			'view' => 'login',
			'errors' => $this->session->userdata('error')
		);

		$this->load->view('index',$data);
		$this->session->unset_userdata('error');

	}

	public function save(){
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['email'])){
			$error['email'] = 'Vul een emailadres in.';
		}
		if (empty($post['password'])){
			$error['password'] = 'Vul een paswoord in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			redirect('/login');
		}else{

		## Geen errors, opslaan

		## Laad de model
			$this->load->model('m_login');
		}

	/*session_start();

	$login = array(
	'email'  => 'johndoe',
	'logged_in' => TRUE
	);

	$this->session->set_userdata($login);*/

}