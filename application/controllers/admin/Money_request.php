<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Money_request extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
  
    public function index(){
       $data=[];
       $data['script']="money_request/script"; 
    
       $data['content']="money_request/index";
    
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
             $orderkey='user_id';
             $ordervalue=$order[0]['dir'];
         }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
       $data['count']=$this->admin_model->CountMoneyRequestList($keyword);
      // print_r($this->db->last_query()); die;
    
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->MoneyRequestList(10,$offset,$keyword,$orderkey,$ordervalue);
    // print_r($this->db->last_query()); die;
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
            // print_r($data['aaData']); die;
         response($data);
     }


    }
    
      public function status(){
        $this->load->model('common_model');
        if($this->input->server('REQUEST_METHOD')=='POST'){
        
            $id =$this->input->post('id');
             $amount =$this->input->post('amount');
      
            $response=['status'=>'fail','message'=>"Failure"];
            if($id){
                if($this->common_model->UpdateWhereIn('money_request',['status'=>$this->input->post('status')],'id',$id)){
                          
                         $save_w['user_id'] =  $this->input->post('user_id');
                         $save_w['amount'] = $amount;
                         $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                         
                       
                    if($this->input->post('status') == 'COMPLETED'){
                      
                         $save_w['txn_type'] = 'OUT';
                         $save_w['comment'] = 'Money transfer from wallet into account by Admin';
                         $save_w['txn_by'] = 1;
                         $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                          
                    }else{
                         
                          $save_w['txn_type'] = 'IN';
                          $save_w['comment'] = 'Money transfer into wallet by Admin';
                          $save_w['txn_by'] = 1;
                          $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                    }
                   
                    
                    $message =  get_alert_tpl('Status Updated Successfully');
                    $this->session->set_flashdata('alert',$message);
                    
                    $response=['status'=>'success','message'=>"Success"];
                }
            }
            return response($response);
        }
    }


  

    
}