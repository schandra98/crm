<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Insert extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_dao');
//        $this->load->model('send_email');
//        $this->load->library('test');
    }

    public function insertUsers() {
        $data["USERNAME"] = trim($this->input->post('input-user-username'));
        $data["PASSWORD"] = md5(trim($this->input->post('input-user-password')));
//        print_r(explode('#', $this->input->post('input-id_karyawan')));
        $karyawan = explode('#', $this->input->post('input-id_karyawan'));
        $idx = 0;
        while ($idx < count($karyawan)) {
            $data["ID_KARYAWAN"] = $karyawan[0];
            $data["NAMA_KARYAWAN"] = $karyawan[1];
            $idx++;
        }
        $department = explode('#', $this->input->post('input-id_department'));
        $idx1 = 0;
        while ($idx1 < count($department)) {
            $data["ID_DEPARTMENT"] = $department[0];
            $data["NAMA_DEPARTMENT"] = $department[1];
            $idx1++;
        }
        $data["LEVEL_TAHAP"] = trim(strtoupper($this->input->post('level_tahap')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));

        $this->m_dao->insertOrcl("TBL_USERS", $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insertMedia() {
        $data["MEDIA"] = trim($this->input->post('media'));
        $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-media')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));

        $this->m_dao->insertOrcl("TBL_MASTER_MEDIA", $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insertBarang() {
        $data["PRODUCT_HEADER"] = trim($this->input->post('barang'));
        $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-barang')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));
        $this->m_dao->insertOrcl("TBL_PRODUCT_HEADER", $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insertBarangDetail() {
        try {
            $data["ID_PRODUCT_HEADER"] = trim($this->input->post('barang_h'));
            $data["PRODUCT_DETAIL"] = trim($this->input->post('header_barang_d'));
            $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-barang_d')));
            $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));
            $this->m_dao->insertOrcl("TBL_PRODUCT_DETAIL", $data);
            redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function insertReportComplainHeader() {
        try {
            $data["KODE"] = trim($this->input->post('input-pelanggan'));
            $data["KODE_SALES"] = trim($this->input->post('input-sales'));
            $data["DATE_COMPLAIN"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_surat_keluhan'))));
            $data["DATE_RETUR_SAMPLE"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_retur'))));
            $data["NO_SURAT_KELUHAN"] = $this->input->post('input-no_nurat_keluhan');
            $data["NO_SURAT_JALAN"] = $this->input->post('input-no_nurat_jalan');
            $data["ID_KARYAWAN"] = $_SESSION['crm-id_karyawan'];
            $data["NAMA_KARYAWAN"] = trim(strtoupper($_SESSION['crm-nama_karyawan']));
            $data["ID_USER"] = $_SESSION['crm-id_user'];
            $data["ID_DEPARTMENT"] = $_SESSION['crm-id_department'];
            $kepada = explode('#', $this->input->post('input-kepada'));
            $idx1 = 0;
            while ($idx1 < count($kepada)) {
                $data["ID_DEPARTMENT"] = $kepada[0];
                $data["NAMA_DEPARTMENT"] = $kepada[1];
                $idx1++;
            }
            $data["KETERANGAN_PRODUK"] = trim(strtoupper($this->input->post('input-keterangan_produk')));
            $data["COMPLAIN"] = trim(strtoupper($this->input->post('input-komplain')));
            $data["ID_PRODUCT_HEADER"] = $this->input->post('input-product_header');
            $data["BATAS_WAKTU"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-batas_waktu'))));
            $data["KETERANGAN_TAMBAHAN"] = trim(strtoupper($this->input->post('input-keterangan_tambahan')));
//            print_r($data);
            $this->m_dao->insertOrcl("TBL_REPORT_COMPLAIN_HEADER", $data);
            
            $link = base_url() . 'core/new';
            $buyer = $this->m_dao->getDataOneRow('iportal.tbl_karyawan', 'id_karyawan', $data["id_karyawan_buyer"]);
            $email = $this->m_dao->getDataOneRow('v_users', 'id_department', $buyer["id_department"]);
            $email['email'] = 'it_ins@kudus.puragroup.com';
            $this->notif->sendEmail($email['email'], $email['nama_karyawan'], $id_h, $link, $_SESSION['exp-nama_karyawan'], '0');

            redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function insertReportComplainDetailFg($id) {
        try {
            for ($idx = 1; $idx <= 10; $idx++) {
                if ("" != ($this->input->post('input-barang' . $idx))) {
                    $data["KODE_BARANG"] = trim($this->input->post('input-barang' . $idx));
                    $data["JUMLAH"] = trim(strtoupper($this->input->post('input-jumlah' . $idx)));
                    $data["TGL_KIRIM"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_kirim' . $idx))));
                    $data["NO_PO_INTERN"] = $this->input->post('input-no_poi' . $idx);
                    $data["KETERANGAN"] = trim($this->input->post('input-keterangan' . $idx));
                    $data["ID_REPORT_COMPLAIN_HEADER"] = $id;
                    $this->m_dao->insertOrcl("TBL_REPORT_COMPLAIN_DTL_FG", $data);
//                    print_r($data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insertReportComplainDetailH($id_h) {
        try {
            for ($idx = 1; $idx <= 10; $idx++) {
                if ("" != ($this->input->post('input-handling_report' . $idx))) {
//                    $data["DATE_HANDLING"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_handling' . $idx))));
                    $data["HANDLING_REPORT"] = trim(($this->input->post('input-handling_report' . $idx)));
                    $data["ID_REPORT_COMPLAIN_HEADER"] = $id_h;
                    $data["ID_KARYAWAN"] = $_SESSION["crm-id_karyawan"];
                    $data["ID_USER"] = $_SESSION["crm-id_user"];
                    $this->m_dao->insertOrcl("TBL_REPORT_COMPLAIN_DTL_H", $data);
                    $dataH["TAHAP"] = 2;
                    $this->m_dao->updateOrcl("TBL_REPORT_COMPLAIN_HEADER", "ID_REPORT_COMPLAIN_HEADER", $id_h, $dataH);

//                    print_r($data);
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function insertReportApproach() {
        try {

            $data["DATE_APPROACH"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_approach'))));
            if (trim($this->input->post('input-contact')) == '1') {
                $data["KODE"] = trim($this->input->post('input-customerexist'));
                $data["ID_COMPANY"] = NULL;
                $data["ID_CONTACT"] = NULL;
            } else {
                $data["KODE"] = NULL;
                $data["ID_COMPANY"] = trim(strtoupper($this->input->post('input-customercomp')));
                $data["ID_CONTACT"] = trim($this->input->post('input-customerpros'));
            }
            $data["KODE_SALES"] = "MU"; //pakai sesion nanti
            $data["ID_MEDIA"] = trim($this->input->post('input-media'));
            $data["KETERANGAN_M"] = trim($this->input->post('keterangan-media'));
            $data["KETERANGAN_PD"] = trim($this->input->post('keterangan-produk_d'));
            $data["ID_PRODUCT_HEADER"] = trim($this->input->post('input-product_header'));
            $data["ID_PRODUCT_DETAIL"] = trim($this->input->post('input-product_detail'));
            $data["REPORT"] = trim(strtoupper($this->input->post('input-report')));
            $kategori = $this->input->post('input-kategori[]');
            $data['ID_KATEGORI'] = ",";
            for ($i = 0; $i < count($kategori); $i++) {
                $data['ID_KATEGORI'] .= $kategori[$i] . ",";
            }
//            print_r($data);
            $this->m_dao->insertOrcl("TBL_REPORT_APPROACH", $data);

            redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
