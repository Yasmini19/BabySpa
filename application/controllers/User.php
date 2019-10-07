<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model('GeneralModel');

    }

    public function index()
    {   
        $where = array('level' => 3 );
        $where1 = array('contact' => 'Location' );
        $where2 = array('contact' => 'Phone' );
        $where3 = array('contact' => 'Email' );
        $where4 = array('contact' => 'Social Media');

        $on = 'sub_kategori.kategori_id = kategori.id_kategori';

        $data['trps'] = $this->GeneralModel->get_selected('user',$where)->result();
        $data['loc'] = $this->GeneralModel->get_selected('contact_us',$where1)->result();
        $data['phone'] = $this->GeneralModel->get_selected('contact_us',$where2)->result();
        $data['email'] = $this->GeneralModel->get_selected('contact_us',$where3)->result();
        $data['socmed'] = $this->GeneralModel->get_selected('contact_us',$where4)->result();
        $data['subkategori'] = $this->GeneralModel->get_join('sub_kategori','kategori',$on)->result();
        $data['service'] = $this->GeneralModel->get_data('kategori')->result();
        $data['berita'] = $this->GeneralModel->get_data('berita')->result();

        $this->load->view('user/headerfooter/header');
        $this->load->view('user/HomeUser',$data);
        $this->load->view('user/headerfooter/footer');        
    }

    function get_subkategori(){
        $id=$this->input->post('id');
        $where = array('kategori_id' => $id);
        $data=$this->GeneralModel->get_selected('sub_kategori',$where)->result();
        echo json_encode($data);
    }

    function get_sesiuser(){
        $tgl=$this->input->post('tgl');
        $convert_tgl = date('Y-m-d', strtotime($tgl));
        //var_dump($convert_tgl);
        // $where = array('reservasi.tgl_reservasi' => $convert_tgl);
        // $on = 'sesi_reservasi.id_sesi = reservasi.sesi_id';
        // // $data=$this->GeneralModel->get_selected_join('sesi_reservasi','reservasi',$where,$on,'right')->result();
        $data = $this->db
        ->select('*,(select count(id_reservasi) from reservasi where sesi_id=sesi_reservasi.id_sesi and tgl_reservasi="'.$convert_tgl.'") jml')
        ->get('sesi_reservasi')
        ->result();
        echo json_encode($data);
    }

}
?>