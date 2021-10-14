<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
 public function index(){
    //  print_r(1); die;
       $data=[];
       $data['script']="employee/script"; 
    
       $data['content']="employee/index";
    
      $this->load->view('admin_template',$data);
    }
    
    
     public function list(){
         
        $this->load->model('admin_model');
        if($this->input->server('REQUEST_METHOD')=='POST'){
      
         $offset = $this->input->post('start');
         $keyword = $this->input->post('search')['value'];
         $order = $this->input->post('order');
         $orderkey="";
         $ordervalue="";
         if($order[0]['column']=='1'){
             $orderkey='name';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='2'){
             $orderkey='mobile';
             $ordervalue=$order[0]['dir'];
         }elseif($order[0]['column']=='3'){
             $orderkey='status';
             $ordervalue=$order[0]['dir'];
         }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
         $data['count']=$this->admin_model->CountEmployeeList($keyword);
   
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->EmployeeList(10,$offset,$keyword,$orderkey,$ordervalue);
         
         response($data);
     }


    }
    
        public function edit($user_id = null){
            
            
              $this->load->model('common_model');
        
              if($this->input->server('REQUEST_METHOD')=='POST'){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
                $this->form_validation->set_rules('user_name', 'Employee Name', 'required');
                if($user_id ==null){
                    $this->form_validation->set_rules('password', 'password', 'required');
                }
     

        if($this->form_validation->run() !== FALSE){
            $saverow['name'] = $this->input->post('name');
            $saverow['mobile'] = $this->input->post('mobile');
            $saverow['user_name'] = $this->input->post('user_name');
            $saverow['password'] = md5($this->input->post('password'));
            $saverow['user_type'] = 'EMPLOYEE';
      
          
        
        if($user_id == null){
            $save = $this->common_model->InsertData('users',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/employee');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('users',$saverow,array('id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/employee');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('users',array('id'=>$user_id));
       }
    
      $data['content']="employee/edit";
      $this->load->view('admin_template',$data);
    }
    
    
}