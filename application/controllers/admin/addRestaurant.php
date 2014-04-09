<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class AddRestaurant extends Config {

	public function index(){

		if ($this->online){
			redirect('/');
		}


		$data = array(
			'view' => 'addRestaurant',
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

		if (empty($post['name'])){
			$error['name'] = 'Vul een naam in.';
		}
		if (empty($post['address'])){
			$error['address'] = 'Vul een straat en huisnummer in.';
		}
		if (empty($post['city'])){
			$error['city'] = 'Vul een stad in.';
		}
		if (empty($post['country'])){
			$error['country'] = 'Vul een land in.';
		}
		if (empty($post['phone'])){
			$error['phone'] = 'Vul een telefoonnummer in.';
		}

		if (empty($post['description'])){
			$error['description'] = 'Vul een beschrijving in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			redirect('/addRestaurant');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_addrestaurant');

			## Sla de gegevens op in de model
			$this->m_addrestaurant->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','Restaurant succesvol toegevoegd');

			## Stuur door naar login pagina
			redirect('/login');

		}

	}
}