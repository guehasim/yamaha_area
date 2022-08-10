<?php 


class user extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_user');
		$this->load->model('m_item');
	}

	public function index()
	{ 
		if (isset($_GET['us'])) {
			$id = $_GET['us'];
			$data = array(
				'user'	=> $id
				);
			$this->session->set_userdata($data);			

			$data['area'] 		= $this->m_user->get_area($id);
			$data['item']		= $this->m_user->get_item($id);
			$this->load->view('user/index',$data);
		}else{
			$id = $this->session->userdata('user');

			$data['area'] 		= $this->m_user->get_area($id);
			$data['item']		= $this->m_user->get_item($id);
			$this->load->view('user/index',$data);
		}
	}

	public function update()
	{
		if (isset($_GET['us'])) {
			$id = $_GET['us'];
			$ids 	= $_GET['uss'];
			$status 	= 1;

			$data = array(
				'status' 		=> $status
				);

			$where = array(
				'ID_item' 		=> $id
				);

			$this->m_item->update_data($where,$data,'m_item');

			$data = array(
			'ID_log'	=> null,
			'Tgl'		=> date('Y-m-d'),
			'Jam'		=> date('h:i:s'),
			'ID_Item'	=> $id,
			'Operator' 	=> '-',
			'Ket'		=> 'kosong'
			);

		$this->db->insert('log_area',$data);
			// redirect('user');
			redirect('./user?us='.$ids.'');
		}
		
		// if (isset($_POST)) {
		// 	$this->m_user->tambah_data();
			
		// 	redirect('user');
		// }
	}		
}
 ?>