<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Menu extends Config {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_menu');
	}

	public function view($restaurantid)
		{
		$query = $this->m_menu->getMenu($restaurantid);	
		$data = array(
			'restaurantid' => $restaurantid,
			'view' => '/admin/menu',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'query' => $query
		);

		$this->load->view('index',array_merge($this->data,$data));

	}

		public function form(){
		$data = array(
			'data' => $this->input->post()
		);

		$this->load->view('/admin/menu_form',array_merge($this->data,$data));
	}



	public function save()
	{

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['name'])) {
			$error['name'] = 'Vul een gerechtnaam in.';
		}
		if (empty($post['price'])) {
			$error['price'] = 'Vul de prijs in.';
		}

		if (count($error) > 0) {

			## Errors gevonden
			$this->session->set_userdata('error', $error);
			redirect('/admin/menu/form');

		} else {


			## Sla de gegevens op in de model
			$this->m_menu->save($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding', 'Menu toegevoegd');

			## Stuur door naar tafel pagina
			redirect('/admin/menu/view/'.$post['restaurantid']);

		}

	}
	

}