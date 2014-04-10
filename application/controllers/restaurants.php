<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Restaurants extends Config {

	function __construct()
 
    {
 
        parent::__construct();
 
        $this->load->helper('form');
 
        $this->load->helper('url');
 
    }  

	public function index(){
		$this->load->model('m_restaurant');
		$query = $this->m_restaurant->getRestaurants();
		$data = array(
			'view' => 'restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $query
		);

		$this->load->view('index',array_merge($this->data,$data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

	}

	public function form(){
 	## Hier bouw je het formulier om een restaurant toe te voegen of te wijzigen ( de view word dan bijvoorbeeld restaurants_form.php )

		$data = array(
			'view' => 'restaurant_form',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));
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

		## foto uploaden in map
		$config['upload_path'] = './upload/restaurants/'; /* NB! create this dir! */
      	$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
      	$config['max_size']  = '100';
      	$config['max_width']  = '1024';
      	$config['max_height']  = '768';
      /* Load the upload library */
      $this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload())
		{
		$error['image'] = "failed";
		 
		// uploading failed. $error will holds the errors.
		}
		else
		{
		$data = array('upload_data' => $this->upload->data());
		 
		// uploading successfull, now do your further actions
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			redirect('/restaurants/form');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_restaurant');

			## Sla de gegevens op in de model
			$this->m_restaurant->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','Restaurant succesvol toegevoegd');

			## Stuur door naar login pagina
			redirect('/restaurants');

		}

	}

	public function delete(){
 	## Hier bouw je de functie om restaurants met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
	}
}