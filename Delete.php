<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Update
 *
 * @author willy
 */
class Delete extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_dao');
    }

    public function deleteUsers($id) {
        $this->m_dao->deleteData('TBL_USERS', 'ID_USER', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteMedia($id) {
        $this->m_dao->deleteData('TBL_MASTER_MEDIA', 'ID_MEDIA', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteBarang($id) {
        $this->m_dao->deleteData('TBL_PRODUCT_HEADER', 'ID_PRODUCT_HEADER', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteDetailBarang($id) {
        $this->m_dao->deleteData('TBL_PRODUCT_DETAIL', 'ID_PRODUCT_DETAIL', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteReportComplainHeader($id) {
        $this->m_dao->deleteData('TBL_REPORT_COMPLAIN_HEADER', 'ID_REPORT_COMPLAIN_HEADER', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteReportComplainDetailFg($id) {
        $this->m_dao->deleteData('TBL_REPORT_COMPLAIN_DTL_FG', 'ID_REPORT_COMPLAIN_DTL_FG', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteReportComplainDetailH($id) {
        $this->m_dao->deleteData('TBL_REPORT_COMPLAIN_DTL_H', 'ID_REPORT_COMPLAIN_DTL_H', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteReportApproach($id) {
        $this->m_dao->deleteData('TBL_REPORT_APPROACH', 'ID_REPORT', $id);
        redirect($_SERVER['HTTP_REFERER']);
    }

}
