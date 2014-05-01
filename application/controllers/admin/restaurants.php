<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Restaurants extends Config {

	public function index()
	{
		$this->load->model('m_restaurant');
		$query = $this->m_restaurant->getRestaurants();
		$data = array(
			'view' => 'admin/restaurants',
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
			'view' => 'admin/restaurant_form',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
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
			## @ voor een functie zorgt ervoor dat als het fout gaat hij die regel gewoon 'negeert'
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
			$post['image'] = $data['upload_data']['file_name'];

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
			$this->session->set_userdata('melding', 'Restaurant succesvol toegevoegd');

			## Stuur door naar login pagina
			redirect('/admin/restaurants');

		}

	}

}