<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Market_type extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
  
    public function index(){
       $data=[];
       $data['script']="market_type/script"; 
    
       $data['content']="market_type/index";
    
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
             $orderkey='market_type_name';
             $ordervalue=$order[0]['dir'];
         }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
       $data['count']=$this->admin_model->CountMarketTypeList($keyword);
    
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->MarketTypeList(10,$offset,$keyword,$orderkey,$ordervalue);
    
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             //print_r($data['aaData']);
         response($data);
     }


    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
           
         
        $this->form_validation->set_rules('market_type_name', 'market_type_name', 'required');
        $this->form_validation->set_rules('min_bid_amount', 'minimum bid amount', 'required|numeric');
        $this->form_validation->set_rules('win_amount', 'winning amount', 'required|numeric');
   
             
 

        if($this->form_validation->run() !== FALSE){
            $saverow['market_type_name'] = strtoupper($this->input->post('market_type_name'));
            $saverow['min_bid_amount'] = $this->input->post('min_bid_amount');
            $saverow['win_amount'] = $this->input->post('win_amount');
            
      
          
        
        if($user_id == null){
            $save = $this->common_model->InsertData('market_type_rate',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/market_type');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('market_type_rate',$saverow,array('id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/market_type');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('market_type_rate',array('id'=>$user_id));
       }
    
      $data['content']="market_type/edit";
      $this->load->view('admin_template',$data);
    }
}