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
			'view' => 'restaurant_form',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index', array_merge($this->data, $data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');
	}

}