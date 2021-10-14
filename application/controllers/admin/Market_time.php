<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Market_time extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
  
    public function index(){
       $data=[];
       $data['script']="market_time/script"; 
    
       $data['content']="market_time/index";
    
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
             $orderkey='market_id';
             $ordervalue=$order[0]['dir'];
         }

         $data['draw']=$this->input->post('draw');
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
       $data['count']=$this->admin_model->CountMarketTimeList($keyword);
    
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->MarketTimeList(10,$offset,$keyword,$orderkey,$ordervalue);
    
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             //print_r($data['aaData']);
         response($data);
     }


    }


    public function edit($user_id = null){
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
       // print_r(date("H:i", strtotime($this->input->post('open_time')))); die;
        $this->form_validation->set_rules('market_id', 'Market Name', 'required');
        $this->form_validation->set_rules('open_time', 'Open Tme', 'required');
        $this->form_validation->set_rules('close_time', 'Close Time', 'required');

        if($this->form_validation->run() !== FALSE){
            $saverow['market_id'] = $this->input->post('market_id');
            $saverow['open_time'] = $this->input->post('open_time');
            $saverow['close_time'] = $this->input->post('close_time');
            $saverow['sort_time'] = date("H:i", strtotime($this->input->post('open_time')));
            $saverow['sort_close_time'] = date("H:i", strtotime($this->input->post('close_time')));
        
        if($user_id == null){
            $save = $this->common_model->InsertData('market_time',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/market_time');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('market_time',$saverow,array('time_id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/market_time');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('market_time',array('time_id'=>$user_id));
       }
      $data['market_data'] = $this->common_model->GetResult('market1');
      $data['content']="market_time/edit";
      $this->load->view('admin_template',$data);
    }

    
}