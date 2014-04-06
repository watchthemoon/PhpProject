<?php

function activerecordtest(){

	$rec = $this->db->get_where('users',array('id' => 1));

	$this->db->select('
			id
			,username
		');
	$this->db->from('users u');
	$this->db->join('messages m','m.user_id = u.user_id','left');
	$this->db->where('
			(
				id = 1
				OR id = 2
			)
		');

	$rec = $this->db->get();
	if ($rec->num_rows() > 0){

		$array = $rec->result_array();
		$object = $rec->result();
		$item = $rec->row();

		$user = $array['username'];
		$user = $object->username;

	}else{
		echo 'Niks gevonden';
	}

}