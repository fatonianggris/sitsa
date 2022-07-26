<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Laporan extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('sitsa') == FALSE) {
            redirect('auth');
        }
        $this->user = $this->session->userdata("sitsa");
        $this->load->model('Laporanmodel');
        $this->load->library('form_validation');
    }

    //---------------------------EKSPORT DATA MAHASISWA---------------------------------//

    public function export_data_mahasiwa() {
        $this->load->helper('download');

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);
        $extension = 'xls';

        $nama_file = $this->Laporanmodel->get_name_file_mahasiswa($this->user['id_ref'], $this->user['role_akun']);

        if ($this->user['role_akun'] == 2) {
            $fileName = $nama_file[0]->nama_fakultas . '_' . $nama_file[0]->nama_jurusan . '_' . date('d-m-Y');
        } elseif ($this->user['role_akun'] == 1) {
            $fileName = $nama_file[0]->nama_fakultas . '_' . date('d-m-Y');
        } else {
            $fileName = 'SEMUA_DATA_MAHASISWA_' . date('d-m-Y');
        }

        if ($data['data_check'] == '' or $data['data_check'] == NULL) {

            $this->session->set_flashdata('flash_message', warn_msg('Pilih data terlebih dahulu'));
            redirect('master/mahasiswa/daftar_data_mahasiswa');
        } else {

            $data_fakultas = $this->Laporanmodel->get_data_fakultas();
            $data_prodi = $this->Laporanmodel->get_data_prodi();

            if (!empty($extension)) {
                $extension = $extension;
            } elseif ($extension == 'xlsx') {
                $extension = 'xlsx';
            } else {
                $extension = 'xls';
            }

            $empInfo = $this->Laporanmodel->get_data_export_mahasiswa($data['data_check']);
//            var_dump($empInfo);
//            exit;
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Nomor');
            $sheet->setCellValue('B1', 'NIM Mahasiswa');
            $sheet->setCellValue('C1', 'Nama Mahasiswa');
            $sheet->setCellValue('D1', 'Nomor Ijazah');
            $sheet->setCellValue('E1', 'Email Mahasiswa');
            $sheet->setCellValue('F1', 'Nomor Handphone');
            $sheet->setCellValue('G1', 'Fakultas Mahasiswa');
            $sheet->setCellValue('H1', 'Prodi Mahasiswa');
            $sheet->setCellValue('I1', 'Tahun Lulus');
            $sheet->setCellValue('J1', 'Tahun Masuk');

            $rowCount = 2;
            $i = 1;
            foreach ($empInfo as $element) {

                $fakultas_mhs = 'kosong';
                $prodi_mhs = 'kosong';

                if (!empty($element['id_fakultas_mhs'])) {
                    foreach ($data_fakultas as $key => $values) {
                        if ($values->id_fakultas == $element['id_fakultas_mhs']) {
                            $fakultas_mhs = $values->nama_fakultas;
                        }
                    }
                }

                if (!empty($element['id_prodi_mhs'])) {
                    foreach ($data_prodi as $key => $value) {
                        if ($value->id_prodi == $element['id_prodi_mhs']) {
                            $prodi_mhs = $value->nama_prodi;
                        }
                    }
                }

                $sheet->setCellValue('A' . $rowCount, $i);
                $sheet->setCellValue('B' . $rowCount, $element['nim_mhs']);
                $sheet->setCellValue('C' . $rowCount, strtoupper($element['nama_mhs']));
                $sheet->setCellValue('D' . $rowCount, $element['nomor_ijazah_mhs']);
                $sheet->setCellValue('E' . $rowCount, $element['email_mhs']);
                $sheet->setCellValue('F' . $rowCount, $element['nomor_hp_mhs']);
                $sheet->setCellValue('G' . $rowCount, strtoupper($fakultas_mhs));
                $sheet->setCellValue('H' . $rowCount, strtoupper($prodi_mhs));
                $sheet->setCellValue('I' . $rowCount, $element['tahun_lulus_mhs']);
                $sheet->setCellValue('J' . $rowCount, $element['tahun_masuk_mhs']);
                $i++;
                $rowCount++;
            }

            if ($extension == 'csv') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $fileName = $fileName . '.csv';
            } elseif ($extension == 'xlsx') {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
                $fileName = $fileName . '.xlsx';
            } else {
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
                $fileName = $fileName . '.xls';
            }

            $this->output->set_header('Content-Type: application/vnd.ms-excel');
            $this->output->set_header("Content-type: application/csv");
            $this->output->set_header('Cache-Control: max-age=0');
            header('Content-Disposition: attachment;filename="' . $fileName . '"');
            $writer->save('php://output');
        }
    }

}
