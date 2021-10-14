<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    
    
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
        $this->db->query("SET time_zone='+5:30'");
       // $this->load->model('admin_model','common_model');
       isAdminLogin();
    }
  
    public function index(){
       $data=[];
       $data['script']="users/script"; 
    
       $data['content']="users/index";
    
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
       
       $data['count']=$this->admin_model->CountUserList($keyword);
   
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->UserList(10,$offset,$keyword,$orderkey,$ordervalue);

          for($i=0; $i<count($data['aaData']); $i++){
              $data['aaData'][$i]->wallet_balanace= GetWalletBalance($data['aaData'][$i]->id);
              $data['aaData'][$i]->bonus_balance= GetBonusBalance($data['aaData'][$i]->id);
          }
       
        // print_r( $data['aaData']); die;
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             //print_r($data['aaData']);
         response($data);
     }


    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
      

        if($user_id ==null){
            $this->form_validation->set_rules('password', 'password', 'required');
        }
 

        if($this->form_validation->run() !== FALSE){
            $saverow['name'] = $this->input->post('name');
            $saverow['mobile'] = $this->input->post('mobile');
            $saverow['user_name'] = $this->input->post('user_name');
            $saverow['password'] = md5($this->input->post('password'));
            $saverow['user_type'] = 'CUSTOMER';
      
          
        
        if($user_id == null){
            $save = $this->common_model->InsertData('users',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/users');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('users',$saverow,array('id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/users');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('users',array('id'=>$user_id));
       }
    
      $data['content']="users/edit";
      $this->load->view('admin_template',$data);
    }

    public function status(){
        $this->load->model('common_model');
        if($this->input->server('REQUEST_METHOD')=='POST'){
        
            $id =$this->input->post('id');
        
            $response=['status'=>'fail','message'=>"Failure"];
            if($id){
                if($this->common_model->UpdateWhereIn('users',['status'=>$this->input->post('status')],'id',$id)){
                    $message =  get_alert_tpl('Status Updated Successfully');
                    $this->session->set_flashdata('alert',$message);
                   
                    // $this->session->set_flashdata('message','Status Updated Successfully');
                    // $this->session->set_flashdata('msg_type','success');
                    $response=['status'=>'success','message'=>"Success"];
                }
            }
            return response($response);
        }
    }
    
    public function add_money($user_id = null){
     
        $this->load->model('common_model');
      
        if($this->input->server('REQUEST_METHOD')=='POST'){
        
          $this->form_validation->set_rules('amount', 'Amount', 'required|numeric');

          if($this->form_validation->run() !== FALSE){
               if($this->input->post('optradio') == 'substract'){
                   
                       if(!empty($this->input->post('bonus_amount'))){
                           
                            $message =  get_alert_tpl('Bonus Amount cannot be subtracted','success');
                            $this->session->set_flashdata('alert',$message);
                            redirect('admin/users'); 
                       }
                   
                   if(GetWalletBalance($user_id) < $this->input->post('amount')){
                       
                        $message =  get_alert_tpl('Wallet balance is low');
                        $this->session->set_flashdata('alert',$message);
                        redirect('admin/users'); 
                        
                   }else{
                       
                          $saverow1['amount'] = $this->input->post('amount');
                          $saverow1['user_id'] =$user_id;
                          $saverow1['txn_id'] = date("dmyhis").rand(100,999);
                          $saverow1['txn_type'] = 'OUT';
                          $saverow1['comment'] = 'Money reduce by Admin';
                          $saverow1['txn_by'] = 1;
                        
                          $sub = $this->common_model->InsertData('wallet',$saverow1);
                          
                          if($sub){
                              $message =  get_alert_tpl('Amount reduced Successfully');
                              $this->session->set_flashdata('alert',$message);
                              redirect('admin/users'); 
                          }
                  
                        
                   }
                 
             
                   
               }else{
                   
                   if(!empty($this->input->post('bonus_amount'))){
                       
                          $savebonus['bonus_amount'] = $this->input->post('bonus_amount');
                          $savebonus['user_id'] =$user_id;
                          $savebonus['txn_id'] = date("dmyhis").rand(100,999);
                          $savebonus['txn_type'] = 'IN';
                          $savebonus['comment'] = 'Money Added by Admin';
                         
                    
                      $save = $this->common_model->InsertData('bonus',$savebonus);
                   }
                   
                  $saverow['amount'] = $this->input->post('amount');
                  $saverow['user_id'] =$user_id;
                  $saverow['txn_id'] = date("dmyhis").rand(100,999);
                  $saverow['txn_type'] = 'IN';
                  $saverow['comment'] = 'Money Added by Admin';
                  $saverow['txn_by'] = 1;
            
              $save = $this->common_model->InsertData('wallet',$saverow);
              
              if($save){
                  
              $get_user = $this->common_model->GetRow('users',['id'=>$user_id]); 
              }       
              if($get_user->parent_id == null){
               
                    $message =  get_alert_tpl('Money Added Successfully to Users wallet');
                    $this->session->set_flashdata('alert',$message);
                    redirect('admin/users');
              } 

           else{

                  $savebonus['bonus_amount'] = intval($this->input->post('amount')) * 0.1;
                  $savebonus['user_id'] =$get_user->parent_id;
                  $savebonus['txn_id'] = date("dmyhis").rand(100,999);
                  $savebonus['txn_type'] = 'IN';
                  $savebonus['comment'] = 'Money earned on referral';
                
                  $save_p = $this->common_model->InsertData('bonus',$savebonus);
                      if($save_p){
                         
                          $set_p['parent_id']=null;
                          $update = $this->common_model->UpdateData('users',$set_p,array('id'=>$user_id));
                         
                             if($update){
                               
                                    $message = get_alert_tpl('Money Added Successfully to Users wallet');
                                    $this->session->set_flashdata('alert',$message);
                                    redirect('admin/users');
                             }
                      }
                }   
               }
 
          }
      }
        
      
      
        $data['content']="users/add_money";
        $this->load->view('admin_template',$data);
      }
      
      
      public function user_history($user_id = null){
            $this->load->model('admin_model');
               if($this->input->server('REQUEST_METHOD')=='POST'){
       
                   $data['records']=$this->admin_model->user_history($user_id);
                    echo json_encode($data);
                  }
                    $data=[];
                    $data['records']=$this->admin_model->user_history($user_id);
                   // echo "<pre>";
                   // print_r($this->db->last_query()); die;
                    $data['script']="users/user_history_script";
                    $data['content']="users/user_history_index";
                    $this->load->view('admin_template',$data);
        
      }
      
      
      
      
}