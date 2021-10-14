<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deposit_money extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
  
    public function index(){
       $data=[];
       $data['script']="deposit_money/script"; 
    
       $data['content']="deposit_money/index";

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
       
         $data['count']=$this->admin_model->CountDepositeMoneyList($keyword);
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->DepositeMoneyRequest(10,$offset,$keyword,$orderkey,$ordervalue);
         response($data);
     }


    }
    
    public function add_money($user_id = null){
        $this->load->model('common_model');
        $user = $this->common_model->GetRow('deposit_request',['deposit_request_id'=>$user_id]);
        
        if($this->input->server('REQUEST_METHOD') =='POST'){
            
          $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
        
          if($this->form_validation->run() !== FALSE){
              $saverow['amount'] = $this->input->post('amount');
              $saverow['user_id'] =$user->user_id;
              $saverow['txn_id'] = date("dmyhis").rand(100,999);
              $saverow['txn_type'] = 'IN';
              $saverow['comment'] = 'Money Added by Admin';
              $saverow['txn_by'] = 1;
              //print_r($saverow); die;
              $save = $this->common_model->InsertData('wallet',$saverow);
              
              $get_user = $this->common_model->GetRow('users',['id'=>$user->user_id]); 
        
           if($get_user->parent_id == null){
               
                    $set['status']='COMPLETED';
                    $set['deposited_amount']=$this->input->post('amount');
                    $update = $this->common_model->UpdateData('deposit_request',$set,array('deposit_request_id'=>$user_id));
                     if($update){
                       $message =  get_alert_tpl('Money Added Successfully to Users wallet');
                       $this->session->set_flashdata('alert',$message);
                       redirect('admin/deposit_money');
                     }
           }else{
               
                  $savebonus['bonus_amount'] = intval($this->input->post('amount')) * 0.1;
                  $savebonus['user_id'] =$get_user->parent_id;
                  $savebonus['txn_id'] = date("dmyhis").rand(100,999);
                  $savebonus['txn_type'] = 'IN';
                  $savebonus['comment'] = 'Money earned on referral';
                
                  $save_p = $this->common_model->InsertData('bonus',$savebonus);
                 
                  if($save_p){
                     
                      $set_p['parent_id']=null;
                      $set_status['deposited_amount']=$this->input->post('amount');
                      $update = $this->common_model->UpdateData('users',$set_p,array('id'=>$user->user_id));
                      $set_status['status']='COMPLETED';
                      $this->common_model->UpdateData('deposit_request',$set_status,array('deposit_request_id'=>$user_id));
                     if($update){
                          $message =  get_alert_tpl('Money Added Successfully to Users wallet');
                           $this->session->set_flashdata('alert',$message);
                           redirect('admin/deposit_money');
                     }
                  }
           }
              
          }
      }
        
        $data['amount'] = $user->amount;
        $data['content']="deposit_money/add_money";
        $this->load->view('admin_template',$data);
      }

         public function edit($user_id = null){
             
              $this->load->model('common_model');
              $user = $this->common_model->GetRow('deposit_request',['deposit_request_id'=>$user_id]);
              
              if($this->input->server('REQUEST_METHOD')=='POST'){
                 $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');
                  
                  if($this->form_validation->run() !== FALSE){
                      
                       $saverow['amount'] = $this->input->post('amount');
                       $saverow['user_id'] =$user->user_id;
                       $saverow['txn_id'] = date("dmyhis").rand(100,999);
                       $saverow['txn_type'] = 'OUT';
                       $saverow['comment'] = 'Money reduce by admin';
                        $saverow['txn_by'] = 1;
                       $save = $this->common_model->InsertData('wallet',$saverow);
                       
                      //if($user_id == null){
                    //   $save = $this->common_model->InsertData('wallet',$saverow);
                       if($save == TRUE){
                         $message =  get_alert_tpl('Reduce money from user wallet');
                         $this->session->set_flashdata('alert',$message);
                        redirect('admin/deposit_money');
                       }
                      // }
                     // else{
                           
                          //$saverow['reduced_amount']=$this->input->post('amount');
                        //   $saverow['user_id']=$this->input->post('user_id');
                        //   $saverow['name']=$this->input->post('name');
                        //   $saverow['mobile_no']=$this->input->post('mobile_no');

                        //   $saverow['amount']=$this->input->post('amount');
                        //   $saverow['deposited_amount']=$this->input->post('deposited_amount');
                        //   $saverow['reduced_amount']=$this->input->post('reduced_amount');

                    //       $save = $this->common_model->InsertData('deposit_request',$saverow);
                    //      if($save){
                    //      $message =  get_alert_tpl('Reduce money from user wallet');
                    //      $this->session->set_flashdata('alert',$message);
                    //     redirect('admin/deposit_money');
                    //   }
                      }
                          
                        //  $saverow['reduced_amount'] = $this->input->post('amount');
                        //  $save = $this->common_model->InsertData('deposit_request',$saverow);
                        //  $update = $this->common_model->UpdateData('users',$set_p,array('id'=>$user->user_id)); 
                        //  $set_status['status']='COMPLETED';
                        //  $this->common_model->UpdateData('deposit_request',$set_status,array('deposit_request_id'=>$user_id));
                        
                           
                       //}
                     
                  //}
          
              }  
             $data['content']="deposit_money/edit";
             $this->load->view('admin_template',$data);
         }      

         
}