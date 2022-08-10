<?php 


class admin extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_admin');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_idadmin');
		if ($user=="") {
			$this->load->view('login/index');
		}else{
			$data['admin'] 		= $this->m_admin->lihat_data();
			$this->load->view('template/admin_1');
			$this->load->view('admin/index',$data);
			$this->load->view('template/admin_2');
		}
	}

	public function tambah()
	{
		$user = $this->input->post('user');

		$this->db->where('username',$user);
		$query = $this->db->get('m_admin');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Menambahkan Karena Username ini sudah ada
						</div>');
			redirect('admin');
		}else{

			if (isset($_POST)) {
				$this->m_admin->tambah_data();
				$this->session->set_flashdata('msg',
							'<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                                Berhasil Menyimpan
							</div>');
				redirect('admin');
			}
		}
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$nama 	= $this->input->post('nama');
		$user 	= $this->input->post('user');

		$data = array(
			'nama'			=> $nama,
			'username'		=> $user
			);

		$where = array(
			'ID_admin' 		=> $id
			);

		$this->m_admin->update_data($where,$data,'m_admin');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('admin');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->m_admin->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('admin');
	}
}
 ?>