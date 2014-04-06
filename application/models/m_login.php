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
			return true;
		}else{
			## Geen gebruiker gevonden
			return false;
		}
	}

}