<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

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
    $this->load->library('pagination');
     //konfigurasi pagination
    $config['base_url'] = site_url('admin/course/index'); //site url
    $config['total_rows'] = $this->db->count_all('1_course'); //total row
    $config['per_page'] = 2;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);


    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    $data = array(
        'title' => "Course E-Learning",
        'course' => $this->Course_model->get_course($config["per_page"], $data['page']),
        'pagination' => $this->pagination->create_links()
        
     );

		 $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/course',$data);
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

