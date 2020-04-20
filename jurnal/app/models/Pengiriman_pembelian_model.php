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


class Pengiriman_pembelian_model extends CI_Model {

	public function save() {
		$this->db->set('tanggal',$this->input->post('tanggal', TRUE));
		$this->db->set('pemesananid',$this->input->post('pemesananid', TRUE));
		$this->db->set('tipe','1');
		$this->db->set('statusauto','0');
		$this->db->set('catatan',$this->input->post('catatan', TRUE));
		$this->db->set('cby',get_user('username'));
		$this->db->set('cdate',date('Y-m-d H:i:s'));
		$insertHead = $this->db->insert('tpengiriman');
		if($insertHead) {
			$idpengiriman = $this->db->insert_id();
			for ($i=0; $i < count($this->input->post('no', TRUE)); $i++) {
				if($this->input->post('jumlah', TRUE)[$i] > 0) {
					$this->db->set('idpengiriman',$idpengiriman);
					$this->db->set('itemid',$this->input->post('itemid', TRUE)[$i]);
					$this->db->set('jumlah',$this->input->post('jumlah', TRUE)[$i]);
					$this->db->insert('tpengirimandetail');
				}
			}

			$data['status'] = 'success';
			$data['message'] = lang('save_success_message');
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

	public function getpengiriman($id) {
		$this->db->select('tpengiriman.*, tpemesanan.kontakid, tpemesanan.gudangid, mkontak.nama as kontak, mkontak.alamat, mkontak.cp');
		$this->db->where('tpengiriman.id', $id);
		$this->db->join('tpemesanan', 'tpengiriman.pemesananid = tpemesanan.id', 'left');
		$this->db->join('mkontak', 'tpengiriman.kontakid = mkontak.id', 'left');
		$get = $this->db->get('tpengiriman',1);
		return $get->row_array();
	}

	public function pengirimandetail($idpengirman) {
		$this->db->select('tpengirimandetail.*, mitem.nama as item, msatuan.nama as satuan');
		$this->db->join('mitem', 'tpengirimandetail.itemid = mitem.id', 'left');
		$this->db->join('msatuan', 'mitem.satuanid = msatuan.id', 'left');
		$this->db->join('tpengiriman', 'tpengirimandetail.idpengiriman = tpengiriman.id');
		$this->db->where('tpengirimandetail.idpengiriman', $idpengirman);
		$get = $this->db->get('tpengirimandetail');
		return $get->result_array();
	}

	public function pemesanandetail($idpemesanan) {
		$this->db->select('tpemesanandetail.*, mitem.nama as item');
		$this->db->join('mitem', 'tpemesanandetail.itemid = mitem.id', 'left');
		$this->db->where('tpemesanandetail.idpemesanan', $idpemesanan);
		$this->db->where('tpemesanandetail.status !=', '3');
		$get = $this->db->get('tpemesanandetail');
		return $get->result_array();
	}
}

