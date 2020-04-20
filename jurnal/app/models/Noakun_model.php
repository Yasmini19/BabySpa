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


class Noakun_model extends CI_Model {

	public function save() {
		$id = $this->uri->segment(3);
		if($id) {
			foreach($this->input->post() as $key => $val) $this->db->set($key,strip_tags($val));
			$this->db->set('uby',get_user('username'));
			$this->db->set('udate',date('Y-m-d H:i:s'));
			$this->db->where('noakun', $id);
			$update = $this->db->update('mnoakun');
			if($update) {
				$data['status'] = 'success';
				$data['message'] = lang('update_success_message');
			} else {
				$data['status'] = 'error';
				$data['message'] = lang('update_error_message');
			}
		} else {
			foreach($this->input->post() as $key => $val) $this->db->set($key,strip_tags($val));
			$this->db->set('saldo',remove_comma($this->input->post('saldo')));
			$this->db->set('cby',get_user('username'));
			$this->db->set('cdate',date('Y-m-d H:i:s'));
			$insert = $this->db->insert('mnoakun');
			if($insert) {
				$data['status'] = 'success';
				$data['message'] = lang('save_success_message');
			} else {
				$data['status'] = 'error';
				$data['message'] = lang('save_error_message');
			}
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function delete() {
		$id = $this->uri->segment(3);
		$this->db->set('stdel','1');
		$this->db->set('dby',get_user('username'));
		$this->db->set('ddate',date('Y-m-d H:i:s'));
		$this->db->where('noakun', $id);
		$update = $this->db->update('mnoakun');
		if($update) {
			$data['status'] = 'success';
			$data['message'] = lang('delete_success_message');
		} else {
			$data['status'] = 'error';
			$data['message'] = lang('delete_error_message');
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function get_jurnal_detail_count($noakun, $tanggalawal, $tanggalakhir) {
		$queryString = "SELECT count(*) as total_row
		FROM viewjurnaldetail
		JOIN (SELECT @sum := 0) AS getsum
		WHERE noakun = '".$noakun."'
		AND tanggal >= '".$tanggalawal."'
		AND tanggal <= '".$tanggalakhir."'
		ORDER BY tanggalwaktu ASC";

		$get = $this->db->query($queryString);
		return $get->row()->total_row;
	}


	public function get_jurnal_detail($offset, $limit, $noakun, $tanggalawal, $tanggalakhir) {
		$queryString = "SELECT tipe, tanggal, keterangan, noakun, namaakun, debet, kredit,
		CASE WHEN stdebet = '1' THEN (@sum := @sum + debet - kredit) 
		ELSE (@sum := @sum + kredit - debet) END AS saldo
		FROM viewjurnaldetail
		JOIN (SELECT @sum := 0) AS getsum
		WHERE noakun = '".$noakun."'
		AND tanggal >= '".$tanggalawal."'
		AND tanggal <= '".$tanggalakhir."'
		ORDER BY tanggalwaktu ASC LIMIT ".$limit." OFFSET ".$offset;

		$get = $this->db->query($queryString);
		return $get->result_array();
	}
}

