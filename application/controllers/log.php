<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

class log extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_log');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_idadmin');
		if ($user=="") {
			$this->load->view('login/index');
		}else{

			$period_awal  = date('Y-m-d',strtotime($this->input->post('period_awal')));
			$period_akhir = date('Y-m-d',strtotime($this->input->post('period_akhir')));

			$submit = $this->input->post('submitdata');

			

			if ($submit == 'Reset') {

				$data['period_awal'] = '';
				$data['period_akhir']= '';
				$this->load->view('template/admin_1');
				$data['log'] 	= $this->m_log->lihat_data();
				$this->load->view('log/index',$data);
				$this->load->view('template/admin_2');

			}else if($submit == 'Print PDF'){

				$data['period_awal'] = date('m/d/Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('m/d/Y',strtotime($this->input->post('period_akhir')));
				$data['cetak'] = $this->m_log->lihat_pdf($period_awal,$period_akhir);
				$this->load->view('log/cetaklog',$data);

			}else if($submit == 'Print Excel'){

				$data['period_awal'] = date('m/d/Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('m/d/Y',strtotime($this->input->post('period_akhir')));

				$semua_pengguna = $this->m_log->lihat_pdf($period_awal,$period_akhir);

				$spreadsheet = new Spreadsheet;

		          $spreadsheet->setActiveSheetIndex(0)
		                      ->setCellValue('A1', 'No')
		                      ->setCellValue('B1', 'TANGGAL')
		                      ->setCellValue('C1', 'OPERATOR')
		                      ->setCellValue('D1', 'KETERANGAN');

		          $kolom = 2;
		          $nomor = 1;
		          foreach($semua_pengguna->result() as $pengguna) {

		               $spreadsheet->setActiveSheetIndex(0)
		                           ->setCellValue('A' . $kolom, $nomor)
		                           ->setCellValue('B' . $kolom, date('d M y',strtotime($pengguna->Tgl)).' '.date('h:i:s',strtotime($pengguna->Jam)))
		                           ->setCellValue('C' . $kolom, $pengguna->Operator)
		                           ->setCellValue('D' . $kolom, 'Item '.$pengguna->item.' di '.$pengguna->nama.' '.$pengguna->Ket);

		               $kolom++;
		               $nomor++;

		          }

		          $writer = new Xlsx($spreadsheet);

		          header('Content-Type: application/vnd.ms-excel');
			  header('Content-Disposition: attachment;filename="Laporan Log Area.xls"');
			  header('Cache-Control: max-age=0');

			  $writer->save('php://output');
			}else if($submit == 'Search'){
				$data['period_awal'] = date('m/d/Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('m/d/Y',strtotime($this->input->post('period_akhir')));
				$this->load->view('template/admin_1');
				$data['log'] = $this->m_log->lihat_pdf($period_awal,$period_akhir);
				$this->load->view('log/index',$data);
			}
			else{
				$data['period_awal'] = '';
				$data['period_akhir']= '';
				$this->load->view('template/admin_1');
				$data['log'] 	= $this->m_log->lihat_data();
				$this->load->view('log/index',$data);
				$this->load->view('template/admin_2');
			}		
			
		}
	}
}
 ?>