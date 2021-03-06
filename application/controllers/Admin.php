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
        if ($this->session->userdata('logged_in') == FALSE) {
			redirect('Login','refresh');
		}
        $data['dashboard'] = $this->GeneralModel->get_4join_uniq('reservasi', 'user as u','user as a','sesi_reservasi','reservasi.terapis_id = u.id_user','reservasi.pemesan_id = a.id_user','reservasi.sesi_id = sesi_reservasi.id_sesi')->result();
        $this->load->view('admin/HomeAdmin', $data);
    }

    public function dashboard()
    {
        //$data['dashboard'] = $this->GeneralModel->get_data('reservasi')->result();
        $data['dashboard'] = $this->GeneralModel->get_4join_uniq('reservasi', 'user as u','user as a','sesi_reservasi','reservasi.terapis_id = u.id_user','reservasi.pemesan_id = a.id_user','reservasi.sesi_id = sesi_reservasi.id_sesi')->result();
        $this->load->view('admin/HomeAdmin', $data);

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
            $this->load->view('admin/kontakEdit', $data);

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

		//Galery
    public function gallery() 
    {
     $data['glry'] = $this->GeneralModel->get_data('galery')->result();
     $this->load->view('admin/Galery', $data);
    }

    public function add_gallery()
    {
        $config['upload_path']     = './assets/user/images';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']        = 1000000000;
        $config['max_width']       = 10240;
        $config['max_height']      = 7680;

        $this->load->library('upload',$config);
        $result = '';
        if (!$this->upload->do_upload('galery'))
        {
            $result = $this->upload->display_errors();

            $allowed = explode("|", $config['allowed_types']);
            $filename = $this->upload->data('file_name');
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
                $result = 'harap sesuaikan tipe file';
            }
        }
        else
        {
            $data = array(   
                'galery'          => $this->upload->data('file_name'),
                'keterangan'     => $this->input->post('keterangan')
            );

            $result = $this->GeneralModel->add_data('galery', $data);

                    //$this->GeneralModel->add_data();
            $this->load->view('admin/Galery');
            $result = 'true';
        }

        echo json_encode($result);

    }


public function get_gallery()
{
    $id = $this->input->post('id');
    $data = $this->GeneralModel->get_selected('galery', array('id_galery' => $id))->row();

    echo json_encode($data);
}

public function edit_gallery()
{
   $config['upload_path']     = './assets/user/images';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);
    $result='';

    $id = array('id_galery' => $this->input->post('edit_id') );
    $data = array(
        
        'keterangan'        => $this->input->post('edit_keterangan')

    );

    if ($this->upload->do_upload('edit_foto'))
    {
        $data['galery'] = $this->upload->data('file_name');
    }

    $result = $this->GeneralModel->update_data('galery', $data, $id );

    echo json_encode($result);
}



public function delete_gallery()
{
   $id = array('id_galery' => $this->input->post('id') );
   $result = $this->GeneralModel->delete_data($id,'galery');
   echo json_encode($result);
}


		//Kategori
// public function kategori() 
// {
 
//  // $data['ktg'] = $this->GeneralModel->get_data('kategori')->result();
//  // //$data['subktg'] = $this->GeneralModel->get_data('sub_kategori')->result();

//  // $this->load->view('admin/Kategori', $data);
//  $data['subktg'] = $this->GeneralModel->get_data('sub_kategori')->result();
//  $this->load->view('admin/SubKategori', $data);
// }




		//Terapis
public function terapis()
{
            

    $level['level'] = 3;
    $data['terps'] = $this->GeneralModel->get_selected('user',$level)->result();
    $this->load->view('admin/Terapis', $data);

}

public function add_terapis()
{
    $config['upload_path']     = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png|jpeg';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);
    $result = '';
    if (!$this->upload->do_upload('foto'))
    {
        $result = $this->upload->display_errors();

        $allowed = explode("|", $config['allowed_types']);
        $filename = $this->upload->data('file_name');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$allowed) ) {
            $result = 'harap sesuaikan tipe file .png, .jpg, .jpeg';
        }
    }
    else
    {
        $data = array(   
            'full_name'     => $this->input->post('full_name'), 
            'username'      => $this->input->post('username'), 
            'password'      => md5($this->input->post('password')),
            'email'         => $this->input->post('email'),   
            'no_telp'       => $this->input->post('no_telp'),               
            'alamat'        => $this->input->post('alamat'),
            'foto'          => $this->upload->data('file_name'),
            'level'         => '3'
        );

        $result = $this->GeneralModel->add_data('user', $data);


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
        //'password'      => $this->input->post('edit_password'),
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


public function gantiPswrd_terapis($id)
{
    $data =  array(
                    'password' => MD5("mamina123") 
    );
    $id = array(
        'id_user' => $id);

    $this->GeneralModel->update_data('user', $data, $id );
    redirect('Admin/terapis');
}


        //user
public function user()
{

    $level['level'] = 2;
    $data['usr'] = $this->GeneralModel->get_selected('user',$level)->result();

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
            'password'      => md5($this->input->post('password')),
            'email'         => $this->input->post('email'),   
            'no_telp'       => $this->input->post('no_telp'),               
            'alamat'        => $this->input->post('alamat'),
            'foto'          => $this->upload->data('file_name'),
            'level'         => '2'
        );

        $result = $this->GeneralModel->add_data('user', $data);


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
        //'password'      => $this->input->post('edit_password'),
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


public function gantiPswrd_user($id)
{
    $data =  array(
                    'password' => MD5("mamina123")
    );

    $id =  array('id_user' => $id);

    $this->GeneralModel->update_data('user', $data, $id);
    redirect('Admin/user');
}


            //Berita

public function berita()
{

    $data['brt'] = $this->GeneralModel->get_data('berita')->result();
    $this->load->view('admin/Berita', $data);
}

public function add_berita()
{
    $config['upload_path']     = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);
    $result = '';
    if (!$this->upload->do_upload('foto_berita'))
    {
        $result = $this->upload->display_errors();
    }
    else
    {
        $data = array(   
            'judul_berita'  => $this->input->post('judul_berita'), 
            'deskripsi'     => $this->input->post('deskripsi'), 
            'foto_berita'   => $this->upload->data('file_name')

        );

        $result = $this->GeneralModel->add_data('berita', $data);

                //$this->GeneralModel->add_data();
        $this->load->view('admin/Berita');
        $result = 'true';
    }

    echo json_encode($result);
}

public function get_berita()
{
    $id = $this->input->post('id');
    $data = $this->GeneralModel->get_selected('berita', array('id_berita' => $id))->row();

    echo json_encode($data);
}


public function edit_berita()
{
    $config['upload_path']     = './assets/upload';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);
    $result='';

    $id = array('id_berita' => $this->input->post('edit_id') );
    $data = array(
        'judul_berita'     => $this->input->post('edit_judul_berita'), 
        'deskripsi'        => $this->input->post('edit_deskripsi')

    );

    if ($this->upload->do_upload('edit_foto'))
    {
        $data['foto_berita'] = $this->upload->data('file_name');
    }

    $result = $this->GeneralModel->update_data('berita', $data, $id );

    echo json_encode($result);
}



public function delete_berita()
{

    $id = array('id_berita' => $this->input->post('id') );
    $result = $this->GeneralModel->delete_data($id,'berita');
    echo json_encode($result);
}


//reservasi
public function reservasi()
{

    //$data['reser'] = $this->GeneralModel->get_data('reservasi')->result();
    $data['reser'] = $this->GeneralModel->get_4join_uniq('reservasi', 'user as u','user as a','sesi_reservasi','reservasi.terapis_id = u.id_user','reservasi.pemesan_id = a.id_user','reservasi.sesi_id = sesi_reservasi.id_sesi')->result();
    $data['pemesan'] = $this->GeneralModel->get_selected('user','level = "2"')->result();
    $data['terapis'] = $this->GeneralModel->get_selected('user','level = "3"')->result();
    $data['sesi'] = $this->GeneralModel->get_data('sesi_reservasi')->result();
    $this->load->view('admin/Reservasi', $data);
}


public function add_reservasi()
{
    $result = 'false';
    $data =  array(
                    'pemesan_id' => $this->input->post('pemesan_id'),
                    'terapis_id' => $this->input->post('terapis_id'),
                    'sesi_id' => $this->input->post('sesi_id'),                     
                    'tgl_reservasi' => $this->input->post('tgl_reservasi') ,
                    'total_harga_awal' => $this->input->post('total_harga_awal'),
                    'diskon_persen' => $this->input->post('diskon_persen') ,
                    'nominal_diskon' => $this->input->post('nominal_diskon'),
                    'biaya_transportasi' => $this->input->post('biaya_transportasi') ,
                    'total_harga_akhir' => $this->input->post('total_harga_akhir'),
                  );


    if ($this->GeneralModel->add_data('reservasi', $data)) {

        $result = 'true';
    }
    
    echo json_encode($result);

}

public function get_reservasi()
{
    $id = $this->input->post('id');
    $data = $this->GeneralModel->get_selected('reservasi', array('id_reservasi' => $id))->row();

    echo json_encode($data);
}



public function konfirmasi_reservasi()
{
    $id = array('id_reservasi' => $this->uri->segment(3) );
    $data = array(
        'status'         => 'Accepted'
    );

    $result = $this->GeneralModel->update_data('reservasi', $data, $id );

    //echo json_encode($result);
    redirect('Admin/dashboard');
}

public function edit_reservasi()
{
    $id = array('id_reservasi' => $this->input->post('edit_id') );
    $data = array(
        'diskon_persen'         => $this->input->post('edit_diskon_persen'), 
        'nominal_diskon'        => $this->input->post('edit_nominal_diskon'),
        'biaya_transportasi'    => $this->input->post('edit_biaya_transportasi'),
        'total_harga_akhir'     => $this->input->post('edit_total_harga_akhir'),
        'status'         => 'Accepted'

    );

    $result = $this->GeneralModel->update_data('reservasi', $data, $id );

    echo json_encode($result);

}

public function cancel_reservasi($id)
{
    $data = array(
        'status' => "Cancelled" 
    );
    $this->GeneralModel->update_data_baru('reservasi', $data, $id );
    redirect('Admin/dashboard');
}

public function categori()
{
    $data['ktg'] = $this->GeneralModel->get_data('kategori')->result();
    $this->load->view('admin/Kategori', $data);
}



public function add_categori() 
{
    $result = 'false';
    $data =  array(
                    'judul_kat' => $this->input->post('judul_kat') ,
                    'keterangan_kat' => $this->input->post('keterangan_kat') 
                  );


    if ($this->GeneralModel->add_data('kategori', $data)) {

        $result = 'true';
    }
    
    echo json_encode($result);
}

public function get_categori()
{

      $id = $this->input->post('id');
      $data = $this->GeneralModel->get_selected('kategori', array('id_kategori' => $id))->row();


    echo json_encode($data);
}

public function edit_categori()
{
    $id  = array('id_kategori' => $this->input->post('edit_id'));

    $data = array(
        'judul_kat' => $this->input->post('edit_judul_kat') ,
        'keterangan_kat' => $this->input->post('edit_keterangan_kat') 
    );

    $result = $this->GeneralModel->update_data('kategori', $data, $id);

    echo json_encode($result);
}

public function delete_categori()
{
    $id = array('id_kategori' => $this->input->post('id') );
    $result = $this->GeneralModel->delete_data($id,'kategori');
    echo json_encode($result);
}


public function subkategori() 
{
 $data['subktg'] = $this->GeneralModel->get_join('sub_kategori','kategori','sub_kategori.kategori_id=kategori.id_kategori')->result();
 $data['ktg'] = $this->GeneralModel->get_data('kategori')->result();

 $this->load->view('admin/SubKategori', $data);
}



public function add_subkategori() 
{

    $config['upload_path']     = './assets/user/images/';

    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);

    $result = false;
    if (!$this->upload->do_upload('foto_sub'))
    {
        $result = $this->upload->display_errors();
    }
    else
    {
        $data = array(
            'kategori_id'   => $this->input->post('kategori_id'),

		
            'judul_sub'     => $this->input->post('judul_sub'),
            'keterangan_sub'=> $this->input->post('keterangan_sub'),
            'foto_sub'      => $this->upload->data('file_name'),
            'harga'         => $this->input->post('harga')
        );

        $result = $this->GeneralModel->add_data('sub_kategori', $data);
        $this->load->view('admin/SubKategori');
                    
        //$result = 'true';
    }
    
    echo json_encode($result); 
}

public function get_subkategori()
{
    $id = $this->input->post('id');
    $data = $this->GeneralModel->get_selected('sub_kategori', array('id_sub_kategori' => $id))->row();
    
    echo json_encode($data);


}

public function edit_subkategori()
{
    $config['upload_path']     = './assets/user/images';
    $config['allowed_types']  = 'gif|jpg|png';
    $config['max_size']        = 1000000000;
    $config['max_width']       = 10240;
    $config['max_height']      = 7680;

    $this->load->library('upload',$config);
    $result='';

    $id = array('id_sub_kategori' => $this->input->post('edit_id') );
    $data = array(
        'judul_sub'     => $this->input->post('edit_judul_sub'), 
        'keterangan_sub'     => $this->input->post('edit_keterangan_sub'),
        'harga'     => $this->input->post('edit_harga'),
    );

    if ($this->upload->do_upload('edit_foto_sub'))
    {
        $data['foto_sub'] = $this->upload->data('file_name');
    }

    $result = $this->GeneralModel->update_data('sub_kategori', $data, $id );

    echo json_encode($result);
}

public function delete_subkategori()
{
 $id = array('id_sub_kategori' => $this->input->post('id') );
 $result = $this->GeneralModel->delete_data($id,'sub_kategori');
  
 echo json_encode($result);
}


}

?>