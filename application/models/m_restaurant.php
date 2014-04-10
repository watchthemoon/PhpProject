<?php
	class m_Restaurant extends CI_Model{

		public function save($data){

			## Array maken met restaurant data
			$set = array(
			'name' => $data['name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'country' => $data['country'],
			'phone' => $data['phone'],
			'image' => $data['image'],
			'description' => $data['description']
			);

			## Sla de array op als restaurant
			$this->db->insert('restaurants',$set);
		}

		public function getRestaurants(){
			$query = $this->db->get('restaurants');
			return $query;
		
	}
}

?>