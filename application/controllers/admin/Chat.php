<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat extends CI_Controller {
   public function __construct() {
        parent::__construct();
     
       $this->load->helper(['form','url','admin']);
        $this->load->library(['form_validation','session']);
       // $this->load->model('admin_model','common_model');
        isAdminLogin();
    }
 public function index(){
     
       $this->load->model('common_model');
       $data=[];
     
       $data['content']="chat/index";
       $data['user_list']=$this->common_model->getallchatuser('chat',array('receiver_id'=>'1')); 
       $this->load->view('admin_template',$data);
    }
    
    public function getall(){
        //print_r(1); die;
       $this->load->model('common_model');
     
        $data=$this->common_model->getallchatuser('chat',array('receiver_id'=>'1')); 
        
        // $arr = array();
        $i=1;
        foreach($data as $d){
            
               
                echo  "<div class='msg online' onClick='conv(".$d->sender_id.")'>";
                echo  "<div class='msg-detail'>";
                echo   "<div class='msg-username'>".$d->name."</div>";
                if($d->unread ==0){
                    echo   "<span class='badge messagebadge'></span>";
                }else{
                    echo   "<span class='badge messagebadge'>".$d->unread."</span>";
                }
                
                echo   "<div class='msg-content'>";
                echo   "</div>";
                echo    "</div>";
                echo    "</div>";
					  $i++;
        }
   
   
    }
    
    public function detail_conversation(){
          $this->load->model('common_model');
          $sender_id = $this->input->post('sender_id');
          $chat_data = $this->common_model->detail_conversation('chat', $sender_id, '1');
          $update = $this->common_model->UpdateData('chat',['is_read'=>'1'], array('sender_id'=>$sender_id));
          
           foreach($chat_data as $d){
               if($d->sender_id == '1'){
                    echo "<div class='chat-msg owner'>";
               }else{
                    echo "<div class='chat-msg'>";
               }
               
                echo "<div class='chat-msg-profile'>";
                echo  "<div class='chat-msg-date'></div>";
                echo  "</div>";
                echo  "<div class='chat-msg-content'>";
                echo   "<div class='chat-msg-text'>".$d->msg."</div>";
                echo "</div>";
                echo "</div>";
       
           }
    }
    
    public function send(){
          $this->load->model('common_model');
         $arr['msg'] = $this->input->post('message');
        $arr['sender_id'] = '1';
        $arr['receiver_id'] = $this->input->post('receiver_id');
        $arr['date'] = date('Y-m-d H:i:s');
        
         $this->db->insert('chat', $arr);
         $insertId = $this->db->insert_id();
         
      $data = $this->common_model->GetRow('chat',array('chat_id'=>$insertId ));
        $arr['message'] = $data->msg;
        $arr['sender_id'] = $data->sender_id;
        $arr['receiver_id'] = $data->receiver_id;
        $arr['success'] = true;
        echo json_encode($arr);
    }
       
}