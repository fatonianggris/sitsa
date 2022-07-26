<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Mailmodel');
        $this->load->library('form_validation');
    }

    //
    //------------------------------MAIL PAGE--------------------------------//
    //
   
   public function setting_mailer($id = 1) {
        $data['data_email_mahasiswa'] = $this->Mailmodel->get_data_email_mahasiswa($this->user['id_ref'], $this->user['role_akun']);
        $data['setting_mailer'] = $this->Mailmodel->get_konfigurasi_mailer_data(1);
        $this->template->load('template_admin/template_admin', 'pengaturan_mailer', $data);
    }

    public function update_mailer() {

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('subjek_email', 'Subjek Email', 'required');
        $this->form_validation->set_rules('host', 'Host', 'required');
        $this->form_validation->set_rules('email_website', 'Email Website', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('port', 'Port', 'required');
        $this->form_validation->set_rules('smtp_secure', 'SMTP Secure', 'required');
        $this->form_validation->set_rules('judul_email', 'Judul Email', 'required');
        $this->form_validation->set_rules('keterangan_email', 'Keterangan Email', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('mailer/mail/setting_mailer/');
        } else {

            $edit = $this->Mailmodel->update_mailer(1, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Konfigurasi Mailer Telah Terupdate..."));
                redirect('mailer/mail/setting_mailer/');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Mohon Maaf, Terjadi kesalahan...'));
                redirect('mailer/mail/setting_mailer/');
            }
        }
    }

    //
    //------------------------------NEWSLETTER PAGE--------------------------------//
    //

    public function send_email() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['get_mailer'] = $this->Mailmodel->get_by_id_mail(); //?
        $data['get_desc'] = $this->Mailmodel->get_name_kuisioner(); //?
        $data['mhs'] = $this->Mailmodel->get_mahasisiwa($data['data_check']);
        $content = $this->load->view('mailer_template/email_kuisioner', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $tgl_send = array();
        foreach ($data['mhs'] as $mail) {
            $sendmail = array(
                'email_penerima' => $mail->email_mhs,
                'subjek' => $data['get_mailer'][0]->subjek_email,
                'content' => $content,
            );
            $tgl_send[] = array(
                'id_mhs' => $mail->id_mhs,
                'tanggal_kirim_email' => date("d/m/Y")
            );
            $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
        }
        $this->db->update_batch('mahasiswa', $tgl_send, 'id_mhs');
    }

    public function test_lupa_password() {
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $data['general'] = $this->Mailmodel->get_general_page();
        $data['kontak'] = $this->Mailmodel->get_kontak();

        $subjek = "ABANG21.COM - TESTING EMAIL LUPA PASSWORD";
        $content = $this->load->view('mailer_template_test/lupa_password', $data, true); // Ambil isi file content.php dan masukan ke variabel $content

        $sendmail = array(
            'email_penerima' => $data['email_user'],
            'subjek' => $subjek,
            'content' => $content,
        );
        $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer

        if ($send == true) {
            $this->session->set_flashdata('flash_message', succ_msg("Berhasil, Email Testing Lupa Password Telah Dikirimkan Ke '$data[email_user]'..."));
            redirect('mailer/mail/');
        } else {
            $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
            redirect('mailer/mail/');
        }
    }

    //-----------------------------------------------------------------------//
}
