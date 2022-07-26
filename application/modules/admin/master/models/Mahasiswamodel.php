<?php

class Mahasiswamodel extends CI_Model {

    private $table_mahasiswa = 'mahasiswa';
    private $table_fakultas = 'fakultas';
    private $table_prodi = 'prodi';

    //
    //----------------------------MAHASISWA---------------------------//
    //
   
    public function get_jumlah_data_mahasiswa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' 
                                    ) AS mahasiswa,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner
                                        WHERE
                                            id_admin = '$id_admin'
                                    ) AS kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_fakultas)
                                        FROM
                                            fakultas
                                        WHERE
                                            1
                                    ) AS fakultas,
                                    (
                                        SELECT
                                            COUNT(id_prodi)
                                        FROM
                                            prodi
                                        WHERE
                                            id_fakultas = '$id_admin'
                                    ) AS prodi");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%' 
                                    ) AS mahasiswa,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner
                                        WHERE
                                            id_admin LIKE '$id_admin%' 
                                    ) AS kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_fakultas)
                                        FROM
                                            fakultas
                                        WHERE
                                            id_fakultas = '$id_admin'
                                    ) AS fakultas,
                                    (
                                        SELECT
                                            COUNT(id_prodi)
                                        FROM
                                            prodi
                                        WHERE
                                            id_fakultas = '$id_admin'
                                    ) AS prodi");
        } elseif ($role == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa                                       
                                    ) AS mahasiswa,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner                                        
                                    ) AS kuisioner, 
                                    (
                                        SELECT
                                            COUNT(id_fakultas)
                                        FROM
                                            fakultas                                      
                                    ) AS fakultas,
                                    (
                                        SELECT
                                            COUNT(id_prodi)
                                        FROM
                                            prodi                                       
                                    ) AS prodi");
        }
        return $sql->result();
    }

    public function cek_duplikat_nim($id = '') {
        $this->db->where('nim_mhs', $id);
        $sql = $this->db->get($this->table_mahasiswa);
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

    public function get_data_mahasiswa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $this->db->select('*');
            $this->db->where('id_admin', $id_admin);
        } elseif (!empty($id_admin) && ($role == 1)) {

            $this->db->select('*');
            $this->db->like('id_admin', $id_admin, 'after');
        } elseif ($role == 0) {

            $this->db->select('*');
        }

        $sql = $this->db->get($this->table_mahasiswa);
        return $sql->result();
    }

    public function get_data_detail_mahasiswa($id_mahasiswa = '') {
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
                                    m.id_mhs = '$id_mahasiswa'
                                 ");
        return $sql->result();
    }

    public function get_data_fakultas_admin($id_admin = '', $role = '') {

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
                                        CONCAT(p.id_fakultas,'',p.id_prodi) = '$id_admin'
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

    public function get_id_mahasiswa($id_mahasiswa = '') {

        $this->db->select('*');
        $this->db->where('id_mhs', $id_mahasiswa);
        $sql = $this->db->get($this->table_mahasiswa);

        return $sql->result();
    }

    public function insert_data_mahasiswa($value = '', $id_admin = '') {
        $this->db->trans_begin();

        $data = array(
            'nim_mhs' => $value['nim_mhs'],
            'password_mhs' => $value['password_mhs'],
            'id_admin' => $id_admin,
            'nomor_ijazah_mhs' => $value['nomor_ijazah_mhs'],
            'nama_mhs' => $value['nama_mhs'],
            'email_mhs' => $value['email_mhs'],
            'nomor_hp_mhs' => $value['nomor_hp_mhs'],
            'id_fakultas_mhs' => $value['id_fakultas_mhs'],
            'id_prodi_mhs' => $value['id_prodi_mhs'],
            'tahun_masuk_mhs' => $value['tahun_masuk_mhs'],
            'tahun_lulus_mhs' => $value['tahun_lulus_mhs']
        );
        $this->db->insert($this->table_mahasiswa, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_data_mahasiswa($id = '', $value = '', $id_admin = '') {
        $this->db->trans_begin();

        $data = array(
            'nim_mhs' => $value['nim_mhs'],
            'password_mhs' => $value['password_mhs'],
            'id_admin' => $id_admin,
            'nomor_ijazah_mhs' => $value['nomor_ijazah_mhs'],
            'nama_mhs' => $value['nama_mhs'],
            'email_mhs' => $value['email_mhs'],
            'nomor_hp_mhs' => $value['nomor_hp_mhs'],
            'id_fakultas_mhs' => $value['id_fakultas_mhs'],
            'id_prodi_mhs' => $value['id_prodi_mhs'],
            'tahun_masuk_mhs' => $value['tahun_masuk_mhs'],
            'tahun_lulus_mhs' => $value['tahun_lulus_mhs']
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

    public function delete_data_mahasiswa($id = '') {
        $this->db->trans_begin();

        $this->db->where('id_mhs', $id);
        $this->db->delete($this->table_mahasiswa);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_data_mahasiswa_terpilih($value = '') {
        $this->db->trans_begin();

        $this->db->where_in('id_mhs', $value['data_check']);
        $this->db->delete($this->table_mahasiswa);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

//----------------------------------------------------------------------//
}

?>