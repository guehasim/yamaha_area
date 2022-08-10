<?php 


class m_area extends CI_Model
{
	
	public function lihat_data(){
		$query = $this->db->query("SELECT
						m_area.ID_area, 
						m_area.nama AS nama_area,
						m_area.ID_pic, 
						m_area.qrcode, 
						COUNT(m_item.ID_area) AS qty,
						m_pic.NO_pic, 
						m_pic.nama AS nama_pic, 
						m_pic.NoHP
					FROM
						m_area
						LEFT JOIN
						m_item
						ON 
							m_area.ID_area = m_item.ID_area
						LEFT JOIN
						m_pic
						ON 
							m_area.ID_pic = m_pic.ID_pic
						GROUP BY
						m_area.ID_area
						ORDER BY
						m_area.ID_area DESC");
		return $query;
	}

	public function get_data($id)
	{
		$query = $this->db->query("SELECT
							m_area.ID_area, 
							m_area.nama,
							m_area.qrcode
						FROM
							m_area
						WHERE
							m_area.ID_area = '$id' ");
		return $query;
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_area',$id);
        $this->db->delete('m_area');
    }
}
 ?>