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

}
?>