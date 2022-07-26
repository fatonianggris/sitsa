<?php

class Tracemodel extends CI_Model {

    private $table_laporan = 'laporan';
    private $table_mahasiswa = 'mahasiswa';
    private $table_saran = 'saran';
    private $table_kuisioner = 'kuisioner';
    private $table_panel = 'panel';
    private $table_essai = 'essai';
    private $table_pilihan_tunggal = 'pilihan_tunggal';
    private $table_pilihan_jamak = 'pilihan_jamak';
    private $table_pilihan_dropdown = 'dropdown';
    private $table_kisi_tunggal = 'kisi_tunggal';
    private $table_kisi_jamak = 'kisi_jamak';
    private $table_skala = 'skala';
    private $table_upload = 'upload';
    private $table_singkat = 'jawaban_singkat';
    private $table_jwb_essai = 'jawaban_pilihan_essai';
    private $table_jwb_tunggal = 'jawaban_pilihan_tunggal';
    private $table_jwb_jamak = 'jawaban_pilihan_jamak';
    private $table_jwb_skala = 'jawaban_pilihan_skala';
    private $table_jwb_upload = 'jawaban_pilihan_upload';
    private $table_jwb_dropdown = 'jawaban_pilihan_dropdown';
    private $table_jwb_kisi_tunggal = 'jawaban_kisi_tunggal';
    private $table_jwb_kisi_jamak = 'jawaban_kisi_jamak';
    private $table_jwb_singkat = 'jawaban_pilihan_singkat';

    //
    //------------------------------GENERAL--------------------------------//
    //
    
    public function cek_duplikat_nim($id = '') {
        $this->db->where('nim_mhs', $id);
        $sql = $this->db->get($this->table_saran);
        return $sql->result();
    }

    public function get_stat_kuisioner($id = '') {
        $this->db->where('status_kuisioner', $id);
        $sql = $this->db->get($this->table_kuisioner);
        return $sql->result();
    }

    public function get_log_mahasiswa($id = '') {
        $this->db->select('*');
        $this->db->where('id_mhs', $id);
        $sql = $this->db->get($this->table_mahasiswa);
        return $sql->result();
    }

    public function update_status_mahasiswa($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_isian_kuisioner' => $value
        );

        $this->db->where('id_mhs', $id);
        $this->db->update($this->table_mahasiswa, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_log_mahasiswa($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'log_isian_kuisioner' => $value
        );

        $this->db->where('id_mhs', $id);
        $this->db->update($this->table_mahasiswa, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------------------PANEL-------------------------------//

    public function get_panel($id = '') {
        $this->db->where('id_unique', $id);
        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_panel_kuisioner($id_kuisioner = '', $id_start = '') {
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where('start_panel', $id_start);
        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_panel_tujuan($id = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id);
        $sql = $this->db->get($this->table_panel);

        return $sql->result();
    }

    //-------------------------------------SARAN------------------------------//

    public function insert_saran_mahasiswa($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mhs' => $value['id_mhs'],
            'nama_mhs' => $value['nama_mhs'],
            'nim_mhs' => $value['nim_mhs'],
            'id_fakultas_mhs' => $value['id_fakultas_mhs'],
            'id_prodi_mhs' => $value['id_prodi_mhs'],
            'isi_saran' => $value['isi_saran'],
        );
        $this->db->insert($this->table_saran, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------ESSAI---------------------------------//

    public function get_essai($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_essai);

        return $sql->result();
    }

    public function insert_jawaban_essai($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban']
        );

        $this->db->insert($this->table_jwb_essai, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------PILIHAN TUNGGAL-------------------------//

    public function get_pilihan_tunggal($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);

        $sql = $this->db->get($this->table_pilihan_tunggal);
        return $sql->result();
    }

    public function insert_jawaban_tunggal($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban'],
            'opsi_lainnya' => $value['jawaban_lainnya']
        );
        $this->db->insert($this->table_jwb_tunggal, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------PANEL JAMAK ----------------------------------//


    public function get_pilihan_jamak($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);

        $sql = $this->db->get($this->table_pilihan_jamak);
        return $sql->result();
    }

    public function insert_jawaban_jamak($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban'],
            'opsi_lainnya' => $value['jawaban_lainnya']
        );
        $this->db->insert($this->table_jwb_jamak, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------PANEL DROPDOWN ----------------------------------//

    public function get_pilihan_dropdown($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);

        $sql = $this->db->get($this->table_pilihan_dropdown);
        return $sql->result();
    }

    public function insert_jawaban_dropdown($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban'],
            'opsi_lainnya' => $value['jawaban_lainnya']
        );
        $this->db->insert($this->table_jwb_dropdown, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------PANEL KISI TUNGGAL ----------------------------------//

    public function get_kisi_tunggal_baris($id_panel = '') {

        $this->db->select('opsi_baris');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_baris is NOT NULL', NULL, FALSE);

        $sql = $this->db->get($this->table_kisi_tunggal);
        return $sql->result();
    }

    public function get_kisi_tunggal_kolom($id_panel = '') {

        $this->db->select('opsi_kolom');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_kolom is NOT NULL', NULL, FALSE);

        $sql = $this->db->get($this->table_kisi_tunggal);
        return $sql->result();
    }

    //-------------------------------------PANEL KISI JAMAK ----------------------------------//

    public function get_kisi_jamak_baris($id_panel = '') {

        $this->db->select('opsi_baris');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_baris is NOT NULL', NULL, FALSE);

        $sql = $this->db->get($this->table_kisi_jamak);
        return $sql->result();
    }

    public function get_kisi_jamak_kolom($id_panel = '') {

        $this->db->select('opsi_kolom');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_kolom is NOT NULL', NULL, FALSE);

        $sql = $this->db->get($this->table_kisi_jamak);
        return $sql->result();
    }

    //-----------------------SKALA-------------------------//


    public function get_skala($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_skala);
        return $sql->result();
    }

    public function insert_jawaban_skala($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban']
        );

        $this->db->insert($this->table_jwb_skala, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------UPLOAD-------------------------//

    public function get_upload($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_upload);
        return $sql->result();
    }

    public function insert_jawaban_upload($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['file_upload']
        );

        $this->db->insert($this->table_jwb_upload, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------ESSAI---------------------------------//

    public function get_singkat($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_singkat);

        return $sql->result();
    }

    public function insert_jawaban_singkat($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_mahasiswa' => $value['id_mahasiswa'],
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jawaban' => $value['jawaban']
        );

        $this->db->insert($this->table_jwb_singkat, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //
    //--------------------------------------------------------------------//
}

?>