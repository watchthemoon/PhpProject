<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Home extends Config {

	public function index()	{
		$data = Array();
		$this->load->view('index',array_merge($this->data,$data));

	}

}