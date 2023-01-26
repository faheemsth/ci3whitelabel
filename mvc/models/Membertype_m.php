<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membertype_m extends MY_Model {

    protected $_table_name = 'membertype';
    protected $_primary_key = 'membertypeID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "membertype asc";

    function __construct() {
        parent::__construct();
    }

    function get_membertype($array=NULL, $signal=FALSE) {
        $query = parent::get($array, $signal);
        return $query;
    }

    function get_single_membertype($array) {
        $query = parent::get_single($array);
        return $query;
    }

    function get_order_by_membertype($array=NULL) {
        $query = parent::get_order_by($array);
        return $query;
    }

    function insert_membertype($array) {
        $id = parent::insert($array);
        return $id;
    }

    function update_membertype($data, $id = NULL) {
        parent::update($data, $id);
        return $id;
    }

    public function delete_membertype($id){
        parent::delete($id);
    }
    

    public function insert_batch_membertype($array) {
        $id = parent::insert_batch($array);
        return $id;
    }

    public function update_membertype_by_array($data, $array = NULL) {
        $this->db->set($data);
        $this->db->where($array);
        $this->db->update($this->_table_name);
    }
}
