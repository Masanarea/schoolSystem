<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('login_model');
    }


    public function index()
    {
        // echo "working..";
        $this->load->view("backend/login");
    }

    public function check_login()
    {
        $this->login_model->adminLoginFunction();
        $this->session->set_flashdata("flash_message", "Succsessfully logged in");
        redirect(base_url() . "admin/dashboard", "refresh");
    }
}
