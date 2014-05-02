<?php
class m_Tables extends CI_Model{

	public function save($data){

		## Array maken met gebruikers data
		$set = array(
			'name' => $data['name'],
			'amountseats' => $data['amount'],
			'restaurantid' => $data['restaurantid'],
			'coordinates' => $data['coordinates'],
		);

		## Sla de array op als user
		$this->db->insert('tables',$set);
	}

	public function edit($data){

		## Array maken met gebruikers data
		$set = array(
			'name' => $data['name'],
			'amountseats' => $data['amount'],
		);

		## Sla de array op als user
		$this->db->update('tables',$set);
	}

	public function load($restaurantid){
		$this->db->from('tables');
		$this->db->where('restaurantid',$restaurantid);

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){

			$cords = array();
			foreach($rec->result() as $table){
				$cords[$table->coordinates] = $table;
			}
			return $cords;
		}else{
			return '';
		}

	}

}