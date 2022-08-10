<?php 


class pic extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		 $this->load->library('upload');
		$this->load->model('m_pic');
		$this->load->model('m_item');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_idpic');
		if ($user=="") {
			$this->load->view('pic/login/index');
		}else{
			$data['pic'] 		= $this->m_pic->lihat_data();
			// $data['pic_item'] 	= $this->m_pic->lihat_data_item($ID_area_list);
			$this->load->view('pic/pic_1');
			$this->load->view('pic/index',$data);
			$this->load->view('pic/pic_2');
		}
	}

	public function aksi_login()
	{
		$user = $this->input->post('user');
		$pass = sha1(md5($this->input->post('pass')));

		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get('m_pic');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_idpic'			=> $row->ID_pic,
				'ses_namapic'		=> $row->nama
				);
			$this->session->set_userdata($data);			

			redirect('pic');
		}else{
			
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Periksa Username atau Password');
			redirect('pic');
		}
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$status 	= $this->input->post('status');		
		
		// if (!empty($_FILES['image']['name'])) {
  //           $image = $this->_do_upload();
  //           $data['image'] = $image;
  //       }				

		$config['upload_path'] = 'assets/upload/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['image']['name'])){
 
            if ($this->upload->do_upload('image')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='assets/upload/images/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 600;
                $config['new_image']= 'assets/upload/images/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                // echo "Image berhasil diupload";

                if (isset($_POST)) {
                	$this->m_pic->tambah_data($gambar);

                	$data = array(
						'status' 		=> $status
						);

					$where = array(
						'ID_item' 		=> $id
						);

					$this->m_item->update_data($where,$data,'m_item');
                }

            }
                      
        }else{
            echo "Image yang diupload kosong";
        }

		redirect('pic');
	}

	// function _do_upload(){
 //        $config['upload_path'] = 'assets/upload/images/'; //path folder
 //        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
 //        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
 //        $this->upload->initialize($config);
 //        if(!empty($_FILES['image']['name'])){
 
 //            if ($this->upload->do_upload('image')){
 //                $gbr = $this->upload->data();
 //                //Compress Image
 //                $config['image_library']='gd2';
 //                $config['source_image']='assets/upload/images/'.$gbr['file_name'];
 //                $config['create_thumb']= FALSE;
 //                $config['maintain_ratio']= FALSE;
 //                $config['quality']= '100%';
 //                $config['width']= 2000;
 //                $config['height']= 2000;
 //                $config['new_image']= 'assets/upload/images/'.$gbr['file_name'];
 //                $this->load->library('image_lib', $config);
 //                $this->image_lib->resize();
 //                $gambar=$gbr['file_name'];
 //                // echo "Image berhasil diupload";

 //                if (isset($_POST)) {
 //                	$this->m_pic->tambah_data($gambar);
 //                }

 //            }
                      
 //        }else{
 //            echo "Image yang diupload kosong";
 //        }
                 
 //    }



	// private function _do_upload()
 //    {
 //        $image_name = time().'-'.$_FILES["image"]['name'];

 //        $config['upload_path'] 		= 'assets/upload/images/';
 //        $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
 //        $config['max_size'] 		= 3000;
 //        $config['max_widht'] 		= 3000;
 //        $config['max_height']  		= 3000;
 //        $config['file_name'] 		= $image_name;

 //        $this->load->library('upload', $config);
 //        if (!$this->upload->do_upload('image')) {
 //            $this->session->set_flashdata('msg',
	// 			'<div class="alert alert-danger alert-dismissable">
	// 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 //                                Gagal Dalam Menyimpan, Karena Ukuran atau Kapasitas melebihi dari ketentutan
	// 			</div>');
			
	// 		redirect('pic');
 //        }
 //        return $this->upload->data('file_name');
 //    }

	public function logout()
	{
		$this->session->unset_userdata('ses_idpic');
		$this->session->unset_userdata('ses_namapic');
		session_destroy();

		redirect('pic');
	}
}
 ?>