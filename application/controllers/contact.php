<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include "config.php";
class Contact extends Config {

	public function index()	{
		$data = array(
			'view' => 'contact',
			'errors' => $this->session->userdata('error'),
			'post' => $this->session->userdata('post')
		);

		$this->load->view('index',array_merge($this->data,$data));

		$this->session->unset_userdata('error');
  		$this->session->unset_userdata('post');

	}

	public function mail(){

		$error = array();
		$post = $this->input->post();

		##VALIDEREN VAN DE VELDEN

		if (empty($post['FirstnameContact'])){
			$error['FirstnameContact'] = 'Vul een voornaam in.';
		}
		if (empty($post['LastnameContact'])){
			$error['LastnameContact'] = 'Vul een achternaam in.';
		}
		if (empty($post['EmailContact'])){
			$error['EmailContact'] = 'Vul een emailadres in.';
		}
		if (empty($post['TelephoneContact'])){
			$error['TelephoneContact'] = 'Vul een telefoonnummer in.';
		}
		if (empty($post['TitelContact'])){
			$error['TitelContact'] = 'Vul een onderwerp in.';
		}
		if (empty($post['MessageContact'])){
			$error['MessageContact'] = 'Vul een bericht in.';
		}

		## Is het een juist emailadres?
		if ( !filter_var($_POST['EmailContact'], FILTER_VALIDATE_EMAIL)) {
    	$error['EmailContact'] = 'Het e-mailadres '.htmlspecialchars($post['EmailContact']).' is niet geldig';
		}

		if (count($error) > 0){

			## Errors gevonden
			$this->session->set_userdata('error',$error);
			$this->session->set_userdata('post',$post);
			redirect('/contact');

		}else{

			## Geen errors, opslaan

			## Laad de model
			$this->load->model('m_contact');

			## Sla de gegevens op in de model
			$this->m_contact->mail($post);

			## Vul melding dat het gelukt is
			$this->session->set_userdata('melding','Het formulier is verzonden.');

			## Stuur door naar login pagina
			redirect('/contact');

		}

	}

}