<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usermeta_m extends MY_Model {

    protected $_table_name = 'usermeta';
    protected $_primary_key = 'usermetaID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "usermetaID desc";

    function __construct() {
        parent::__construct();
    }

    function get_usermeta($array=NULL, $signal=FALSE) {
        $query = parent::get($array, $signal);
        return $query;
    }

    function get_single_usermeta($array) {
        $query = parent::get_single($array);
        return $query;
    }

    function get_order_by_usermeta($array=NULL) {
        $query = parent::get_order_by($array);
        return $query;
    }

    function insert_usermeta($array) {
        $id = parent::insert($array);
        return $id;
    }

    function update_usermeta($data, $id = NULL) {
        parent::update($data, $id);
        return $id;
    }

    public function delete_usermeta($id){
        parent::delete($id);
    }
}
