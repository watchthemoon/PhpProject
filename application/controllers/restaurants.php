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

		$city = $this->input->post("city");

		$data = array(
			'view' => 'restaurants',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'restaurants' => $this->m_restaurant->getRestaurants($city), ## Even een logische naam.
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

		# Dit is toch die van annelies? jah

	}

	
	public function detail()
	{
		## Hier bouw je detail pagina op
		$this->load->helper('url');
		$this->load->model(array('m_restaurant','m_menu'));
		$data = array(
			'view' => 'restaurant_detail',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $this->m_restaurant->getRestaurantById($this->uri->segment(3)),
			'voorgerecht' => $this->m_menu->getVoorgerecht($this->uri->segment(3)),
			'hoofdgerecht' => $this->m_menu->getHoofdgerecht($this->uri->segment(3)),
			'nagerecht' => $this->m_menu->getNagerecht($this->uri->segment(3))
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

}