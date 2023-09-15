<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    function __construct(){
            parent::__construct();
            //load our second db and put in $db2
    }

    public function get_course($limit, $start){
        $result = $this->db->select('a.id, a.name, a.category_id, a.status, a.content, a.description, a.description, a.created_at')->join('1_course_file as b', 'b.id_course=a.id')->where(['a.deleted_at' => null])->get('1_course as a',$limit, $start);
        $data = $result->result();

        return $data;
    }
}

/* End of file Users_model.php */
