<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notice_board extends CI_Controller {
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
       $data['script']="notice_board/script"; 
    
       $data['content']="notice_board/index";
    
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
       
         $data['count']=$this->admin_model->CountNoticeList($keyword);
   
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->NoticeList(10,$offset,$keyword,$orderkey,$ordervalue);
         
         response($data);
     }


    }
    
        public function edit($user_id = null){
            
            
              $this->load->model('common_model');
        
              if($this->input->server('REQUEST_METHOD')=='POST'){
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                $this->form_validation->set_rules('date', 'Date', 'required');
               
     

        if($this->form_validation->run() !== FALSE){
            $saverow['title'] = $this->input->post('title');
            $saverow['description'] = $this->input->post('description');
            $saverow['date'] = $this->input->post('date');
            
        if($user_id == null){
            $save = $this->common_model->InsertData('notice_board',$saverow);
           if($save){
            $message =  get_alert_tpl('Data Saved Successfully');
               $this->session->set_flashdata('alert',$message);
               redirect('admin/notice_board');
            
           }
        }
        else{
          
            $update = $this->common_model->UpdateData('notice_board',$saverow,array('notice_id'=>$user_id));
           
            if($update){
              //  $this->session->set_flashdata('message', 'success');
                 $message =  get_alert_tpl('Data updated Successfully');
                $this->session->set_flashdata('alert',$message);
                redirect('admin/notice_board');
             
            }
        }
           
        }
    }
      
    $data = [];
    if($user_id !=null){
        $data['row'] = $this->common_model->GetRow('notice_board');
       }
    
      $data['content']="notice_board/edit";
      $this->load->view('admin_template',$data);
    }

}