<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Dashboardmodel');
    }

    //
    //-------------------------------DASHBOARD------------------------------//
    //
    
    
    public function index() {

        $data['duplikat_nim'] = $this->Dashboardmodel->get_duplikat_nim($this->user['id_ref'], $this->user['role_akun']);
        $data['jumlah'] = $this->Dashboardmodel->get_jumlah_data($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'dashboard', $data);
    }

    //--------------------------------DELETE DUPLICATE---------------------------------------//

    public function delete_data_mahasiswa() {
        $id = $this->input->post('id');
        $delete_item = $this->Dashboardmodel->delete_data_mahasiswa($id);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mahasiswa Telah Terhapus.."));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        }
    }

//
}
