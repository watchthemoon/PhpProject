<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Restaurants extends Config {

	public function index(){

		if ($this->online){
			redirect('/');
		}


		$data = array(
			'view' => 'restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',$data);
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

	}

	public function form(){
 	## Hier bouw je het formulier om een restaurant toe te voegen of te wijzigen ( de view word dan bijvoorbeeld restaurants_form.php )
		if ($this->online){
			redirect('/');
		}


		$data = array(
			'view' => 'restaurants_form',
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
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','Restaurant succesvol toegevoegd');

			## Stuur door naar login pagina
			redirect('/login');

		}

	}

	public function delete(){
 	## Hier bouw je de functie om restaurants met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
	}
}