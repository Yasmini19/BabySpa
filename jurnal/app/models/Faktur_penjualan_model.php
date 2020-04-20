<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** 
* =================================================
* @package	CGC (CODEIGNITER GENERATE CRUD)
* @author	isyanto.id@gmail.com
* @link	https://isyanto.com
* @since	Version 1.0.0
* @filesource
* ================================================= 
*/


class Faktur_penjualan_model extends CI_Model {

	public function save() {
		$notrans = $this->input->post('notrans', TRUE);
		$ceknotrans = get_by_id('notrans',$notrans,'tfaktur');
		if($ceknotrans) {
			$data['status'] = 'error';
			$data['message'] = 'Kode sudah ada';
			return $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}

		$statusauto = $this->input->post('statusauto', TRUE);
		if($statusauto == '1') {
			$pemesananid = $this->input->post('pemesananid', TRUE);
			if($pemesananid) {
				$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
				$this->db->set('pemesananid',$this->input->post('pemesananid', TRUE));
				$this->db->set('tipe','2');
				$this->db->set('statusauto','1');
				$this->db->set('catatan','-');
				$this->db->set('cby',get_user('username'));
				$this->db->set('cdate',date('Y-m-d H:i:s'));
				$insertHead = $this->db->insert('tpengiriman');
				if($insertHead) {
					$idpengiriman = $this->db->insert_id();
					for ($i=0; $i < count($this->input->post('no', TRUE)); $i++) {
						$this->db->set('idpengiriman',$idpengiriman);
						$this->db->set('itemid',$this->input->post('itemid', TRUE)[$i]);
						$this->db->set('jumlah',remove_comma($this->input->post('jumlah', TRUE)[$i]));
						$this->db->insert('tpengirimandetail');
					}
					$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
					$this->db->set('pengirimanid',$idpengiriman);
					$this->db->set('tipe','2');
					$this->db->set('catatan',$this->input->post('catatan', TRUE));
					$this->db->set('cby',get_user('username'));
					$this->db->set('cdate',date('Y-m-d H:i:s'));
					$insertHead = $this->db->insert('tfaktur');
					if($insertHead) {
						$data['status'] = 'success';
						$data['message'] = lang('save_success_message');
						return $this->output->set_content_type('application/json')->set_output(json_encode($data));
					}
				}
			} else {
				$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
				$this->db->set('kontakid',$this->input->post('kontakid', TRUE));
				$this->db->set('gudangid',$this->input->post('gudangid', TRUE));
				$this->db->set('tipe','2');
				$this->db->set('statusauto','1');
				$this->db->set('catatan','-');
				$this->db->set('cby',get_user('username'));
				$this->db->set('cdate',date('Y-m-d H:i:s'));
				$insertHead = $this->db->insert('tpengiriman');
				if($insertHead) {
					$idpengiriman = $this->db->insert_id();
					$detail_array = $this->input->post('detail_array');
					$detail_array = json_decode($detail_array);
					foreach($detail_array as $row) {
						$this->db->set('idpengiriman',$idpengiriman);
						$this->db->set('itemid',$row[0]);
						$this->db->set('harga',remove_comma($row[2]));
						$this->db->set('jumlah',remove_comma($row[3]));
						$this->db->set('diskon',remove_comma($row[5]));
						$this->db->set('ppn',remove_comma($row[6]));
						$this->db->insert('tpengirimandetail');
					}

					$this->db->set('notrans',$this->input->post('notrans', TRUE));
					$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
					$this->db->set('pengirimanid',$idpengiriman);
					$this->db->set('tipe','2');
					$this->db->set('catatan',$this->input->post('catatan', TRUE));
					$this->db->set('cby',get_user('username'));
					$this->db->set('cdate',date('Y-m-d H:i:s'));
					$insertHead = $this->db->insert('tfaktur');
					if($insertHead) {
						$data['status'] = 'success';
						$data['message'] = lang('save_success_message');
						return $this->output->set_content_type('application/json')->set_output(json_encode($data));
					}
				}
			}
		} else {
			$this->db->set('notrans',$this->input->post('notrans', TRUE));
			$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
			$this->db->set('pengirimanid',$this->input->post('pengirimanid', TRUE));
			$this->db->set('catatan',$this->input->post('catatan', TRUE));
			$this->db->set('tipe','2');
			$this->db->set('cby',get_user('username'));
			$this->db->set('cdate',date('Y-m-d H:i:s'));
			$insertHead = $this->db->insert('tfaktur');
			if($insertHead) {
				$data['status'] = 'success';
				$data['message'] = lang('save_success_message');
			}			
		}

		return $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function cekjumlahinput() {
		$itemid = $this->input->post('itemid', TRUE);
		$idpemesanan = $this->input->post('idpemesanan', TRUE);
		if($itemid && $idpemesanan) {
			$this->db->select('jumlahsisa');
			$this->db->where('idpemesanan', $idpemesanan);
			$this->db->where('itemid', $itemid);
			$row = $this->db->get('tpemesanandetail', 1)->row_array();
			$data['jumlahsisa'] = $row['jumlahsisa'];
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function pemesanandetail($idpemesanan) {
		$this->db->select('tpemesanandetail.*, mitem.nama as item');
		$this->db->join('mitem', 'tpemesanandetail.itemid = mitem.id', 'left');
		$this->db->where('tpemesanandetail.idpemesanan', $idpemesanan);
		$this->db->where('tpemesanandetail.status !=', '3');
		$get = $this->db->get('tpemesanandetail');
		return $get->result_array();
	}

	public function pengirimandetail($idpengiriman) {
		$this->db->select('
			tpengirimandetail.*, mitem.nama as item
		');
		$this->db->join('mitem', 'tpengirimandetail.itemid = mitem.id', 'left');
		$this->db->join('tpengiriman', 'tpengirimandetail.idpengiriman = tpengiriman.id');
		$this->db->where('tpengirimandetail.idpengiriman', $idpengiriman);
		$get = $this->db->get('tpengirimandetail');
		return $get->result_array();
	}

	public function getpemesanan($idpemesanan) {
		$this->db->select('tpemesanan.kontakid, tpemesanan.gudangid');
		$this->db->where('id', $idpemesanan);
		$get = $this->db->get('tpemesanan');
		return $get->row_array();
	}

	public function getfaktur($id) {
		$this->db->select('tfaktur.*, mkontak.nama as kontak, mkontak.alamat, mkontak.telepon, tpengiriman.notrans as nosj');
		$this->db->where('tfaktur.id', $id);
		$this->db->join('mkontak', 'tfaktur.kontakid = mkontak.id','left');
		$this->db->join('tpengiriman', 'tfaktur.pengirimanid = tpengiriman.id','left');
		$get = $this->db->get('tfaktur', 1);
		return $get->row_array();
	}

	public function fakturdetail($idfaktur) {
		$this->db->select('tfakturdetail.*, mitem.nama as item');
		$this->db->where('tfakturdetail.idfaktur', $idfaktur);
		$this->db->join('mitem', 'tfakturdetail.itemid = mitem.id', 'left');
		$get = $this->db->get('tfakturdetail');
		return $get->result_array();
	}

	public function detailitem() {
		$itemid = $this->input->post('itemid', TRUE);
		if($itemid) {
			$this->db->where('id', $itemid);
			$get = $this->db->get('mitem',1);
			$data = $get->row_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function get_detail_item() {
		$itemid = $this->input->post('itemid', TRUE);
		if($itemid) {
			$this->db->where('id', $itemid);
			$this->db->where('stdel', '0');
			$data = $this->db->get('mitem', 1)->row_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function get_stok_item() {
		$itemid = $this->input->post('itemid', TRUE);
		$gudangid = $this->input->post('gudangid', TRUE);
		if($itemid && $gudangid) {
			$this->db->select_sum('sisa','stok');
			$this->db->where('itemid', $itemid);
			$this->db->where('gudangid', $gudangid);
			$data = $this->db->get('tstokmasuk', 1)->row_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function getjumlahsisa($idfaktur) {
		$this->db->select_sum('jumlahsisa','sisa');
		$this->db->where('idfaktur', $idfaktur);
		$get = $this->db->get('tfakturdetail');
		return $get->row()->sisa;
	}
}

