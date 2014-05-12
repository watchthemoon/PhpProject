<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class reservationoverview extends Config {

	public function index()	{
		$data = array(
			'view' => 'reservationoverview',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'tafelnummer' => $gegevens1->tableid,
			'aantalpersonen' => $aantalpersonen,
			'gereserveerdedatum' => $gereserveerdedatum
		);

		print_r($data);
		die();

		$this->load->view('index',array_merge($this->data,$data));

	}
}