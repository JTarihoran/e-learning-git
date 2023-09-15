<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    if ($this->session->userdata('logged_in') != true && $this->session->userdata('logged_in')['level'] == 1 || $this->session->userdata('logged_in')['level'] == 2 || $this->session->userdata('logged_in')['level'] == 3) {
      redirect(base_url('auth'));
    }
  }

  public function index()
  {
     $data = array(
        'title' => "Course E-Learning"
     );
     $this->load->view('template_user/header',$data);
     $this->load->view('template_user/sidebar');
     $this->load->view('course/dashboard',$data);
     $this->load->view('template_user/footer');
  }

}

