<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	public function index()	{

		if (is_online() == true){
			## Online

		}else{
			## Niet online
			$data = array(
				'view' => 'login'
			);

			$this->load->view('index',$data);
		}

	}

	public function register(){

		$data = array(
			'view' => 'register'
		);

		$this->load->view('index',$data);

	}

}