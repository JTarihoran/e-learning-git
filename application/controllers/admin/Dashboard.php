<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    if ($this->session->userdata('logged_in') != true && $this->session->userdata('logged_in')['level'] == 1 && $this->session->userdata('logged_in')['dept'] == 8 || $this->session->userdata('logged_in')['level'] == 3) {
      redirect(base_url('auth'));
    }
  }

  public function index()
  {
    $data = array(
        'title' => "Dashboard Admin E-Learning",
     );
		 $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/dashboard',$data);
     $this->load->view('template_admin/footer');
  }

}

