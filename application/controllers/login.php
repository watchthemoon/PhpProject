<?php include "config.php";
class Login extends Config {

	public function index(){

		if ($this->online){
			redirect('/');
		}

		$data = array(
			'view' => 'login',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));
		$this->session->unset_userdata('error');
		$this->session->unset_userdata('post');

	}

	public function save(){
		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['email'])){
			$error['email'] = 'Vul een emailadres in.';
		}
		if (empty($post['password'])){
			$error['password'] = 'Vul een paswoord in.';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/login');
		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_login');

			## Sla de gegevens op in de model
			$this->m_login->login($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','U bent succesvol ingelogd.');

			## Stuur door naar login check pagina
			redirect('/');
		}
	}
}