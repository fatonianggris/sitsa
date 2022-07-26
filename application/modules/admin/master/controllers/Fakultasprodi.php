<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultasprodi extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Fakultasprodimodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA FAKULTAS DAN PRODI------------------------------//
    //
    
    public function daftar_data_fakultas_prodi() {
        $data['data_fakultas'] = $this->Fakultasprodimodel->get_data_fakultas();
        $data['data_prodi'] = $this->Fakultasprodimodel->get_data_prodi();
        $data['jumlah_data_fakultas_prodi'] = $this->Fakultasprodimodel->get_jumlah_data_fakultas_prodi();

        $this->template->load('template_admin/template_admin', 'daftar_data_fakultas_prodi', $data);
    }

    //-------------------------------------------------------------------------------//
    //---------------------------------DATA FAKULTAS--------------------------------//

    public function post_data_fakultas() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

        $cek_nama_fakultas = $this->Fakultasprodimodel->cek_nama_fakultas($data['nama_fakultas']);

        if ($cek_nama_fakultas == TRUE) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Nama Fakultas '$data[nama_fakultas]' telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
            } else {
                $input = $this->Fakultasprodimodel->insert_data_fakultas($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Fakultas '$data[nama_fakultas]' telah disimpan.."));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                }
            }
        }
    }

    public function update_data_fakultas($id = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

        $cek_nama_fakultas = $this->Mahasiswamodel->cek_nama_fakultas($data['nama_fakultas']);

        if ($cek_nama_fakultas == TRUE && $cek_nama_fakultas[0]->nama_fakultas != $data['nama_fakultas']) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Nama Fakultas '$data[nama_fakultas]' telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
            } else {
                // print_r($data);exit;    
                $edit = $this->Fakultasprodimodel->update_data_fakultas($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Fakultas '$data[nama_fakultas]' Telah diupdate.."));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                }
            }
        }
    }

    public function delete_data_fakultas() {
        $id = $this->input->post('id');
        $delete_item = $this->Fakultasprodimodel->delete_data_fakultas($id);
        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Fakultas Telah Terhapus.."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        }
    }

    //----------------------------------DATA PRODI---------------------------------//

    public function post_data_prodi() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');

        $cek_nama_prodi = $this->Fakultasprodimodel->cek_nama_prodi($data['nama_prodi']);

        if ($cek_nama_prodi == TRUE) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Nama Prodi '$data[nama_prodi]' telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
            } else {
                $input = $this->Fakultasprodimodel->insert_data_prodi($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Prodi '$data[nama_prodi]' telah disimpan.."));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                }
            }
        }
    }

    public function update_data_prodi($id = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');

        $cek_nama_prodi = $this->Fakultasprodimodel->cek_nama_prodi($data['nama_prodi']);

        if ($cek_nama_prodi == TRUE && $cek_nama_prodi[0]->nama_prodi != $data['nama_prodi']) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, Nama Prodi '$data[nama_prodi]' telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
            } else {
                // print_r($data);exit;    
                $edit = $this->Fakultasprodimodel->update_data_prodi($id, $data);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Prodi '$data[nama_prodi]' Telah diupdate.."));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
                    redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
                }
            }
        }
    }

    public function delete_data_prodi() {
        $id = $this->input->post('id');
        $delete_item = $this->Fakultasprodimodel->delete_data_prodi($id);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Prodi Telah Terhapus.."));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('master/fakultasprodi/daftar_data_fakultas_prodi');
        }
    }

    //------------------------------------------------------------------------------//
}
