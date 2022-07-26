<?php

class Homemodel extends CI_Model {

    private $table_home_kuisioner = 'home_kuisioner';
    private $table_laporan = 'laporan';
    private $table_mahasiswa = 'mahasiswa';
    private $table_saran = 'saran';
    private $table_fakultas = 'fakultas';

    public function get_home_kuisioner($id = '') {

        $this->db->select('*');
        $this->db->where('id_home_kuisioner', $id);

        $sql = $this->db->get($this->table_home_kuisioner);
        return $sql->result();
    }

    public function get_mhs($value = '') {
        //$ijazah = md5($value['nomor_ijazah_mhs']);
        $nim = $value['nim_mhs'];
        $pass = $value['password_mhs'];

        $sql = $this->db->query("SELECT
                                        m.id_mhs,
                                        m.nim_mhs,
                                        m.nama_mhs,
                                        m.email_mhs,
                                        m.nomor_hp_mhs,
                                        m.tahun_lulus_mhs,  
                                        m.id_fakultas_mhs,
                                        m.id_prodi_mhs,
                                        f.nama_fakultas,                                       
                                        p.nama_prodi                                       
                                    FROM
                                        mahasiswa m
                                    LEFT JOIN prodi p 
                                        ON p.id_fakultas = m.id_fakultas_mhs AND p.id_prodi=m.id_prodi_mhs
                                    LEFT JOIN fakultas f  
                                        ON f.id_fakultas = m.id_fakultas_mhs
                                    WHERE
                                        m.nim_mhs = '$nim' AND m.password_mhs='$pass'");

        return $sql->row_array();
    }

    //
    //------------------------------COUNT--------------------------------//
    //

    public function get_jumlah_laporan_saran($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_laporan)
                                        FROM
                                            laporan
                                        WHERE
                                            CONCAT(id_fakultas_mhs,'',id_prodi_mhs) = '$id_admin' 
                                    ) AS laporan,
                                    (
                                        SELECT
                                            COUNT(id_saran)
                                        FROM
                                            saran
                                        WHERE
                                            CONCAT(id_fakultas_mhs,'',id_prodi_mhs) = '$id_admin'
                                    ) AS saran");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_laporan)
                                        FROM
                                            laporan
                                        WHERE
                                            CONCAT(id_fakultas_mhs,'',id_prodi_mhs) LIKE '$id_admin%' 
                                    ) AS laporan,
                                    (
                                        SELECT
                                            COUNT(id_saran)
                                        FROM
                                            saran
                                        WHERE
                                            CONCAT(id_fakultas_mhs,'',id_prodi_mhs) LIKE '$id_admin%'
                                    ) AS saran");
        } elseif ($role == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_laporan)
                                        FROM
                                            laporan                                       
                                    ) AS laporan,
                                    (
                                        SELECT
                                            COUNT(id_saran)
                                        FROM
                                            saran                                        
                                    ) AS saran");
        }
        return $sql->result();
    }

    //
    //------------------------------LAPORAN--------------------------------//
    //
    
    public function get_data_fakultas() {

        $this->db->select('*');
        $sql = $this->db->get($this->table_fakultas);

        return $sql->result();
    }

    public function cek_duplikat_nim($id = '') {
        $this->db->where('nim_mhs', $id);
        $sql = $this->db->get($this->table_laporan);
        return $sql->result();
    }

    public function insert_laporan_mahasiswa($value = '') {

        $data = array(
            'subjek_laporan' => $value['subjek_laporan'],
            'nama_mhs' => $value['nama_mhs'],
            'nim_mhs' => $value['nim_mhs'],
            'id_fakultas_mhs' => $value['id_fakultas_mhs'],
            'id_prodi_mhs' => $value['id_prodi_mhs'],
            'email_mhs' => $value['email_mhs'],
            'isi_laporan' => $value['isi_laporan'],
        );
        $this->db->insert($this->table_laporan, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

?>