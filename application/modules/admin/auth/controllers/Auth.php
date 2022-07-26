<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        $this->load->model('Authmodel');
    }

    //
    //-------------------------------AUTH------------------------------//
    //
    
    public function index() {
        if ($this->session->userdata('sitsa') == TRUE) {
            redirect('dashboard');
        }
        $data['title'] = 'Control Panel | Login Admin ';
        $this->load->view('login', $data);
    }

    public function login() {
        $param = $this->input->post();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash_message', login_err(validation_errors()));
            redirect('auth');
        } else {
            $user = $this->Authmodel->get_user($param);
            //var_dump($user);exit;
            if (!empty($user)) {
                $this->session->set_userdata('sitsa', $user);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('flash_message', login_err('Maaf.., Mungkin Email/Password Anda salah.'));
                redirect('auth');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('sitsa');

        redirect('auth');
    }

    //----------------------------------------------------------------//
}
