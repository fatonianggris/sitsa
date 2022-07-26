<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisioner extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here

        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        // Load Library
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Kuisionermodel');
        $this->load->library('form_validation');
    }

    //--------------------------DAFTAR KUISIONER----------------------------//

    public function daftar_kuisioner() {

        $data['kuisioner'] = $this->Kuisionermodel->get_data_kuisioner($this->user['id_ref'], $this->user['role_akun']);
        $data['jumlah_data'] = $this->Kuisionermodel->get_jumlah_data($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'daftar_kuisioner', $data);
    }

    //--------------------------DAFTAR KUISIONER----------------------------//

    public function hasil_kuisioner() {

        $data['kuisioner'] = $this->Kuisionermodel->get_data_kuisioner($this->user['id_ref'], $this->user['role_akun']);
        $data['jumlah_data'] = $this->Kuisionermodel->get_jumlah_data($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'daftar_hasil_kuisioner', $data);
    }

    public function detail_kuisioner($id = '') {

        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_all_panel'] = $this->Kuisionermodel->get_all_panel($id);

        $this->template->load('template_admin/template_admin', 'detail_kuisioner', $data);
    }

    public function detail_hasil_grafik_kuisioner($id = '') {

        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_all_panel'] = $this->Kuisionermodel->get_all_panel($id);

        $this->template->load('template_admin/template_admin', 'detail_hasil_grafik_kuisioner', $data);
    }

    public function detail_hasil_data_kuisioner($id = '') {

        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_all_panel'] = $this->Kuisionermodel->get_all_panel($id);

        $data['get_pertanyaan_jamak'] = $this->Kuisionermodel->get_pertanyaan_jamak($id);
        $data['get_pertanyaan_tunggal'] = $this->Kuisionermodel->get_pertanyaan_tunggal($id);

        $data['mahasiswa'] = $this->Kuisionermodel->get_mhs_stat_kuisioner(2);
        $id_mhs = NULL;
        for ($i = 0; $i < count($data['mahasiswa']); $i++) {
            $id_mhs[] = $data['mahasiswa'][$i]->id_mhs;
        }

        $data['jawaban_essai'] = $this->Kuisionermodel->get_jawaban_essai($id_mhs, $id);
        $data['jawaban_tunggal'] = $this->Kuisionermodel->get_jawaban_tunggal($id_mhs, $id);
        $data['jawaban_jamak'] = $this->Kuisionermodel->get_jawaban_jamak($id_mhs, $id);
        $data['jawaban_dropdown'] = $this->Kuisionermodel->get_jawaban_dropdown($id_mhs, $id);
        $data['jawaban_kisi_tunggal'] = $this->Kuisionermodel->get_jawaban_kisi_tunggal($id_mhs, $id);
        $data['jawaban_kisi_jamak'] = $this->Kuisionermodel->get_jawaban_kisi_jamak($id_mhs, $id);
        $data['jawaban_skala'] = $this->Kuisionermodel->get_jawaban_skala($id_mhs, $id);
        $data['jawaban_upload'] = $this->Kuisionermodel->get_jawaban_upload($id_mhs, $id);
        $data['jawaban_singkat'] = $this->Kuisionermodel->get_jawaban_pilihan_singkat($id_mhs, $id);

        $this->template->load('template_admin/template_admin', 'detail_hasil_data_kuisioner', $data);
    }

    public function detail_kuisioner_mahasiswa($id_mhs = '', $id_kuisioner = '') {

        $data['get_all_panel'] = $this->Kuisionermodel->get_all_panel($id_kuisioner);
        $data['get_mahasiswa'] = $this->Kuisionermodel->get_data_detail_mahasiswa($id_mhs);

        $data['jawaban_essai'] = $this->Kuisionermodel->get_jawaban_essai($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_tunggal'] = $this->Kuisionermodel->get_jawaban_tunggal($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_jamak'] = $this->Kuisionermodel->get_jawaban_jamak($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_dropdown'] = $this->Kuisionermodel->get_jawaban_dropdown($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_kisi_tunggal'] = $this->Kuisionermodel->get_jawaban_kisi_tunggal($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_kisi_jamak'] = $this->Kuisionermodel->get_jawaban_kisi_jamak($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_skala'] = $this->Kuisionermodel->get_jawaban_skala($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_upload'] = $this->Kuisionermodel->get_jawaban_upload($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);
        $data['jawaban_singkat'] = $this->Kuisionermodel->get_jawaban_pilihan_singkat($data['get_mahasiswa'][0]->id_mhs, $id_kuisioner);

        $this->template->load('template_admin/template_admin', 'detail_kuisioner_mahasiswa', $data);
    }

    //----------------------------PIL ESSAI-------------------//

    public function pilihan_essai($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "1";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Essai Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_essai/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_essai($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_essai'] = $this->Kuisionermodel->get_essai($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_essai', $data);
    }

    //------------------------------PIL TUNGGAL--------------------------------//

    public function pilihan_tunggal($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "2";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);
        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }


        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Tunggal Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_tunggal/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_tunggal($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_opsi_tunggal'] = $this->Kuisionermodel->get_pilihan_tunggal($data['get_panel'][0]->id_panel);
        $data['get_tujuan_lainnya_tunggal'] = $this->Kuisionermodel->get_tujuan_lainnya_tunggal($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_tunggal', $data);
    }

    //------------------------------PIL JAMAK--------------------------------//

    public function pilihan_jamak($id = '') {
        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "3";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Jamak Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_jamak/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_jamak($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_opsi_jamak'] = $this->Kuisionermodel->get_pilihan_jamak($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_jamak', $data);
    }

    //------------------------------PIL DROPDOWN--------------------------------//

    public function pilihan_dropdown($id = '') {
        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "4";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Dropdown Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_dropdown/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_dropdown($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_opsi_dropdown'] = $this->Kuisionermodel->get_pilihan_dropdown($data['get_panel'][0]->id_panel);
        $data['get_tujuan_lainnya_dropdown'] = $this->Kuisionermodel->get_tujuan_lainnya_dropdown($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_dropdown', $data);
    }

    //------------------------------KISI TUNGGAL--------------------------------//

    public function kisi_tunggal($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "5";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Kisi Tunggal Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_kisi_tunggal/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_kisi_tunggal($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_baris'] = $this->Kuisionermodel->get_kisi_tunggal_baris($data['get_panel'][0]->id_panel);
        $data['get_kolom'] = $this->Kuisionermodel->get_kisi_tunggal_kolom($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_kisi_tunggal', $data);
    }

    //------------------------------KISI JAMAK--------------------------------//

    public function kisi_jamak($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "6";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Kisi Jamak Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_kisi_jamak/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_kisi_jamak($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_baris'] = $this->Kuisionermodel->get_kisi_jamak_baris($data['get_panel'][0]->id_panel);
        $data['get_kolom'] = $this->Kuisionermodel->get_kisi_jamak_kolom($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_kisi_jamak', $data);
    }

    //--------------------------------------PIL SKALA----------------------------------//

    public function pilihan_skala($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "7";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Pilihan Skala Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_skala/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_skala($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_skala'] = $this->Kuisionermodel->get_skala($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_skala', $data);
    }

    //--------------------------------------PIL UPLOAD----------------------------------//

    public function pilihan_upload($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "8";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Upload Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_upload/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_upload($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_upload'] = $this->Kuisionermodel->get_upload($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_upload', $data);
    }

    //----------------------------PIL ESSAI-------------------//

    public function pilihan_jawaban_singkat($id = '') {

        $unique_id = random_string('alnum', 25);

        $data_panel['id_kuisioner'] = $id;
        $data_panel['id_unique'] = $unique_id;
        $data_panel['pertanyaan'] = "Pertanyaan Belum Diisi";
        $data_panel['nama_panel'] = "Nama Panel Belum Diisi";
        $data_panel['tipe_panel'] = "9";
        $data_panel['status_required_panel'] = "required";
        $data_panel['status_jawaban_panel'] = "0";

        $cek = $this->Kuisionermodel->check_start_panel($id);

        if ($cek) {
            $data_panel['start_panel'] = "0";
        } else {
            $data_panel['start_panel'] = "1";
        }

        $input = $this->Kuisionermodel->insert_panel($data_panel);

        if ($input == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Jawaban Singkat Telah Dibuat, Silahkan Mengisi Pertanyaan Anda.."));
            redirect('kuisioner/get_pilihan_jawaban_singkat/' . $id . "/" . $unique_id);
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner');
        }
    }

    public function get_pilihan_jawaban_singkat($id = '', $id_unique = '') {
        $data['get_kuisioner'] = $this->Kuisionermodel->get_kuisioner($id);
        $data['get_panel'] = $this->Kuisionermodel->get_panel($id_unique);
        $data['get_all_panel_excpt'] = $this->Kuisionermodel->get_all_panel_excpt($id, $data['get_panel'][0]->id_panel);
        $data['get_jawaban_singkat'] = $this->Kuisionermodel->get_jawaban_singkat($data['get_panel'][0]->id_panel);

        $this->template->load('template_admin/template_admin', 'panel_pilihan_jawaban_singkat', $data);
    }

    //---------------------------------------------------------------//
    //
    //--------------------------KUISIONER----------------------------//

    public function post_kuisioner() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner', 'required');

        $cek = $this->Kuisionermodel->cek_duplikat_kuisioner(strtolower($data['nama_kuisioner']));

        if ($cek == TRUE) {
            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kuisioner '$data[nama_kuisioner]' Telah Tersedia..."));
            redirect('kuisioner/daftar_kuisioner');
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kuisioner/daftar_kuisioner'); //folder, controller, method
            } else {

                $input = $this->Kuisionermodel->insert_kuisioner($data, $this->user['id_ref']);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner '$data[nama_kuisioner]' Telah Tersimpan.."));
                    redirect('kuisioner/daftar_kuisioner');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kuisioner/daftar_kuisioner');
                }
            }
        }
    }

    public function update_kuisioner($id = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_kuisioner', 'Nama Kuisioner', 'required');

        $get_name = $this->Kuisionermodel->get_name_kuisioner($id);
        $cek = $this->Kuisionermodel->cek_duplikat_kuisioner(strtolower($data['nama_kuisioner']));

        if ($cek == TRUE && $data['nama_kuisioner'] != $get_name[0]->nama_kuisioner) {

            $this->session->set_flashdata('flash_message', warn_msg("Maaf, Nama Kuisioner '$data[nama_kuisioner]' Telah Tersedia..."));
            redirect('kuisioner/daftar_kuisioner');
        } else {

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('kuisioner/daftar_kuisioner');
            } else {

                $edit = $this->Kuisionermodel->update_kuisioner($id, $data);

                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner '$data[nama_kuisioner]' Telah Terupdate.."));
                    redirect('kuisioner/daftar_kuisioner');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                    redirect('kuisioner/daftar_kuisioner');
                }
            }
        }
    }

    public function edit_status_kuisioner() {

        $id = $this->input->post('id');
        $val = $this->input->post('value');

        $disable = $this->Kuisionermodel->disable_status_kuisioner($this->user['id_ref']);
        $change = $this->Kuisionermodel->update_status_kuisioner($id, $val);

        if ($change == TRUE && $disable == TRUE) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner Telah Terupdate.."));
            redirect('kuisioner/daftar_kuisioner/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner/');
        }
    }

    public function delete_kuisioner() {

        $id = $this->input->post('id');
        $delete_kuisioner = $this->Kuisionermodel->delete_kuisioner($id);
        $type = $this->Kuisionermodel->get_panel_kuisioner($id);

        foreach ($type as $key => $value) {
            if ($value->tipe_panel == 1) {
                $this->Kuisionermodel->delete_essai($value->id_panel);
            } elseif ($value->tipe_panel == 2) {
                $this->Kuisionermodel->delete_pilihan_tunggal($value->id_panel);
            } elseif ($value->tipe_panel == 3) {
                $this->Kuisionermodel->delete_pilihan_jamak($value->id_panel);
            } elseif ($value->tipe_panel == 4) {
                $this->Kuisionermodel->delete_pilihan_dropdown($value->id_panel);
            } elseif ($value->tipe_panel == 5) {
                $this->Kuisionermodel->delete_kisi_tunggal($value->id_panel);
            } elseif ($value->tipe_panel == 6) {
                $this->Kuisionermodel->delete_kisi_jamak($value->id_panel);
            } elseif ($value->tipe_panel == 7) {
                $this->Kuisionermodel->delete_skala($value->id_panel);
            } elseif ($value->tipe_panel == 8) {
                $this->Kuisionermodel->delete_upload($value->id_panel);
            } elseif ($value->tipe_panel == 9) {
                $this->Kuisionermodel->delete_jawaban_singkat($value->id_panel);
            }
        }

        $delete_panel = $this->Kuisionermodel->delete_panel_kuisioner($id);
        $delete_jawaban = $this->Kuisionermodel->delete_all_jawaban($id);

        if ($delete_kuisioner == TRUE && $delete_panel == TRUE && $delete_jawaban == TRUE) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Kuisioner Telah Terhapus.."));
            redirect('kuisioner/daftar_kuisioner/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('kuisioner/daftar_kuisioner/');
        }
    }

    //---------------------------------------------------------------------//
    //
    //----------------------------PANEL ESSAI-------------------------------//

    public function post_panel_essai($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jumlah_karakter', 'Jumlah Karakter', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        $cek = $this->Kuisionermodel->get_essai($id_panel);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_essai/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            if ($cek) {
                $input = $this->Kuisionermodel->update_essai($data, $id_panel);
            } else {
                $input = $this->Kuisionermodel->insert_essai($data);
            }

            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_essai/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_essai/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //----------------------------------PILIHAN TUNGGAL----------------------------//

    public function post_panel_pilihan_tunggal($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        if (!isset($data['panel_tujuan'])) {
            $data['panel_tujuan'] = '';
        }

        if (!isset($data['panel_lanjutan'])) {
            $data['panel_lanjutan'] = '';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            $opsi_array = array();
            if (!empty($data['opsi'])) {

                for ($i = 0; $i < count($data['opsi']); $i++) {
                    $opsi_array[$i] = array(
                        'id_kuisioner' => $id_kuisioner,
                        'id_panel' => $id_panel,
                        'opsi' => $data['opsi'][$i],
                        'panel_tujuan' => $data['panel_tujuan'][$i]
                    );
                }
                $this->Kuisionermodel->delete_pilihan_tunggal($id_panel);
            }

            $input_opsi = $this->db->insert_batch('pilihan_tunggal', $opsi_array);
            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input_opsi == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //-------------------------------------PILIHAN JAMAK------------------------------//

    public function post_panel_pilihan_jamak($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        if (!isset($data['panel_lanjutan'])) {
            $data['panel_lanjutan'] = '';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            $opsi_array = array();
            if (!empty($data['opsi'])) {
                for ($i = 0; $i < count($data['opsi']); $i++) {
                    $opsi_array[$i] = array(
                        'id_kuisioner' => $id_kuisioner,
                        'id_panel' => $id_panel,
                        'opsi' => $data['opsi'][$i]
                    );
                }
                $this->Kuisionermodel->delete_pilihan_jamak($id_panel);
            }

            $input_opsi = $this->db->insert_batch('pilihan_jamak', $opsi_array);
            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input_opsi == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //-------------------------------------PILIHAN DROPDOWN------------------------------//

    public function post_panel_pilihan_dropdown($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        if (!isset($data['panel_tujuan'])) {
            $data['panel_tujuan'] = '';
        }

        if (!isset($data['panel_lanjutan'])) {
            $data['panel_lanjutan'] = '';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_dropdown/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            $opsi_array = array();
            if (!empty($data['opsi'])) {

                for ($i = 0; $i < count($data['opsi']); $i++) {
                    $opsi_array[$i] = array(
                        'id_kuisioner' => $id_kuisioner,
                        'id_panel' => $id_panel,
                        'opsi' => $data['opsi'][$i],
                        'panel_tujuan' => $data['panel_tujuan'][$i]
                    );
                }
                $this->Kuisionermodel->delete_pilihan_dropdown($id_panel);
            }

            $input_opsi = $this->db->insert_batch('dropdown', $opsi_array);
            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input_opsi == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_dropdown/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_dropdown/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //-------------------------------------PILIHAN KISI TUNGGAL------------------------------//

    public function post_panel_kisi_tunggal($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        if (!isset($data['baris'])) {
            $data['baris'] = '';
        }

        if (!isset($data['kolom'])) {
            $data['kolom'] = '';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_kisi_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            $opsi_array = array();
            if (!empty($data['baris']) || !empty($data['kolom'])) {
                if (count($data['baris']) > count($data['kolom'])) {
                    for ($i = 0; $i < count($data['baris']); $i++) {
                        $opsi_array[$i] = array(
                            'id_kuisioner' => $id_kuisioner,
                            'id_panel' => $id_panel,
                            'opsi_baris' => $data['baris'][$i],
                            'opsi_kolom' => $data['kolom'][$i]
                        );
                    }
                } else {
                    for ($i = 0; $i < count($data['kolom']); $i++) {
                        $opsi_array[$i] = array(
                            'id_kuisioner' => $id_kuisioner,
                            'id_panel' => $id_panel,
                            'opsi_baris' => $data['baris'][$i],
                            'opsi_kolom' => $data['kolom'][$i]
                        );
                    }
                }
                $this->Kuisionermodel->delete_kisi_tunggal($id_panel);
            }

            $input_opsi = $this->db->insert_batch('kisi_tunggal', $opsi_array);
            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input_opsi == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_kisi_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_kisi_tunggal/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //-------------------------------------PILIHAN KISI JAMAK------------------------------//

    public function post_panel_kisi_jamak($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        if (!isset($data['baris'])) {
            $data['baris'] = '';
        }

        if (!isset($data['kolom'])) {
            $data['kolom'] = '';
        }

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_kisi_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            $opsi_array = array();
            if (!empty($data['baris']) || !empty($data['kolom'])) {
                if (count($data['baris']) > count($data['kolom'])) {
                    for ($i = 0; $i < count($data['baris']); $i++) {
                        $opsi_array[$i] = array(
                            'id_kuisioner' => $id_kuisioner,
                            'id_panel' => $id_panel,
                            'opsi_baris' => $data['baris'][$i],
                            'opsi_kolom' => $data['kolom'][$i]
                        );
                    }
                } else {
                    for ($i = 0; $i < count($data['kolom']); $i++) {
                        $opsi_array[$i] = array(
                            'id_kuisioner' => $id_kuisioner,
                            'id_panel' => $id_panel,
                            'opsi_baris' => $data['baris'][$i],
                            'opsi_kolom' => $data['kolom'][$i]
                        );
                    }
                }
                $this->Kuisionermodel->delete_kisi_jamak($id_panel);
            }

            $input_opsi = $this->db->insert_batch('kisi_jamak', $opsi_array);
            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input_opsi == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_kisi_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_kisi_jamak/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //----------------------------PANEL SKALA-------------------------------//

    public function post_panel_skala($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('nama_awal', 'Nama Awal', 'required');
        $this->form_validation->set_rules('nama_akhir', 'Nama Akhir', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        $cek = $this->Kuisionermodel->get_skala($id_panel);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_skala/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            if ($cek) {
                $input = $this->Kuisionermodel->update_skala($data, $id_panel);
            } else {
                $input = $this->Kuisionermodel->insert_skala($data);
            }

            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_skala/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_skala/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //----------------------------PANEL UPLOAD-------------------------------//

    public function post_panel_upload($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('ukuran_file', 'Ukuran File', 'required');
        $this->form_validation->set_rules('format_file', 'Format File', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        $cek = $this->Kuisionermodel->get_upload($id_panel);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_upload/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            if ($cek) {
                $input = $this->Kuisionermodel->update_upload($data, $id_panel);
            } else {
                $input = $this->Kuisionermodel->insert_upload($data);
            }

            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_upload/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_upload/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //----------------------------PANEL ESSAI-------------------------------//

    public function post_panel_jawaban_singkat($id_kuisioner = '', $id_panel = '') {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_panel', 'Nama Panel', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('tipe_pertanyaan', 'Tipe Pertanyaan', 'required');

        $data['id_kuisioner'] = $id_kuisioner;
        $data['id_panel'] = $id_panel;

        $cek = $this->Kuisionermodel->get_jawaban_singkat($id_panel);

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('kuisioner/get_pilihan_jawaban_singkat/' . $id_kuisioner . "/" . $data['id_unique']);
        } else {

            if ($cek) {
                $input = $this->Kuisionermodel->update_jawaban_singkat($data, $id_panel);
            } else {
                $input = $this->Kuisionermodel->insert_jawaban_singkat($data);
            }

            $edit = $this->Kuisionermodel->update_panel($data, $id_panel);

            if ($input == TRUE && $edit == TRUE) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel '$data[nama_panel]' Telah Terupdate.."));
                redirect('kuisioner/get_pilihan_jawaban_singkat/' . $id_kuisioner . "/" . $data['id_unique']);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('kuisioner/get_pilihan_jawaban_singkat/' . $id_kuisioner . "/" . $data['id_unique']);
            }
        }
    }

    //--------------------------------------ALL PANEL-----------------------------//

    public function edit_status_required_panel() {

        $id = $this->input->post('id');
        $val = $this->input->post('value');

        $change = $this->Kuisionermodel->update_status_required_panel($id, $val);

        if ($change == TRUE) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Telah Terupdate.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function edit_status_jawaban_panel() {

        $id = $this->input->post('id');
        $val = $this->input->post('value');

        $change = $this->Kuisionermodel->update_status_jawaban_panel($id, $val);

        if ($change == TRUE) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Telah Terupdate.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function delete_panel() {

        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $delete = $this->Kuisionermodel->delete_panel($id);

        if ($type == 1) {
            $delete_opsi = $this->Kuisionermodel->delete_essai($id);
        } elseif ($type == 2) {
            $delete_opsi = $this->Kuisionermodel->delete_pilihan_tunggal($id);
        } elseif ($type == 3) {
            $delete_opsi = $this->Kuisionermodel->delete_pilihan_jamak($id);
        } elseif ($type == 4) {
            $delete_opsi = $this->Kuisionermodel->delete_pilihan_dropdown($id);
        } elseif ($type == 5) {
            $delete_opsi = $this->Kuisionermodel->delete_kisi_tunggal($id);
        } elseif ($type == 6) {
            $delete_opsi = $this->Kuisionermodel->delete_kisi_jamak($id);
        } elseif ($type == 7) {
            $delete_opsi = $this->Kuisionermodel->delete_skala($id);
        } elseif ($type == 8) {
            $delete_opsi = $this->Kuisionermodel->delete_upload($id);
        } elseif ($type == 9) {
            $delete_opsi = $this->Kuisionermodel->delete_jawaban_singkat($id);
        }

        if ($delete == true && $delete_opsi == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Telah Terhapus.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    public function edit_opsi_lainnya() {

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $value = $this->input->post('value');
        $tipe = $this->input->post('tipe');

        $change = $this->Kuisionermodel->update_opsi_lainnya($id, $status);

        if ($status == '0') {
            $this->Kuisionermodel->delete_opsi_lainnya($id, $value, $tipe);
        }

        if ($change == TRUE) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Panel Telah Terupdate.."));
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
        }
    }

    //--------------------------AJAX PANEL-------------------------------------//
    //
  function get_panel_ajax($id_panel = '', $id_kuisinoer = '') {
        $query = $this->db->query("SELECT * FROM panel WHERE NOT id_panel = $id_panel AND id_kuisioner=$id_kuisinoer");

        $data = "<option value=''>Pilih Panel</option>";
        $data .= "<option value='0'>*NANTI SAJA</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_panel . "'>" . strtoupper($value->nama_panel) . "</option>";
        }
        echo $data;
    }

    public function get_ajax_pilihan_jamak($id_kuisioner = '', $id_panel = '') {
        $data = $this->Kuisionermodel->get_pilihan_jamak_count($id_kuisioner, $id_panel); //?
        $result = array();
        $result[0][] = 'Opsi';
        $result[0][] = 'Total Jawaban';
        $i = 1;
        foreach ($data as $value) {
            $result[$i][] = ucwords(strtolower($value->opsi)) . " (" . $value->total_jawaban . ')';
            $result[$i][] = intval($value->total_jawaban);
            $i++;
        }
        echo json_encode($result);
    }

    public function get_ajax_pilihan_tunggal($id_kuisioner = '', $id_panel = '') {
        $data = $this->Kuisionermodel->get_pilihan_tunggal_count($id_kuisioner, $id_panel); //?
        $result = array();
        $result[0][] = 'Opsi';
        $result[0][] = 'Total Jawaban';
        $i = 1;
        foreach ($data as $value) {
            $result[$i][] = ucwords(strtolower($value->opsi)) . " (" . $value->total_jawaban . ')';
            $result[$i][] = intval($value->total_jawaban);
            $i++;
        }
        echo json_encode($result);
    }

    public function get_ajax_pilihan_dropdown($id_kuisioner = '', $id_panel = '') {
        $data = $this->Kuisionermodel->get_pilihan_dropdown_count($id_kuisioner, $id_panel); //?
        $result = array();
        $result[0][] = 'Opsi';
        $result[0][] = 'Total Jawaban';
        $i = 1;
        foreach ($data as $value) {
            $result[$i][] = ucwords(strtolower($value->opsi)) . " (" . $value->total_jawaban . ')';
            $result[$i][] = intval($value->total_jawaban);
            $i++;
        }
        echo json_encode($result);
    }

    public function get_ajax_pilihan_singkat($id_kuisioner = '', $id_panel = '') {
        $data = $this->Kuisionermodel->get_pilihan_singkat_count($id_kuisioner, $id_panel); //?
        $result = array();
        $result[0][] = 'Opsi';
        $result[0][] = 'Total Jawaban';
        $i = 1;
        foreach ($data as $value) {
            $result[$i][] = ucwords(strtolower($value->jawaban)) . " (" . $value->total_jawaban . ')';
            $result[$i][] = intval($value->total_jawaban);
            $i++;
        }
        echo json_encode($result);
    }

    public function get_ajax_pilihan_skala($id_kuisioner = '', $id_panel = '') {
        $data = $this->Kuisionermodel->get_pilihan_skala_count($id_kuisioner, $id_panel); //?
        $result = array();
        $result[0][] = 'Opsi';
        $result[0][] = 'Total Jawaban';
        $i = 1;
        foreach ($data as $value) {
            $result[$i][] = ucwords(strtolower($value->jawaban)) . " (" . $value->total_jawaban . ')';
            $result[$i][] = intval($value->total_jawaban);
            $i++;
        }
        echo json_encode($result);
    }

    public function get_ajax_kisi_tunggal($id_kuisioner = '', $id_panel = '') {
        $kolom = $this->Kuisionermodel->get_kisi_tunggal_kolom_asc($id_panel);
        $baris = $this->Kuisionermodel->get_kisi_tunggal_baris($id_panel);
        $data = $this->Kuisionermodel->get_kisi_tunggal_count($id_kuisioner, $id_panel); //?

        $result = array();
        $result[0][] = 'Pertanyaan';
        foreach ($kolom as $value) {
            $result[0][] = ucwords(strtolower($value->opsi_kolom));
        }

        for ($b = 1; $b <= count($baris); $b++) {
            $result[$b][0] = $baris[$b - 1]->opsi_baris;
            for ($d = 0; $d < count($data); $d++) {
                if ($baris[$b - 1]->opsi_baris == $data[$d]->pertanyaan) {
                    for ($k = 1; $k <= count($kolom); $k++) {
                        if ($data[$d]->opsi_kolom == $kolom[$k - 1]->opsi_kolom) {
                            $result[$b][$k] = intval($data[$d]->total_jawaban);
                        } else {
                            if (!empty($result)) {
                                if (@$result[$b][$k] != 0) {
                                    if (@$result[$b][$k] < intval($data[$d]->total_jawaban)) {
                                        if (@$result[$b][$k] != 0) {
                                            $result[$b][$k] = $result[$b][$k];
                                        } else {
                                            $result[$b][$k] = intval($data[$d]->total_jawaban);
                                        }
                                    }
                                } else {
                                    $result[$b][$k] = 0;
                                }
                            }
                        }
                    }
                }
            }
        }

        echo json_encode($result);
    }

    public function get_ajax_kisi_jamak($id_kuisioner = '', $id_panel = '') {
        $kolom = $this->Kuisionermodel->get_kisi_jamak_kolom_asc($id_panel);
        $baris = $this->Kuisionermodel->get_kisi_jamak_baris($id_panel);
        $data = $this->Kuisionermodel->get_kisi_jamak_count($id_kuisioner, $id_panel); //?

        $result = array();
        $result[0][] = 'Pertanyaan';
        foreach ($kolom as $value) {
            $result[0][] = ucwords(strtolower($value->opsi_kolom));
        }

        for ($b = 1; $b <= count($baris); $b++) {
            $result[$b][0] = $baris[$b - 1]->opsi_baris;
            for ($d = 0; $d < count($data); $d++) {
                if ($baris[$b - 1]->opsi_baris == $data[$d]->pertanyaan) {
                    for ($k = 1; $k <= count($kolom); $k++) {
                        if ($data[$d]->opsi_kolom == $kolom[$k - 1]->opsi_kolom) {
                            $result[$b][$k] = intval($data[$d]->total_jawaban);
                        } else {
                            if (!empty($result)) {
                                if (@$result[$b][$k] != 0) {
                                    if (@$result[$b][$k] < intval($data[$d]->total_jawaban)) {
                                        if (@$result[$b][$k] != 0) {
                                            $result[$b][$k] = $result[$b][$k];
                                        } else {
                                            $result[$b][$k] = intval($data[$d]->total_jawaban);
                                        }
                                    }
                                } else {
                                    $result[$b][$k] = 0;
                                }
                            }
                        }
                    }
                }
            }
        }

        echo json_encode($result);
    }

//
}
