<?php

class Laporanmodel extends CI_Model {

    private $table_mahasiswa = 'mahasiswa';
    private $table_fakultas = 'fakultas';
    private $table_prodi = 'prodi';

    public function get_name_file_mahasiswa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT                                   
                                        f.nama_fakultas,
                                        f.id_fakultas,
                                        p.nama_prodi,
                                        p.id_prodi
                                     FROM
                                        prodi p                                     
                                     LEFT JOIN fakultas f 
                                        ON f.id_fakultas = p.id_fakultas
                                     WHERE
                                        p.id_prodi = '$id_admin'
                                     ");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT                                  
                                        f.nama_fakultas,
                                        f.id_fakultas
                                     FROM
                                      fakultas f                                    
                                     WHERE
                                        f.id_fakultas = '$id_admin'
                                     ");
        } elseif ($role == 0) {

            $sql = $this->db->query("SELECT                                  
                                        *
                                     FROM
                                         fakultas f                                                               
                                    ");
        }

        return $sql->result();
    }

    public function get_data_fakultas() {

        $this->db->select('*');
        $sql = $this->db->get($this->table_fakultas);

        return $sql->result();
    }

    public function get_data_prodi() {

        $this->db->select('*');
        $sql = $this->db->get($this->table_prodi);

        return $sql->result();
    }

    public function get_data_export_mahasiswa($id_mahasiswa = '') {
        $sql = $this->db->query("SELECT
                                    m.*,
                                    f.nama_fakultas,
                                    p.nama_prodi
                                 FROM
                                    mahasiswa m
                                 LEFT JOIN fakultas f 
                                    ON f.id_fakultas = m.id_fakultas_mhs
                                 LEFT JOIN prodi p 
                                    ON p.id_prodi = m.id_prodi_mhs
                                 WHERE
                                    m.id_mhs IN($id_mahasiswa)
                                 ");
        return $sql->result_array();
    }

}

?>