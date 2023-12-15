<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    function __construct(){
            parent::__construct();
            //load our second db and put in $db2
    }

    public function get_course($limit, $start){
        $result = $this->db->select('a.id, a.name, a.category_id, a.status, a.content, a.description, a.description, a.created_at')->where(['a.deleted_at' => NULL])->get('1_course as a', $limit, $start);
        $data = $result->result();

        return $data;
    }

    public function get_all_course(){
        $result = $this->db->select('a.id, a.name, a.category_id, a.status, a.content, a.description, a.created_at')->where(['a.deleted_at' => NULL, ])->get('1_course as a');
        $data = $result->result();

        return $data;
    }

    public function get_detail_course($id_course){
        $result = $this->db->select('a.id as id_course, a.name as name_course, b.name as name_category, a.status, a.content, a.description, a.created_at')->join('1_category as b', 'a.category_id=b.id', 'left')->where(['a.deleted_at' => NULL, 'a.id' => $id_course])->get('1_course as a');
        $data = $result->row();

        return $data;
    }

    public function play_course($id, $limit, $start){
        $result = $this->db->select('b.id as id_course, b.name as name_course, a.file_path, a.file_name')->join('1_course as b', 'a.id_course=b.id', 'left')->where(['a.deleted_at' => NULL, 'b.id' => $id])->get('1_course_file as a', $limit, $start);
        $data = $result->result();

        return $data;
    }

    public function get_courses($id_course){
        $result = $this->db->select('b.id, b.question, b.correct_answer, b.a ,b.b , b.c, b.d,b.created_at')->join('1_question as b', 'b.id_course=a.id')->where(['a.deleted_at' => NULL, 'b.deleted_at' => NULL, 'b.id_course' => $id_course])->get('1_course as a');
        $data = $result->result();

        return $data;
    }

    public function get_dept(){
        $result = $this->db->select('a.id, a.name')->get('department as a');
        $data = $result->result();

        return $data;
    }

    public function get_category(){
        $result = $this->db->select('a.id, a.name')->get('1_category as a');
        $data = $result->result();

        return $data;
    }

}

/* End of file Users_model.php */
