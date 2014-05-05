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

		public function wijzigform($menuid){
		$wijzigquery = $this->m_menu->getGerecht($menuid);
		$data = array(
			'data' => $this->input->post(),
			'wijzigquery' =>  $wijzigquery
		);
		$this->load->view('/admin/menu_wijzig_form',array_merge($this->data,$data));
	}
		public function loadmenu($gerechttypeid,$restaurantid){
		$query = $this->m_menu->getMenu($restaurantid, $menuid);
		$data = array(
			'data' => $this->input->post(),
			'query' =>  $query
		);
		$this->load->view('/admin/Gerecht',array_merge($this->data,$data));
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
			$this->session->set_userdata('melding', 'Gerecht toegevoegd');

			## Stuur door naar tafel pagina
			redirect('/admin/menu/view/'.$post['restaurantid']);

		}

	}


	public function editsave()
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
			redirect('/admin/menu/wijzigform');

		} else {


			## Sla de gegevens op in de model
			$this->m_menu->edit($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding', 'Gerecht gewijzigd');

			## Stuur door naar tafel pagina
			redirect('/admin/menu/view/'.$post['restaurantid']);

		}

	}




	public function delete()
	{
		## Hier bouw je de functie om menus met alle koppelingen te verwijderen ( ook geen view van toepassing, na verwijderen doorsturen naar de index van restaurants )
		$post = $this->input->post();
		## Laad de model
			$this->load->model('m_menu');

			## Sla de gegevens op in de model
			$this->m_menu->delete($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding', 'Gerecht succesvol verwijderd');

			## Stuur door naar overzicht pagina
				redirect('/admin/menu/view/'.$post['restaurantid']);
	}
	

}