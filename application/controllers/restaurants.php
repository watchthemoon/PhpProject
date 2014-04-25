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

	

	public function delete()
	{
		## Hier bouw je de functie om restaurants met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
	}
}