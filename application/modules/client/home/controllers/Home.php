<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('Homemodel');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('sitsa-client') == TRUE) {
            redirect('trace');
        }
        $data['title'] = 'Control Panel | Login Admin ';
        $data['data_fakultas'] = $this->Homemodel->get_data_fakultas();
        $data['home_kuisioner'] = $this->Homemodel->get_home_kuisioner(1);
        $this->load->view('home', $data);
    }

    public function login() {
        $param = $this->input->post();

        $this->form_validation->set_rules('nim_mhs', 'NIM Mahasiswa', 'trim|required');
        $this->form_validation->set_rules('password_mhs', 'Password Mahasiswa', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash_message', login_err(validation_errors()));
            redirect('home');
        } else {
            $mhs = $this->Homemodel->get_mhs($param);
            //var_dump($user);exit;
            if (!empty($mhs)) {
                $this->session->set_userdata('sitsa-client', $mhs);
                redirect('trace');
            } else {
                $this->session->set_flashdata('flash_message', login_err('Maaf.., Mungkin Email/Password Anda salah.'));
                redirect('home');
            }
        }
    }

    public function post_laporan_mahasiswa() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('subjek_laporan', 'Subjek Laporan', 'required');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim_mhs', 'NIM Mahasiswa', 'required');
        $this->form_validation->set_rules('id_fakultas_mhs', 'Fakultas Mahasiswa', 'required');
        $this->form_validation->set_rules('id_prodi_mhs', 'Prodi Mahasiswa', 'required');
        $this->form_validation->set_rules('email_mhs', 'Email Mahasiswa', 'required');
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');

        $cek = $this->Homemodel->cek_duplikat_nim($data['nim_mhs']);

        if ($cek == TRUE) {
            $this->session->set_flashdata('flash_message', warn_msg("Mohon Maaf, Anda telah mengirim laporan, Silahkan menunggu respon dari kami. Terima Kasih."));
            redirect('home');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('home');
            } else {

                $input = $this->Homemodel->insert_laporan_mahasiswa($data);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Terkirim, Laporan Anda telah disampaikan ke Admin, Silahkan cek email untuk 1 hari kedepan. Terima Kasih."));
                    redirect('home');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan input ulang.'));
                    redirect('home');
                }
            }
        }
    }

    function add_ajax_prodi($id_fakultas = '') {
        $query = $this->db->get_where('prodi', array('id_fakultas' => $id_fakultas));
        $data = "<option value=''>Pilih Prodi</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
        }
        echo $data;
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('sitsa-client');
        redirect('home');
    }

}
