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

		public function addGalery(){
			$config['upload_path']="./assets/user/images";
			$config['allowed_types']='jpeg|jpg|png';
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload',$config);
			if($this->upload->do_upload("file")){
				$data = array('upload_data' => $this->upload->data());
	
				$keterangan= $this->input->post('keterangan');
				$galery= $data['upload_data']['file_name']; 
				
				$result= $this->GeneralModel->add_data('galery', $keterangan, $galery);
				echo json_decode($result);
			}
		}
    }
    ?>
