<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('m_dao');
    }

    public function showProspectiveCustContact($id) {
        $data["contact"] = $this->m_dao->getDataWhere('TPCCN', 'ID_COMPANY', $id);
        echo '<option selected="" disabled="" value="">Prospective Customer</option>';
        foreach ($data["contact"] as $var) {
            echo '<option value="' . $var->ID_CONTACT . '">' . $var->NAME . '</option>';
        }
    }
    
    public function showProductDetail($id) {
        $data["prodd"] = $this->m_dao->getDataWhere('TBL_PRODUCT_DETAIL', 'ID_PRODUCT_HEADER', $id);
        echo '<option selected="" disabled="" value="">Product Detail</option>';
        foreach ($data["prodd"] as $var) {
            echo '<option value="' . $var->ID_PRODUCT_DETAIL . '">' . $var->PRODUCT_DETAIL . '</option>';
        }
    }

}
