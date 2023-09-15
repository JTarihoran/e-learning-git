<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    function __construct(){
            parent::__construct();
            //load our second db and put in $db2
    }

    public function get_category(){
        $result = $this->db->select('a.id, a.name, a.description, a.created_at')->where(['a.deleted_at' => null])->get('1_category as a');
        $data = $result->result();

        return $data;
    }
}

/* End of file Users_model.php */
