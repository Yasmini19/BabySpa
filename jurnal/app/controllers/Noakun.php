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


class Noakun extends User_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Noakun_model','model');
	}

	public function index() {
		$data['title'] = lang('account_number');
		$data['subtitle'] = lang('list');
		$data['content'] = 'Noakun/index';
		$data = array_merge($data,path_info());
		$this->parser->parse('default',$data);
	}

	public function index_datatable() {
		$this->load->library('Datatables');
		$this->datatables->select('mnoakun.*, viewnoakunsaldo.saldo as saldoakun');
		$this->datatables->where('mnoakun.stdel', '0');
		$this->datatables->join('viewnoakunsaldo','mnoakun.noakun = viewnoakunsaldo.noakun','left');
		$this->datatables->from('mnoakun');
		return print_r($this->datatables->generate());
	}

	public function create() {
		$data['title'] = lang('account_number');
		$data['subtitle'] = lang('add_new');
		$data['content'] = 'Noakun/create';
		$data = array_merge($data,path_info());
		$this->parser->parse('default',$data);
	}

	public function edit($id = null) {
		if($id) {
			$data = get_by_id('noakun',$id,'mnoakun');
			if($data) {
				$data['title'] = lang('account_number');
				$data['subtitle'] = lang('edit');
				$data['content'] = 'Noakun/edit';
				$data = array_merge($data,path_info());
				$this->parser->parse('default',$data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function save() {
		$this->model->save();
	}

	public function delete() {
		$this->model->delete();
	}


	public function detail($id) {
		if($id) {
			$data = get_by_id('noakun',$id,'mnoakun');
			if($data) {
				$tanggalawal = $this->input->get('tanggalawal');
				$tanggalakhir = $this->input->get('tanggalakhir');
				$per_page = $this->input->get('per_page');
				if (!$per_page) $per_page = 0;

				$base_url = site_url('noakun/detail/'.$id);
				if($tanggalawal && $tanggalakhir) {
					$data['tanggalawal'] = $tanggalawal;
					$data['tanggalakhir'] = $tanggalakhir;
					$base_url = site_url('noakun/detail/'.$id.'?tanggalawal='.$tanggalawal.'&tanggalakhir='.$tanggalakhir);
				} else {
					$data['tanggalawal'] = date('Y-m-01');
					$data['tanggalakhir'] = date('Y-m-t');
					$base_url = site_url('noakun/detail/'.$id.'?tanggalawal='.$data['tanggalawal'].'&tanggalakhir='.$data['tanggalakhir']);
				}
				$this->load->library('pagination');		
				$config['base_url'] = $base_url;
				$config['total_rows'] = $this->model->get_jurnal_detail_count($id, $data['tanggalawal'], $data['tanggalakhir']);
				$config['per_page'] = $this->model->get_jurnal_detail_count($id, $data['tanggalawal'], $data['tanggalakhir']);
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				$config['first_link'] = 'First';
				$config['first_tag_open'] = '<li class="page-link">';
				$config['first_tag_close'] = '</li>';
				$config['last_link'] = 'Last';
				$config['last_tag_open'] = '<li class="page-link">';
				$config['last_tag_close'] = '</li>';
				$config['next_link'] = '&gt;';
				$config['next_tag_open'] = '<li class="page-link">';
				$config['next_tag_close'] = '</li>';
				$config['prev_link'] = '&lt;';
				$config['prev_tag_open'] = '<li class="page-link">';
				$config['prev_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="page-link bg-info">';
				$config['cur_tag_close'] = '</li>';
				$config['num_tag_open'] = '<li class="page-link">';
				$config['num_tag_close'] = '</li>';
				$config['page_query_string'] = TRUE;
				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
				$data['get_noakun'] = $this->model->get_jurnal_detail($per_page, $config['per_page'], $id, $data['tanggalawal'], $data['tanggalakhir']);

				$data['title'] = lang('acount_number');
				$data['subtitle'] = lang('list');
				$data['content'] = 'Noakun/detail';
				$data = array_merge($data,path_info());
				$this->parser->parse('default',$data);

			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	// additional
	public function select2_noakunheader($id = null) {
		$term = $this->input->get('q');
		if($id) {
			$this->db->select('mnoakun.noakun as id, concat(mnoakun.noakun, " - ",mnoakun.namaakun) as text');
			$this->db->where('mnoakun.stheader', '1');
			$data = $this->db->where('noakun', $id)->get('mnoakun')->row_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		} else {
			$this->db->select('mnoakun.noakun as id, concat(mnoakun.noakun, " - ",mnoakun.namaakun) as text');
			$this->db->where('mnoakun.stdel', '0');
			$this->db->where('mnoakun.stheader', '1');
			$this->db->limit(100);
			if($term) $this->db->like('namaakun', $term);
			$data = $this->db->get('mnoakun')->result_array();
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}
}

