<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
   public function __construct() {
        parent::__construct();
       $this->load->helper(['form','url','admin']);
    //    $this->load->library(['form_validation','session']);
    $this->load->model('common_model');
        isAdminLogin();
    }


     public function index(){
        
          $data['count_user']=$this->common_model->CountResults('users',['user_type'=>'CUSTOMER']);
          $data['count_market_type']=$this->common_model->CountResults('market_type_rate');
          $data['all_user_wallet_balance']=GetAllUserWalletBalance();
          $data['all_request_money']=$this->common_model->GetRow('money_request',array('status'=>'PENDING'),'SUM(amount) as amount');
          
          
          $data['content']="dashboard/index";
          $this->load->view('admin_template',$data);
        }


     public function statistics(){
          $this->load->model('admin_model');
          $from_date = $this->input->post('from_Date');
          $to_date = $this->input->post('to_Date');
          $data=$this->admin_model->statistics($from_date,$to_date);
  
          echo json_encode($data); 
        
        
    }
    
}