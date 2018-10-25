<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index() {
        $this->load->view('v_login');
    }

    function log_in() {
        $username = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');

        $where = array(
            'USERNAME' => $username,
            'PASSWORD' => md5($password)
        );
        $cek = $this->m_login->cek_login($where)->num_rows();
        if ($cek > 0) {
            $data = $this->m_login->cek_login($where)->row();
//          SET USERNAME, DATA NAMA, DATA DEPARTMENT PRODUKSI, DATA DEPARTMENT USER
            $this->session->set_userdata('crm-username', $data->USERNAME);
            $this->session->set_userdata('crm-id_karyawan', $data->ID_KARYAWAN);
            $this->session->set_userdata('crm-nama_karyawan', $data->NAMA_KARYAWAN);
            $this->session->set_userdata('crm-id_user', $data->ID_USER);
            $this->session->set_userdata('crm-id_department', $data->ID_DEPARTMENT);
            $this->session->set_userdata('crm-nama_department', $data->NAMA_DEPARTMENT);
            $this->session->set_userdata('crm-level_tahap', $data->LEVEL_TAHAP);
            $this->session->set_userdata('crm-aktif', $data->AKTIF);
//          UPDATE LAST LOGIN
//            $this->m_login->updateDataLastLogin($data->id_user);
            redirect(base_url("core/load_report_complain/1"));
        } else {
//            print_r($cek);
            redirect(base_url());
        }
    }

    function log_out() {
        $this->session->unset_userdata('crm-username');
        $this->session->unset_userdata('crm-id_karyawan');
        $this->session->unset_userdata('crm-nama_karyawan');
        $this->session->unset_userdata('crm-id_user');
        $this->session->unset_userdata('crm-id_department');
        $this->session->unset_userdata('crm-nama_department');
        $this->session->unset_userdata('crm-level_tahap');
        $this->session->unset_userdata('crm-aktif');
        redirect(base_url());
    }

}
