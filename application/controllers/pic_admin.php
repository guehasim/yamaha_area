<?php 

/**
* 
*/
class pic_admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pic');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_idadmin');
		if ($user=="") {
			$this->load->view('login/index');
		}else{
			$this->load->view('template/admin_1');
			$data['pic'] = $this->m_pic->lihat_data_pic();
			$this->load->view('pic_admin/index',$data);
			$this->load->view('template/admin_2');
		}
	}

	public function tambah()
	{
		$pic 	= $this->input->post('pic');
		$user 	= $this->input->post('user');
		$nohp 	= $this->input->post('nohp');

		$this->db->where('NO_pic',$pic);
		$query = $this->db->get('m_pic');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Menambahkan Karena Nomor PIC ini sudah ada
						</div>');
			redirect('pic_admin');
		}else{
			$this->db->where('NoHP',$nohp);
			$query2 = $this->db->get('m_pic');

			if ($query2->num_rows() > 0) {
				$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Menambahkan Karena Nomor HP ini sudah ada
						</div>');
				redirect('pic_admin');
			}else{
				$this->db->where('username',$user);
				$query3 = $this->db->get('m_pic');

				if ($query3->num_rows() > 0) {
					$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Menambahkan Karena Username ini sudah ada
						</div>');
					redirect('pic_admin');
				}else{
					if (isset($_POST)) {
						$this->m_pic->tambah_data_pic();
						$this->session->set_flashdata('msg',
							'<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                                Berhasil Menyimpan
							</div>');
						redirect('pic_admin');
					}
				}
			}
		}
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$no_pic = $this->input->post('no_pic');
		$nama 	= $this->input->post('nama');
		$nohp 	= $this->input->post('no_hp');
		$user 	= $this->input->post('user');

		$data = array(
			'NO_pic' 	=> $no_pic,
			'nama' 		=> $nama,
			'NoHP' 		=> $nohp,
			'username' 	=> $user
			);

		$where = array(
			'ID_pic' 	=>$id
			);

		$this->m_pic->update_data($where,$data,'m_pic');
		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pic_admin');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$this->m_pic->hapus_data_pic($id);

		$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('pic_admin');
	}
}
 ?>