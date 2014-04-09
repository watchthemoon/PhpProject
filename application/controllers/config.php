<?php
class Config extends CI_Controller{

	public $online = false;
	public $data = array();

	public function __construct(){
		parent::__construct();

		$this->online = $this->m_login->is_online();
		$this->data['online'] = $this->online;

		$melding = $this->session->userdata('melding');
		$this->session->unset_userdata('melding');

		$this->data['melding'] = $melding;
	}

}