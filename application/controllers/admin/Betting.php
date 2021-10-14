<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Betting extends CI_Controller {
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
       $data['script']="betting/script"; 
    
       $data['content']="betting/index";
    
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
         }
        //   if(!empty($_GET['date'])){
        //       //print_r($_GET);
        //     $date = '2021-06-07';
        // }else{
        //     //$date = date("Y-m-d");
        //      $date = '2021-06-07';
        // }
        if(empty($keyword)){
             $date = date("Y-m-d");
        }else{
            $date = '';
        }
        
         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
         $data['count']=$this->admin_model->CountBettingList($keyword,$date);
   
         $data['recordsFiltered']=$data['count'];
       
       
         $data['aaData']=$this->admin_model->BettingList(10,$offset,$keyword,$orderkey,$ordervalue,$date);
      // print_r($this->db->last_query());
       //   echo "<pre>";
       //   print_r($data['aaData']); die;
         response($data);
     }


    }
    
       
    
    
}