<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {

        function __construct(){
            parent::__construct();
			$this->load->model("GeneralModel");
        }

        public function index()
        {   
            $this->load->view('admin/HomeAdmin');
		}
		
		public function galery()
		{
			$data["galerys"] = $this->GeneralModel->get_data('galery')->result();
			$this->load->view('admin/GalleryAdmin', $data);
		}
    }
    ?>
