<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','admin']);
    //    $this->load->library(['form_validation','session']);
       // $this->load->model('common_model');
       // isAdminLogin();
    }
  
    public function edit(){

        $data['content']="form/edit";
        $this->load->view('admin_template',$data);
      
    }

    public function list(){
 
        $data['content']="form/list";
        $this->load->view('admin_template',$data);
    }
}