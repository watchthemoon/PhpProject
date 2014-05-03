<?php
class m_Reserve extends CI_Model{
	public function check($restaurantid, $tableid){
		$this->db->from('reserve');
		$this->db->where('restaurantid',$restaurantid);
		$this->db->where('tableid',$tableid);

		$rec = $this->db->get();

		if ($rec->num_rows() > 0){
			return $rec->result();
		}else{
			return '';
		}

		print_r($rec->result());
	}
}