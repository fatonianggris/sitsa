<?php

class Pengaturanmodel extends CI_Model {

    private $table_mahasiswa = 'mahasiswa';
    private $table_home_kuisioner = 'home_kuisioner';
    private $table_login_kuisioner = 'login_kuisioner';
    private $table_mailer = 'mailer_config';

    public function get_jumlah_kuisioner($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner
                                        WHERE
                                            id_admin = '$id_admin'
                                    ) AS kuisioner_terisi");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%' AND status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner
                                        WHERE
                                            id_admin LIKE '$id_admin%'
                                    ) AS kuisioner_terisi");
        } elseif ($role == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                           status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner                                        
                                    ) AS kuisioner_terisi");
        }
        return $sql->result();
    }

  
    public function get_kuisioner_page_data($id = '') {

        $this->db->select('*');
        $this->db->where('id_home_kuisioner', $id);
        $sql = $this->db->get($this->table_home_kuisioner);

        return $sql->result();
    }

    public function update_kuisioner_page($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner'],
            'judul_kuisioner' => $value['judul_kuisioner'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner'],
            'logo_kuisioner' => $value['logo_kuisioner'],
            'logo_kuisioner_thumb' => $value['logo_kuisioner_thumb']
        );

        $this->db->where('id_home_kuisioner', $id);
        $this->db->update($this->table_home_kuisioner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function get_login_page_data($id = '') {

        $this->db->select('*');
        $this->db->where('id_login_kuisioner', $id);
        $sql = $this->db->get($this->table_login_kuisioner);

        return $sql->result();
    }

    public function update_login_page($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_login' => $value['nama_login'],
            'foto_background' => $value['foto_background'],
            'logo_login' => $value['logo_login'],
            'gambar_nama_login' => $value['gambar_nama_login'],
        );

        $this->db->where('id_login_kuisioner', $id);
        $this->db->update($this->table_login_kuisioner, $data);

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