<?php

class Dashboardmodel extends CI_Model {

    private $site_log = 'track_visitor';
    private $table_mahasiswa = 'mahasiswa';

    //
    //------------------------------COUNT--------------------------------//
    //
     public function get_jumlah_data($id_admin = '', $role = '') {

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
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND status_isian_kuisioner=2
                                    ) AS kuisioner_terisi,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin = '$id_admin' AND status_isian_kuisioner=2 OR status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
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
                                    ) AS saran,
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
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%'  AND status_isian_kuisioner=2
                                    ) AS kuisioner_terisi,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            id_admin LIKE '$id_admin%'  AND status_isian_kuisioner=2 OR status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
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
                                    ) AS saran,
                                     
                                    (
                                        SELECT
                                            COUNT(id_saran)
                                        FROM
                                            saran
                                        WHERE
                                            CONCAT(id_fakultas_mhs,'',id_prodi_mhs) = '$id_admin'
                                    ) AS saran,
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
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            status_isian_kuisioner=2
                                    ) AS kuisioner_terisi,
                                    (
                                        SELECT
                                            COUNT(id_mhs)
                                        FROM
                                            mahasiswa
                                        WHERE
                                            status_isian_kuisioner=2 OR status_isian_kuisioner=0
                                    ) AS kuisioner_belum_terisi,
                                    (
                                        SELECT
                                            COUNT(id_kuisioner)
                                        FROM
                                            kuisioner                                        
                                    ) AS kuisioner, 
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
                                    ) AS saran,
                                    (
                                        SELECT
                                            COUNT(id_laporan)
                                        FROM
                                            laporan                                       
                                    ) AS laporan,
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

    //GET DUPLIKAT
    //---------------------------------------//ID NIM---------------------------------------//
    public function get_duplikat_nim($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                            t.*
                                        FROM
                                            (
                                            SELECT
                                                m.nim_mhs,
                                                m.nama_mhs,
                                                m.id_admin,
                                                m.id_mhs,
                                                m.email_mhs,
                                                m.nomor_ijazah_mhs,
                                                m.nomor_hp_mhs,
                                                m.tahun_lulus_mhs,
                                                m.tahun_masuk_mhs,
                                                m.status_isian_kuisioner,
                                                m.tanggal_post
                                            FROM
                                                mahasiswa m
                                            WHERE
                                                m.id_admin = '$id_admin' AND m.nim_mhs IN(
                                                SELECT
                                                    m.nim_mhs
                                                FROM
                                                    mahasiswa m
                                                GROUP BY
                                                    m.nim_mhs
                                                HAVING
                                                    COUNT(*) > 1
                                            ) AND m.nama_mhs IN(
                                            SELECT
                                                m.nama_mhs
                                            FROM
                                                mahasiswa m
                                            GROUP BY
                                                m.nama_mhs
                                            HAVING
                                                COUNT(*) > 1
                                        )
                                        ORDER BY
                                            m.nama_mhs ASC
                                        ) t
                                        WHERE
                                            t.id_admin = '$id_admin'
                                        ORDER BY
                                            t.nama_mhs ASC");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                            t.*
                                        FROM
                                            (
                                            SELECT
                                                m.nim_mhs,
                                                m.nama_mhs,
                                                m.id_admin,
                                                m.id_mhs,
                                                m.email_mhs,
                                                m.nomor_ijazah_mhs,
                                                m.nomor_hp_mhs,
                                                m.tahun_lulus_mhs,
                                                m.tahun_masuk_mhs,
                                                m.status_isian_kuisioner,
                                                m.tanggal_post
                                            FROM
                                                mahasiswa m
                                            WHERE
                                                m.id_admin LIKE '$id_admin%' AND m.nim_mhs IN(
                                                SELECT
                                                    m.nim_mhs
                                                FROM
                                                    mahasiswa m
                                                GROUP BY
                                                    m.nim_mhs
                                                HAVING
                                                    COUNT(*) > 1
                                            ) AND m.nama_mhs IN(
                                            SELECT
                                                m.nama_mhs
                                            FROM
                                                mahasiswa m
                                            GROUP BY
                                                m.nama_mhs
                                            HAVING
                                                COUNT(*) > 1
                                        )
                                        ORDER BY
                                            m.nama_mhs ASC
                                        ) t
                                        WHERE
                                            t.id_admin LIKE '$id_admin%'
                                        ORDER BY
                                            t.nama_mhs ASC");
        } elseif ($role == 0) {

            $sql = $this->db->query("SELECT
                                            t.*
                                        FROM
                                            (
                                            SELECT
                                                m.nim_mhs,
                                                m.nama_mhs,
                                                m.id_admin,
                                                m.id_mhs,
                                                m.email_mhs,
                                                m.nomor_ijazah_mhs,
                                                m.nomor_hp_mhs,
                                                m.tahun_lulus_mhs,
                                                m.tahun_masuk_mhs,
                                                m.status_isian_kuisioner,
                                                m.tanggal_post
                                            FROM
                                                mahasiswa m
                                            WHERE
                                                m.nim_mhs IN(
                                                SELECT
                                                    m.nim_mhs
                                                FROM
                                                    mahasiswa m
                                                GROUP BY
                                                    m.nim_mhs
                                                HAVING
                                                    COUNT(*) > 1
                                            ) AND m.nama_mhs IN(
                                            SELECT
                                                m.nama_mhs
                                            FROM
                                                mahasiswa m
                                            GROUP BY
                                                m.nama_mhs
                                            HAVING
                                                COUNT(*) > 1
                                        )
                                        ORDER BY
                                            m.nama_mhs ASC
                                        ) t                                       
                                        ORDER BY
                                            t.nama_mhs ASC");
        }
        return $sql->result();
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

    //
    //------------------------------GET VISITOR--------------------------------//
    //  

    public function get_list_visitor() {
        $sql = $this->db->query('SELECT * FROM track_visitor ORDER BY access_date DESC');
        return $sql->result();
    }

    public function get_visitorip_by_id($id = '') {

        $this->db->select('ip_address');
        $this->db->where('track_visitor_id', $id);

        $sql = $this->db->get($this->site_log);
        return $sql->result();
    }

    public function delete_visit($value) {
        $this->db->trans_begin();

        $this->db->where('track_visitor_id', $value);
        $this->db->delete($this->site_log);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function get_site_data_for_today() {
        $results = array();
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits 
            FROM ' . $this->site_log . ' 
            WHERE CURDATE()=DATE(access_date)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;
        }

        return $results;
    }

    function get_site_data_for_last_week() {
        $results = array();
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits
            FROM ' . $this->site_log . '
            WHERE DATE(access_date) >= CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY
            AND DATE(access_date) < CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY 
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results['visits'] = $row->visits;

            return $results;
        }
    }

    function get_chart_data_for_today() {
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%h %p") AS hour
                FROM ' . $this->site_log . '
                WHERE CURDATE()=DATE(access_date)
                GROUP BY HOUR(access_date)');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return NULL;
    }

    function get_chart_data_for_month_year($month = 0, $year = 0) {
        if ($month == 0 && $year == 0) {
            $month = date('m');
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($month == 0 && $year > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->site_log . '
                WHERE YEAR(access_date)=' . $year . '
                GROUP BY MONTH(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        if ($year > 0 && $month > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }

        return NULL;
    }

    //-----------------------------------------------------------------------//
//
}

?>