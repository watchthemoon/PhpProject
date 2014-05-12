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
			'restaurants' => $this->m_restaurant->getRestaurants($city)
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

	
	public function detail($restaurant_id = 0){

		$this->load->helper('url');
		$this->load->model(array('m_restaurant','m_menu'));

		$query = $this->m_restaurant->getRestaurantById($restaurant_id);
		if ($query->restaurantid != 0){

			## Hier bouw je detail pagina op
			$data = array(
				'view' => 'restaurant_detail',
				'errors' => $this->session->userdata('error'),
				'post' => $this->session->userdata('post'),
				'query' => $query,
				'voorgerecht' => $this->m_menu->getVoorgerecht($restaurant_id),
				'hoofdgerecht' => $this->m_menu->getHoofdgerecht($restaurant_id),
				'nagerecht' => $this->m_menu->getNagerecht($restaurant_id)
			);

			$this->load->view('index', array_merge($this->data, $data));
			$this->session->unset_userdata('error');
			$this->session->unset_userdata('post');

		}else{

			$this->session->set_userdata('meldingfail','Geen restaurant gevonden.');
			redirect('/');

		}

	}

}
