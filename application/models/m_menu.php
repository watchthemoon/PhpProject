<?php
class m_Menu extends CI_Model{

 public function save($data){

		## Array maken met menu data
		$set = array(
			'name' => $data['name'],
			'price' => $data['price'],
		);

		## Sla de array op als user
		$this->db->insert('menu',$set);
	}

	public function load($menuid){
		$this->db->from('menu');
		$this->db->where('menuid',$menuid);

		$rec = $this->db->get();
		if ($rec->num_rows() > 0){

			$cords = array();
			foreach($rec->result() as $menu){
				$cords[$menu->coordinates] = $menu;
			}
			return $cords;
		}else{
			return '';
		}

	}

}