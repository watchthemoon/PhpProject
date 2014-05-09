<?php
class m_Reserve extends CI_Model{

	public function check($restaurantid,$date){
		$this->db->select('t.coordinates');
		$this->db->from('reserve r');
		$this->db->join('tables t', 't.tableid = r.tableid');
		$this->db->where('r.restaurantid',$restaurantid);
		$this->db->where('r.date',date("Y-m-d",strtotime($date)));

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){
			return $rec->result();
		}else{
			return '';
		}

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

	public function save($data){

		## Array maken met gebruikers data
	
		## Array maken met menu data
		$set = array(
			'restaurantid' => $data['restaurantid'],
			'tableid' => $data['tableid'],
			'date' =>   date("Y-m-d",strtotime($data['resdate'])),
			'peoplenr' => $data['aantal'],
			'description' => $data['description']
		);
			$this->db->insert('reserve',$set);
			

}

	public function delete($data){

		$this->db->where('reserveid',$data['reserveid']);
		$this->db->delete('reserve');


	}

		public function edit($data){
		$set = array(
			'peoplenr' => $data['aantal'],
			'description' => $data['description']
			);
		$this->db->where('reserveid',$data['reserveid']);
		$this->db->update('reserve',$set);
	}

public function showRes($data){

		$this->db->from('reserve');
		$this->db->where('tableid',$data['tableid']);
		$this->db->where('date',date("Y-m-d",strtotime($data['resdate'])));
		$query = $this->db->get();
		return $query;


}

public function lijstRes($data){


$this->db->from('reserve');
		$this->db->where('date',date("Y-m-d",strtotime($data['date'])));
		$query = $this->db->get();
		return $query;

}
}