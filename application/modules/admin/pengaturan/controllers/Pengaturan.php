<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Pengaturanmodel');

        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->library('image_lib');
    }

    public function setting_kuisioner_page($id = 1) {
        $data['jumlah_kuisioner'] = $this->Pengaturanmodel->get_jumlah_kuisioner($this->user['id_ref'], $this->user['role_akun']);
        $data['kuisioner_page'] = $this->Pengaturanmodel->get_kuisioner_page_data(1);
        $this->template->load('template_admin/template_admin', 'pengaturan_kuisioner_page', $data);
    }

    public function setting_login_page($id = 1) {
        $data['jumlah_kuisioner'] = $this->Pengaturanmodel->get_jumlah_kuisioner($this->user['id_ref'], $this->user['role_akun']);
        $data['login_page'] = $this->Pengaturanmodel->get_login_page_data(1);
        $this->template->load('template_admin/template_admin', 'pengaturan_login_page', $data);
    }

    public function update_kuisioner_page($id = 1) {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner', 'required');
        $this->form_validation->set_rules('judul_kuisioner', 'Judul Kuisioner', 'required');
        $this->form_validation->set_rules('deskripsi_kuisioner', 'Deskripsi Kuisioner', 'required');

        $data['logo_kuisioner'] = $data['image'];
        $data['logo_kuisioner_thumb'] = $data['image_thumb'];

        $image_old = explode('/', $data['image']);
        $image_name_old = $image_old[2];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/setting_kuisioner_page/' . $id);
        } else {

            if (!empty($_FILES['logo_kuisioner']['tmp_name'])) {
                $this->delete_file($image_name_old); //delete existing file

                $path = 'uploads/icon/';
                $path_thumb = 'uploads/icon/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo_kuisioner')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['logo_kuisioner'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 500;
                    $img['height'] = 500;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['logo_kuisioner_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('pengaturan/setting_kuisioner_page/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/setting_kuisioner_page/' . $id);
                }
            }
            // print_r($data);exit;    
            $edit = $this->Pengaturanmodel->update_kuisioner_page($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Halaman Kuisioner Telah Terupdate.'));
                redirect('pengaturan/setting_kuisioner_page/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon maaf Maaf, Terjadi kesalahan silahkan edit ulang.'));
                redirect('pengaturan/setting_kuisioner_page/' . $id);
            }
        }
    }

    public function update_login_page($id = 1) {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_login', 'Nama Login', 'required');

        $data['foto_background'] = $data['image_background'];
        $data['logo_login'] = $data['image_logo_login'];
        $data['gambar_nama_login'] = $data['image_gambar_nama'];

        $image_back_old = explode('/', $data['image_background']);
        $image_name_back_old = $image_back_old[2];

        $image_logo_old = explode('/', $data['image_logo_login']);
        $image_name_logo_old = $image_logo_old[2];

        $image_gambar_nama_old = explode('/', $data['image_gambar_nama']);
        $image_name_gambar_nama_old = $image_gambar_nama_old[2];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('pengaturan/setting_login_page/' . $id);
        } else {

            if (!empty($_FILES['foto_background']['tmp_name'])) {
                $this->delete_file($image_name_back_old); //delete existing file

                $path = 'uploads/icon/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_background')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_background'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/setting_login_page/' . $id);
                }
            }

            if (!empty($_FILES['logo_login']['tmp_name'])) {
                $this->delete_file($image_name_logo_old); //delete existing file

                $path = 'uploads/icon/';
                $path_thumb = 'uploads/icon/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('logo_login')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['logo_login'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/setting_login_page/' . $id);
                }
            }

            if (!empty($_FILES['gambar_nama_login']['tmp_name'])) {
                $this->delete_file($image_name_gambar_nama_old); //delete existing file

                $path = 'uploads/icon/';
                $path_thumb = 'uploads/icon/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar_nama_login')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['gambar_nama_login'] = $path . $name;
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('pengaturan/setting_login_page/' . $id);
                }
            }
            // print_r($data);exit;    
            $edit = $this->Pengaturanmodel->update_login_page($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Halaman Login Telah Terupdate.'));
                redirect('pengaturan/setting_login_page/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon maaf Maaf, Terjadi kesalahan silahkan edit ulang.'));
                redirect('pengaturan/setting_login_page/' . $id);
            }
        }
    }

    public function delete_file($name = '') {
        $path = './uploads/icon/';
        $path_thumb = './uploads/icon/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

}
