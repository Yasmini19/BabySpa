<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model('AdminModel');
        }

        public function index()
        {   
            $this->load->view('admin/HomeAdmin');
        }

        public function contact_us(){
            $data['contactus'] = $this->AdminModel->get_contactus();
            $this->load->view('admin/kontak', $data);
        }

        public function edit()
        {
            $id = $this->uri->segment(3);
            
            if (empty($id))
            {
                show_404();
            }
            
            $this->load->helper('form');
            $this->load->library('form_validation');
                 
            $data['contactus'] = $this->AdminModel->get_contactus_by_id($id);
            
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
     
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('Admin/kontakEdit', $data);
     
            }
            else
            {
                $this->AdminModel->set_contactus($id);
                //$this->load->view('news/success');
                redirect( base_url() . 'index.php/Admin/contact_us');
            }
        }
        
        public function delete()
        {
            $id = $this->uri->segment(3);
            
            if (empty($id))
            {
                show_404();
            }
                    
            $contactus = $this->AdminModel->get_contactus_by_id($id);
            
            $this->AdminModel->delete_contactus($id);        
            redirect( base_url() . 'index.php/Admin/contact_us');        
        }
    }
    ?>