<?php 


class login extends CI_Controller
{	
	
	public function aksi_login()
	{
		$user = $this->input->post('user');
		$pass = sha1(md5($this->input->post('pass')));

		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get('m_admin');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_idadmin'	=> $row->ID_admin,
				'ses_namaadmin'	=> $row->nama
				);
			$this->session->set_userdata($data);			

			redirect('admin');
		}else{
			
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Periksa Username atau Password');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_idadmin');
		$this->session->unset_userdata('ses_namaadmin');
		session_destroy();

		redirect('admin');
	}
}
 ?>