<?php include "config.php";
class Logout extends Config {

	public function index(){

		$this->session->unset_userdata('user_id');
		$this->session->set_userdata('melding','U bent succesvol uitgelogd');
		redirect('/');

	}

}