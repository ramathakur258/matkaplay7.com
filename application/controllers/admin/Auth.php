<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','admin']);
       $this->load->library(['form_validation','session']);
       $this->load->model('common_model');
      //  isAdminLogin();
    }
  
    public function index(){

        if($this->input->server('REQUEST_METHOD')=="POST"){
              
           
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == TRUE){
               
                $data = $this->common_model->GetRow('users',['mobile'=>$this->input->post('mobile')]);
              
                if($data){
               
                    if(md5($this->input->post('password')) == $data->password){
                       if($data->user_type == 'ADMIN' || $data->user_type == 'EMPLOYEE' ){
                        
                        $adminData=[];
                        $adminData['admin_id']=$data->id;
                        $adminData['mobile']=$data->mobile;
                        $adminData['__admintoken']="$2y$10dqB6vI0coniNPLuz";
                        $adminData['name']=$data->name;
                         $adminData['user_type']=$data->user_type;
                        $this->session->set_userdata($adminData);
                        
                        if($data->user_type == 'ADMIN'){
                        redirect_admin('dashboard');
                        }else{
                            redirect_admin('result');
                        }
                       }else{
                        $this->session->set_flashdata('password_error','Invalid user');
                       }
                       
                    }else{
                       
                        $this->session->set_flashdata('password_error','Invalid Password');
                    }
                }else{
                    $this->session->set_flashdata('email_error','Invalid Email Address');
                }
            }
        }

        
        $this->load->view('admin/login/index');
    }

    public function logout(){
      
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('__admintoken');
        $this->session->unset_userdata('mobile');
          $this->session->unset_userdata('name');
        redirect_admin('auth/index');
    }
}