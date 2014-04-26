<?php
class m_Login extends CI_Model{

	public function login($data){
		$salt = "#IDSYG55GSD3HE$@GFHSDGLSDGPAS";

		$this->db->from('users');
		$this->db->where('email',$data['email']);
		$this->db->where('password',md5($data['password'].$salt));

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){
			## Gebruiker gevonden
			$this->session->set_userdata('user_id',$rec->row()->userid);
			$this->session->set_userdata('super',$rec->row()->superuser);
			return true;
		}else{
			## Geen gebruiker gevonden
			return false;
		}
	}

	function is_online(){
		$this->db->from('users');
		$this->db->where('userid',$this->session->userdata('user_id'));
		$rec = $this->db->get();

		## Als de sessie gevuld is
		if($rec->num_rows() > 0){
			## User is ingelogd
			return true;
		}else{
			## User is niet ingelogd
			return false;
		}
	}

	function is_super(){
		## Als de user een super is
		if($this->session->userdata('super') == 1){
			return true;
		}else{
			return false;
		}
	}
}