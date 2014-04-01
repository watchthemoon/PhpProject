<?php
class m_Register extends CI_Model{

	public function save($data){

		$salt = "#IDSYG55GSD3HE$@GFHSDGLSDGPAS";

		## Plak alle data van de birthdate aan elkaar zodat het in de database kan
		$birthdate = $data['year'].'/'.$data['month'].'/'.$data['day'];

		##
		if($data['isAdmin'] == 'yes'){
			$admin = true;
		}else{
			$admin = false;
		}

		## Array maken met gebruikers data
		$set = array(
			'name' => $data['name'],
			'firstname' => $data['firstname'],
			'email' => $data['email'],
			'phone' => $data['phonenumber'],
			'birthdate' => $birthdate,
			'password' => md5($data['password'].$salt),
			'superuser' => $admin
		);

		## Sla de array op als user
		$this->db->insert('users',$set);

		## Laat de laatst uitgevoerde query zien
		echo $this->db->last_query();
		die();

	}

}