<?php

class Fakultasprodimodel extends CI_Model {

    private $table_mahasiswa = 'mahasiswa';
    private $table_fakultas = 'fakultas';
    private $table_prodi = 'prodi';

    //
    //----------------------------MAHASISWA---------------------------//
    //
   
    public function get_jumlah_data_fakultas_prodi() {

        $sql = $this->db->query("SELECT
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

    public function get_detail_prodi($id_prodi = '') {

        $this->db->select('*');
        $this->db->where('id_prodi', $id_prodi);
        $sql = $this->db->get($this->table_prodi);

        return $sql->result();
    }

    public function get_detail_fakultas($id_fakultas = '') {

        $this->db->select('*');
        $this->db->where('id_fakultas', $id_fakultas);
        $sql = $this->db->get($this->table_fakultas);

        return $sql->result();
    }

    public function cek_nama_fakultas($name = '') {
        $this->db->where('nama_fakultas', $name);
        $sql = $this->db->get($this->table_fakultas);
        return $sql->result();
    }

    public function cek_nama_prodi($name = '') {
        $this->db->where('nama_prodi', $name);
        $sql = $this->db->get($this->table_prodi);
        return $sql->result();
    }

    public function insert_data_fakultas($value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_fakultas' => $value['nama_fakultas'],
            'kode_fakultas' => $value['kode_fakultas']
        );
        $this->db->insert($this->table_fakultas, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_data_fakultas($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'nama_fakultas' => $value['nama_fakultas'],
            'kode_fakultas' => $value['kode_fakultas']
        );
        $this->db->where('id_fakultas', $id);
        $this->db->update($this->table_fakultas, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_data_fakultas($id = '') {
        $this->db->trans_begin();

        $this->db->where('id_fakultas', $id);
        $this->db->delete($this->table_fakultas);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_data_prodi($value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_fakultas' => $value['id_fakultas'],
            'nama_prodi' => $value['nama_prodi'],
            'kode_prodi' => $value['kode_prodi']
        );
        $this->db->insert($this->table_prodi, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_data_prodi($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'id_fakultas' => $value['id_fakultas'],
            'nama_prodi' => $value['nama_prodi'],
            'kode_prodi' => $value['kode_prodi']
        );
        $this->db->where('id_prodi', $id);
        $this->db->update($this->table_prodi, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_data_prodi($id = '') {
        $this->db->trans_begin();

        $this->db->where('id_prodi', $id);
        $this->db->delete($this->table_prodi);

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