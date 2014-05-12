<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include dirname(__FILE__) . "/../config.php";
class Tables extends Config {

	public function __construct(){
		parent::__construct();

		if (!$this->online) redirect('/');
		$this->load->model('m_tables');
		$this->load->model('m_restaurant');
	}

	public function view($restaurantid){

		$restaurant = $this->m_restaurant->getRestaurantById($restaurantid);
		if ($restaurant->restaurantid != 0){

			$data = array(
				'restaurantid' => $restaurantid,
				'view' => '/admin/tables',
				'errors' => $this->session->userdata('error'),
				'post' => $this->session->userdata('post'),
				'tables' => $this->m_tables->load($restaurantid)
			);

			$this->load->view('index',array_merge($this->data,$data));

		}else{

			$this->session->set_userdata('meldingfail','Dit restaurant bestaat niet.');
			redirect('/admin/restaurants/');

		}

	}

	public function form(){

		$data = $this->input->post();

		$table = $this->m_tables->load($data['restaurantid'],$data['tableid']);

		$data = array(
			'restaurantid' => $data['restaurantid'],
			'table' => $table,
			'data' => $data
		);

		$this->load->view('/admin/tables_form',array_merge($this->data,$data));
	}

	public function delete($tableid,$restaurantid){
		$this->m_tables->delete($tableid);

		$this->session->set_userdata('meldingsuccess', 'Tafel succesvol verwijderd');

		## Stuur door naar tafel pagina
		redirect('/admin/tables/view/'.$restaurantid);
	}

	public function save(){

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['name'])) {
			$error['name'] = 'Vul een tafelnummer in.';
		}
		if (empty($post['amount'])) {
			$error['amount'] = 'Vul het aantal zitplaatsen in.';
		}

		if (count($error) > 0) {

			## Errors gevonden
			$this->session->set_userdata('error', $error);
			redirect('/admin/tables/form');

		} else {

			## Sla de gegevens op in de model
			$this->m_tables->save($post,$post['tableid']);

			## Vul melding dat het gelukt is
			if($post['tableid'] != 0){
				$this->session->set_userdata('meldingsuccess', 'Tafel succesvol gewijzigd');
			}else{
				$this->session->set_userdata('meldingsuccess', 'Tafel succesvol toegevoegd');
			}

			## Stuur door naar tafel pagina
			redirect('/admin/tables/view/'.$post['restaurantid']);

		}

	}

}