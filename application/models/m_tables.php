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

	public function load($restaurantid,$tableid = 0){

		$this->db->from('tables');
		$this->db->where('restaurantid',$restaurantid);
		if ($tableid != 0){
			$this->db->where('tableid',$tableid);
		}

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){
			if ($tableid != 0){

				return $rec->row();

			}else{

				$cords = array();
				foreach($rec->result() as $table){
					$cords[$table->coordinates] = $table;
				}
				return $cords;

			}
		}else{
			return '';
		}

	}

}