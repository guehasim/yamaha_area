<?php 


class m_admin extends CI_Model
{
	
	public function lihat_data(){
		$query = $this->db->query("SELECT * FROM m_admin ORDER BY ID_admin DESC");
		return $query;
	}

	public function tambah_data()
	{
		$data = array(
			'ID_admin'		=> null,
			'nama'			=> $this->input->post('nama'),
			'username'		=> $this->input->post('user'),
			'password' 		=> sha1(md5($this->input->post('pass')))
			);

		$this->db->insert('m_admin',$data);
	}

	public function get_data($id)
	{
		$query = $this->db->query("SELECT * FROM m_admin WHERE ID_admin = $id ");
		return $query;
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_admin',$id);
        $this->db->delete('m_admin');
    }
}
 ?>