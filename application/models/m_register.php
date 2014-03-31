<?php
class m_Register extends CI_Model{

	public function save($data){

		## Array maken met gebruikers data
		$set = array(
			'firstname' => $data['firstname'],
			'lastname' => $data['lastname'],
			'username' => $data['username'],
			'password' => $data['password'],
			'date' => date("Y-m-d H:i:s")
		);

		## Sla de array op als user
		$this->db->insert('users',$set);

	}

}