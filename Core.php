<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_dao');
        if (!isset($_SESSION['crm-username'])) {
            redirect(base_url('login/log_in'));
        }
    }

    function index() {
        $this->load_report_complain('1');
    }

    function load_insert() {
        $data['title'] = "Registrasi Organisasi";
        $data['page'] = "layout/pages/v_dashboard.php";
        $data["data"] = 'load insert';
        $data["dataCustomerProsp"] = $this->m_dao->getDataAll("V_CUSTOMERS");
        $data["dataCustomerExst"] = $this->m_dao->getDataWhere("TBL_MASTER_CUSTOMER_SUPLIER", "STATUS_CUSTOMER", "'%1%'");
        $data["dataMedia"] = $this->m_dao->getDataAll("TMM");
        $data["dataKategori"] = $this->m_dao->getDataAll("TMK");
        $data["dataProdukHeader"] = $this->m_dao->getDataAll("TPH");
        $data["dataProdukDetail"] = $this->m_dao->getDataAll("TPD");
        $this->load->view('v_home', $data);
    }

    function load_insert2() {
        $data["link"] = base_url('Insert/insertReportApproach/');
        $data['title'] = "Load Insert2";
        $data['page'] = "layout/pages/v_insert2.php";
        $data["data"] = 'load insert';
        $data["action"] = 'add';
        $data["dataReportApproach"] = $this->m_dao->getDataOneRow("V_REPORT_APPROACH", "ID_REPORT", "-1");
        $data["dataCustomerProsp"] = $this->m_dao->getDataAll("V_CUSTOMERS");
        $data["dataCustomerExst"] = $this->m_dao->getDataWhere("TBL_MASTER_CUSTOMER_SUPLIER", "STATUS_CUSTOMER", "'%1%'");
        $data["dataSales"] = $this->m_dao->getDataAll("TBL_MASTER_SALES");
        $data["dataMedia"] = $this->m_dao->getDataAll("TBL_MASTER_MEDIA");
        $data["dataKategori"] = $this->m_dao->getDataAll("TBL_MASTER_KATEGORI");
        $data["dataProdukHeader"] = $this->m_dao->getDataAll("TPH");
        $data["dataProdukDetail"] = $this->m_dao->getDataAll("TPD ORDER BY ID_PRODUCT_HEADER");
        $this->load->view('v_home', $data);
    }

    function load_report_complain($tahap) {
        $data['title'] = "Registrasi Organisasi";
        $data['page'] = "layout/pages/v_dashboard.php";
        $data["data"] = 'load insert';
        $data["dataProdukDetailFG"] = $this->m_dao->getDataAll("V_REPORT_COMPLAIN_DTL_FG ORDER BY ID_REPORT_COMPLAIN_DTL_FG, TGL_KIRIM ASC");
        $data["dataProdukDetailHandling"] = $this->m_dao->getDataAll("V_REPORT_COMPLAIN_DTL_H ORDER BY ID_REPORT_COMPLAIN_DTL_H ASC");
        $data["dataSuplier"] = $this->m_dao->getDataAll('TBL_MASTER_CUSTOMER_SUPLIER');
        $data["dataSales"] = $this->m_dao->getDataAll('TBL_MASTER_SALES');
        $data['dataCustomer'] = $this->m_dao->getDataWhere("V_REPORT_COMPLAIN_HEADER", "TAHAP", "$tahap ORDER BY DATE_COMPLAIN ASC");
        $data["tahap"] = $tahap;
        $this->load->view('v_home', $data);
    }

    function load_prospective_cust() {
        $data['title'] = "Registrasi Organisasi";
        $data['page'] = "layout/pages/v_dashboard.php";
        $data["data"] = 'load insert';
        $data["dataProdukDetailFG"] = $this->m_dao->getDataAll("V_REPORT_COMPLAIN_DTL_FG");
        $data["dataProdukDetailHandling"] = $this->m_dao->getDataAll("TBL_REPORT_COMPLAIN_DTL_H");
        $data["dataSuplier"] = $this->m_dao->getDataAll('TBL_MASTER_CUSTOMER_SUPLIER');
        $data["dataSales"] = $this->m_dao->getDataAll('TBL_MASTER_SALES');
        $data['dataCustomer'] = $this->m_dao->getDataAll("V_REPORT_COMPLAIN_HEADER");
        $this->load->view('v_home', $data);
    }

    function load_report_approach() {
        $data['title'] = "Report Approach";
        $data['page'] = "layout/pages/v_report_approach.php";
        $data["data"] = 'load insert';
        $data["dataReportApproach"] = $this->m_dao->getDataAll("V_REPORT_APPROACH ORDER BY CREATED ASC, DATE_APPROACH ASC");
        $data["dataCompany"] = $this->m_dao->getDataAll("V_TPCN");
        $data["dataSales"] = $this->m_dao->getDataAll("TBL_MASTER_SALES");
        $data["dataMedia"] = $this->m_dao->getDataAll("TBL_MASTER_MEDIA");
        $data["dataKategori"] = $this->m_dao->getDataAll("TBL_MASTER_KATEGORI");

        $this->load->view('v_home', $data);
    }
    function load_report_approach_resp() {
        $data['title'] = "Report Approach";
        $data['page'] = "layout/pages/v_report_approach_resp.php";
        $data["data"] = 'load insert';
        $data["dataReportApproach"] = $this->m_dao->getDataAll("V_REPORT_APPROACH ORDER BY CREATED ASC, DATE_APPROACH ASC");
        $data["dataCompany"] = $this->m_dao->getDataAll("V_TPCN");
        $data["dataSales"] = $this->m_dao->getDataAll("TBL_MASTER_SALES");
        $data["dataMedia"] = $this->m_dao->getDataAll("TBL_MASTER_MEDIA");
        $data["dataKategori"] = $this->m_dao->getDataAll("TBL_MASTER_KATEGORI");

        $this->load->view('v_home', $data);
    }

    function load_complaint_detail() {
        $data['title'] = "Registrasi Organisasi";
        $data['page'] = "layout/pages/v_dashboard.php";
        $data["data"] = 'load insert';
        $data["dataProdukDetail"] = $this->m_dao->getDataAll("TBL_REPORT_COMPLAIN_DTL_H");
        $this->load->view('v_home', $data);
    }

    function reportComplainHeader($id_h) {
        if ($id_h < 0) {
            $data["action"] = 'add';
            $data["title"] = 'Tambah Data Keluhan Pelanggan';
            $data["link"] = base_url('Insert/insertReportComplainHeader/');
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Edit Data Keluhan Pelanggan';
            $data["link"] = base_url('Update/updateReportComplainHeader/' . $id_h);
            $data["linkDelete"] = base_url('Delete/deleteReportComplainHeader/' . $id_h);
            $data["linkUpdate"] = base_url('Update/updateFinishReportHeader/' . $id_h);
        }
        $data["dataReportComplainHeader"] = $this->m_dao->getDataOneRow("V_REPORT_COMPLAIN_HEADER", "ID_REPORT_COMPLAIN_HEADER", $id_h);
        $data["dataProdukHeader"] = $this->m_dao->getDataAll("TBL_PRODUCT_HEADER");
        $data["dataSales"] = $this->m_dao->getDataAll("TBL_MASTER_SALES");
        $data["dataDepartment"] = $this->m_dao->getDataAllMySQL("iportal.tbl_department WHERE id_department IN (6,14)");
        $data["dataMCS"] = $this->m_dao->getDataWhere("TBL_MASTER_CUSTOMER_SUPLIER", "STATUS_CUSTOMER", "'%1%'");

        $data["page"] = 'layout/modal/vm_report_complaint_header.php';
        $this->load->view($data["page"], $data);
    }

    function productDetailFg($id, $id_h) {
        if ($id < 0) {
            $data["action"] = 'add';
            $data["title"] = 'Tambah Data Keluhan Pelanggan';
            $data["link"] = base_url('Insert/insertReportComplainDetailFg/' . $id_h);
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Edit Data Keluhan Pelanggan';
            $data["link"] = base_url('Update/updateReportComplainDetailFg/' . $id . '/' . $id_h);
            $data["linkDelete"] = base_url('Delete/deleteReportComplainDetailFg/' . $id . '/' . $id_h);
        }
        $data["dataProdukDetailFG"] = $this->m_dao->getDataOneRow("TBL_REPORT_COMPLAIN_DTL_FG", "ID_REPORT_COMPLAIN_DTL_FG", "$id");
        $data["dataMasterBarang"] = $this->m_dao->getDataWhere("TBL_MASTER_BARANG", "KATEGORI", "'%BJ%' AND STATUS = 'T'");
        $data["page"] = 'layout/modal/vm_report_complaint_fg.php';
        $this->load->view($data["page"], $data);
    }

    function productDetailHandling($id, $id_h) {
        if ($id < 0) {
            $data["action"] = 'add';
            $data["title"] = 'Tambah Data Detail Handling';
            $data["link"] = base_url('Insert/insertReportComplainDetailH/' . $id_h);
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Edit Data Detail Handling';
            $data["link"] = base_url('Update/updateReportComplainDetailH/' . $id . '/' . $id_h);
            $data["linkDelete"] = base_url('Delete/deleteReportComplainDetailH/' . $id . '/' . $id_h);
        }
        $data["dataProdukDetailHandling"] = $this->m_dao->getDataOneRow("TBL_REPORT_COMPLAIN_DTL_H", "ID_REPORT_COMPLAIN_DTL_H", "$id");
        $data["page"] = 'layout/modal/vm_report_complaint_handling.php';
        $this->load->view($data["page"], $data);
    }

    function reportApproach($id) {
        if ($id < 0) {
            $data["action"] = 'add';
            $data["title"] = 'Tambah Data Detail Handling';
            $data["link"] = base_url('Insert/insertReportApproach/');
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Edit Data Detail Handling';
            $data["link"] = base_url('Update/updateReportApproach/' . $id);
            $data["linkDelete"] = base_url('Delete/deleteReportApproach/' . $id);
        }
        $data["data"] = 'load insert';
        $data["dataProdukHeader"] = $this->m_dao->getDataAll("TPH");
        $data["dataReportApproach"] = $this->m_dao->getDataOneRow("V_REPORT_APPROACH", "ID_REPORT", "$id");
        $data["dataProdukDetail"] = $this->m_dao->getDataAll("TPD");
        $data["dataCustomerExst"] = $this->m_dao->getDataWhere("TBL_MASTER_CUSTOMER_SUPLIER", "STATUS_CUSTOMER", "'%1%'");
        $data["dataCustomerProsp"] = $this->m_dao->getDataAll("V_CUSTOMERS");
        $data["dataCompany"] = $this->m_dao->getDataAll("V_TPCN");
        $data["dataSales"] = $this->m_dao->getDataAll("TBL_MASTER_SALES");
        $data["dataMedia"] = $this->m_dao->getDataAll("TBL_MASTER_MEDIA");
        $data["dataKategori"] = $this->m_dao->getDataAll("TBL_MASTER_KATEGORI");
        $data["dataProdukDetail"] = $this->m_dao->getDataAll("TPD ORDER BY ID_PRODUCT_HEADER");
        $data["page"] = 'layout/pages/v_insert2.php';
        $this->load->view($data["page"], $data);
    }

    function load_master($active) {
        $data = [];
        if ($active == '1') {
            $value = '1';
            $data["page"] = 'layout/pages/v_all_master.php';
        } elseif ($active == '0') {
            $data["page"] = 'layout/pages/v_all_master.php';
            $value = '0';
        }
        $data["dataUsers"] = $this->m_dao->getDataWhere('TBL_USERS', 'AKTIF', $value);
        $data["dataUsersSQL"] = $this->m_dao->getDataAllMySQL('iportal.v_karyawan');
        $data["dataDeptSQL"] = $this->m_dao->getDataAllMySQL('iportal.tbl_department');
        $data["dataMasterMedia"] = $this->m_dao->getDataWhere('TBL_MASTER_MEDIA ', 'AKTIF', $value . ' ORDER BY ID_MEDIA ASC');
        $data["dataMasterProdukH"] = $this->m_dao->getDataWhere('TBL_PRODUCT_HEADER ', 'AKTIF', $value);
        $data["dataMasterProdukD"] = $this->m_dao->getDataWhere('V_PRODUCT_DETAIL ', 'AKTIF', $value);
        $data["page"] = 'layout/pages/v_all_master.php';
        $data["title"] = 'Masters';
        $data["data"] = 'load insert';

        $this->load->view('v_home', $data);
    }

    function modal_master($table, $id) {
        if ($id < 0) {
            $data["action"] = 'add';
            $data["title"] = 'Tambahkan Data Baru untuk ';
            $data["link"] = base_url('Insert/insert');
        } else {
            $data["action"] = 'edit';
            $data["title"] = 'Update Data ';
            $data["link"] = base_url('Update/update');
        }
        if ($table == "user") {
            $data["title"] .= 'Users';
            $data["link"] .= "Users/$id";
            $data["dataKaryawan"] = $this->m_dao->getDataAllMySQL('iportal.v_karyawan', 'aktif', "'1' ORDER BY nama_karyawan");
            $data["dataDepartment"] = $this->m_dao->getDataAllMySQL('iportal.tbl_department', 'aktif', "'1' ORDER BY nama_department");
            $data['users'] = $this->m_dao->getDataOneRow('TBL_USERS', 'ID_USER', $id);
            $this->load->view('layout/modal/vm_master_users', $data);
        }
        if ($table == "media") {
            $data["title"] .= 'Media';
            $data["link"] .= "Media/$id";
            $data['media'] = $this->m_dao->getDataOneRow('TBL_MASTER_MEDIA', 'ID_MEDIA', $id);
            $this->load->view('layout/modal/vm_master_media', $data);
        }
        if ($table == "barang") {
            $data["title"] .= 'Barang';
            $data["link"] .= "Barang/$id";
            $data['barang'] = $this->m_dao->getDataOneRow('TBL_PRODUCT_HEADER', 'ID_PRODUCT_HEADER', $id);
            $this->load->view('layout/modal/vm_produk_h', $data);
        }
        if ($table == "barang_d") {
            $data["title"] .= 'Barang Detail';
            $data["link"] .= "BarangDetail/$id";
            $data['barang_d'] = $this->m_dao->getDataOneRow('TBL_PRODUCT_DETAIL', 'ID_PRODUCT_DETAIL', $id);
            $data['dataReport'] = $this->m_dao->getDataAll('TBL_PRODUCT_HEADER', 'ID_PRODUCT_HEADER', $id);
            $this->load->view('layout/modal/vm_produk_d', $data);
        }
    }

}
