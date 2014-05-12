<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Restaurants extends Config {

	public function __construct(){
		parent::__construct();
		if (!$this->online) redirect('/');
		$this->load->model('m_restaurant');
	}


	public function index()
	{
		$user = $this->session->userdata('user_id');
		$data = array(
			'view' => 'admin/restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $this->m_restaurant->getRestaurantByUser($user)
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

	}

	public function form()
	{
		## Hier bouw je het formulier om een restaurant toe te voegen of te wijzigen ( de view word dan bijvoorbeeld restaurants_form.php )

		$data = array(
			'view' => 'admin/restaurant_form',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

	public function detail($restaurantid){

		$restaurant = $this->m_restaurant->getRestaurantById($restaurantid);
		if ($restaurant->restaurantid != 0){

			## Hier bouw je detail pagina op
			$this->load->helper('url');
			$data = array(
				'view' => 'admin/restaurant_detail',
				'errors' => $this->session->userdata('error'),
				'post' => $this->session->userdata('post'),
				'query' => $this->m_restaurant->getRestaurantById($restaurantid)
			);

			$this->load->view('index', array_merge($this->data, $data));
			$this->session->unset_userdata('error');
			$this->session->unset_userdata('post');

		}else{

			$this->session->set_userdata('meldingfail','Geen restaurant gevonden.');
			redirect('/admin/restaurants/');

		}

	}

	public function edit($restaurantid){

		$this->load->helper('url');

		$query = $this->m_restaurant->getRestaurantById($restaurantid);
		if ($query->restaurantid != 0){

			$data = array(
				'view' => '/admin/restaurant_edit',
				'errors' => $this->session->userdata('error'),
				'post' => $this->session->userdata('post'),
				'query' => $query
			);

			$this->load->view('index',array_merge($this->data,$data));

		}else{

			$this->session->set_userdata('meldingfail','Geen restaurant gevonden');
			redirect('/admin/restaurants/');

		}

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

		$folder = $_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/overzicht/';

		## Als de folder niet bestaat, deze toevoegen
		if (!file_exists($folder)){
			## @ voor een functie zorgt ervoor dat als het fout gaat hij die regel gewoon 'negeert'
			@mkdir($_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/overzicht/', 0755, true);
		}

		## foto uploaden in map

		## Library laden
		$this->load->library('upload');

		## Config instellen
		$config = array(
			'upload_path' => $folder,
			'allowed_types' => 'gif|jpg|png|bmp|jpeg',
			'max_width' => '2500',
			'max_height' => '2500',
		);

		## Config inladen voor overzicht
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('image')) {
			## Uploaden ging fout :(
			$error['image'] = $this->upload->display_errors();
		} else {
			## Uploaden ging goed :)
			$data = array('upload_data' => $this->upload->data());
			$post['image'] = $data['upload_data']['file_name'];

		}

		$folder = $_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/header/';

		## Als de folder niet bestaat, deze toevoegen
		if (!file_exists($folder)){
			## @ voor een functie zorgt ervoor dat als het fout gaat hij die regel gewoon 'negeert'
			@mkdir($_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/header/', 0755, true);
		}

		## foto uploaden in map

		## Library laden
		$this->load->library('upload');

		## Config instellen
		$config = array(
			'upload_path' => $folder,
			'allowed_types' => 'gif|jpg|png|bmp|jpeg',
			'max_width' => '2500',
			'max_height' => '2500',
		);

		## Config inladen voor header
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('imageHeader')) {
			## Uploaden ging fout :(
			$error['imageHeader'] = $this->upload->display_errors();
		} else {
			## Uploaden ging goed :)
			$data = array('upload_data' => $this->upload->data());
			$post['imageHeader'] = $data['upload_data']['file_name'];

		}

		if (count($error) > 0) {

			## Errors gevonden
			$this->session->set_userdata('error', $error);
			redirect('/admin/restaurants/form');

		} else {

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('meldingsuccess', 'Restaurant succesvol toegevoegd');

			## Stuur door naar overzicht pagina
			redirect('/admin/restaurants');

		}

	}

	public function editsave()
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

			## foto Overzicht
			$folder = $_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/overzicht/';

			## Als de folder niet bestaat, deze toevoegen
			if (!file_exists($folder)){
				## @ voor een functie zorgt ervoor dat als het fout gaat hij die regel gewoon 'negeert'
				@mkdir($_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/overzicht/', 0755, true);
			}

			## foto uploaden in map

			## Library laden
			$this->load->library('upload');

			## Config instellen
			$config = array(
				'upload_path' => $folder,
				'allowed_types' => 'gif|jpg|png|bmp|jpeg',
				'max_width' => '2500',
				'max_height' => '2500',
			);

			## Config inladen
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				## Uploaden ging fout :(
				$post['image'] = $post['imageUrlOverzicht'];
			} else {
				## Uploaden ging goed :)
				$data = array('upload_data' => $this->upload->data());
				$post['image'] = $data['upload_data']['file_name'];
			}


			 ## foto Header
			$folder = $_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/header/';

		## Als de folder niet bestaat, deze toevoegen
		if (!file_exists($folder)){
			## @ voor een functie zorgt ervoor dat als het fout gaat hij die regel gewoon 'negeert'
			@mkdir($_SERVER["DOCUMENT_ROOT"] . '/upload/restaurants/header/', 0755, true);
		}

		## foto uploaden in map

		## Library laden
		$this->load->library('upload');

		## Config instellen
		$config = array(
			'upload_path' => $folder,
			'allowed_types' => 'gif|jpg|png|bmp|jpeg',
			'max_width' => '2500',
			'max_height' => '2500',
		);

		## Config inladen voor header
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('imageHeader')) {
			## Uploaden ging fout :(
			$error['imageHeader'] = $post['imageUrlHeader'];
		} else {
			## Uploaden ging goed :)
			$data = array('upload_data' => $this->upload->data());
			$post['imageHeader'] = $data['upload_data']['file_name'];

		}

		if (count($error) > 0) {

			## Errors gevonden
			$this->session->set_userdata('error', $error);
			redirect('/admin/restaurants/edit/'. $post['restaurantid']);

		} else {

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->edit($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('meldingsuccess', 'Restaurant succesvol gewijzigd');

			## Stuur door naar overzicht pagina
			redirect('/admin/restaurants');

		}

	}

	public function delete()
	{
		## Hier bouw je de functie om restaurants met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
		$id = $this->uri->segment(4);
		## Laad de model
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->delete($id);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('meldingsuccess', 'Restaurant succesvol verwijderd');

			## Stuur door naar overzicht pagina
			redirect('/admin/restaurants');
	}

}