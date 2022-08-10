<?php 


class item extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_item');
	}

	public function tambah()
	{
		if (isset($_POST)) {
			$this->m_item->tambah_data();
			$this->session->set_flashdata('msg',
						'<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Berhasil Menyimpan
						</div>');
			// redirect('item');
			redirect('./area/get_item?us='.$_POST[area].'');
		}
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$area 	= $this->input->post('area');
		$item 	= $this->input->post('item');
		$status 	= $this->input->post('status');

		$data = array(
			'ID_area'		=> $area,
			'item'			=> $item,
			'status' 		=> $status
			);

		$where = array(
			'ID_item' 		=> $id
			);

		$this->m_item->update_data($where,$data,'m_item');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('./area/get_item?us='.$_POST[area].'');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->m_item->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('./area/get_item?us='.$_POST[area].'');
	}	
}
 ?>