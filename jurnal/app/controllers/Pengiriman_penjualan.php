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


class Pengiriman_penjualan extends User_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pengiriman_penjualan_model','model');
	}

	public function index() {
		$data['title'] = lang('delivery');
		$data['subtitle'] = lang('list');
		$data['content'] = 'Pengiriman_penjualan/index';
		$data = array_merge($data,path_info());
		$this->parser->parse('default',$data);
	}

	public function index_datatable() {
		$this->load->library('Datatables');
		$this->datatables->select('
			tpengiriman.*, tpemesanan.id idpemesanan, tpemesanan.notrans nopemesanan, mkontak.nama as supplier, mgudang.nama as gudang
		');
		$this->datatables->where('tpengiriman.tipe','2');
		$this->datatables->where('tpengiriman.statusauto','0');
		$this->datatables->join('tpemesanan','tpengiriman.pemesananid = tpemesanan.id','left');
		$this->datatables->join('mkontak','tpemesanan.kontakid = mkontak.id','left');
		$this->datatables->join('mgudang','tpemesanan.gudangid = mgudang.id','left');
		$this->datatables->from('tpengiriman');
		return print_r($this->datatables->generate());
	}

	public function create() {
		$idpemesanan = $this->input->get('idpemesanan');
		if($idpemesanan) {
			$detailpemesanan = get_by_id('id',$idpemesanan,'tpemesanan');
			if($detailpemesanan) {
				$data['title'] = lang('delivery');
				$data['subtitle'] = lang('add_new');
				if($detailpemesanan['status'] == '3') {
					$data['content'] = 'Pengiriman_penjualan/detail';
				} else {
					$data['tanggal'] = date('Y-m-d');
					$data['pemesanandetail'] = $this->model->pemesanandetail($detailpemesanan['id']);
					$data['content'] = 'Pengiriman_penjualan/create';
				}
				$data = array_merge($data,path_info(),$detailpemesanan);
				$this->parser->parse('default',$data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function detail($id = null) {
		if($id) {
			$data = $this->model->getpengiriman($id);
			if($data) {
				$data['kontak'] = get_by_id('id',$data['kontakid'],'mkontak');
				$data['gudang'] = get_by_id('id',$data['gudangid'],'mgudang');
				$data['pengirimandetail'] = $this->model->pengirimandetail($data['id']);

				$data['title'] = lang('delivery');
				$data['subtitle'] = lang('detail');
				$data['content'] = 'Pengiriman_penjualan/detail';
				$data = array_merge($data,path_info());
				$this->parser->parse('default',$data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function printpdf($id = null) {
	    $this->load->library('pdf');
	    $pdf = $this->pdf;
	    $data = $this->model->getpengiriman($id);
		$data['gudang'] = get_by_id('id',$data['gudangid'],'mgudang');
		$data['pengirimandetail'] = $this->model->pengirimandetail($data['id']);
	    $data['title'] = 'Surat Jalan';
	    $data['css'] = file_get_contents(FCPATH.'assets/css/print.min.css');
	    $data = array_merge($data,path_info());
	    $html = $this->load->view('Pengiriman_penjualan/printpdf', $data, TRUE);
	    $pdf->loadHtml($html);
	    $pdf->setPaper('A4', 'portrait');
	    $pdf->render();
	    $time = time();
	    $pdf->stream("pengiriman-pembelian-". $time, array("Attachment" => false));
	}

	public function save() {
		$this->model->save();
	}

	public function delete() {
		$this->model->delete();
	}

	// additional
	public function cekjumlahinput() {
		$this->model->cekjumlahinput();
	}

	public function select2_kontak($id = null) {
		$term = $this->input->get('q');
		if($id) {
			$this->db->select('mkontak.id, mkontak.nama as text');
			$data = $this->db->where('id', $id)->get('mkontak')->row_array();
			$this->db->where('mkontak.tipe', '2');
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$this->db->select('mkontak.id, mkontak.nama as text');
			$this->db->where('mkontak.stdel', '0');
			$this->db->where('mkontak.tipe', '2');
			$this->db->limit(10);
			if($term) $this->db->like('mkontak', $term);
			$data = $this->db->get('mkontak')->result_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

	public function select2_gudang($id = null) {
		$term = $this->input->get('q');
		if($id) {
			$this->db->select('mgudang.id, mgudang.nama as text');
			$data = $this->db->where('id', $id)->get('mgudang')->row_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$this->db->select('mgudang.id, mgudang.nama as text');
			$this->db->where('mgudang.stdel', '0');
			$this->db->limit(10);
			if($term) $this->db->like('mgudang', $term);
			$data = $this->db->get('mgudang')->result_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}
}

