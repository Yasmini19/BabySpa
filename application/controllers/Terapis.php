<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Terapis extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('GeneralModel');

    }

    public function index() 
    {
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id_user']=$session_data['id_user'];

        $data_calendar = $this->db
        ->select('*')
        ->from('reservasi')
        ->join('sesi_reservasi','reservasi.sesi_id = sesi_reservasi.id_sesi')
        ->join('user','reservasi.pemesan_id = user.id_user')
        ->join('detail_reservasi','detail_reservasi.reservasi_id = reservasi.id_reservasi')
        ->where('reservasi.terapis_id',$data['id_user'])
        ->where('status !=','Cancelled')
        ->get()
        ->result();
        $calendar = array();
        foreach ($data_calendar as $key => $val) 
        {
            $calendar[] = array(
                'id'    => intval($val->id_reservasi), 
                'title' => $val->full_name, 
                'description' => trim($val->alamat), 
                'start' => date_format( date_create($val->tgl_reservasi." ".trim(explode("-", $val->waktu)[0]).":00") ,"Y-m-d H:i:s"),
                'end'   => date_format( date_create($val->tgl_reservasi." ".trim(explode("-", $val->waktu)[1]).":00") ,"Y-m-d H:i:s"),
                'color' => $val->color,
                'telp' => $val->no_telp,
                //'pesanan' => 
            );
        }
        
        $data['get_data'] = json_encode($calendar);
        $this->load->view('terapis/headerfooter/header', $data);
        $this->load->view('terapis/homeTerapis', $data);
        $this->load->view('terapis/headerfooter/footer');
    }

    public function history()
    {
        $this->load->library('pagination');

        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id_user']=$session_data['id_user'];

        $jumlah_data = $this->GeneralModel->num_row('reservasi');

        $config['base_url'] = site_url().'/Terapis/history/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 4;
        
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center" style="margin-left:0;"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $where = array('terapis_id' => $data['id_user']);
        $data['reservasi'] = $this->GeneralModel->get_selected_limit_offset('reservasi',$where,$config['per_page'],$from)->result();
        
        $this->load->view('terapis/headerfooter/header',$data);
        $this->load->view('terapis/HistoryReservationTerapis',$data);
        $this->load->view('terapis/headerfooter/footer');
    }

}
?>