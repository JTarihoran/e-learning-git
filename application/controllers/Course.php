<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    if ($this->session->userdata('logged_in') != true && ($this->session->userdata('logged_in')['level'] != 1 || $this->session->userdata('logged_in')['level'] != 2 || $this->session->userdata('logged_in')['level'] != 3)) {
      redirect(base_url('auth'));
    }
  }

  public function index()
  {
     $data = array(
        'title' => "Dashboard E-Learning",
        'course' => $this->Course_model->get_all_course(),

     );
     $this->load->view('template_user/header',$data);
     $this->load->view('template_user/sidebar');
     $this->load->view('course/dashboard',$data);
     $this->load->view('template_user/footer');
  }

  public function course_detail($id)
  {
    $id_course = decode_id($id);
     $data = array(
        'title' => "Course Detail E-Learning",
        'course' => $this->Course_model->get_detail_course($id_course),

     );
     $this->load->view('template_user/header',$data);
     $this->load->view('template_user/sidebar');
     $this->load->view('course/course_detail',$data);
     $this->load->view('template_user/footer');
  }

  public function course_agree($id)
  {
    $id_course = decode_id($id);
     $data = array(
        'title' => "Course Detail E-Learning",
        'course' => $this->Course_model->get_detail_course($id_course),

     );
     $this->load->view('template_user/header',$data);
     $this->load->view('template_user/sidebar');
     $this->load->view('course/course_agree',$data);
     $this->load->view('template_user/footer');
  }

  public function course_play($id)
  {
      $id_course = decode_id($id);
      $id_user = $this->session->userdata('logged_in')['level'];
      $row = $this->db->select('a.course_id')->where(['a.course_id' => $id_course, 'a.deleted_at' => null])->get('1_result as a');
      
      $ses_course = array(
        'course' => TRUE,
        'id_course' => $id_course,
      );

        $this->session->set_userdata('course', $ses_course);
      
      $s_course = $this->session->userdata('course')['id_course'];

      echo $s_course;

      $this->load->library('pagination');
      //konfigurasi pagination
      $config['base_url'] = base_url('/course/course_play/'.encode_id($id_course)); //site url
      $config['total_rows'] = $this->db->where(['deleted_at' => NULL, 'id_course' => $s_course])->from("1_course_file")->count_all_results();//total row
      echo $config['total_rows'];
      $config['per_page'] = 1;  //show record per halaman
      $config["uri_segment"] = 4;  // uri parameter
      $choice = $config["total_rows"] / $config["per_page"];
      $config["num_links"] = floor($choice);

      // Membuat Style pagination untuk BootStrap v4
      $config['next_link']        = 'Next';
      $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
      $config['full_tag_close']   = '</ul></nav></div>';
      $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
      $config['num_tag_close']    = '</span></li>';
      $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
      $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
      $this->pagination->initialize($config);
      $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;


    if($s_course == $row->num_rows() > 0){
        $raw = array(
          'date_recorded' => date('Y-m-d H:i:s'), 
          'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('course_id', $s_course);
        $this->db->update('1_result', $raw);
    }else{
        $raw1 = array(
          'course_id' => $s_course,
          'user_id' => $id_user,
          'date_recorded' => date('Y-m-d H:i:s'), 
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s'),
          'deleted_at' => NULL
        );
        $this->db->insert('1_result', $raw1);
    }       
    $data = array(
        'title' => "Course E-Learning",
        'course' => $this->Course_model->play_course($s_course, $config["per_page"], $data['page']),
        'quiz' => $this->Course_model->get_courses($id_course),
        'pagination' => $this->pagination->create_links()
    );
    $this->load->view('template_user/header',$data);
    $this->load->view('course/play',$data);
    $this->load->view('template_user/footer');
  }



}

