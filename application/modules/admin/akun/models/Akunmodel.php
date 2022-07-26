<?php

class Akunmodel extends CI_Model {

    private $table_mahasiswa = 'mahasiswa';
    private $table_akun = 'user';
    private $table_fakultas = 'fakultas';
    private $table_prodi = 'prodi';

    //
    //----------------------------AKUN JUMLAH---------------------------//
    //
    
  public function get_jumlah_data_akun($id_admin = '', $role = '') {

        $sql = $this->db->query("SELECT
                                    (
                                    SELECT
                                        COUNT(id_user)
                                    FROM
                                        user                                       
                                ) AS total_akun,
                                (
                                    SELECT
                                        COUNT(id_user)
                                    FROM
                                        user   
                                    WHERE 
                                        role_akun=1
                                ) AS total_akun_fakultas,
                                (
                                    SELECT
                                        COUNT(id_user)
                                    FROM
                                        user   
                                    WHERE 
                                        role_akun=2
                                ) AS total_akun_prodi");

        return $sql->result();
    }

    public function get_data_akun($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT                                        
                                        u.id_user,
                                        u.nama_akun,
                                        u.role_akun,
                                        u.email_akun,
                                        u.no_telepon_akun,
                                        u.foto_akun,
                                        u.foto_akun_thumb,
                                        f.nama_fakultas,
                                        f.id_fakultas,
                                        p.nama_prodi,
                                        p.id_prodi
                                    FROM
                                        user u
                                    LEFT JOIN prodi p 
                                        ON CONCAT(p.id_fakultas,'',p.id_prodi) = u.id_ref
                                    LEFT JOIN fakultas f  
                                        ON f.id_fakultas = u.id_ref OR p.id_fakultas=f.id_fakultas
                                     WHERE
                                        u.id_ref = '$id_admin'                                                      
                                     ");
        } elseif (!empty($id_admin) && ($role == 1)) {
            $sql = $this->db->query("SELECT                                        
                                        u.id_user,
                                        u.nama_akun,
                                        u.role_akun,
                                        u.email_akun,
                                        u.no_telepon_akun,
                                        u.foto_akun,
                                        u.foto_akun_thumb,
                                        f.nama_fakultas,
                                        f.id_fakultas,
                                        p.nama_prodi,
                                        p.id_prodi
                                    FROM
                                        user u
                                    LEFT JOIN prodi p 
                                        ON CONCAT(p.id_fakultas,'',p.id_prodi) = u.id_ref
                                    LEFT JOIN fakultas f  
                                        ON f.id_fakultas = u.id_ref OR p.id_fakultas=f.id_fakultas
                                     WHERE
                                        u.id_ref LIKE '$id_admin%' 
                                     ");
        } elseif ($role == 0) {
            $sql = $this->db->query("SELECT                                        
                                        u.id_user,
                                        u.nama_akun,
                                        u.role_akun,
                                        u.email_akun,
                                        u.no_telepon_akun,
                                        u.foto_akun,
                                        u.foto_akun_thumb,
                                        f.nama_fakultas,
                                        f.id_fakultas,
                                        p.nama_prodi,
                                        p.id_prodi
                                    FROM
                                        user u
                                    LEFT JOIN prodi p 
                                        ON CONCAT(p.id_fakultas,'',p.id_prodi) = u.id_ref
                                    LEFT JOIN fakultas f  
                                        ON f.id_fakultas = u.id_ref OR p.id_fakultas=f.id_fakultas
                                    ");
        }

        return $sql->result();
    }

    public function get_data_fakultas() {

        $this->db->select('*');
        $sql = $this->db->get($this->table_fakultas);

        return $sql->result();
    }

    public function get_detail_data_akun($id_user = '', $id_admin = '', $role = '') {

        $sql = $this->db->query("SELECT         
                                        u.id_user,
                                        u.role_akun,
                                        u.nama_akun,
                                        u.role_akun,
                                        u.email_akun,
                                        u.no_telepon_akun,
                                        u.foto_akun,
                                        u.foto_akun_thumb,
                                        f.nama_fakultas,
                                        f.id_fakultas,
                                        p.nama_prodi,
                                        p.id_prodi
                                     FROM
                                        user u       
                                    LEFT JOIN prodi p 
                                        ON CONCAT(p.id_fakultas,'',p.id_prodi) = u.id_ref
                                    LEFT JOIN fakultas f  
                                        ON f.id_fakultas = u.id_ref OR p.id_fakultas=f.id_fakultas                                
                                     WHERE
                                        u.id_user = '$id_user'
                                     ");

        return $sql->result();
    }

    //--------------------------------CEK PASS ADMIN -----------------------------------------//
    public function cek_password_akun($id_admin = '', $pass = '') {

        $passwd = md5($pass);

        $this->db->where('id_user', $id_admin);
        $this->db->where('password', $passwd);

        $sql = $this->db->get($this->table_akun);
        return $sql->result();
    }

    //--------------------------------UPDATE PASS ADMIN-----------------------------------------//
    public function update_password_akun($id_admin = '', $pass = '') {
        $passwd = md5($pass);
        $this->db->trans_begin();

        $data = array(
            'password' => $passwd
        );

        $this->db->where('id_user', $id_admin);
        $this->db->update($this->table_akun, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_data_akun($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_akun' => $value['nama_akun'],
            'role_akun' => $value['role_akun'],
            'email_akun' => $value['email_akun'],
            'id_ref' => $value['id_ref'],
            'no_telepon_akun' => $value['no_telepon_akun'],
            'password' => md5($value['password_akun']),
            'foto_akun' => $value['foto_akun'],
            'foto_akun_thumb' => $value['foto_akun_thumb'],
        );
        $this->db->insert($this->table_akun, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_data_akun($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_akun' => $value['nama_akun'],
            'role_akun' => $value['role_akun'],
            'email_akun' => $value['email_akun'],
            'id_ref' => $value['id_ref'],
            'no_telepon_akun' => $value['no_telepon_akun'],
            'foto_akun' => $value['foto_akun'],
            'foto_akun_thumb' => $value['foto_akun_thumb'],
        );
        $this->db->where('id_user', $id);
        $this->db->update($this->table_akun, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_data_akun($id = '') {
        $this->db->trans_begin();

        $this->db->where('id_user', $id);
        $this->db->delete($this->table_akun);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-------------------------------------------------------------//
}

?>