<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comments extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
       $this->load->library(['form_validation','session']);
       $this->db->query("SET time_zone='+5:30'");
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }

 public function index(){
    // print_r(1); die;
       $data=[];
       $data['script']="comments/script"; 

       $data['content']="comments/index";
           
      $this->load->view('admin_template',$data);
    }
    

     public function list(){
   //print_r(1); die;
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
         }

         $data['draw']=$this->input->post('draw');
      //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
         $data['count']=$this->admin_model->CountCommentList($keyword);
  
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->Commentslist(10,$offset,$keyword,$orderkey,$ordervalue);
         //print_r($data['aaData']); die;
         response($data);
     }


    }
}