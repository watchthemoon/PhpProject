<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Reservationoverview extends Config {

	public function __construct(){
		parent::__construct();
		if (!$this->online) redirect('/');
	}

	public function index()	{
		$data = array(
			'view' => 'reservationoverview',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post'),
			'tafelnummer' => $this->session->userdata('tafelnummer'),
			'aantalpersonen' => $this->session->userdata('aantal1') . $this->session->userdata('aantal2'),
			'gereserveerdedatum' => $this->session->userdata('resdate')
		);

		$this->load->view('index',array_merge($this->data,$data));

	}
}