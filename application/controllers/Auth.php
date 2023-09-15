<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function index()
  {
		 redirect('http://localhost/portal-mki-course/auth', 'refresh');
  }

  public function validate()
  {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $this->Auth_model->validate($email, $password);
  }

  public function email_check($email)
  {
    return strpos($email, '@mitrakiaraindonesia.com') !== false;
  }

  public function logout()
  {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('http://localhost/portal-mki-course', 'refresh');
  }

}

