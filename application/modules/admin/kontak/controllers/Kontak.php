<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Kontakmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------LAPORAN--------------------------------//
    //
    public function daftar_laporan_mahasiswa() {

        $data['jumlah_laporan_saran'] = $this->Kontakmodel->get_jumlah_laporan_saran($this->user['id_ref'], $this->user['role_akun']);
        $data['laporan_mahasiwa'] = $this->Kontakmodel->get_laporan_mahasiswa($this->user['id_ref'], $this->user['role_akun']);
        $this->template->load('template_admin/template_admin', 'daftar_laporan_mahasiswa', $data);
    }

    public function daftar_saran_mahasiswa() {

        $data['jumlah_laporan_saran'] = $this->Kontakmodel->get_jumlah_laporan_saran($this->user['id_ref'], $this->user['role_akun']);
        $data['saran_mahasiwa'] = $this->Kontakmodel->get_saran_mahasiwa($this->user['id_ref'], $this->user['role_akun']);
        $this->template->load('template_admin/template_admin', 'daftar_saran_mahasiswa', $data);
    }

    public function delete_laporan_mahasiswa() {
        $id = $this->input->post('id');
        $delete = $this->Kontakmodel->delete_laporan_mahasiswa($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Laporan Telah Terhapus.."));
            redirect('kontak/daftar_laporan_mahasiswa');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan.'));
            redirect('kontak/daftar_laporan_mahasiswa');
        }
    }

    public function delete_saran_mahasiswa() {
        $id = $this->input->post('id');
        $delete = $this->Kontakmodel->delete_saran_mahasiswa($id);

        if ($delete == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Saran Telah Terhapus.."));
            redirect('kontak/daftar_saran_mahasiswa');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan.'));
            redirect('kontak/daftar_saran_mahasiswa');
        }
    }

    //-----------------------------------------------------------------------//
}
