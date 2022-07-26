<?php

class Authmodel extends CI_Model {

    private $table = 'user';

    //
    //-------------------------------AUTH------------------------------//
    //

    public function get_user($value = '') {
        $pass = md5($value['password']);
        $email = $value['email'];

        $sql = $this->db->query("SELECT
                                        u.id_user,
                                        u.id_ref,
                                        u.role_akun,
                                        u.nama_akun,
                                        u.email_akun,
                                        u.no_telepon_akun,
                                        u.foto_akun,
                                        u.foto_akun_thumb,
                                        u.tanggal_post,
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
                                        u.email_akun = '$email' AND u.password='$pass'");
        return $sql->row_array();
    }

    //----------------------------------------------------------------//
}

?>