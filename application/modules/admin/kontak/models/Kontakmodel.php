<?php

class Kontakmodel extends CI_Model {

    private $table_laporan = 'laporan';
    private $table_mahasiswa = 'mahasiswa';
    private $table_saran = 'saran';

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
   


    public function get_laporan_mahasiswa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                    l.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    laporan l
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = l.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = l.id_prodi_mhs
                                 WHERE
                                    CONCAT(l.id_fakultas_mhs,'',l.id_prodi_mhs) = '$id_admin' 
                                 ");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                    l.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    laporan l
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = l.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = l.id_prodi_mhs
                                 WHERE
                                    CONCAT(l.id_fakultas_mhs,'',l.id_prodi_mhs) LIKE '$id_admin%' 
                                 ");
        } elseif ($role == 0) {

            $sql = $this->db->query("SELECT
                                    l.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    laporan l
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = l.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = l.id_prodi_mhs                                
                                 ");
        }

        return $sql->result();
    }

    public function get_saran_mahasiwa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                    s.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    saran s
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = s.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = s.id_prodi_mhs
                                 WHERE
                                    CONCAT(s.id_fakultas_mhs,'',s.id_prodi_mhs) = '$id_admin' 
                                 ");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                    s.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    saran s
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = s.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = s.id_prodi_mhs
                                 WHERE
                                    CONCAT(s.id_fakultas_mhs,'',s.id_prodi_mhs) LIKE '$id_admin%' 
                                 ");
        } elseif ($role == 0) {

            $sql = $this->db->query("SELECT
                                    s.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    saran s
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = s.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = s.id_prodi_mhs                                
                                 ");
        }

        return $sql->result();
    }

    public function delete_laporan_mahasiswa($value) {
        $this->db->trans_begin();

        $this->db->where('id_laporan', $value);
        $this->db->delete($this->table_laporan);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_saran_mahasiswa($value) {
        $this->db->trans_begin();

        $this->db->where('id_saran', $value);
        $this->db->delete($this->table_saran);

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
//
}

?>