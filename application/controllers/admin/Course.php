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
        $config['base_url'] = base_url('admin/course/index'); //site url
        $config['total_rows'] = $this->db->where('deleted_at',NULL)->from("1_course")->count_all_results();//total row
        $config['per_page'] = 3;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';


    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

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
        'title' => "Add Course E-Learning",
        'dept' => $this->Course_model->get_dept(),
        'category' => $this->Course_model->get_category()
     );
     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/add_course',$data);
     $this->load->view('template_admin/footer');
  }

  public function insert()
  {
      $this->form_validation->set_rules('name','Name Course','required');
      $this->form_validation->set_rules('description','Description','required');
      $this->form_validation->set_rules('status','Status','required');
     
      if($this->form_validation->run() != false){
          $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'dept_id' => $this->input->post('dept_id'),
            'category_id' => $this->input->post('category_id'),
            'status' => $this->input->post('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => NULL
          );
        $this->db->insert('1_course', $data);
        $id = $this->db->insert_id();

        $path = 'uploads/' . date('Y-m-d');
        $result = upload_file('fileUp1', $path, true, 'pdf|jpg', 90);
        $result2 = upload_file('fileUp2', $path, true, 'pdf|jpg', 90);
        $result3 = upload_file('fileUp3', $path, true, 'pdf|jpg', 90);

        // Cek hasil upload
        if (is_array($result)) {
            // Jika berhasil, tampilkan pesan sukses dan data file
            echo "Files uploaded successfully: <br>";
            foreach ($result as $file) {
                $data1 = array(
                  'id_course' => $id,
                  'menu_course' => $this->input->post('menu_course'), // Update with your actual input name
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'deleted_at' => NULL,
                  'file_path' => $file['path'],
                  'file_name' => $file['name']
                );
               $this->db->insert('1_course_file', $data1);
            }
        }

        if (is_array($result2)) {
            // Jika berhasil, tampilkan pesan sukses dan data file
            echo "Files uploaded successfully: <br>";
            foreach ($result2 as $file) {
                $data2 = array(
                  'id_course' => $id,
                  'menu_course' => $this->input->post('menu_course'), // Update with your actual input name
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'deleted_at' => NULL,
                  'file_path' => $file['path'],
                  'file_name' => $file['name']
                );
               $this->db->insert('1_course_file', $data2);
            }
        }

         if (is_array($result3)) {
            // Jika berhasil, tampilkan pesan sukses dan data file
            echo "Files uploaded successfully: <br>";
            foreach ($result3 as $file) {
                $data1 = array(
                  'id_course' => $id,
                  'menu_course' => $this->input->post('menu_course'), // Update with your actual input name
                  'created_at' => date('Y-m-d H:i:s'),
                  'updated_at' => date('Y-m-d H:i:s'),
                  'deleted_at' => NULL,
                  'file_path' => $file['path'],
                  'file_name' => $file['name']
                );
               $this->db->insert('1_course_file', $data1);
            }
        }

         return redirect(base_url('admin/course'));
      }else{
         echo "Error uploading file: " . $result;
        $data = array(
            'title' => "Add Course E-Learning",
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category()
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/add_course',$data);
        $this->load->view('template_admin/footer');
      }
  }


  public function edit($id){
    $id_code = decode_id($id);
    $result = $this->db->select('a.id,a.name as name_course, a.description, a.status, a.dept_id, a.category_id, b.menu_course, c.name as category, d.name as dept')
                      ->join('1_course_file as b', 'a.id=b.id_course', 'left')
                      ->join('1_category as c', 'a.category_id=c.id', 'left')
                      ->join('department as d', 'a.dept_id=d.id', 'left')
                      ->where([
                        'a.id' => $id_code,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row();

      $data = array(
            'row' => $result,
            'title' => 'Edit Category E-Learning',
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category()
      );
     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/edit_course',$data);
     $this->load->view('template_admin/footer');
  }

  public function update(){
   $this->form_validation->set_rules('name','Name Course','required');
      $this->form_validation->set_rules('description','Description','required');
      $this->form_validation->set_rules('status','Status','required');

      $id = $this->input->post('id');
     
      if($this->form_validation->run() != false){
          $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'dept_id' => $this->input->post('dept_id'),
            'category_id' => $this->input->post('category_id'),
            'status' => $this->input->post('status'),
            'updated_at' => date('Y-m-d H:i:s'),
          );
       
        $this->db->where('id',$id);
        $this->db->update('1_course',$data);

         if (!empty($_FILES['fileUp1']['name'])) {
          $upload = upload_file('fileUp1', 'uploads/' . date('Y-m-d'), true, 'pdf|jpg', 20);
          $data1 = [
              'menu_course' =>$this->input->post('menu_course'),
              'updated_at' => date('Y-m-d H:i:s'), 
              'file_path' => $upload['path_min'],
              'file_name' => $upload['name']
          ];
        }else{
           $data1 = [
              'menu_course' =>$this->input->post('menu_course'),
              'updated_at' => date('Y-m-d H:i:s'), 
          ];
        }

        $this->db->where('id_course',$id);
        $this->db->update('1_course_file',$data1);
        return redirect(base_url('admin/course'));
      }else{
        $data = array(
            'title' => "Edit Course E-Learning",
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category()
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/edit_course',$data);
        $this->load->view('template_admin/footer');
      }
  }

  public function delete($id){
    $data = array(
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                  );
    $this->db->where('id',$id);
    $this->db->update('1_course',$data);
      $data = array(
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                  );
     $this->db->where('id_course',$id);
     $this->db->update('1_course_file',$data);  

    return redirect(base_url('admin/course'));

  }

  public function add_quiz($id){
    
      $id_course = decode_id($id);
      $row = $this->db->select('a.name as name_course')
                      ->where([
                        'a.id' => $id_course,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row()->name_course;

      $data = array(
            'id_course' => $id,
            'title' => 'Add Quiz E-Learning',
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category(),
            'id_course' => $id_course,
            'name_course' => $row
      );

     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/add_quiz',$data);
     $this->load->view('template_admin/footer');
  }

  public function insert_quiz()
  {
      $this->form_validation->set_rules('question','Question','required');
      $this->form_validation->set_rules('input_A','Answer A','required');
      $this->form_validation->set_rules('input_B','Answer B','required');
      $this->form_validation->set_rules('input_C','Answer C','required');
      $this->form_validation->set_rules('input_D','Answer D','required');
      $this->form_validation->set_rules('correct_answer','Correct Answer','required');
     
      if($this->form_validation->run() != false){
          $data = array(
            'id_course' => $this->input->post('id_course'),
            'question' => $this->input->post('question'),
            'A' => $this->input->post('input_A'),
            'B' => $this->input->post('input_B'),
            'C' => $this->input->post('input_C'),
            'D' => $this->input->post('input_D'),
            'correct_answer' => $this->input->post('correct_answer'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => NULL
          );
        $this->db->insert('1_question', $data);

        return redirect(base_url('admin/course'));

      }else{
        $data = array(
            'title' => "Add Course E-Learning",
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category()
        );
       $this->load->view('template_admin/header',$data);
       $this->load->view('template_admin/sidebar');
       $this->load->view('admin/add_quiz',$data);
       $this->load->view('template_admin/footer');
      }
  }


  public function bank_quiz($id){
      $id_course = decode_id($id);
      $row = $this->db->select('a.name as name_course')
                      ->where([
                        'a.id' => $id_course,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row()->name_course;

      $data = array(
            'id_course' => $id_course,
            'title' => 'Bank Quiz E-Learning',
            'course' => $this->Course_model->get_courses($id_course),
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category(),
            'name_course' => $row
      );

     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/bank_quiz',$data);
     $this->load->view('template_admin/footer');
  }

   public function edit_quiz($id){
    
      $id_c = decode_id($id);
      $result = $this->db->select('a.id, a.name as name_course, b.question, b.id_course , b.id, b.a, b.b, b.c, b.d, b.correct_answer, b.created_at')
                      ->join('1_question as b','a.id=b.id_course', 'left')
                      ->where([
                        'b.id' => $id_c,
                        'b.deleted_at' => null,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row();

      $data = array(
            'id_course' => $id_c,
            'title' => 'Edit Quiz E-Learning',
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category(),
            'row' => $result
      );

     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/edit_quiz',$data);
     $this->load->view('template_admin/footer');
  }

   public function delete_quiz($id){
     $id_q = decode_id($id);
     $row = $this->db->select('b.id_course')
                      ->join('1_question as b','a.id=b.id_course', 'left')
                      ->where([
                        'a.id' => $id_q,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row()->id_course;

     $data = array(
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                  );
     $this->db->where('id',$id_q);
     $this->db->update('1_question',$data);  

     $data1 = array(
            'id_course' => $id_course,
            'title' => 'Bank Quiz E-Learning',
            'name_course' => $row
      );

     $this->load->view('template_admin/header',$data1);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/bank_quiz',$data1);
     $this->load->view('template_admin/footer');

  }

  public function certificate($id){
      $id_course = decode_id($id);
      $row = $this->db->select('a.id as id_course, a.name as name_course, b.score, b.file_path, b.file_name')
                      ->join('1_cert-score as b', 'a.id=b.id_course', 'left')
                      ->where([
                        'a.id' => $id_course,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row();

      $data = array(
            'id_course' => $id_course,
            'title' => 'Certificate & Score E-Learning',
            'course' => $this->Course_model->get_courses($id_course),
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category(),
            'result' => $row
      );

     $this->load->view('template_admin/header',$data);
     $this->load->view('template_admin/sidebar');
     $this->load->view('admin/certificate',$data);
     $this->load->view('template_admin/footer');
  }

  public function update_cert(){

     $id_course = $this->input->post('id_course');

      $row = $this->db->select('b.id_course')
                      ->join('1_cert-score as b', 'a.id=b.id_course', 'left')
                      ->where([
                        'a.id' => $id_course,
                        'a.deleted_at' => null,
                    ])->get('1_course' . ' a', 1)->row();
      echo $row->id_course;
      echo $id_course;
     
      if($id_course != NULL){
        if ($id_course != $row->id_course) {
          if (!empty($_FILES['certif']['name'])) {

            $upload = upload_certif('certif', 'uploads/certificate/' . date('Y-m-d'), true, 'pdf|jpg|png', 20);
            $data = array(
              'id_course' => $id_course,
              'score' => $this->input->post('score'),
              'file_path' => $upload['path_min'],
              'file_name' => $upload['name'],
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
          }else{
            $data = array(
              'id_course' => $id_course,
              'score' => $this->input->post('score'),
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
          }
          $this->db->insert('1_cert-score',$data);
        }else{
          if (!empty($_FILES['certif']['name'])) {

            $upload = upload_certif('certif', 'uploads/certificate/' . date('Y-m-d'), true, 'pdf|jpg|png', 20);
            $data1 = array(
              'score' => $this->input->post('score'),
              'file_path' => $upload['path_min'],
              'file_name' => $upload['name'],
              'updated_at' => date('Y-m-d H:i:s'),
            );
          }else{
            $data1 = array(
              'score' => $this->input->post('score'),
              'updated_at' => date('Y-m-d H:i:s'),
            );
          }

          $this->db->where('id_course', $id_course);
          $this->db->update('1_cert-score',$data1);
        }

        // return redirect(base_url('admin/course'));
      }else{
        $data = array(
            'title' => "Certificate & Score E-Learning",
            'dept' => $this->Course_model->get_dept(),
            'category' => $this->Course_model->get_category()
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/certificate',$data);
        $this->load->view('template_admin/footer');
      }
  }

}

