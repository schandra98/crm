<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_dao');
    }

    public function updateUsers($id) {
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
        $this->m_dao->updateOrcl('TBL_USERS', 'ID_USER', $id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateMedia($id) {
        $data["MEDIA"] = trim($this->input->post('media'));
        $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-media')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));

        $this->m_dao->updateOrcl("TBL_MASTER_MEDIA", 'ID_MEDIA', $id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateBarang($id) {
        $data["PRODUCT_HEADER"] = trim($this->input->post('barang'));
        $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-barang')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));
        $this->m_dao->updateOrcl("TBL_PRODUCT_HEADER", 'ID_PRODUCT_HEADER', $id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateBarangDetail($id) {
        $data["ID_PRODUCT_HEADER"] = trim($this->input->post('barang_h'));
        $data["PRODUCT_DETAIL"] = trim($this->input->post('header_barang_d'));
        $data["KETERANGAN"] = trim(strtoupper($this->input->post('keterangan-barang_d')));
        $data["AKTIF"] = trim(strtoupper($this->input->post('input_aktif')));
        $this->m_dao->updateOrcl("TBL_PRODUCT_DETAIL", 'ID_PRODUCT_DETAIL', $id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateReportComplainHeader($id) {
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
        print_r($data);
        $this->m_dao->updateOrcl("TBL_REPORT_COMPLAIN_HEADER", 'ID_REPORT_COMPLAIN_HEADER', $id, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateReportComplainDetailFg($id, $id_h) {
        try {

            $data["KODE_BARANG"] = trim($this->input->post('input-barang1'));
            $data["JUMLAH"] = trim(strtoupper($this->input->post('input-jumlah1')));
            $data["TGL_KIRIM"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_kirim1'))));
            $data["NO_PO_INTERN"] = $this->input->post('input-no_poi1');
            $data["KETERANGAN"] = trim($this->input->post('input-keterangan1'));
            $data["ID_REPORT_COMPLAIN_HEADER"] = $id_h;
            $this->m_dao->updateOrcl("TBL_REPORT_COMPLAIN_DTL_FG", "ID_REPORT_COMPLAIN_DTL_FG", $id, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateReportComplainDetailH($id, $id_h) {
        try {
            $data["DATE_HANDLING"] = date('d-M-Y', strtotime(str_replace("/", "-", $this->input->post('input-tgl_handling1'))));
            $data["HANDLING_REPORT"] = trim(strtoupper($this->input->post('input-handling_report1')));
            $data["ID_REPORT_COMPLAIN_HEADER"] = $id_h;
            $this->m_dao->updateOrcl("TBL_REPORT_COMPLAIN_DTL_H", "ID_REPORT_COMPLAIN_DTL_H", $id, $data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function updateReportApproach($id) {
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

            $this->m_dao->updateOrcl("TBL_REPORT_APPROACH", "ID_REPORT", $id, $data);
            redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function updateFinishReportHeader($id_h) {
        try {
            $data["TAHAP"] = 3;
            $this->m_dao->updateOrcl("TBL_REPORT_COMPLAIN_HEADER", "ID_REPORT_COMPLAIN_HEADER", $id_h, $data);
            redirect($_SERVER['HTTP_REFERER']);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
