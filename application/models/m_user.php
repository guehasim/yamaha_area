<?php 

/**
* 
*/
class m_user extends CI_Model
{
	
	public function get_area($id)
	{
		$query = $this->db->query("SELECT * FROM m_area WHERE ID_area = '$id' ");
		return $query;
	}

	public function get_item($id)
	{
		$query = $this->db->query("SELECT * FROM m_item WHERE ID_area = '$id' ORDER BY ID_item DESC");
		return $query;
	}
}
 ?>