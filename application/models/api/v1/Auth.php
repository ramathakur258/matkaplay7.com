<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();     
        $this->load->helper("api"); 
        $this->load->model("common_model");  
    }
    
     public function Login($request=[],$response=[])
    {
              $user = $this->common_model->GetRow('users',['mobile'=>$request->mobile]);
              
        if($user)
        {
           
            if(md5($request->password) == $user->password)
            {                    
                $access_token = uniqid().md5(time());
                $updatedata=[
                    'access_token'=>$access_token,
                    'device_type'=>$request->device_type,
                ];
                if($this->common_model->UpdateData('users', $updatedata, ['id'=>$user->id] ))
                {
                    $user=$this->common_model->GetRow('users',['id'=>$user->id]); 
                    
                    if($user->status == 'BLOCK'){
                        
                           $response=['code'=>200,'status'=>'fail','message'=>'You are blocked, please contact admin']; 
                    }else{
                        
                         $response = ['code'=>200,'status'=>'success','message'=>'Login Successful','data'=> $user]; 
                    }
                    
                }else{
                   
                    $response=['code'=>200,'status'=>'fail','message'=>'Network Fail'];
                }
            }else{	
            
                $response=['code'=>200,'status'=>'fail','message'=>'Password is Wrong'];
            }            

        }else{
           
            $response=["code"=>200,'status'=>'fail','message'=>'Invalid Mobile Number' ];
        }
          return $response;
    }
    
    
     public function register($request=[],$response=[])
    {
            $saverow['name'] = $request->name;
            $saverow['mobile'] = $request->mobile;
            $saverow['user_name'] = $request->user_name;
            $saverow['password'] = $request->password;
            $saverow['user_type'] = 'CUSTOMER';
           
        $this->form_validation->set_data($saverow);
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');


        if($this->form_validation->run() !== FALSE){
          
            $user = $this->common_model->GetRow('users',['mobile'=>$request->mobile]);
          
          if($user){
                 $response=["code"=>200,'status'=>'fail','message'=>'Mobile already registered' ];  
              }else{
                  
                  if(!empty($request->referral_code)){
                      $u = $this->common_model->GetRow('users',array('referral_code'=>$request->referral_code));
                     $saverow['parent_id'] = $u->id; 
                    
                  }
                  
                    $saverow['password'] = md5($request->password);
                    $this->db->insert('users', $saverow);
                    $insertId = $this->db->insert_id();
                    
               if($insertId){
                  $set['referral_code'] = 'MT00'.$insertId;
                  $update = $this->common_model->UpdateData('users',$set,array('id'=>$insertId)); 
                  $response = ['code'=>200,'status'=>'success','message'=>'Registered Successfully']; 
               }   
                  
          }
            
          }  else{
               $error="Something went Wrong";
               if(form_error('name')){
                    $error=form_error('name');
                }elseif(form_error('mobile')){
                    $error=form_error('mobile');
                }elseif(form_error('user_name')){
                    $error=form_error('user_name');
                }elseif(form_error('password')){
                    $error=form_error('password');
                }
          
             $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ];  
          }
          
          return $response;
    }
    
      public function forgot_password($request=[],$response=[])
    {
            $user = $this->common_model->GetRow('users',['mobile'=>$request->mobile]);
            
            if($user){
               $response=["code"=>200,'status'=>'success','message'=>'User found','data'=> $user ];    
            }else{
                $response=["code"=>200,'status'=>'fail','message'=>'Mobile not registered' ];   
            }
              return $response;
    }
     public function reset_password($request=[],$response=[])
    {
         
          
           $saverow['password'] = $request->password;
           
        $this->form_validation->set_data($saverow);
        $this->form_validation->set_rules('password', 'password', 'required');
         
          if($this->form_validation->run() !== FALSE){
              
           $saverow['password'] = md5($request->password);
            $update =  $this->common_model->UpdateData('users', $saverow, ['id'=>$request->id] );
            
            if($update){
                 $response = ['code'=>200,'status'=>'success','message'=>'Password reset Successfully']; 
            }else{
                 $response = ['code'=>200,'status'=>'fail','message'=>'Failed to reset password']; 
            }
          }else{
               $error="Something went Wrong";
               if(form_error('password')){
                    $error=form_error('password');
                }
          
             $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ];   
          }
        
              return $response;
    }
    
    public function edit_profile($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
          
              $saverow['name'] = $request->name;
            $saverow['mobile'] = $request->mobile;
            $saverow['user_name'] = $request->user_name;
          
           
            $this->form_validation->set_data($saverow);
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric|min_length[10])');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');
      


        if($this->form_validation->run() !== FALSE){
          
          $update =  $this->common_model->UpdateData('users', $saverow, ['id'=>$request->id] );
          
          if($update){
                   $response = ['code'=>200,'status'=>'success','message'=>'Profile Updated Successfully'];  
              }else{
                  
                  $response = ['code'=>200,'status'=>'fail','message'=>'Failed to update profile']; 
                }
            
          }  else{
               $error="Something went Wrong";
               if(form_error('name')){
                    $error=form_error('name');
                }elseif(form_error('mobile')){
                    $error=form_error('mobile');
                }elseif(form_error('user_name')){
                    $error=form_error('user_name');
                }
          
             $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ];  
          }
          
          
         }else{
            $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token'];  
         }
          return $response;
    }
    
      public function change_password($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
                  
             $saverow['old_password'] = $request->old_password;
            $saverow['password'] = $request->password;
            $saverow['id'] = $request->id;
          
           
            $this->form_validation->set_data($saverow);
            $this->form_validation->set_rules('old_password', 'Old Password', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('id', 'ID', 'required');
      
        if($this->form_validation->run() !== FALSE){
            
              $user = $this->common_model->GetRow('users',['id'=>$request->id]);
              
              if(md5($request->old_password) == $user->password ){
                  
              if(md5($request->old_password) == md5($request->password)){
                  
                    $response=["code"=>200,'status'=>'fail','message'=>'New Password cannot be same as old password' ]; 
              }else{
                    $savedata['password'] = md5($request->password);
                  
                   $update =  $this->common_model->UpdateData('users', $savedata, ['id'=>$request->id]);
          
                  if($update){
                           $response = ['code'=>200,'status'=>'success','message'=>'Password changed successfully'];  
                      }else{
                  
                      $response = ['code'=>200,'status'=>'fail','message'=>'Failed to change password']; 
                    }
                    
              }
              
              }else{
                 $response = ['code'=>200,'status'=>'fail','message'=>'Old Password not match'];  
              }
            
            
        }else{
             $error="Something went Wrong";
               if(form_error('old_password')){
                    $error=form_error('old_password');
                }elseif(form_error('password')){
                    $error=form_error('password');
                }elseif(form_error('id')){
                    $error=form_error('id');
                }
          
             $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ]; 
        }
                  
                  
             
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
      public function wallet_balance($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
              $response = ['code'=>200,'status'=>'success','message'=>'Record found','balance'=> GetWalletBalance($token_check->id)];  
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    public function bonus_balance($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
              $response = ['code'=>200,'status'=>'success','message'=>'Record found','balance'=> GetBonusBalance($token_check->id)];  
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function profile_upload($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
        $users =$this->common_model->GetRow('users',['id'=>$token_check->id]);        
            $config['upload_path']   = './uploads/profile'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
        //  $config['max_size']      = 100; 
        //  $config['max_width']     = 1024; 
        //  $config['max_height']    = 768;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('avatar')) {
              $response = ['code'=>200,'status'=>'fail','message'=>'Profile updation failed', 'err'=>$this->upload->display_errors()]; 
         }
			
         else { 
               $uploaddata = $this->upload->data();
            $file_name = $uploaddata['file_name'];
            $save['profile']= $file_name; 
            
          
          $update = $this->common_model->UpdateData('users',$save,array('id'=>$token_check->id)); 
          if($update){
              if(!empty($users->profile)){
                    unlink('uploads/profile/'.$users->profile);
              }
              $p =   $this->common_model->Getrow('users',array('id'=>$token_check->id)); 
              $response = ['code'=>200,'status'=>'success','message'=>'Profile Updated sucessfully','profile'=>$p->profile]; 
           
           
          }
            
         }
            
            
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function dummy($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
 
}