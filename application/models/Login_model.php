<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function adminLoginFunction()
    {
        $email = html_escape($this->input->post("email"));
        $password = html_escape($this->input->post("password"));
        // Caution! sha1() is not secure
        // $data = array("email" => $email,"password" => sha1($password));
        $data = array("email" => $email,"password" => $password);
        $query = $this->db->get_where("admin", $data);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata("login_type", "admin");
            $this->session->set_userdata("admin_login", "1");
            $this->session->set_userdata("admin_id", $row->admin_id);
            $this->session->set_userdata("login_user_id", $row->admin_id);
            $this->session->set_userdata("name", $row->name);
        }elseif($query->num_rows() == 0){
            $this->session->set_flashdata("error_message", $get_fhrase("missed logegd in"));
            redirect(base_url()."login", "refresh");
        }
    }
}