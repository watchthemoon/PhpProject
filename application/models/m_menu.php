<?php
class m_Menu extends CI_Model{

 public function save($data){

		## Array maken met menu data
		$set = array(
			'name' => $data['name'],
			'price' => $data['price'],
			'gerechttypeid' => $data['gerechttypeid'],
			'restaurantid' => $data['restaurantid'],
		);

		## Sla de array op als user
		$this->db->insert('menu',$set);
	}


		public function getMenu($restaurantid){
			$this->db->from('menu');
			$this->db->where('restaurantid',$restaurantid);
			$this->db->where('gerechttypeid',1);
			$query = $this->db->get();
			return $query;
		
		}

		public function getVoorgerecht($restaurantid){
			$this->db->from('menu');
			$this->db->where('restaurantid',$restaurantid);
			$this->db->where('gerechttypeid',1);
			$query = $this->db->get();
			return $query->result();
		
		}


		public function getHoofdgerecht($restaurantid){
			$this->db->from('menu');
			$this->db->where('restaurantid',$restaurantid);
			$this->db->where('gerechttypeid',2);
			$query = $this->db->get();
			return $query->result();
		
		}


		public function getNagerecht($restaurantid){
			$this->db->from('menu');
			$this->db->where('restaurantid',$restaurantid);
			$this->db->where('gerechttypeid',3);
			$query = $this->db->get();
			return $query->result();
		
		}

			public function getGerecht($menuid){
			$this->db->from('menu');
			$this->db->where('menuid',$menuid);
			$wijzigquery = $this->db->get();
			return $wijzigquery;
		
		}


		public function delete($data){
	
			$this->db->where('menuid', $data['menuid']);
			$this->db->delete('menu'); 
		}



		public function edit($data)
		{
			$set = array(
			'name' => $data['name'],
			'price' => $data['price'],
			'gerechttypeid' => $data['gerechttypeid'],
			'restaurantid' => $data['restaurantid']

			);

			$this->db->where('menuid', $data['menuid']);
			$this->db->update('menu', $set); 





	
}
}