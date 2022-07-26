<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here 
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Datatablemodel');
        $this->load->library('datatables');
        $this->user = $this->session->userdata("sitsa");
    }

    //-----------------------------------------------KTP--------------------------------------------------//

    public function mahasiswa() {
        $text = $this->Datatablemodel->get_by_id_mail(); //?

        if (!empty($this->user['id_ref']) && ($this->user['role_akun'] == 2)) {

            $this->datatables->select(" m.id_mhs,
                                        UCASE(m.nama_mhs) AS nama_mhs,
                                        m.nim_mhs,
                                        m.nomor_ijazah_mhs,
                                        m.email_mhs,
                                         SUBSTR(m.nomor_hp_mhs, 2) AS nomor_hp_mhs,
                                        m.tahun_lulus_mhs,
                                        m.status_isian_kuisioner,   
                                        DATE_FORMAT(STR_TO_DATE(m.tanggal_kirim_email, '%d/%m/%Y'), '%Y-%m-%d') as tanggal_kirim_email,      
                                        m.tanggal_post,
                                        f.nama_fakultas,
                                        p.nama_prodi
                                        ");
            $this->datatables->from('mahasiswa m');
            $this->datatables->join('fakultas f', 'f.id_fakultas=m.id_fakultas_mhs', 'left');
            $this->datatables->join('prodi p', 'p.id_prodi=m.id_prodi_mhs', 'left');
            $this->datatables->where('m.id_admin', $this->user['id_ref']);
            $this->datatables->order_by('m.tanggal_post DESC');

            $this->datatables->add_column('view_nim', '<span class="label label-info"><b>$1</b></span>', 'nim_mhs');
            $this->datatables->add_column('view_button', $this->button_mhs(), 'id_mhs, nama_mhs, nim_mhs');
        } elseif (!empty($this->user['id_ref']) && ($this->user['role_akun'] == 1)) {

            $this->datatables->select(" m.id_mhs,
                                        UCASE(m.nama_mhs) AS nama_mhs,
                                        m.nim_mhs,
                                        m.nomor_ijazah_mhs,
                                        m.email_mhs,
                                        SUBSTR(m.nomor_hp_mhs, 2) AS nomor_hp_mhs,
                                        m.tahun_lulus_mhs,
                                        m.status_isian_kuisioner, 
                                        DATE_FORMAT(STR_TO_DATE(m.tanggal_kirim_email, '%d/%m/%Y'), '%Y-%m-%d') as tanggal_kirim_email,                                          
                                        m.tanggal_post,
                                        f.nama_fakultas,
                                        p.nama_prodi
                                        ");
            $this->datatables->from('mahasiswa m');
            $this->datatables->join('fakultas f', 'f.id_fakultas=m.id_fakultas_mhs', 'left');
            $this->datatables->join('prodi p', 'p.id_prodi=m.id_prodi_mhs', 'left');
            $this->datatables->like('m.id_admin', $this->user['id_ref'], 'after');
            $this->datatables->order_by('m.tanggal_post DESC');

            $this->datatables->add_column('view_nim', '<span class="label label-info"><b>$1</b></span>', 'nim_mhs');
            $this->datatables->add_column('view_button', $this->button_mhs(), 'id_mhs, nama_mhs, nim_mhs');
        } elseif ($this->user['role_akun'] == 0) {

            $this->datatables->select(" m.id_mhs,
                                        UCASE(m.nama_mhs) AS nama_mhs,
                                        m.nim_mhs,
                                        m.nomor_ijazah_mhs,
                                        m.email_mhs,
                                        SUBSTR(m.nomor_hp_mhs, 2) AS nomor_hp_mhs,
                                        m.tahun_lulus_mhs,
                                        m.status_isian_kuisioner,   
                                        DATE_FORMAT(STR_TO_DATE(m.tanggal_kirim_email, '%d/%m/%Y'), '%Y-%m-%d') as tanggal_kirim_email,                                                                                  
                                        m.tanggal_post,
                                        f.nama_fakultas,
                                        p.nama_prodi
                                        ");
            $this->datatables->from('mahasiswa m');
            $this->datatables->join('fakultas f', 'f.id_fakultas=m.id_fakultas_mhs', 'left');
            $this->datatables->join('prodi p', 'p.id_prodi=m.id_prodi_mhs', 'left');
            $this->datatables->order_by('m.tanggal_post DESC');

            $this->datatables->add_column('view_nim', '<span class="label label-info"><b>$1</b></span>', 'nim_mhs');
            $this->datatables->add_column('view_button', $this->button_mhs($text[0]->judul_email, $text[0]->keterangan_email), 'id_mhs, nama_mhs, nim_mhs, nomor_hp_mhs');
        }
        return print_r($this->datatables->generate());
    }

    public function button_mhs($text_judul = '', $text_desc = '') {

        $get_button = "";

        $get_button .= '<a onclick="act_delete_mahasiswa($1)" ><button type="button" value="$2" id="$1" class="btn btn-outline btn-danger btn-sm waves-effect waves-light m-l-5" data-toggle="tooltip" data-original-title="Hapus Mahasiswa"><i class="fa fa-remove" aria-hidden="true"></i></button></a>';
        $get_button .= '<a href="' . site_url('master/mahasiswa/edit_data_mahasiswa/') . '$1"><button type="button" class="btn btn-outline btn-info btn-sm waves-effect waves-light m-l-5" data-toggle="tooltip" data-original-title="Edit Mahasiswa"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';
        $get_button .= '<a href = "https://api.whatsapp.com/send?phone=62$4&text=Assalamualikum Wr. Wb, ' . urlencode("\n") . $text_desc . urlencode("\n") . 'Link: ' . base_url() . urlencode("\n") . 'Terima Kasih.' . urlencode("\n") . $text_judul . '" target = "_blank" class = "btn btn-outline btn-success btn-sm waves-effect waves-light m-l-5"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
        return $get_button;
    }

    public function get_essai($id_panel = '') {

        $this->datatables->select("je.id_mahasiswa,
                                   je.jawaban,
                                   e.nama_mhs");
        $this->datatables->from('jawaban_pilihan_essai je');
        $this->datatables->join('mahasiswa e', 'je.id_mahasiswa = e.id_mhs', 'left');
        $this->datatables->where('id_panel', $id_panel);
        $this->datatables->order_by('je.tanggal_post DESC');

        return print_r($this->datatables->generate());
    }

    public function get_singkat($id_panel = '') {

        $this->datatables->select("js.id_mahasiswa,
                                   js.jawaban,
                                   e.nama_mhs");
        $this->datatables->from('jawaban_pilihan_singkat js');
        $this->datatables->join('mahasiswa e', 'js.id_mahasiswa = e.id_mhs', 'left');
        $this->datatables->where('id_panel', $id_panel);
        $this->datatables->order_by('js.tanggal_post DESC');

        return print_r($this->datatables->generate());
    }

    public function get_upload($id_panel = '') {

        $this->datatables->select("je.id_mahasiswa,
                                   je.jawaban,
                                   e.nama_mhs");
        $this->datatables->from('jawaban_pilihan_upload je');
        $this->datatables->join('mahasiswa e', 'je.id_mahasiswa = e.id_mhs', 'left');
        $this->datatables->where('id_panel', $id_panel);
        $this->datatables->order_by('je.tanggal_post DESC');

        return print_r($this->datatables->generate());
    }

}
