<?php

class Datatablemodel extends CI_Model {

    private $table_format = 'format_cetak';
    private $table_email = 'mailer_config';

    public function get_label($id = '') {

        $this->db->select('*');
        $this->db->where('id_format', $id);

        $sql = $this->db->get($this->table_format);
        return $sql->result();
    }

    public function get_by_id_mail() {
        $this->db->where('id_mailer', 1);
        $sql = $this->db->get($this->table_email);
        return $sql->result();
    }

}

?>