<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function validate($email, $password)
    {
        $row = $this->db->select('a.id, a.level, a.name,a.email, a.password, a.dept_id as dept, b.dash_a, b.dash_b, b.dash_c, b.dash_d,b.earsip,b.booking_menu')->join('access as b','b.user_id = a.id', 'left')->where(['a.email' => $email, 'a.deleted_at' => null, 'a.active_at !=' => null])->get('auth as a');

    if ($row->num_rows() > 0) {
            $email_m = $row->row()->email;
            $name = $row->row()->name;
            $level = $row->row()->level;
            $password_m = $row->row()->password;
            $id = $row->row()->id;
            $dept = $row->row()->dept;

            if ($email == $email_m) {
                if (($password == $password_m)) {

                        $sesdata = array(
                                'logged_in' => TRUE,
                                'level' => $level,
                                'name' => $name,
                                'email' => $email,
                                'dept' => $dept,
                                'id' => $id,
                                'pass' => $password_m
                            );
                        
                        $this->session->set_userdata('logged_in', $sesdata);   
                        
                        switch ($dept) {
                            case 8:
                                redirect(base_url('admin/dashboard'), 'refresh');
                                break;

                            default:
                                redirect(base_url('welcome'), 'refresh');
                                break;  
                        }   
                } else {
                     $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> Kata Sandi Salah.....</div>');
                    // redirect(base_url('auth'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> Email Belum Aktif.....</div>');
                // redirect(base_url('auth'));
            }
        } else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> User Tidak ditemukan..... </div>');
                // redirect(base_url('auth'));
        } 
    }

   public function sess_val($email,$level) {

    $row = $this->db->select('a.id, a.level, a.email, b.helpdesk_menu')->join('access as b','b.user_id=a.id','left')->where(['a.email' => $email, 'a.deleted_at' => null, 'a.active_at !=' => null, 'b.helpdesk_menu' => 1])->get('auth as a');

    if ($row->num_rows() > 0) {
            $email_m = $row->row()->email;
            $level_m = $row->row()->level;

            if ($email_m == $email) {
                if ($level_m == $level) {
                        
                        switch ($level) {
                            case 1:
                                redirect(base_url('helpdesk/admin/dashboard'), 'refresh');
                                break;
                            case 2:
                                redirect(base_url('helpdesk/admin/dashboard'), 'refresh');
                                break;
                            case 3:
                                redirect(base_url('helpdesk/user/dashboard'), 'refresh');
                                break;


                            default:
                                redirect(base_url('portal/error_access'), 'refresh');
                                break;  
                        }   
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                    redirect(base_url('portal/error_access'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                redirect(base_url('portal/error_access'));
            }
        } else{
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                redirect(base_url('portal/error_access'));
        } 

  }

  public function sess_course($email,$level,$dept) {

    $row = $this->db->select('a.id, a.level, a.email, b.helpdesk_menu')->join('access as b','b.user_id=a.id','left')->where(['a.email' => $email, 'a.deleted_at' => null, 'a.active_at !=' => null, 'b.helpdesk_menu' => 1])->get('auth as a');

    if ($row->num_rows() > 0) {
            $email_m = $row->row()->email;
            $level_m = $row->row()->level;

            if ($email_m == $email) {
                if ($level_m == $level) {
                        
                        switch ($level) {
                            case 1:
                                redirect(base_url('course/admin/dashboard'), 'refresh');
                                break;
                            case 2:
                                redirect(base_url('course/admin/dashboard'), 'refresh');
                                break;
                            case 3:
                                redirect(base_url('course/user/dashboard'), 'refresh');
                                break;


                            default:
                                redirect(base_url('portal/error_access'), 'refresh');
                                break;  
                        }   
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                    redirect(base_url('portal/error_access'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                redirect(base_url('portal/error_access'));
            }
        } else{
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button> <strong>Session Is Expired !</strong> You should check in on some of those fields below.</div>');
                redirect(base_url('portal/error_access'));
        } 

  }

}

/* End of file Auth_model.php */
