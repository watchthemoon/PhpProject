<?php
class Config extends CI_Controller{

	public $online = false;
	public $super = false;

	public $data = array();

	public function __construct(){
		parent::__construct();

		## Check of user online is
		$this->online = $this->m_login->is_online();
		$this->data['online'] = $this->online;

		$meldingsuccess = $this->session->userdata('meldingsuccess');
		$this->session->unset_userdata('meldingsuccess');

		$meldingfail = $this->session->userdata('meldingfail');
		$this->session->unset_userdata('meldingfail');

		$this->data['meldingsuccess'] = $meldingsuccess;
		$this->data['meldingfail'] = $meldingfail;

		## Check of user een super is
		$this->super = $this->m_login->is_super();
		$this->data['super'] = $this->super;
	}
}