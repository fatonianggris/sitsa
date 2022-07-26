<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Akunmodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA AKUN ADMIN------------------------------//
    //
    
    public function daftar_data_akun() {
        $data['data_akun'] = $this->Akunmodel->get_data_akun($this->user['id_ref'], $this->user['role_akun']);
        $data['jumlah_data_akun'] = $this->Akunmodel->get_jumlah_data_akun($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'daftar_data_akun', $data);
    }

    public function add_data_akun() {
        $data['jumlah_data_akun'] = $this->Akunmodel->get_jumlah_data_akun();
        $data['data_fakultas'] = $this->Akunmodel->get_data_fakultas();

        $this->template->load('template_admin/template_admin', 'tambah_data_akun', $data);
    }

    public function edit_data_akun($id = '') {
        $data['data_fakultas'] = $this->Akunmodel->get_data_fakultas();
        $data['edit_data_akun'] = $this->Akunmodel->get_detail_data_akun($id, $this->user['id_ref'], $this->user['role_akun']);

        $cek_id = $this->Akunmodel->get_detail_data_akun($id, $this->user['id_ref'], $this->user['role_akun']);
        if ($cek_id == FALSE or empty($cek_id)) {
            $this->load->view('error_404', $data);
        } else {
            $this->template->load('template_admin/template_admin', 'edit_data_akun', $data);
        }
    }

    public function post_data_akun() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_akun', 'Nama Akun Admin', 'required');
        $this->form_validation->set_rules('email_akun', 'Email Akun Admin', 'required');
        $this->form_validation->set_rules('no_telepon_akun', 'Nomor Handphone Admin', 'required');
        $this->form_validation->set_rules('role_akun', 'Role Admin', 'required');
        $this->form_validation->set_rules('password_akun', 'Password Akun Admin', 'required|min_length[5]|matches[cf_passwd_akun]');
        $this->form_validation->set_rules('cf_passwd_akun', 'Password Konfirmasi Akun Admin', 'required|min_length[5]');

        if ($data['role_akun'] == 2) {
            $data['id_ref'] = $data['id_fakultas_akun'] . $data['id_prodi_akun'];
        } elseif ($data['role_akun'] == 1) {
            $data['id_ref'] = $data['id_fakultas_akun'];
        } elseif ($data['role_akun'] == 0) {
            $data['id_ref'] = "1";
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('akun/add_data_akun');
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['foto_akun'])) {

                $path = 'uploads/user/';
                $path_thumb = 'uploads/user/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 3048; //set limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_akun')) {
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_akun'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 800;
                    $img['height'] = 800;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {
                        $data['foto_akun_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('akun/add_data_akun');
                    }
                }
            }

            $input = $this->Akunmodel->insert_data_akun($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun Admin '$data[nama_akun]' ('$data[email_akun]') telah disimpan.."));
                redirect('akun/add_data_akun');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('akun/add_data_akun');
            }
        }
    }

    public function update_data_akun($id = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_akun', 'Nama Akun Admin', 'required');
        $this->form_validation->set_rules('email_akun', 'Email Akun Admin', 'required');
        $this->form_validation->set_rules('role_akun', 'Role Admin', 'required');
        $this->form_validation->set_rules('no_telepon_akun', 'Nomor Handphone Admin', 'required');

        $data['foto_akun'] = $data['image'];
        $data['foto_akun_thumb'] = $data['image_thumb'];

        $image_old = explode('/', $data['image']);
        $image_name_old = $image_old[2];

        if ($data['role_akun'] == 2) {
            $data['id_ref'] = $data['id_fakultas_akun'] . $data['id_prodi_akun'];
        } elseif ($data['role_akun'] == 1) {
            $data['id_ref'] = $data['id_fakultas_akun'];
        } elseif ($data['role_akun'] == 0) {
            $data['id_ref'] = "1";
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('akun/edit_data_akun/' . $id);
        } else {
            $this->load->library('upload'); //load library upload file
            $this->load->library('image_lib'); //load library image
            if (!empty($_FILES['foto_akun']['tmp_name'])) {

                $this->delete_foto_akun($image_name_old); //delete existing file

                $path = 'uploads/user/';
                $path_thumb = 'uploads/user/thumbs/';
                //config upload file
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = 2048; //set without limit
                $config['overwrite'] = FALSE; //if have same name, add number
                $config['remove_spaces'] = TRUE; //change space into _
                $config['encrypt_name'] = TRUE;
                //initialize config upload
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_akun')) {//if success upload data
                    $result['upload'] = $this->upload->data();
                    $name = $result['upload']['file_name'];
                    $data['foto_akun'] = $path . $name;

                    $img['image_library'] = 'gd2';
                    $img['source_image'] = $path . $name;
                    $img['new_image'] = $path_thumb . $name;
                    $img['maintain_ratio'] = true;
                    $img['width'] = 800;
                    $img['height'] = 800;

                    $this->image_lib->initialize($img);
                    if ($this->image_lib->resize()) {//if success to resize (create thumbs)
                        $data['foto_akun_thumb'] = $path_thumb . $name;
                    } else {
                        $this->session->set_flashdata('flash_message', err_msg($this->image_lib->display_errors()));
                        redirect('akun/edit_data_akun/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('flash_message', warn_msg($this->upload->display_errors()));
                    redirect('akun/edit_data_akun/' . $id);
                }
            }
            if ($data['password_lama'] != '') {
                $this->form_validation->set_rules('password_akun', 'Password Baru', 'required|min_length[5]|matches[cf_passwd_akun]');
                $this->form_validation->set_rules('cf_passwd_akun', 'Password Konfirmasi Baru', 'required|min_length[5]');

                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                    redirect('akun/edit_data_akun/' . $id);
                } else {
                    $cek_pass = $this->Akunmodel->cek_password_akun($id, $data['password_lama']);
                    if ($cek_pass) {
                        $this->Akunmodel->update_password_akun($id, $data['password_akun']);
                    } else {
                        $this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf, Password Lama Anda salah/tidak sesuai."));
                        redirect('akun/edit_data_akun/' . $id);
                    }
                }
            }

            $edit = $this->Akunmodel->update_data_akun($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun Admin '$data[nama_akun]' ('$data[email_akun]') Telah diupdate.."));
                redirect('akun/edit_data_akun/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                redirect('akun/edit_data_akun/' . $id);
            }
        }
    }

    public function delete_data_akun() {
        $id = $this->input->post('id');
        $delete_item = $this->Akunmodel->delete_data_akun($id);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Akun Admin Telah Terhapus.."));
            redirect('akun/daftar_data_akun/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('akun/daftar_data_akun/');
        }
    }

    public function delete_foto_akun($name = '') {
        $path = './uploads/user/';
        $path_thumb = './uploads/user/thumbs/';
        @unlink($path . $name);
        @unlink($path_thumb . $name);
    }

    //------------------------------------------------------------------------------//
}
