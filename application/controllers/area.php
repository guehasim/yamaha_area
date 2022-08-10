<?php 


class area extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pic');
		$this->load->model('m_area');
		$this->load->model('m_item');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_idadmin');
		if ($user=="") {
			$this->load->view('login/index');
		}else{
			$this->load->view('template/admin_1');
			$data['pic'] 	= $this->m_pic->lihat_data_pic();
			$data['area'] 	= $this->m_area->lihat_data();
			$this->load->view('area/index',$data);			
			$this->load->view('template/admin_2');
		}
	}

	public function tambah()
	{
		$data = array(
			'ID_area'		=> null,
			'nama'			=> $this->input->post('nama'),
			'ID_pic'		=> $this->input->post('pic'),
			'qrcode'		=> ''
			);

		$this->db->insert('m_area',$data);

		$insert_id = $this->db->insert_id();

		$nama = base_url() .'user?us='.$insert_id;

		$this->load->library('ciqrcode');

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$insert_id.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $nama; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$data = array(
			'qrcode'	=> $image_name
			);

		$where = array(
			'ID_area' 		=> $insert_id
			);

		$this->m_area->update_data($where,$data,'m_area');
		

		$this->session->set_flashdata('msg',
						'<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Berhasil Menyimpan
						</div>');
		redirect('area');
	}

	public function get_item()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data ['idnya']	= $id;
            $data['item'] 	= $this->m_item->lihat_data($id);         
            $this->load->view('template/admin_1');
            $this->load->view('item/index',$data);
            $this->load->view('template/admin_2');
        }else{
        	echo "no";
        }
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$nama 	= $this->input->post('nama');
		$pic 	= $this->input->post('pic');

		$data = array(
			'nama'		=> $nama,
			'ID_pic'		=> $pic
			);

		$where = array(
			'ID_area' 		=> $id
			);

		$this->m_area->update_data($where,$data,'m_area');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('area');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->m_area->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('area');
	}

	public function cetak()
	{
		if (isset($_GET['us'])) {
			$id=$_GET['us'];
			$data['area'] 	= $this->m_area->get_data($id); 
			$this->load->view('area/cetakbarcode',$data);
		}
	}
}
 ?>