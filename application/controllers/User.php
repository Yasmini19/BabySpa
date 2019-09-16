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
            $data['trps'] = $this->GeneralModel->get_selected('user',$where)->result();
            $this->load->view('user/HomeUser',$data);
        }

        
    }
    ?>