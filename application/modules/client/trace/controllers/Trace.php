<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trace extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa-client') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa-client");
        $this->load->model('Tracemodel');
        $this->load->library('form_validation');
    }

    public function index() {
        $kuisioner = $this->Tracemodel->get_stat_kuisioner(1);
        if (empty($kuisioner)) {
            $this->template->load('template_landing_page/template_landing_page', 'kuisioner_kosong', []);
        } else {
            $panel = $this->Tracemodel->get_panel_kuisioner($kuisioner[0]->id_kuisioner, 1);
            if (!empty($panel)) {
                $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

                if ($mhs_log[0]->log_isian_kuisioner == '0') {
                    $this->Tracemodel->update_status_mahasiswa($this->user['id_mhs'], 1);
                    $this->Tracemodel->update_log_mahasiswa($this->user['id_mhs'], $panel[0]->id_panel);
                    $this->panel_redirect($panel[0]->id_panel);
                } else {
                    $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
                }
            } else {
                $this->template->load('template_landing_page/template_landing_page', 'kuisioner_kosong', []);
            }
        }
    }

    public function isian_saran() {

        $data['title'] = 'Control Panel | Login Admin ';
        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != 'end') {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'kritik_saran', $data);
        }
    }

    public function end_kuisioner() {

        $data['title'] = 'Control Panel | Login Admin ';
        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != 'finish') {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'end_kuisioner', $data);
        }
    }

    //------------------------------PIL ESSAI--------------------------------//

    public function isian_essai($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_opsi_essai'] = $this->Tracemodel->get_essai($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_essai', $data);
        }
    }

    public function post_jawaban_essai($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('jawaban', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_essai/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_essai($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_essai/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PIL TUNGGAL--------------------------------//

    public function isian_tunggal($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_opsi_tunggal'] = $this->Tracemodel->get_pilihan_tunggal($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_tunggal', $data);
        }
    }

    public function post_jawaban_tunggal($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('opsi', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $option = explode(",", $data['opsi']);
        $data['jawaban'] = $option[0];
        $data['panel_tujuan'] = $option[1];

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if (!isset($data['jawaban_lainnya'])) {
            $data['jawaban_lainnya'] = '';
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_tunggal/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_tunggal($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_tunggal/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PIL JAMAK--------------------------------//

    public function isian_jamak($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_opsi_jamak'] = $this->Tracemodel->get_pilihan_jamak($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_jamak', $data);
        }
    }

    public function post_jawaban_jamak($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('jawaban[]', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        if (!isset($data['jawaban'])) {
            $data['jawaban'] = '';
        } else {
            $data['jawaban'] = implode(',', $data['jawaban']);
        }

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if (!isset($data['jawaban_lainnya'])) {
            $data['jawaban_lainnya'] = '';
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_jamak/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_jamak($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_jamak/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PIL DROPDOWN--------------------------------//

    public function isian_dropdown($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_opsi_dropdown'] = $this->Tracemodel->get_pilihan_dropdown($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_dropdown', $data);
        }
    }

    public function post_jawaban_dropdown($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('opsi', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $option = explode(",", $data['opsi']);
        $data['jawaban'] = $option[0];
        $data['panel_tujuan'] = $option[1];

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if (!isset($data['jawaban_lainnya'])) {
            $data['jawaban_lainnya'] = '';
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_dropdown/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_dropdown($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_dropdown/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------KISI TUNGGAL--------------------------------//
    public function isian_kisi_tunggal($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_baris'] = $this->Tracemodel->get_kisi_tunggal_baris($data['get_panel'][0]->id_panel);
        $data['get_kolom'] = $this->Tracemodel->get_kisi_tunggal_kolom($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'kisi_tunggal', $data);
        }
    }

    public function post_jawaban_kisi_tunggal($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('opsi_kolom0', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_kisi_tunggal/' . $cek_panel[0]->id_unique);
        } else {

            $opsi_array = array();
            if (!empty($data['opsi_baris'])) {
                for ($i = 0; $i < count($data['opsi_baris']); $i++) {
                    $opsi_array[$i] = array(
                        'id_kuisioner' => $cek_panel[0]->id_kuisioner,
                        'id_panel' => $id_panel,
                        'id_mahasiswa' => $this->user['id_mhs'],
                        'pertanyaan' => $data['opsi_baris'][$i],
                        'jawaban' => $data['opsi_kolom' . $i]
                    );
                }
            }

            $input = $this->db->insert_batch('jawaban_kisi_tunggal', $opsi_array);

            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_kisi_tunggal/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------KISI JAMAK--------------------------------//
    public function isian_kisi_jamak($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_baris'] = $this->Tracemodel->get_kisi_jamak_baris($data['get_panel'][0]->id_panel);
        $data['get_kolom'] = $this->Tracemodel->get_kisi_jamak_kolom($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'kisi_jamak', $data);
        }
    }

    public function post_jawaban_kisi_jamak($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('opsi_kolom0[]', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_kisi_jamak/' . $cek_panel[0]->id_unique);
        } else {

            $opsi_array = array();
            if (!empty($data['opsi_baris'])) {
                for ($i = 0; $i < count($data['opsi_baris']); $i++) {

                    if (!isset($data['opsi_kolom' . $i])) {
                        $jawaban = '';
                    } else {
                        $jawaban = implode(',', $data['opsi_kolom' . $i]);
                    }

                    $opsi_array[$i] = array(
                        'id_kuisioner' => $cek_panel[0]->id_kuisioner,
                        'id_panel' => $id_panel,
                        'id_mahasiswa' => $this->user['id_mhs'],
                        'pertanyaan' => $data['opsi_baris'][$i],
                        'jawaban' => $jawaban
                    );
                }
            }

            $input = $this->db->insert_batch('jawaban_kisi_jamak', $opsi_array);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_kisi_jamak/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PIL SKALA--------------------------------//

    public function isian_skala($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_skala'] = $this->Tracemodel->get_skala($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_skala', $data);
        }
    }

    public function post_jawaban_skala($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('jawaban', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_skala/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_skala($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_skala/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PIL UPLOAD--------------------------------//

    public function isian_upload($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_upload'] = $this->Tracemodel->get_upload($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_upload', $data);
        }
    }

    public function post_jawaban_upload($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);
        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        $this->load->library('upload'); //load library upload file

        if (!empty($_FILES['file_upload'])) {
            $path = 'uploads/files/';
            //config upload file
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = FALSE; //if have same name, add number
            $config['remove_spaces'] = TRUE; //change space into _
            $config['encrypt_name'] = TRUE;
            //initialize config upload
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file_upload')) {
                $result['upload'] = $this->upload->data();
                $name = $result['upload']['file_name'];
                $data['file_upload'] = $path . $name;
            }
        }
        $input = $this->Tracemodel->insert_jawaban_upload($data);
        if ($input == true) {
            if ($cek_panel[0]->status_jawaban_panel == '0') {
                $this->panel_redirect($cek_panel[0]->panel_tujuan);
            } else {
                $this->panel_redirect($data['panel_tujuan']);
            }
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
            redirect('trace/isian_upload/' . $cek_panel[0]->id_unique);
        }
    }

    //------------------------------PIL SINGKAT--------------------------------//

    public function isian_singkat($id = '') {
        $data['get_panel'] = $this->Tracemodel->get_panel($id);
        $data['get_opsi_singkat'] = $this->Tracemodel->get_singkat($data['get_panel'][0]->id_panel);

        $mhs_log = $this->Tracemodel->get_log_mahasiswa($this->user['id_mhs']);

        if ($mhs_log[0]->log_isian_kuisioner != $data['get_panel'][0]->id_panel) {
            $this->panel_redirect($mhs_log[0]->log_isian_kuisioner);
        } else {
            $this->template->load('template_landing_page/template_landing_page', 'isian_singkat', $data);
        }
    }

    public function post_jawaban_singkat($id_panel = '') {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('jawaban', 'Jawaban Mahasiswa', 'required');

        $cek_panel = $this->Tracemodel->get_panel_tujuan($id_panel);

        $data['id_kuisioner'] = $cek_panel[0]->id_kuisioner;
        $data['id_panel'] = $id_panel;
        $data['id_mahasiswa'] = $this->user['id_mhs'];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('trace/isian_singkat/' . $cek_panel[0]->id_unique);
        } else {

            $input = $this->Tracemodel->insert_jawaban_singkat($data);
            if ($input == true) {
                if ($cek_panel[0]->status_jawaban_panel == '0') {
                    $this->panel_redirect($cek_panel[0]->panel_tujuan);
                } else {
                    $this->panel_redirect($data['panel_tujuan']);
                }
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan isi ulang.'));
                redirect('trace/isian_singkat/' . $cek_panel[0]->id_unique);
            }
        }
    }

    //------------------------------PANEL--------------------------------//
    public function panel_redirect($id_panel = '') {

        if ($id_panel == 'end') {
            $this->Tracemodel->update_log_mahasiswa($this->user['id_mhs'], $id_panel);
            redirect('trace/isian_saran');
        } elseif ($id_panel == 'finish') {
            redirect('trace/end_kuisioner');
        } else {

            $panel = $this->Tracemodel->get_panel_tujuan($id_panel);
            $this->Tracemodel->update_log_mahasiswa($this->user['id_mhs'], $id_panel);

            if ($panel[0]->tipe_panel == 1) {
                redirect('trace/isian_essai/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 2) {
                redirect('trace/isian_tunggal/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 3) {
                redirect('trace/isian_jamak/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 4) {
                redirect('trace/isian_dropdown/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 5) {
                redirect('trace/isian_kisi_tunggal/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 6) {
                redirect('trace/isian_kisi_jamak/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 7) {
                redirect('trace/isian_skala/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 8) {
                redirect('trace/isian_upload/' . $panel[0]->id_unique);
            } elseif ($panel[0]->tipe_panel == 9) {
                redirect('trace/isian_singkat/' . $panel[0]->id_unique);
            }
        }
    }

    //------------------------------SARAN--------------------------------//

    public function post_saran_mahasiswa() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('isi_saran', 'Saran Mahasiswa  ', 'required');

        $data['nim_mhs'] = $this->user['nim_mhs'];
        $data['id_fakultas_mhs'] = $this->user['id_fakultas_mhs'];
        $data['id_prodi_mhs'] = $this->user['id_prodi_mhs'];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('flash_message ', warn_msg(validation_errors()));
            redirect('trace/isian_saran');
        } else {
            $input = $this->Tracemodel->insert_saran_mahasiswa($data);
            if ($input == true) {
                $this->Tracemodel->update_log_mahasiswa($this->user['id_mhs'], 'finish');
                $this->Tracemodel->update_status_mahasiswa($this->user['id_mhs'], 2);
                redirect('trace/end_kuisioner');
            } else {
                $this->session->set_flashdata('flash_message ', err_msg('Mohon Maaf, Terjadi kesalahan, silahkan input ulang.'));
                redirect('trace/isian_saran');
            }
        }
    }

}
