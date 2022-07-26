<?php

class Kuisionermodel extends CI_Model {

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
    private $table_jawaban_singkat = 'jawaban_singkat';
    private $table_mahasiswa = 'mahasiswa';
    private $table_jawaban_pilihan_essai = 'jawaban_pilihan_essai';
    private $table_jawaban_pilihan_tunggal = 'jawaban_pilihan_tunggal';
    private $table_jawaban_pilihan_jamak = 'jawaban_pilihan_jamak';
    private $table_jawaban_pilihan_dropdown = 'jawaban_pilihan_dropdown';
    private $table_jawaban_kisi_tunggal = 'jawaban_kisi_tunggal';
    private $table_jawaban_kisi_jamak = 'jawaban_kisi_jamak';
    private $table_jawaban_pilihan_skala = 'jawaban_pilihan_skala';
    private $table_jawaban_pilihan_upload = 'jawaban_pilihan_upload';
    private $table_jawaban_pilihan_singkat = 'jawaban_pilihan_singkat';

    //-----------------------------COUNT---------------------------------//
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

    //
    //---------------------------GENERAL----------------------//
    //

    public function get_all_panel($id = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_mhs_stat_kuisioner($id = '') {

        $this->db->select('id_mhs,nim_mhs,nama_mhs');
        $this->db->where('status_isian_kuisioner', $id);
        $this->db->order_by('tanggal_post', 'DESC');

        $sql = $this->db->get($this->table_mahasiswa);
        return $sql->result();
    }

    public function check_start_panel($id = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_all_panel_excpt($id_kuisioner = '', $id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuisioner);
        $this->db->where_not_in('id_panel', $id_panel);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    //-------------------------------MAHASISWA------------------------------//

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

    //-------------------------------JAWABAN------------------------------//

    public function get_jawaban_essai($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_essai);
        return $sql->result();
    }

    public function get_jawaban_tunggal($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_tunggal);
        return $sql->result();
    }

    public function get_jawaban_jamak($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_jamak);
        return $sql->result();
    }

    public function get_jawaban_dropdown($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_dropdown);
        return $sql->result();
    }

    public function get_jawaban_kisi_tunggal($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_kisi_tunggal);
        return $sql->result();
    }

    public function get_jawaban_kisi_jamak($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_kisi_jamak);
        return $sql->result();
    }

    public function get_jawaban_skala($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_skala);
        return $sql->result();
    }

    public function get_jawaban_upload($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_upload);
        return $sql->result();
    }

    public function get_jawaban_pilihan_singkat($id = '', $id_kuis = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id_kuis);
        $this->db->where_in('id_mahasiswa ', $id);

        $sql = $this->db->get($this->table_jawaban_pilihan_singkat);
        return $sql->result();
    }

    public function get_pertanyaan_jamak($id_kuisioner = '') {
        $sql = $this->db->query("SELECT
                                    pertanyaan, id_panel                
                                FROM
                                   jawaban_kisi_jamak                               
                                WHERE id_kuisioner='$id_kuisioner'
                                GROUP BY
                                   pertanyaan");
        return $sql->result();
    }

    public function get_pertanyaan_tunggal($id_kuisioner = '') {
        $sql = $this->db->query("SELECT
                                    pertanyaan, id_panel                        
                                FROM
                                   jawaban_kisi_tunggal                               
                                WHERE id_kuisioner='$id_kuisioner'
                                GROUP BY
                                   pertanyaan");
        return $sql->result();
    }

    //-------------------------------COUNT------------------------------//

    public function get_pilihan_jamak_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                        pj.opsi,
                                    COUNT(j.jawaban) AS total_jawaban
                                FROM
                                    pilihan_jamak pj
                                LEFT JOIN jawaban_pilihan_jamak j ON(
                                        FIND_IN_SET(
                                            pj.opsi,
                                            j.jawaban
                                        ) > 0
                                    )
                                WHERE pj.id_kuisioner=$id_kuisioner AND j.id_kuisioner=$id_kuisioner AND pj.id_panel=$id_panel AND j.id_panel=$id_panel
                                GROUP BY
                                   pj.opsi");
        return $sql->result();
    }

    public function get_pilihan_tunggal_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                    pt.opsi,
                                    COUNT(j.jawaban) AS total_jawaban
                                FROM
                                    pilihan_tunggal pt
                                LEFT JOIN jawaban_pilihan_tunggal j ON
                                    (
                                        FIND_IN_SET(pt.opsi, j.jawaban) > 0
                                    )
                                WHERE
                                    pt.id_kuisioner=$id_kuisioner AND j.id_kuisioner = $id_kuisioner AND pt.id_panel = $id_panel AND j.id_panel = $id_panel
                                GROUP BY
                                    pt.opsi");
        return $sql->result();
    }

    public function get_pilihan_dropdown_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                    pd.opsi,
                                    COUNT(j.jawaban) AS total_jawaban
                                FROM
                                    dropdown pd
                                LEFT JOIN jawaban_pilihan_dropdown j ON
                                    (
                                        FIND_IN_SET(pd.opsi, j.jawaban) > 0
                                    )
                                WHERE
                                    pd.id_kuisioner = $id_kuisioner AND j.id_kuisioner = $id_kuisioner AND pd.id_panel = $id_panel AND j.id_panel = $id_panel
                                GROUP BY
                                    pd.opsi");
        return $sql->result();
    }

    public function get_pilihan_skala_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                    jawaban,
                                    COUNT(jawaban) AS total_jawaban
                                FROM
                                    jawaban_pilihan_skala
                                WHERE
                                    id_kuisioner = $id_kuisioner AND id_panel = $id_panel
                                GROUP BY
                                    jawaban");
        return $sql->result();
    }

    public function get_pilihan_singkat_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                    jawaban,
                                    COUNT(jawaban) AS total_jawaban
                                FROM
                                    jawaban_pilihan_singkat
                                WHERE
                                    id_kuisioner = $id_kuisioner AND id_panel = $id_panel
                                GROUP BY
                                    jawaban");
        return $sql->result();
    }

    public function get_kisi_tunggal_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                    j.pertanyaan,
                                    kt.opsi_kolom,
                                    COUNT(j.jawaban) AS total_jawaban
                                FROM
                                    kisi_tunggal kt
                                LEFT JOIN jawaban_kisi_tunggal j ON
                                    (
                                        FIND_IN_SET(kt.opsi_kolom, j.jawaban) > 0
                                    )
                                WHERE
                                    kt.id_kuisioner = $id_kuisioner AND j.id_kuisioner = $id_kuisioner AND kt.id_panel = $id_panel AND j.id_panel = $id_panel
                                GROUP BY
                                    j.pertanyaan, kt.opsi_kolom 
                                ORDER BY    
                                    kt.opsi_kolom ASC");

        return $sql->result();
    }

    public function get_kisi_jamak_count($id_kuisioner = '', $id_panel = '') {
        $sql = $this->db->query("SELECT
                                        j.pertanyaan,
                                    kj.opsi_kolom,
                                    COUNT(j.jawaban) AS total_jawaban
                                FROM
                                    kisi_jamak kj
                                LEFT JOIN jawaban_kisi_jamak j ON
                                    (
                                        FIND_IN_SET(kj.opsi_kolom, j.jawaban) > 0
                                    )
                                WHERE
                                    kj.id_kuisioner = $id_kuisioner AND j.id_kuisioner = $id_kuisioner AND kj.id_panel = $id_panel AND j.id_panel = $id_panel
                                GROUP BY
                                    j.pertanyaan, kj.opsi_kolom
                                ORDER BY    
                                    kj.opsi_kolom ASC");
        return $sql->result();
    }

    //
    //---------------------------KATEGORI----------------------//
    //
    
   
    public function get_jumlah_kategori() {
        $sql = $this->db->query('SELECT COUNT(id_kategori) AS jumlah_kategori FROM kategori');
        return $sql->result();
    }

    public function get_name_kuisioner($id = '') {

        $this->db->select('nama_kuisioner');
        $this->db->where('id_kuisioner', $id);

        $sql = $this->db->get($this->table_kuisioner);
        return $sql->result();
    }

    public function get_kuisioner($id = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);

        $sql = $this->db->get($this->table_kuisioner);
        return $sql->result();
    }

    public function cek_duplikat_kuisioner($nama = '') {
        $this->db->where('nama_kuisioner', $nama);
        $sql = $this->db->get($this->table_kuisioner);
        return $sql->result();
    }

    public function get_data_kuisioner($id_admin = '', $role = '') {

        if (!empty($id_admin) && ($role == 2)) {

            $sql = $this->db->query("SELECT
                                            k.*,
                                             DATE_FORMAT(DATE(k.tanggal_post), '%d-%m-%Y') as tanggal,
                                            (
                                            SELECT
                                                COUNT(p.id_panel)
                                            FROM
                                                panel p
                                            WHERE
                                                p.id_kuisioner = k.id_kuisioner
                                        ) AS total_panel
                                        FROM
                                            kuisioner k
                                        WHERE
                                            id_admin = '$id_admin'");
        } elseif (!empty($id_admin) && ($role == 1)) {

            $sql = $this->db->query("SELECT
                                            k.*,
                                             DATE_FORMAT(DATE(k.tanggal_post), '%d-%m-%Y') as tanggal,
                                            (
                                            SELECT
                                                COUNT(p.id_panel)
                                            FROM
                                                panel p
                                            WHERE
                                                p.id_kuisioner = k.id_kuisioner
                                        ) AS total_panel
                                        FROM
                                            kuisioner k
                                        WHERE
                                            id_admin LIKE '$id_admin%' 
                                    ");
        } elseif ($role == 0) {

            $sql = $this->db->query("SELECT
                                            k.*,
                                            DATE_FORMAT(DATE(k.tanggal_post), '%d-%m-%Y') as tanggal,
                                            (
                                            SELECT
                                                COUNT(p.id_panel)
                                            FROM
                                                panel p
                                            WHERE
                                                p.id_kuisioner = k.id_kuisioner
                                        ) AS total_panel
                                        FROM
                                            kuisioner k                                                                                           
                                    ");
        }
        return $sql->result();
    }

    public function insert_kuisioner($value = '', $id_admin = '') {
        $this->db->trans_begin();

        $data = array(
            'id_admin' => $id_admin,
            'nama_kuisioner' => $value['nama_kuisioner'],
            'tipe_kuisioner' => $value['tipe_kuisioner'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner']
        );
        $this->db->insert($this->table_kuisioner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_kuisioner($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_kuisioner' => $value['nama_kuisioner'],
            'deskripsi_kuisioner' => $value['deskripsi_kuisioner'],
        );

        $this->db->where('id_kuisioner', $id);
        $this->db->update($this->table_kuisioner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function disable_status_kuisioner($id_admin = '') {
        $this->db->trans_begin();

        $data = array(
            'status_kuisioner' => 0,
        );

        $this->db->where('id_admin', $id_admin);
        $this->db->update($this->table_kuisioner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_kuisioner($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_kuisioner' => $value,
        );

        $this->db->where('id_kuisioner', $id);
        $this->db->update($this->table_kuisioner, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_kuisioner($value) {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $value);
        $this->db->delete($this->table_kuisioner);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------------------------//
    //
    //-------------------------PANEL-----------------------//

    public function get_panel($id = '') {

        $this->db->select('*');
        $this->db->where('id_unique', $id);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_panel_by_id($id = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function get_panel_kuisioner($id = '') {

        $this->db->select('*');
        $this->db->where('id_kuisioner', $id);

        $sql = $this->db->get($this->table_panel);
        return $sql->result();
    }

    public function insert_panel($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_unique' => $value['id_unique'],
            'pertanyaan' => $value['pertanyaan'],
            'nama_panel' => $value['nama_panel'],
            'tipe_panel' => $value['tipe_panel'],
            'start_panel' => $value['start_panel'],
            'status_required_panel' => $value['status_required_panel'],
            'status_jawaban_panel' => $value['status_jawaban_panel']
        );
        $this->db->insert($this->table_panel, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_panel($value = '', $id_panel = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_panel' => $value['nama_panel'],
            'panel_tujuan' => $value['panel_lanjutan'],
            'pertanyaan' => $value['pertanyaan']
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_panel, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_required_panel($id_panel = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_required_panel' => $value
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_panel, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_status_jawaban_panel($id_panel = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'status_jawaban_panel' => $value
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_panel, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_panel($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_panel);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_panel_kuisioner($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $id_panel);
        $this->db->delete($this->table_panel);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------ESSAI-------------------------//
    public function get_essai($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_essai);
        return $sql->result();
    }

    public function insert_essai($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jumlah_karakter' => $value['jumlah_karakter']
        );
        $this->db->insert($this->table_essai, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_essai($value = '', $id_panel = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'jumlah_karakter' => $value['jumlah_karakter']
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_essai, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_essai($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_essai);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------PILIHAN TUNGGAL-------------------------//

    public function get_pilihan_tunggal($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $this->db->where_not_in('opsi', 'Lainnya');

        $sql = $this->db->get($this->table_pilihan_tunggal);
        return $sql->result();
    }

    public function get_tujuan_lainnya_tunggal($id_panel = '') {

        $this->db->select('panel_tujuan');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi', 'Lainnya');

        $sql = $this->db->get($this->table_pilihan_tunggal);
        return $sql->result();
    }

    public function insert_pilihan_tunggal($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'opsi' => $value['opsi']
        );
        $this->db->insert($this->table_pilihan_tunggal, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_pilihan_tunggal($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_pilihan_tunggal);

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
        $this->db->where_not_in('opsi', 'Lainnya');

        $sql = $this->db->get($this->table_pilihan_jamak);
        return $sql->result();
    }

    public function insert_pilihan_jamak($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'opsi' => $value['opsi']
        );
        $this->db->insert($this->table_pilihan_jamak, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_pilihan_jamak($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_pilihan_jamak);

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
        $this->db->where_not_in('opsi', 'Lainnya');

        $sql = $this->db->get($this->table_pilihan_dropdown);
        return $sql->result();
    }

    public function get_tujuan_lainnya_dropdown($id_panel = '') {

        $this->db->select('panel_tujuan');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi', 'Lainnya');

        $sql = $this->db->get($this->table_pilihan_dropdown);
        return $sql->result();
    }

    public function insert_pilihan_dropdown($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'opsi' => $value['opsi']
        );
        $this->db->insert($this->table_pilihan_dropdown, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_pilihan_dropdown($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_pilihan_dropdown);

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

    public function get_kisi_tunggal_kolom_asc($id_panel = '') {

        $this->db->select('opsi_kolom');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_kolom is NOT NULL', NULL, FALSE);
        $this->db->order_by('opsi_kolom', 'ASC');

        $sql = $this->db->get($this->table_kisi_tunggal);
        return $sql->result();
    }

    public function get_kisi_jamak_kolom_asc($id_panel = '') {

        $this->db->select('opsi_kolom');
        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi_kolom is NOT NULL', NULL, FALSE);
        $this->db->order_by('opsi_kolom', 'ASC');

        $sql = $this->db->get($this->table_kisi_jamak);
        return $sql->result();
    }

    public function delete_kisi_tunggal($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_kisi_tunggal);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
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

    public function delete_kisi_jamak($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_kisi_jamak);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------SKALA-------------------------//


    public function get_skala($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_skala);
        return $sql->result();
    }

    public function insert_skala($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'nama_rentang_awal' => $value['nama_awal'],
            'nama_rentang_akhir' => $value['nama_akhir'],
            'ukuran_rentang' => $value['ukuran_rentang']
        );
        $this->db->insert($this->table_skala, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_skala($value = '', $id_panel = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'nama_rentang_awal' => $value['nama_awal'],
            'nama_rentang_akhir' => $value['nama_akhir'],
            'ukuran_rentang' => $value['ukuran_rentang']
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_skala, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_skala($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_skala);

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

    public function insert_upload($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'ukuran_file' => $value['ukuran_file'],
            'format_file' => $value['format_file']
        );
        $this->db->insert($this->table_upload, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_upload($value = '', $id_panel = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'ukuran_file' => $value['ukuran_file'],
            'format_file' => $value['format_file']
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_upload, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_upload($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_upload);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------JAWABAN-------------------------------//

    public function delete_all_jawaban($id_kuisioner = '') {
        $this->db->trans_begin();

        $this->db->where('id_kuisioner', $id_kuisioner);

        $all_table = array($this->table_jawaban_pilihan_essai,
            $this->table_jawaban_pilihan_tunggal,
            $this->table_jawaban_pilihan_jamak,
            $this->table_jawaban_pilihan_dropdown,
            $this->table_jawaban_kisi_tunggal,
            $this->table_jawaban_kisi_jamak,
            $this->table_jawaban_pilihan_skala,
            $this->table_jawaban_pilihan_upload,
            $this->table_jawaban_pilihan_singkat);

        $this->db->delete($all_table);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //-----------------------ESSAI-------------------------//
    public function get_jawaban_singkat($id_panel = '') {

        $this->db->select('*');
        $this->db->where('id_panel', $id_panel);
        $sql = $this->db->get($this->table_jawaban_singkat);
        return $sql->result();
    }

    public function insert_jawaban_singkat($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'tipe_pertanyaan' => $value['tipe_pertanyaan']
        );
        $this->db->insert($this->table_jawaban_singkat, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_jawaban_singkat($value = '', $id_panel = '') {
        $this->db->trans_begin();

        $data = array(
            'id_kuisioner' => $value['id_kuisioner'],
            'id_panel' => $value['id_panel'],
            'pertanyaan' => $value['pertanyaan'],
            'tipe_pertanyaan' => $value['tipe_pertanyaan']
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_jawaban_singkat, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_jawaban_singkat($id_panel = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->delete($this->table_jawaban_singkat);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    //---------------------------------OPSI---------------------------------//

    public function update_opsi_lainnya($id_panel = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'opsi_lainnya' => $value
        );

        $this->db->where('id_panel', $id_panel);
        $this->db->update($this->table_panel, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_opsi_lainnya($id_panel = '', $value = '', $tipe = '') {
        $this->db->trans_begin();

        $this->db->where('id_panel', $id_panel);
        $this->db->where('opsi', $value);

        if ($tipe == '2') {

            $this->db->delete($this->table_pilihan_tunggal);
        } elseif ($tipe == '3') {

            $this->db->delete($this->table_pilihan_jamak);
        } elseif ($tipe == '4') {

            $this->db->delete($this->table_pilihan_dropdown);
        }

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