<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";

class Restaurants extends Config
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


	public function index()
	{
		$this->load->model('m_restaurant');
		$query = $this->m_restaurant->getRestaurants();
		$data = array(
			'view' => 'restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $query
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

	}

	public function form()
	{
		## Hier bouw je het formulier om een restaurant toe te voegen of te wijzigen ( de view word dan bijvoorbeeld restaurants_form.php )

		$data = array(
			'view' => 'restaurant_form',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

	public function detail()
	{
		## Hier bouw je detail pagina op
		$this->load->helper('url');
		$this->load->model('m_restaurant');
		$query = $this->m_restaurant->getRestaurantById($this->uri->segment(3));
		$data = array(
			'view' => 'restaurant_detail',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $query
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

	public function save()
	{

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['name'])) {
			$error['name'] = 'Vul een naam in.';
		}
		if (empty($post['address'])) {
			$error['address'] = 'Vul een straat en huisnummer in.';
		}
		if (empty($post['city'])) {
			$error['city'] = 'Vul een stad in.';
		}
		if (empty($post['country'])) {
			$error['country'] = 'Vul een land in.';
		}
		if (empty($post['phone'])) {
			$error['phone'] = 'Vul een telefoonnummer in.';
		}

		if (empty($post['description'])) {
			$error['description'] = 'Vul een beschrijving in.';
		}

		$folder = $_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/';

		## Als de folder niet bestaat, deze toevoegen
		if (!file_exists($folder)){
			@mkdir($_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/', 0755, true);
		}

		## foto uploaden in map

		## Library laden
		$this->load->library('upload');

		## Config instellen
		$config = array(
			'upload_path' => $folder,
			'allowed_types' => 'gif|jpg|png|bmp|jpeg',
			'max_width' => '1024',
			'max_height' => '768',
		);

		## Config inladen
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			## Uploaden ging fout :(
			$error['image'] = $this->upload->display_errors();
		} else {
			## Uploaden ging goed :)
			$data = array('upload_data' => $this->upload->data());
			print_r($data);

			##############################
			##############################
			## VERGEET NIET BESTANDSNAAM OP TE SLAAN IN DE DATABSE ($post['image'] = $data['file_name'];
			##############################
			##############################
		}

		if (count($error) > 0) {

			## Errors gevonden
			$this->session->set_userdata('error', $error);
			redirect('/restaurants/form');

		} else {

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding', 'Restaurant succesvol toegevoegd');

			## Stuur door naar login pagina
			redirect('/restaurants');

		}

	}

	public function delete()
	{
		## Hier bouw je de functie om restaurants met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
	}
}