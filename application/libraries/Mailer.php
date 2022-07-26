<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer {

    protected $_ci;
    protected $db_mailer = "mailer_config";

    public function __construct() {
        $this->_ci = &get_instance(); // Set variabel _ci dengan Fungsi2-fungsi dari Codeigniter
    }

    public function send($data) {
        $get_mailer = $this->_ci->db->query('select * from ' . $this->db_mailer . ' where id_mailer=1')->result();

        $mail = new PHPMailer;
        $mail->SMTPDebug = 2;  
        $mail->isSMTP();

        $mail->Host = $get_mailer[0]->host;
        $mail->Username = $get_mailer[0]->email_website; // Email Pengirim
        $mail->Password = $get_mailer[0]->password; // Isikan dengan Password email pengirim
        $mail->Port = $get_mailer[0]->port;
        $mail->SMTPAuth = $get_mailer[0]->smtp_auth;
        $mail->SMTPSecure = $get_mailer[0]->smtp_secure;
        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

        $mail->setFrom($get_mailer[0]->email_website, $get_mailer[0]->nama_pengirim);
        $mail->addAddress($data['email_penerima'], '');
        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

        $mail->Subject = $data['subjek'];
        $mail->Body = $data['content'];
        $send = $mail->send();

        return $mail;
    }

//    public function send_with_attachment($data) {
//        $mail = new PHPMailer;
//        $mail->isSMTP();
//
//        $mail->Host = 'smtp.gmail.com';
//        $mail->Username = $this->email_pengirim; // Email Pengirim
//        $mail->Password = $this->password; // Isikan dengan Password email pengirim
//        $mail->Port = 465;
//        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'ssl';
//        // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
//
//        $mail->setFrom($this->email_pengirim, $this->nama_pengirim);
//        $mail->addAddress($data['email_penerima'], '');
//        $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
//
//        $mail->Subject = $data['subjek'];
//        $mail->Body = $data['content'];
//
//        if ($data['attachment']['size'] <= 25000000) { // Jika ukuran file <= 25 MB (25.000.000 bytes)
//            $mail->addAttachment($data['attachment']['tmp_name'], $data['attachment']['name']);
//
//            $send = $mail->send();
//
//            if ($send) { // Jika Email berhasil dikirim
//                $response = array('status' => 'Sukses', 'message' => 'Email berhasil dikirim');
//            } else { // Jika Email Gagal dikirim
//                $response = array('status' => 'Gagal', 'message' => 'Email gagal dikirim');
//            }
//        } else { // Jika Ukuran file lebih dari 25 MB
//            $response = array('status' => 'Gagal', 'message' => 'Ukuran file attachment maksimal 25 MB');
//        }
//
//        return $response;
//    }
}
