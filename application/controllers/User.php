<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','user']);
       $this->load->library(['form_validation','session']);
       $this->load->model('common_model');
       isUserLogin();
    }
  
    public function login(){
        
        
        
          if($this->input->server('REQUEST_METHOD')=="POST"){
              
           
            $this->form_validation->set_rules('mobile', 'Mobile', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == TRUE){
               
                $data = $this->common_model->GetRow('users',['mobile'=>$this->input->post('mobile')]);
              
                if($data){
               
                    if(md5($this->input->post('password')) == $data->password){
                       if($data->user_type == 'CUSTOMER' ){
                      
                        $Userdata=[];
                        
                        $Userdata= array(
                          'user_id'  => $data->id,
                          'mobile'     => $data->mobile,
                          '__usertoken'=>"$2y$10dqB6vI0coniNPLuz",
                          'name' => $data->name
                      );
                        $this->session->set_userdata($Userdata);
                         $this->session->set_flashdata('success', 'Login Successfully');
                        redirect('home');
                       }else{
                        $this->session->set_flashdata('error', 'Invalid User');
                          redirect('login');
                      
                       }
                       
                    }else{

                        $this->session->set_flashdata('error', 'Invalid Password');
                          redirect('login');
                       
                    }
                }else{
                     $this->session->set_flashdata('error', 'Invalid Mobile number');
                       redirect('login');
                }
            }
        }

        
        $data['content']="login";
        $this->load->view('web_template',$data);
    }

    public function register(){
        
        
        
          $this->load->model('common_model');

       if($this->input->server('REQUEST_METHOD')=='POST'){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');


        if($this->form_validation->run() !== FALSE){
            
            if(!empty($this->input->post('referral_code'))){
                
             $users = $this->common_model->GetRow('users',array('referral_code'=>$this->input->post('referral_code')));
            $saverow['parent_id'] = $users->id;   
            
            }
            $saverow['name'] = $this->input->post('name');
            $saverow['mobile'] = $this->input->post('mobile');
            $saverow['user_name'] = $this->input->post('user_name');
            $saverow['password'] = md5($this->input->post('password'));
            $saverow['user_type'] = 'CUSTOMER';
      
             $this->db->insert('users', $saverow);
             $insertId = $this->db->insert_id();
           // $save = $this->common_model->InsertData('users',$saverow);
           if($insertId){
                $set['referral_code'] = 'MT00'.$insertId;
                $update = $this->common_model->UpdateData('users',$set,array('id'=>$insertId)); 
                
            $this->session->set_flashdata('success', 'User Registered Successfully');
               redirect('login');
            
           }
         
          }
         }
         
        if(!empty($this->input->get('referral_code'))){
            $data['referral_code'] = $this->input->get('referral_code');
            }
        
        $data['content']="register";
        $this->load->view('web_template',$data);
    }
    
    public function profile(){
     $user = $this->session->userdata('user_id');
       if(isset($user)){
        $data['row'] = $this->common_model->GetRow('users',array('id'=>( $user )));
       }
    if($this->input->server('REQUEST_METHOD')=='POST'){
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
       
    }
     if($this->form_validation->run() !== FALSE){
            $saverow['name'] = $this->input->post('name');
            $saverow['user_name'] = $this->input->post('user_name');
            $saverow['mobile'] = $this->input->post('mobile');
           
            
            if( $user ){
                $update = $this->common_model->UpdateData('users',$saverow,array('id'=> $user )); 
           
        
             if($update){
               $this->session->set_flashdata('success', 'profile updated sucessfully');
             
            }
            }
     }   
            if(!empty( $user )){
             $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=> $user ), array('receiver_id'=> $user ));
             }
        $data['content']="profile"; 
        $this->load->view('web_template',$data);
        
    }
    public function changepassword(){
      $user = $this->session->userdata('user_id');
           if(isset( $user )){
            $data['row'] = $this->common_model->GetRow('users',array('id'=> $user ));
           }
            if($this->input->server('REQUEST_METHOD')=='POST'){
            $this->form_validation->set_rules('password', 'password', 'required');
              }
         
            if($this->form_validation->run() !== FALSE){
             
              $saverow['password']=  md5($this->input->post('password'));
           
           
            if( $user ){
                $update = $this->common_model->UpdateData('users',$saverow,array('id'=> $user )); 
           
             if($update){
               $this->session->set_flashdata('success', 'password updated sucessfully');
             
            }else{
                 $this->session->set_flashdata('failed', 'Your password not updated');
            }
            }
            }
         $data['content']="profile";
         $this->load->view('web_template',$data);
   
    
         }    
  
    
    public function check_phone()
	{
		
		$mobile = $_REQUEST["mobile"];
        $data['mobile']=$mobile;
	    $find= $this->common_model->GetRow('users',array('mobile'=>$mobile ));

		if($find){
	
			$valid = "false";
			
		}else{
		
		    $valid = "true";
		
		}
	      echo $valid;
		
	}
	
	 public function logout(){
   
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('__usertoken');
        $this->session->unset_userdata('mobile');
        $this->session->sess_destroy();
        redirect('login');
    }
    public function forgotpassword(){
        
         if($this->input->server('REQUEST_METHOD')=='POST'){
             $mobile = $this->input->post('mobile'); 
             $find= $this->common_model->GetRow('users',array('mobile'=>$mobile ));
             if($find){
                     redirect(base_url().'user/resetpassword/'. $find->id);   
                 
             }else{
                  $this->session->set_flashdata('failed','Mobile Number Incorrect!');
             }

         }
         $data['content']="forgotpassword";
         $this->load->view('web_template',$data);
    }
    public function resetpassword($id){
        
         if($this->input->server('REQUEST_METHOD')=='POST'){
             
           
           $saverow['password'] =  md5($this->input->post('password'));
         
           if($newpass == $confirmpass){
            $update = $this->common_model->UpdateData('users', $saverow,array('id'=> $id)); 
            if($update){
                
                 $this->session->set_flashdata('success','Password Updated sucessfully');
                 redirect('login');
            }else{
                
            }
    
           }
             
         }
         $data['content']="changepassword";
         $this->load->view('web_template',$data);
    }
    
      public function profile_upload() { 
        $user = $this->session->userdata('user_id');
         $users =$this->common_model->GetRow('users',['id'=> $user ]);  
         $config['upload_path']   = './uploads/profile'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['encrypt_name'] = TRUE;
        //  $config['max_size']      = 100; 
        //  $config['max_width']     = 1024; 
        //  $config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('avatar')) {
            $this->session->set_flashdata('error',$this->upload->display_errors());
             redirect('profile');
         }
			
			
         else
         
         { 
                $uploaddata = $this->upload->data();
                $file_name = $uploaddata['file_name'];
                
                $save['profile']= $file_name; 
                
                $update = $this->common_model->UpdateData('users',$save,array('id'=>$user)); 
              if($update){
                   if($users->profile!=="default.png"){
                        unlink('uploads/profile/'.$users->profile);
                  }
                    $this->session->set_flashdata('success','Profile Updated sucessfully');
                     redirect('profile');
              }
            
         } 
      }
        
    }

  
