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
        
        $data['get_data'] = '';
        $this->load->view('terapis/headerfooter/header',$data);
        $this->load->view('terapis/HistoryReservationTerapis',$data);
        $this->load->view('terapis/headerfooter/footer');
    }

    function profileTerapis(){
        $session_data=$this->session->userdata('logged_in');
        $data['username']=$session_data['username'];
        $data['level']=$session_data['level'];
        $data['id_user']=$session_data['id_user'];

        $where = array('id_user' => $session_data['id_user']);

        $data['name'] = $this->GeneralModel->get_selected('user',$where)->result();

        $data['get_data'] = '';

        $this->load->view('terapis/headerfooter/header',$data);
        $this->load->view('terapis/ProfileTerapis',$data);
        $this->load->view('terapis/headerfooter/footer');
    }

        function editProfileTerapis(){

        $session_data=$this->session->userdata('logged_in');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('add', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required');
        if($this->form_validation->run())
        {
            $array = array(
            'success' => true,
            'username' => $this->input->post('username')
            );

            $data = array(
                'full_name' => $this->input->post('name'),
                'alamat' => $this->input->post('add'),
                'no_telp' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username')
            );

            $where = array('id_user' => $session_data['id_user']);
            $this->GeneralModel->update_data('user',$data,$where);         

        }
        else
        {
           $array = array(
            'error'   => true,
            'name_error' => form_error('name'),
            'add_error' => form_error('add'),
            'phone_error' => form_error('phone'),
            'email_error' => form_error('email'),
            'username_error' => form_error('username')
           );
        }

        $this->session->userdata['logged_in']['username'] = $this->input->post('username');

        echo json_encode($array);
    }

    function editFotoTerapis(){

        $session_data=$this->session->userdata('logged_in');
        
        $config['upload_path']='./assets/upload';
        $config['allowed_types']='jpg|png|jpeg';
        $config['max_size']=1000000000;
        $config['max_width']=10240;
        $config['max_height']=7680;

        // $yuhu = "a";

        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('pic')) {

            $result = array(
            'success' => $this->upload->display_errors()
            );

            // $yuhu = "b";
                
        }else{
            $data = array(
            'foto'        => $this->upload->data('file_name')
            );

            $where = array('id_user'  => $session_data['id_user']);

            $this->GeneralModel->update_data('user',$data,$where);
            // $yuhu = "c";

            $this->session->set_flashdata('swal','Success|Ganti Foto Berhasil|success');

            redirect('Terapis/profileTerapis','refresh');

        }


        
    }

    function editPassTerapis(){

        $session_data=$this->session->userdata('logged_in');

        $this->form_validation->set_rules('old', 'Old Password', 'trim|required|callback_cekDbTerapis');
        $this->form_validation->set_rules('password', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run())
        {
            $array = array(
            'success' => true
            );

            $data = array(
                'password' => md5($this->input->post('password'))
            );

            $session_data['password'] = md5($this->input->post('password'));
            $data['password']=$session_data['password'];

            $where = array('id_user' => $session_data['id_user']);
            
            $this->GeneralModel->update_data('user',$data,$where);
        }
        else
        {
           $array = array(
            'error'   => true,
            'old_error' => form_error('old'),
            'password_error' => form_error('password'),
            'confirm_error' => form_error('confirm')
           );
        }
        
        echo json_encode($array);
    }

    public function cekDbTerapis($password){
        $session_data=$this->session->userdata('logged_in');
        if(md5($password) == $session_data['password']){
            return true;
        }else{
            $this->form_validation->set_message('cekDbTerapis',"Old Password Wrong");
            return false;
        }
    }



}
?>