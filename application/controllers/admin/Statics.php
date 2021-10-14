<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statics extends CI_Controller {
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
      $data['count_deposit_request']=$this->common_model->CountResults('deposit_request');
      $data['count_money_request']=$this->common_model->CountResults('money_request');
      $data['all_user_wallet_balance']=GetAllUserWalletBalance();
      $data['all_request_money']=$this->common_model->GetRow('money_request',array('status'=>'PENDING'),'SUM(amount) as amount');
      
      
       $data['statics'] = $this->common_model->GetStatics();
      
      $data['content']="dashboard/index";
      $this->load->view('admin_template',$data);
    }
}