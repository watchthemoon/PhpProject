<?php
class m_Restaurant extends CI_Model{

	public function save($data)	{

		## Array maken met restaurant data
		$set = array(
			'name' => $data['name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'country' => $data['country'],
			'phone' => $data['phone'],
			'image' => $data['image'],
			'imageHeader' => $data['imageHeader'],
			'description' => $data['description'],
			'userid' => $this->session->userdata('user_id')
		);

		## Sla de array op als restaurant
		$this->db->insert('restaurants', $set);
	}

	public function getRestaurants($city = '')	{
		$this->db->from('restaurants');
		if ($city != '') {
			$this->db->like('city', $city);
		}

		$rec = $this->db->get();
		if ($rec->num_rows() > 0) {
			return $rec->result();
		} else {
			return '';
		}
	}

	public function getRestaurantByUser($id)	{
		$this->db->from('restaurants');
		$this->db->where('userid', $id);
		$rec = $this->db->get();
		return $rec->result();
	}

	public function getRestaurantById($id)	{
		$this->db->from('restaurants');
		$this->db->where('restaurantid', $id);

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){
			return $rec->row();
		}else{
			return '';
		}
	}

	public function delete($id){
		$this->db->where('restaurantid', $id);
		$this->db->delete('restaurants');
	}

	public function edit($data)	{
		$set = array(
			'name' => $data['name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'country' => $data['country'],
			'phone' => $data['phone'],
			'image' => $data['image'],
			'imageHeader' => $data['imageHeader'],
			'description' => $data['description'],
			'userid' => $this->session->userdata('user_id')
		);

		$this->db->where('restaurantid', $data['restaurantid']);
		$this->db->update('restaurants', $set);
	}

}