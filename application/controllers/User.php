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
        ->select(' *,(select count(terapis_id) from reservasi inner join user on reservasi.terapis_id = user.id_user where sesi_id=sesi_reservasi.id_sesi and tgl_reservasi="'.$convert_tgl.'" and status != "Cancelled") jml, (select count(id_user) from user where level=3) jml_terapis')
        ->get('sesi_reservasi')
        ->result();
        echo json_encode($data);
    }

    function addReservation(){

        $message = true;
        if ($this->session->userdata('logged_in')) {
            $session_data=$this->session->userdata('logged_in');

            $tgl=$this->input->post('tanggal');
            $convert_tgl = date('Y-m-d', strtotime($tgl));

            $where = array('level' => 3);

            $get = $this->db
            ->select('*,(select count(terapis_id) from reservasi inner join sesi_reservasi where reservasi.sesi_id=sesi_reservasi.id_sesi and tgl_reservasi="'.$convert_tgl.'" and terapis_id=id_user) jml')
            ->where($where)
            ->order_by('id_user','asc')
            ->group_by('jml')
            ->having('jml != 4')
            ->limit(1)
            ->get('user')
            ->row();

            if (isset($get)) {
                $data = array(   
                'pemesan_id'     => $session_data['id_user'], 
                'terapis_id'       => $get->id_user, 
                'sesi_id'          => $this->input->post('sesi'),   
                'tgl_reservasi'    => $convert_tgl            
                );

                $result = $this->GeneralModel->add_data1('reservasi', $data);

                $get1 = $this->db
                ->select('harga')
                ->where('id_sub_kategori',$this->input->post('sub_kategori0'))
                ->get('sub_kategori')
                ->row();

                $data1 = array(   
                'reservasi_id'     => $result, 
                'subkategori_id'   => $this->input->post('sub_kategori0'), 
                'harga'            => $get1->harga,
                'jmlh'            => $this->input->post('jumlah0')      
                );

                $result1 = $this->GeneralModel->add_data('detail_reservasi', $data1);

               if(!empty($this->input->post('sub_kategori1'))){
                    $get1 = $this->db
                    ->select('harga')
                    ->where('id_sub_kategori',$this->input->post('sub_kategori1'))
                    ->get('sub_kategori')
                    ->row();

                    $data1 = array(   
                    'reservasi_id'     => $result, 
                    'subkategori_id'   => $this->input->post('sub_kategori1'), 
                    'harga'            => $get1->harga,
                    'jmlh'            => $this->input->post('jumlah1')           
                    );

                    $result1 = $this->GeneralModel->add_data('detail_reservasi', $data1);
               }

               $harga = 0;

               foreach ($this->db->get_where('detail_reservasi', array('reservasi_id' => $result))->result() as $key) {
                  $harga += $key->harga;
               }

               $data2 = array('total_harga_awal' => $harga);

               $where2 = array('id_reservasi' => $result);
               $this->GeneralModel->update_data('reservasi',$data2,$where2);
               //echo json_encode($result); 
            }else{
               $message = false;  
            }     
        }else{
            redirect('Login','refresh');
        }

        echo json_encode($message);
    }

}
?>