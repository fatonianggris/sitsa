<?php

class Mailmodel extends CI_Model {

    private $table_email = 'mailer_config';
    private $table_newsletter = 'newsletter_customer';
    private $table_kuisioner = 'home_kuisioner';

    //
    //------------------------------COUNT--------------------------------//
    //

 public function get_data_email_mahasiswa($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND status_isian_kuisioner=0
                                    ) AS belum_isi_kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND status_isian_kuisioner=1
                                    ) AS sudah_isi_kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND tanggal_kirim_email=''
                                    ) AS total_belum_mengirim_email");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%' AND status_isian_kuisioner=0  
                                    ) AS belum_isi_kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%' AND status_isian_kuisioner=1
                                    ) AS sudah_isi_kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%' AND tanggal_kirim_email=''
                                    ) AS total_belum_mengirim_email");
        } elseif ($role == 0) {
            $sql = $this->db->query("SELECT
                                        (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa 
                                        WHERE
                                            status_isian_kuisioner=0
                                    ) AS belum_isi_kuisioner,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa 
                                        WHERE
                                            status_isian_kuisioner=1
                                    ) AS sudah_isi_kuisioner, 
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                           tanggal_kirim_email=''
                                    ) AS total_belum_mengirim_email");
        }
        return $sql->result();
    }

    //
    //------------------------------EMAIL--------------------------------//
    //
      public function get_konfigurasi_mailer_data($id = '') {

        $this->db->select('*');
        $this->db->where('id_mailer', $id);
        $sql = $this->db->get($this->table_email);

        return $sql->result();
    }

    public function get_mahasisiwa($id = '') {

        $sql = $this->db->query("SELECT
                                     *
                                 FROM 
                                     mahasiswa
                                 WHERE 
                                    id_mhs IN('$id')");


        return $sql->result();
    }

    public function get_by_id_mail() {
        $this->db->where('id_mailer', 1);
        $sql = $this->db->get($this->table_email);
        return $sql->result();
    }

    public function get_name_kuisioner() {
        $this->db->where('id_home_kuisioner', 1);
        $sql = $this->db->get($this->table_kuisioner);
        return $sql->result();
    }

    public function get_mahasiswa_mail() {
        $this->db->where('id_mailer', 1);
        $sql = $this->db->get($this->table_email);
        return $sql->result();
    }

    public function update_mailer($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_pengirim' => $value['nama_pengirim'],
            'judul_email' => $value['judul_email'],
            'subjek_email' => $value['subjek_email'],
            'host' => $value['host'],
            'email_website' => $value['email_website'],
            'password' => $value['password'],
            'port' => $value['port'],
            'smtp_auth' => $value['smtp_auth'],
            'smtp_secure' => $value['smtp_secure'],
            'keterangan_email' => $value['keterangan_email'],
        );

        $this->db->where('id_mailer', $id);
        $this->db->update($this->table_email, $data);

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