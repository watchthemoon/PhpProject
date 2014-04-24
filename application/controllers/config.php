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

		$melding = $this->session->userdata('melding');
		$this->session->unset_userdata('melding');

		$this->data['melding'] = $melding;

		## Check of user een super is
		$this->super = $this->m_login->is_super();
		$this->data['super'] = $this->super;
	}
}