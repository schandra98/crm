<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dao extends CI_Model {

    function insertOrcl($table, $data) {
        $this->db->insert($table, $data);
    }

    function insertMySQL($table, $data) {
        $otherdb = $this->load->database('mysql_db', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $otherdb->insert($table, $data);
    }

    function getDataOneRow($table, $column, $id) {
        $data = $this->db->query("SELECT * FROM $table WHERE $column LIKE '$id'")->row_array();
        return $data;
    }

    function getDataAllOneRow($table) {
        $data = $this->db->query("SELECT * FROM $table")->row_array();
        return $data;
    }

    function getDataMax($table, $column) {
        $data = $this->db->query("SELECT MAX($column) AS 'maxValue' FROM $table")->row_array();
        return $data;
    }

    function getDataAll($table) {
        $data = $this->db->query("SELECT * FROM $table")->result();
        return $data;
    }

    function getDataAllMySQL($table) {
        $otherdb = $this->load->database('mysql_db', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $data = $otherdb->query("SELECT * FROM $table")->result();
        return $data;
    }

    function getDataOneColumnOrcl($searchcolumn, $table, $id, $col) {
        $otherdb = $this->load->database();
        $data = $otherdb->query("SELECT $searchcolumn FROM $table WHERE $col = $id")->result();
        return $data;
    }

    function getDataOneColumnMySQL($table) {
        $otherdb = $this->load->database('mysql_db', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $data = $otherdb->query("SELECT * FROM $table")->result();
        return $data;
    }

    function getDataWhere($table, $column, $id) {
        $data = $this->db->query("SELECT * FROM $table WHERE $column LIKE $id")->result();
        return $data;
    }

    function getDataWhere2($table, $col1, $id1, $col2, $id2) {
        $data = $this->db->query("SELECT * FROM $table WHERE $col1=$id1 AND $col2=$id2")->result();
        return $data;
    }

    function updateMySQL($table, $col_pk, $id, $data) {
        $this->load->database('mysql_db', TRUE);
        $this->db->where($col_pk, $id);
        $this->db->update($table, $data);
    }

    function updateOrcl($table, $col_pk, $id, $data) {
        $this->db->where($col_pk, $id);
        $this->db->update($table, $data);
    }

    function deleteData($table, $col_pk, $id) {
        $this->db->delete($table, array($col_pk => $id));
    }

    function deleteDataAll($table) {
        $this->db->truncate($table);
    }

    function customQuery($query) {
        return $this->db->query($query)->result();
    }

    function customQuery2($query) {
        return $this->db->query($query)->row_array();
    }

}
