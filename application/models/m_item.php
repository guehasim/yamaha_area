<?php 


class m_item extends CI_Model
{
	public function lihat_data($id){
		$query = $this->db->query("SELECT
										m_item.ID_item, 
										m_item.ID_area, 
										m_item.item, 
										m_item.`status`
									FROM
										m_area
										INNER JOIN
										m_item
										ON 
											m_area.ID_area = m_item.ID_area
									WHERE
										m_item.ID_area = '$id'
									ORDER BY
										m_item.ID_item DESC");
		return $query;
	}

	public function tambah_data()
	{
		$data = array(
			'ID_item'		=> null,
			'ID_area'		=> $this->input->post('area'),
			'item'			=> $this->input->post('item'),
			'status' 		=> 0
			);

		$this->db->insert('m_item',$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_item',$id);
        $this->db->delete('m_item');
    }
}
 ?>