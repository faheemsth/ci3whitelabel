<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class certificatelogs_m extends MY_Model {

    protected $_table_name = 'certificate_logs';
    protected $_primary_key = 'certificate_logID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "certificate_logID asc";

    function __construct() {
        parent::__construct();
    }

    function get_certificate_logs($array=NULL, $signal=FALSE) {
        $query = parent::get($array, $signal);
        return $query;
    }

    function get_single_certificate_logs($array) {
        $query = parent::get_single($array);
        return $query;
    }

    function get_order_by_certificate_logs($array=NULL) {
        $query = parent::get_order_by($array);
        return $query;
    }

    function insert_certificate_logs($array) {
        $id = parent::insert($array);
        return $id;
    }

    function update_certificate_logs($data, $id = NULL) {
        parent::update($data, $id);
        return $id;
    }

    public function delete_certificate_logs($id){
        parent::delete($id);
    }
    

    public function insert_batch_certificate_logs($array) {
        $id = parent::insert_batch($array);
        return $id;
    }

    public function update_certificate_logs_by_array($data, $array = NULL) {
        $this->db->set($data);
        $this->db->where($array);
        $this->db->update($this->_table_name);
    }
}
