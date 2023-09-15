<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
        'title' => "Category E-Learning",
        'category' => $this->Category_model->get_category(),
     );
		 $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/category',$data);
     $this->load->view('template_admin/footer');
  }

  public function add()
  {
    $data = array(
        'title' => "Add Category E-Learning",
     );
     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/add_category');
     $this->load->view('template_admin/footer');
  }

  public function insert()
  {
    $data = array(
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
      'deleted_at' => NULL
    );
    $this->db->insert('1_category',$data);
    return redirect(base_url('admin/category'));
  }

  public function edit($id){
    $result = $this->db->select('a.id,a.name, a.description')
                      ->where([
                        'a.id' => $id,
                        'a.deleted_at' => null,
                    ])->get('1_category' . ' a', 1)->row();

      $data = array(
            'row' => $result,
            'title' => 'Edit Category E-Learning' 
      );
     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/edit_category',$data);
     $this->load->view('template_admin/footer');
  }

  public function update(){
    $id = $this->input->post('id');
    $data = array(
                      'name' => $this->input->post('name'),
                      'description'=>$this->input->post('description'),
                      'updated_at' => date('Y-m-d H:i:s'),
                  );
    $this->db->where('id',$id);
    $this->db->update('1_category',$data);

    return redirect(base_url('admin/category'));

  }

  public function delete($id){
    $data = array(
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                  );
    $this->db->where('id',$id);
    $this->db->update('1_category',$data);

    return redirect(base_url('admin/category'));

  }
}

