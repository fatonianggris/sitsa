<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Mahasiswamodel');
        $this->load->library('form_validation');
    }

    //
    //-------------------------------DATA_MAHASISWA------------------------------//
    //
    
    public function daftar_data_mahasiswa() {
        $data['data_mahasiswa'] = $this->Mahasiswamodel->get_data_mahasiswa($this->user['id_ref'], $this->user['role_akun']);
        $data['jumlah_data_mahasiswa'] = $this->Mahasiswamodel->get_jumlah_data_mahasiswa($this->user['id_ref'], $this->user['role_akun']);
        $data['data_fakultas'] = $this->Mahasiswamodel->get_data_fakultas_admin($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'daftar_data_mahasiswa', $data);
    }

    public function detail_data_mahasiswa($id = '') {
        $data['detail_data_mahasiswa'] = $this->Mahasiswamodel->get_data_detail_mahasiswa($id);

        $this->template->load('template_admin/template_admin', 'detail_data_mahasiswa', $data);
    }

    public function add_data_mahasiswa() {
        $data['data_fakultas'] = $this->Mahasiswamodel->get_data_fakultas_admin($this->user['id_ref'], $this->user['role_akun']);

        $this->template->load('template_admin/template_admin', 'tambah_data_mahasiswa', $data);
    }

    public function edit_data_mahasiswa($id = '') {
        $data['data_fakultas'] = $this->Mahasiswamodel->get_data_fakultas($this->user['id_ref'], $this->user['role_akun']);
        $data['edit_data_mahasiswa'] = $this->Mahasiswamodel->get_data_detail_mahasiswa($id);

        $cek_id = $this->Mahasiswamodel->get_id_mahasiswa($id);
        if ($cek_id == FALSE or empty($cek_id)) {
            $this->load->view('error_404', $data);
        } else {
            $this->template->load('template_admin/template_admin', 'edit_data_mahasiswa', $data);
        }
    }

    public function post_data_mahasiswa() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nim_mhs', 'NIM Mahasiswa', 'required');
        $this->form_validation->set_rules('password_mhs', 'Password Sementara Mahasiswa', 'required');
        $this->form_validation->set_rules('nomor_ijazah_mhs', 'Nomor Ijazah Mahasiswa', 'required');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('email_mhs', 'Email Mahasiswa', 'required');
        $this->form_validation->set_rules('nomor_hp_mhs', 'Nomor Handphone Mahasiswa', 'required');
        $this->form_validation->set_rules('id_fakultas_mhs', 'Fakultas Mahasiswa', 'required');
        $this->form_validation->set_rules('id_prodi_mhs', 'Prodi Mahasiswa', 'required');
        $this->form_validation->set_rules('tahun_masuk_mhs', 'Tahun Masuk Mahasiswa', 'required');
        $this->form_validation->set_rules('tahun_lulus_mhs', 'Tahun Lulus Mahasiswa', 'required');

        $data['id_ref'] = $data['id_fakultas_mhs'] . $data['id_prodi_mhs'];

        $cek_nim = $this->Mahasiswamodel->cek_duplikat_nim($data['nim_mhs']);

        if ($cek_nim == TRUE) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, NIM Mahasiswa '$data[nim_mhs]' tersebut telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/mahasiswa/add_data_mahasiswa');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/mahasiswa/add_data_mahasiswa');
            } else {
                $input = $this->Mahasiswamodel->insert_data_mahasiswa($data, $data['id_ref']);
                if ($input == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mahasiswa '$data[nama_mhs]' ('$data[nim_mhs]') telah disimpan."));
                    redirect('master/mahasiswa/add_data_mahasiswa');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                    redirect('master/mahasiswa/add_data_mahasiswa');
                }
            }
        }
    }

    public function update_data_mahasiswa($id = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nim_mhs', 'NIM Mahasiswa', 'required');
        $this->form_validation->set_rules('password_mhs', 'Password Sementara Mahasiswa', 'required');
        $this->form_validation->set_rules('nomor_ijazah_mhs', 'Nomor Ijazah Mahasiswa', 'required');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('email_mhs', 'Email Mahasiswa', 'required');
        $this->form_validation->set_rules('nomor_hp_mhs', 'Nomor Handphone Mahasiswa', 'required');
        $this->form_validation->set_rules('id_fakultas_mhs', 'Fakultas Mahasiswa', 'required');
        $this->form_validation->set_rules('id_prodi_mhs', 'Prodi Mahasiswa', 'required');
        $this->form_validation->set_rules('tahun_masuk_mhs', 'Tahun Masuk Mahasiswa', 'required');
        $this->form_validation->set_rules('tahun_lulus_mhs', 'Tahun Lulus Mahasiswa', 'required');

        $data['id_ref'] = $data['id_fakultas_mhs'] . $data['id_prodi_mhs'];

        $cek_nim = $this->Mahasiswamodel->cek_duplikat_nim($data['nim_mhs']);

        if ($cek_nim == TRUE && $cek_nim[0]->nim_mhs != $data['nim_mhs']) {
            $this->session->set_flashdata('flash_message', err_msg("Mohon Maaf, NIM Mahasiswa '$data[nim_mhs]' tersebut telah diinputkan sebelumnya. Silahkan cek ulang."));
            redirect('master/mahasiswa/add_data_mahasiswa');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
                redirect('master/mahasiswa/edit_data_mahasiswa/' . $id);
            } else {
                // print_r($data);exit;    
                $edit = $this->Mahasiswamodel->update_data_mahasiswa($id, $data, $data['id_ref']);
                if ($edit == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mahasiswa '$data[nama_mhs]' ('$data[nim_mhs]') Telah diupdate."));
                    redirect('master/mahasiswa/edit_data_mahasiswa/' . $id);
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang.'));
                    redirect('master/mahasiswa/edit_data_mahasiswa/' . $id);
                }
            }
        }
    }

    public function delete_data_mahasiswa() {
        $id = $this->input->post('id');
        $delete_item = $this->Mahasiswamodel->delete_data_mahasiswa($id);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mahasiswa Telah Terhapus.."));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan input ulang...'));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        }
    }

    public function delete_data_mahasiswa_terpilih() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $delete_item = $this->Mahasiswamodel->delete_data_mahasiswa_terpilih($data['data_check']);

        if ($delete_item == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Mahasiswa yang dipilih telah dihapus.."));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan hapus ulang...'));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        }
    }

    //----------------------------------------------------------------------//
    //---------------------------IMPORT DATA MAHASISWA---------------------------------//

    public function import_data_mahasiwa() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('id_fakultas_mhs', 'Fakultas Mahasiswa', 'required');
        $this->form_validation->set_rules('id_prodi_mhs', 'Prodi Mahasiswa', 'required');
        $this->form_validation->set_rules('password_mhs', 'Password Sementara Mahasiswa', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        } else {
            // If file uploaded
            $file_mimes = array('text/x-comma-separated-values',
                'text/comma-separated-values',
                'application/octet-stream',
                'application/vnd.ms-excel',
                'application/x-csv',
                'text/x-csv',
                'text/csv',
                'application/csv',
                'application/excel',
                'application/vnd.msexcel',
                'text/plain',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            );

            if (isset($_FILES['import_data_mhs']['name']) && in_array($_FILES['import_data_mhs']['type'], $file_mimes)) {
                $arr_file = explode('.', $_FILES['import_data_mhs']['name']);
                $extension = end($arr_file);

                if ($extension == 'csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                $spreadsheet = $reader->load($_FILES['import_data_mhs']['tmp_name']);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $data_mhs_array = array();
                for ($i = 1; $i < count($sheetData); $i++) {

                    $data_mhs_array[$i] = array(
                        'nim_mhs' => strtolower(filter_var(trim($sheetData[$i]['1']), FILTER_SANITIZE_STRING)),
                        'id_admin' => $this->user['id_ref'],
                        'password_mhs' => $data['password_mhs'],
                        'nama_mhs' => strtolower(filter_var(trim($sheetData[$i]['2']), FILTER_SANITIZE_STRING)),
                        'nomor_ijazah_mhs' => strtolower(filter_var(trim($sheetData[$i]['3']), FILTER_SANITIZE_STRING)),
                        'email_mhs' => strtolower(filter_var(trim($sheetData[$i]['4']), FILTER_SANITIZE_STRING)),
                        'nomor_hp_mhs' => strtolower(filter_var(trim($sheetData[$i]['5']), FILTER_SANITIZE_STRING)),
                        'id_fakultas_mhs' => strtolower(filter_var(trim($data['id_fakultas_mhs']), FILTER_SANITIZE_STRING)),
                        'id_prodi_mhs' => strtolower(filter_var(trim($data['id_prodi_mhs']), FILTER_SANITIZE_STRING)),
                        'tahun_lulus_mhs' => strtolower(filter_var(trim($sheetData[$i]['6']), FILTER_SANITIZE_STRING)),
                        'tahun_masuk_mhs' => strtolower(filter_var(trim($sheetData[$i]['7']), FILTER_SANITIZE_STRING))
                    );
                }

                $import_data = $this->db->insert_batch('mahasiswa', $data_mhs_array);

                if ($import_data == true) {
                    $this->session->set_flashdata('flash_message', succ_msg("Berhasil, File " . $_FILES['import_data_mhs']['name'] . " Telah diimport.."));
                    redirect('master/mahasiswa/daftar_data_mahasiswa/');
                } else {
                    $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, Silahkan import ulang...'));
                    redirect('master/mahasiswa/daftar_data_mahasiswa/');
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Silahkan Import file berformat csv/xls/xlsx'));
                redirect('master/mahasiswa/daftar_data_mahasiswa/');
            }
        }
    }

    //---------------------------------------GET AJAX PRODI---------------------------------------//

    function add_ajax_prodi($id_fakultas = '') {
        $query = $this->db->get_where('prodi', array('id_fakultas' => $id_fakultas));
        $data = "<option value=''>Pilih Prodi</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
        }
        echo $data;
    }

    function add_ajax_prodi_edit($id_fakultas = '', $id_prodi = '') {
        $query = $this->db->get_where('prodi', array('id_fakultas' => $id_fakultas));
        $data = "";
        foreach ($query->result() as $value) {
            if ($value->id_prodi == $id_prodi) {
                $data .= "<option selected value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
            } else {
                $data .= "<option value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_fakultas() {
        $query = $this->db->get('fakultas');
        $data = "<option value=''>Pilih Fakultas</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_fakultas . "'>" . strtoupper($value->nama_fakultas) . "</option>";
        }
        echo $data;
    }

    function add_ajax_fakultas_edit($id_fakultas = '') {
        $query = $this->db->get('fakultas');
        $data = "";
        foreach ($query->result() as $value) {
            if ($value->id_fakultas == $id_fakultas) {
                $data .= "<option selected value='" . $value->id_fakultas . "'>" . strtoupper($value->nama_fakultas) . "</option>";
            } else {
                $data .= "<option value='" . $value->id_fakultas . "'>" . strtoupper($value->nama_fakultas) . "</option>";
            }
        }
        echo $data;
    }

    function add_ajax_fakultas_sub($id_fakultas = '') {
        $query = $this->db->get_where('fakultas', array('id_fakultas' => $id_fakultas));
        $data = "";
        foreach ($query->result() as $value) {
            $data .= "<option selected value='" . $value->id_fakultas . "'>" . strtoupper($value->nama_fakultas) . "</option>";
        }
        echo $data;
    }

    function add_ajax_prodi_sub($id_fakultas = '', $id_prodi = '') {
        $query = $this->db->get_where('prodi', array('id_fakultas' => $id_fakultas, 'id_prodi' => $id_prodi));
        $data = "";
        foreach ($query->result() as $value) {
            $data .= "<option selected value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
        }
        echo $data;
    }

    function add_ajax_prodi_role($id_fakultas = '', $id_prodi = '') {
        $query = $this->db->get_where('prodi', array('id_fakultas' => $id_fakultas, 'id_prodi' => $id_prodi));
        $data = "<option value=''>Pilih Prodi</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id_prodi . "'>" . strtoupper($value->nama_prodi) . "</option>";
        }
        echo $data;
    }

    //------------------------------------------------------------------------------//
}
