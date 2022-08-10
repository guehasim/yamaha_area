<?php 


class m_log extends CI_Model
{	
	public function lihat_data(){
		$query = $this->db->query("SELECT
							log_area.Tgl, 
							log_area.Jam, 
							log_area.Operator, 
							log_area.Ket,
							log_area.image, 
							m_item.item, 
							m_area.nama
						FROM
							log_area
							INNER JOIN
							m_item
							ON 
								log_area.ID_Item = m_item.ID_item
							INNER JOIN
							m_area
							ON 
								m_item.ID_area = m_area.ID_area
						ORDER BY
							log_area.ID_log DESC");
		return $query;
	}

	public function lihat_pdf($period_awal,$period_akhir)
	{
		if ($period_awal != "" && $period_akhir != "") {
			$tampil = "WHERE log_area.Tgl BETWEEN '$period_awal' AND '$period_akhir' ";
		}else{
			$tampil = "";
		}

		$query = $this->db->query("SELECT
							log_area.Tgl, 
							log_area.Jam, 
							log_area.Operator, 
							log_area.Ket,
							log_area.image, 
							m_item.item, 
							m_area.nama
						FROM
							log_area
							INNER JOIN
							m_item
							ON 
								log_area.ID_Item = m_item.ID_item
							INNER JOIN
							m_area
							ON 
								m_item.ID_area = m_area.ID_area
						$tampil
						ORDER BY
							log_area.ID_log DESC");
		return $query;
	}
}
 ?>