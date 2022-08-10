<?php 

date_default_timezone_set('Asia/Jakarta');
/**
* 
*/
class m_pic extends CI_Model
{

	public function lihat_data()
	{
		$id = $this->session->userdata('ses_idpic');
		$query = $this->db->query("SELECT * FROM m_area
								WHERE
									m_area.ID_pic = '$id' 
								ORDER BY m_area.ID_area DESC");
		return $query;
	}

	public function lihat_data_item($ID_area_list)
	{
		$query = $this->db->query("SELECT * FROM m_item WHERE ID_area='$ID_area_list' ORDER BY ID_Item DESC");
		return $query;
	}

	public function tambah_data($gambar)
	{
		$data = array(
			'ID_log'	=> null,
			'Tgl'		=> $this->input->post('tgl'),
			'Jam'		=> $this->input->post('waktu'),
			'ID_Item'	=> $this->input->post('id'),
			'Operator' 	=> $this->input->post('pic'),
			'Ket'		=> 'tersedia',
			'image'		=> $gambar
			);

		$this->db->insert('log_area',$data);
	}

	//master PIC=====================================================================

	public function lihat_data_pic()
	{
		$query = $this->db->query("SELECT * FROM m_pic ORDER BY ID_pic DESC");
		return $query;
	}

	public function tambah_data_pic()
	{
		$data = array(
			'ID_pic'	=> null,
			'NO_pic'	=> $this->input->post('no_pic'),
			'nama'		=> $this->input->post('nama'),
			'NoHP'		=> $this->input->post('nohp'),
			'username'	=> $this->input->post('user'),
			'password' 	=> sha1(md5($this->input->post('pass')))
			);
		$this->db->insert('m_pic',$data);
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data_pic($id)
	{
		$this->db->where('ID_pic',$id);
		$this->db->delete('m_pic');
	}
}
 ?>