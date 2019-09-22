<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model('AdminModel');
            $this->load->model('GeneralModel');
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


        //terapis//
        public function terapis()
        {
            $data['terps'] = $this->GeneralModel->get_data('user')->result();
            $this->load->view('admin/Terapis', $data);

            //$this->load->view('admin/Terapis');
        }

        public function add_terapis()
        {
            $config['upload_path']     = './assets/upload';
            $config['allowed_types']  = 'gif|jpg|png';
            $config['max_size']        = 1000000000;
            $config['max_width']       = 10240;
            $config['max_height']      = 7680;

            $this->load->library('upload',$config);
            $result = '';
            if (!$this->upload->do_upload('foto'))
            {
                $result = $this->upload->display_errors();
            }
            else
            {
                $data = array(   
                    'full_name'     => $this->input->post('full_name'), 
                    'username'      => $this->input->post('username'), 
                    'email'         => $this->input->post('email'),   
                    'no_telp'       => $this->input->post('no_telp'),               
                    'alamat'        => $this->input->post('alamat'),
                    'foto'          => $this->upload->data('file_name'),
                    'level'         => '3'
                );

                $result = $this->GeneralModel->add_data('user', $data);

                //$this->GeneralModel->add_data();
                $this->load->view('admin/Terapis');
                $result = 'true';
            }

           echo json_encode($result);
        }

        public function search_terapis()
        {
            $text = $this->input->post('text');
            $data = $this->GeneralModel->search_dataTerapis($text);
            $output = '
                <table id="demo-datatables" class="table table-striped table-bordered datatable no-footer dtr-inline" role="grid" aria-describedby="demo-dt-add-info">

                           <thead>
                              <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="demo-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Id User</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No Tlp</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Action</th>
                        
                              </tr>
                            </thead>
                            <tbody>
                            ';
            if($data->num_rows() > 0)
            {
                
                foreach($data->result() as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id_user.'</td>
                    <td>'.$row->full_name.'</td>
                    <td>'.$row->username.'</td>
                    <td>'.$row->email.'</td>
                    <td>'.$row->no_telp.'</td>
                    <td>'.$row->alamat.'</td>
                    <td>
                        <img src="'.base_url().'/assets/upload/'.$row->foto.'" alt="" width=100 height=100>
                    </td>
                    <td>
                        <a href="'.base_url().'/Admin/edit_terapis/'.$row->id_user.'" class="mdi mdi-pencil-box-outline btn-icon-append" aria-hidden="true" data-toggle="modal" data-target="#modal-edit" name="tombolEdit" value="'.$row->id_user.'"></a>
                        <a href="'.base_url().'/Admin/delete_terapis/'.$row->id_user.'" class="mdi mdi-delete btn-icon-append" aria-hidden="true" name="tombolDelete" value="'.$value->id_user.'"></a>
                    </td>
                    </tr>
                    ';
                }
            }
            else
            {
                 $output .= '<tr>
                 <td colspan="8">No Data Found</td>
                </tr>';
            }

            $output .= '<tr><td></td></tr></tbody></table>';
            
            echo $output;
            
            //echo json_encode($output);
 
        }

        public function get_terapis()
        {
            $id = $this->input->post('id');
            $data = $this->GeneralModel->get_selected('user', array('id_user' => $id))->row();
        
        echo json_encode($data);
        }

        public function edit_terapis()
        {
                $config['upload_path']     = './assets/upload';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']        = 1000000000;
        $config['max_width']       = 10240;
        $config['max_height']      = 7680;

        $this->load->library('upload',$config);
        $result='';

        $id = array('id_user' => $this->input->post('edit_id') );
        $data = array(
            'full_name'     => $this->input->post('edit_full_name'), 
            'username'      => $this->input->post('edit_username'), 
            'email'         => $this->input->post('edit_email'),   
            'no_telp'       => $this->input->post('edit_no_telp'),               
            'alamat'        => $this->input->post('edit_alamat'),
            'level'         => $this->input->post('edit_level'),
        );

        if ($this->upload->do_upload('edit_foto'))
        {
            $data['foto'] = $this->upload->data('file_name');
        }

        $result = $this->GeneralModel->update_data('user', $data, $id );
        
        echo json_encode($result);
        }


        public function delete_terapis()
        {
             $id = array('id_user' => $this->input->post('id') );
             $result = $this->GeneralModel->delete_data($id,'user');
             echo json_encode($result);
        }

        //user
        public function user()
        {
            $data['usr'] = $this->GeneralModel->get_data('user')->result();
            $this->load->view('admin/User', $data);
        }

         public function add_user()
        {
            $config['upload_path']     = './assets/upload';
            $config['allowed_types']  = 'gif|jpg|png';
            $config['max_size']        = 1000000000;
            $config['max_width']       = 10240;
            $config['max_height']      = 7680;

            $this->load->library('upload',$config);
            $result = '';
            if (!$this->upload->do_upload('foto'))
            {
                $result = $this->upload->display_errors();
            }
            else
            {
                $data = array(   
                    'full_name'     => $this->input->post('full_name'), 
                    'username'      => $this->input->post('username'), 
                    'email'         => $this->input->post('email'),   
                    'no_telp'       => $this->input->post('no_telp'),               
                    'alamat'        => $this->input->post('alamat'),
                    'foto'          => $this->upload->data('file_name'),
                    'level'         => '2'
                );

                $result = $this->GeneralModel->add_data('user', $data);

                //$this->GeneralModel->add_data();
                $this->load->view('admin/User');
                $result = 'true';
            }

           echo json_encode($result);
        }

        public function search_user()
        {
            $text = $this->input->post('text');
            $data = $this->GeneralModel->search_dataUser($text);
            $output = '
                <table id="demo-datatables" class="table table-striped table-bordered datatable no-footer dtr-inline" role="grid" aria-describedby="demo-dt-add-info">

                           <thead>
                              <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="demo-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" >Id User</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>No Tlp</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Action</th>
                        
                              </tr>
                            </thead>
                            <tbody>
                            ';
            if($data->num_rows() > 0)
            {
                
                foreach($data->result() as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id_user.'</td>
                    <td>'.$row->full_name.'</td>
                    <td>'.$row->username.'</td>
                    <td>'.$row->email.'</td>
                    <td>'.$row->no_telp.'</td>
                    <td>'.$row->alamat.'</td>
                    <td>
                        <img src="'.base_url().'/assets/upload/'.$row->foto.'" alt="" width=100 height=100>
                    </td>
                    <td>
                        <a href="'.base_url().'/Admin/edit_terapis/'.$row->id_user.'" class="mdi mdi-pencil-box-outline btn-icon-append" aria-hidden="true" data-toggle="modal" data-target="#modal-edit-user" name="tombolEditUser" value="'.$row->id_user.'"></a>
                        <a href="'.base_url().'/Admin/delete_terapis/'.$row->id_user.'" class="mdi mdi-delete btn-icon-append" aria-hidden="true" name="tombolDeleteUser" value="'.$value->id_user.'"></a>
                    </td>
                    </tr>
                    ';
                }
            }
            else
            {
                 $output .= '<tr>
                 <td colspan="8">No Data Found</td>
                </tr>';
            }

            $output .= '<tr><td></td></tr></tbody></table>';
            
            echo $output;
            
            //echo json_encode($output);
 
        }
        public function get_user()
        {
            $id = $this->input->post('id');
            $data = $this->GeneralModel->get_selected('user', array('id_user' => $id))->row();
        
        echo json_encode($data);
        }

        public function edit_user()
        {
                $config['upload_path']     = './assets/upload';
                $config['allowed_types']  = 'gif|jpg|png';
                $config['max_size']        = 1000000000;
                $config['max_width']       = 10240;
                $config['max_height']      = 7680;

                $this->load->library('upload',$config);
                $result='';

                $id = array('id_user' => $this->input->post('edit_id') );
                $data = array(
                'full_name'     => $this->input->post('edit_full_name'), 
                'username'      => $this->input->post('edit_username'), 
                'email'         => $this->input->post('edit_email'),   
                'no_telp'       => $this->input->post('edit_no_telp'),               
                'alamat'        => $this->input->post('edit_alamat'),
                'level'         => $this->input->post('edit_level'),
             );

            if ($this->upload->do_upload('edit_foto'))
            {
                $data['foto'] = $this->upload->data('file_name');
            }

                $result = $this->GeneralModel->update_data('user', $data, $id );
        
                echo json_encode($result);
            }



            public function delete_user()
            {
                $id = array('id_user' => $this->input->post('id') );
                $result = $this->GeneralModel->delete_data($id,'user');
                echo json_encode($result);
            }


    }
    ?>