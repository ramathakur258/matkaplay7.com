<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
   public function __construct() {
        parent::__construct();
      $this->load->helper(['form','url','user']);
       $this->load->library(['form_validation','session']);
       $this->load->model('common_model');
        $this->db->query("SET time_zone='+5:30'");
        isUserLogin();
    }
  
    public function index(){
     
      
     
    
     $data['chat_data'] = $this->common_model->ChatResult('chat');
     $data['market_time'] = $this->common_model->market_time_list('market_time');
     $data['row'] = $this->common_model->notice_board('notice_board');
     $data['result_data'] = $this->common_model->result_list('market_time');
     $data['game_data'] = $this->common_model->GetResult('market_type_rate');
    //  $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
     // echo $this->session->userdata('user_id');die;
    if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="index";
        $this->load->view('web_template',$data);
    }
    
     public function new_home(){
     
     $data['market_time'] = $this->common_model->market_time_list('market_time');
     $data['result_data'] = $this->common_model->result_list('market_time');
     $data['game_data'] = $this->common_model->GetResult('market_type_rate');
     
      if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="new_index";
        $this->load->view('new_web_template',$data);
    }

    public function single(){
        
        $data['market_rate'] = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'SINGLE' ));
      
          if($this->input->server('REQUEST_METHOD')=="POST"){
              if(isUserLogin()){
                  
         $active_check = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));  
                  if($active_check->status =='ACTIVE'){
                  
                   $amount  = $this->input->post('amount');
                     foreach($amount as $key=>$val){
                         
                         $this->form_validation->set_rules('amount['.$key.']', 'value should be greater than 10', 'callback_validate['.$data['market_rate']->min_bid_amount.']');
                     }
                    

            $this->form_validation->set_rules('market', 'Market', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
             
             if ($this->form_validation->run() == TRUE){
                   
                   $amount  = $this->input->post('amount');
                   $check = array();
                    
                    
                   for($i=0; $i<count($amount); $i++){
                       if(!empty($amount[$i])){
                           if($amount[$i] < $data['market_rate']->min_bid_amount){
                            array_push($check,$amount[$i] );
                          }
                        } 
                       }
                       
                      $m =   explode("-",$this->input->post('market'));
                $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
                       if($this->input->post('date') > date('Y:m:d')){
                           $time_check = true; 
                       }else{
                          if($m[0] == 'OPEN'){
                             if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s')){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                        }else{
                               if(date('H:i:s',strtotime($market_time->close_time)) < date('H:i:s')){
                                     
                                      $time_check = false; 
                                      
                             }
                             
                             else{
                                     $time_check = true; 
                             }
                        } 
                       }
                
                     
                   
                   if($time_check == false ){
                        $this->session->set_flashdata('error', 'Market time is over'); 
                   }else if(count($check) > '0' ){
                        $this->session->set_flashdata('error', 'Please insert the value greater than '.$data['market_rate']->min_bid_amount); 
                         }
                    //      else if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                            
                    //       $this->session->set_flashdata('error', 'Your wallet balance is low'); 
                    //   }
                       else{
                           
                            $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
                            $bonus_balance = GetBonusBalance($this->session->userdata('user_id'));
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $this->input->post('total');
                            $comment = 'Money spent on single game';
                            
                            if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                                
                               $diff = (int)$this->input->post('total') -  (int)GetWalletBalance($this->session->userdata('user_id'));
                                
                                if($diff == $this->input->post('total')){
                                      if($bonus_balance < $this->input->post('total')){
                                             $this->session->set_flashdata('error', 'Balance is low bonus'); 
                                      }else{
                                          $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],1,'SINGLE',$total,$comment,'bonus','single');
                                      }
                                }else{
                                    if($total_balance < $this->input->post('total')){
                                         $this->session->set_flashdata('error', 'Balance is low both'.$total_balance); 
                                    }else{
                                         $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],1,'SINGLE',$total,$comment,'both','single');
                                    }
                                }
                                
                                
                            }else{
                                $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],1,'SINGLE',$total,$comment,'wallet','single');
                            }
                            
                               
                            
                       }
                        
                   }
                   
                   
                  }else{
                       $this->session->set_flashdata('error', 'You are Blocked, Please contact Admin'); 
                  }
              }else{
                  $this->session->set_flashdata('error', 'Please login first'); 
              }
          }
          $where=[];
          $field="";
          $order_by = ['key' => 'market_name', 'value' => 'asc'];
         // $data['market_data'] = $this->common_model->GetResult('market',$where,$field,$order_by);
          
         $data['market_data']  = $this->common_model->get_market_dropdown();
             if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="single";
        $this->load->view('web_template',$data);
    }
    
     public function jodi(){
         
        $data['market_rate'] = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'JODI' ));
        
         if($this->input->server('REQUEST_METHOD')=="POST"){
              if(isUserLogin()){
                  
                   $active_check = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));  
                  if($active_check->status =='ACTIVE'){
                    
                  
            $this->form_validation->set_rules('market', 'Market', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
             
             if ($this->form_validation->run() == TRUE){
                   
                   $amount  = $this->input->post('amount');
                  
                   $check = array();
                    
                   for($i=0; $i<count($amount); $i++){
                       if(!empty($amount[$i])){
                           if($amount[$i] < $data['market_rate']->min_bid_amount){
                            array_push($check,$amount[$i] );
                          }
                        } 
                       }
                       
                       $m =   $this->input->post('market');
                   $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m ));
                 
                 if($this->input->post('date') > date('Y-m-d')){
                     $time_check = true; 
                 }else{
                       if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s') ){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                 }
                           
                        
                      
                   
                   if($time_check == false ){
                        $this->session->set_flashdata('error', 'Market time is over'); 
                   }
                   
                    else if(count($check) > '0' ){
                        $this->session->set_flashdata('error', 'Please insert the value greater than '.$data['market_rate']->min_bid_amount); 
                         }
                    //      else if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                            
                    //       $this->session->set_flashdata('error', 'Your wallet balance is low'); 
                    //   }
                       else{
                          
                          
                            $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
                            $bonus_balance = GetBonusBalance($this->session->userdata('user_id'));
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            $m =  $this->input->post('market');
                            $total = $this->input->post('total');
                            $comment = 'Money spent on jodi game';
                            
                            if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                                
                               $diff = (int)$this->input->post('total') -  (int)GetWalletBalance($this->session->userdata('user_id'));
                                
                                if($diff == $this->input->post('total')){
                                      if($bonus_balance < $this->input->post('total')){
                                             $this->session->set_flashdata('error', 'Balance is low bonus'); 
                                      }else{
                                          $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],2,'JODI',$total,$comment,'bonus','jodi');
                                      }
                                }else{
                                    if($total_balance < $this->input->post('total')){
                                         $this->session->set_flashdata('error', 'Balance is low both'.$total_balance); 
                                    }else{
                                         $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],2,'JODI',$total,$comment,'both','jodi');
                                    }
                                }
                                
                                
                            }else{
                                $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],2,'JODI',$total,$comment,'wallet','jodi');
                            }
                          
                          
                          
                          
                          
                          
                          
                            //  foreach($amount as $key=>$val){
                              
                            //      if(!empty($val)){
                            //      $saverow['user_id'] = $this->session->userdata('user_id');
                            //      $saverow['bid_number'] = $key;
                            //      $saverow['bid_amount'] = $val;
                            //       //$saverow['type'] =  $m[0];
                            //      // $saverow['market_id'] =  $m[1];
                            //      $saverow['market_id'] =  $this->input->post('market');
                            //      $saverow['date'] =  $this->input->post('date');
                            //       $saverow['game_id'] = 2;
                            //      $saverow['min_bid_amount'] = $data['market_rate']->min_bid_amount;
                            //      $saverow['min_win_amount'] =  $data['market_rate']->win_amount;
                                
                            //       $save = $this->common_model->InsertData('jodi',$saverow); 
                                  
                            //       $this->common_model->InsertData('all_game',$saverow);
                            //      }
                               
                                  
                                 
                            //  }
                             
                            //  if($save){
                                 
                            //      $save_w['user_id'] = $this->session->userdata('user_id');
                            //      $save_w['txn_type'] = 'OUT';
                            //      $save_w['amount'] = $this->input->post('total');
                            //      $save_w['comment'] = 'Money spent on jodi game';
                            //      $save_w['market_id'] = $this->input->post('market');
                            //      // $save_w['market_type'] =  $m[0];
                            //      // $save_w['market_id'] =  $m[1];
                            //      $save_w['game_name'] = 'JODI';
                            //      $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                            //      $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                            //      if($save_wallet){
                            //      $this->session->set_flashdata('success', 'Bidding done successfully'); 
                            //      redirect('jodi'); 
                            //      }
                                 
                             
                            //  }
                             
                             
                             
                             
                             
                             
                             
                             
                       }
                        
                   }
                  }else{
                       $this->session->set_flashdata('error', 'You are Blocked, Please contact Admin'); 
                  }
              }else{
                  $this->session->set_flashdata('error', 'Please login first'); 
              }
           
          }
        //   $where=[];
        //   $field="";
        //   $order_by = ['key' => 'market_name', 'value' => 'asc'];
        //   $data['market_data'] = $this->common_model->GetResult('market',$where,$field,$order_by);
        $data['market_data'] = $this->common_model->market_time_list('market_time');
       // $data['market_data']  = $this->common_model->get_market_dropdown();
        if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="jodi";
        $this->load->view('web_template',$data);
    }
    
     public function single_patti(){
         
        $data['market_rate'] = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'SINGLE PATTI' ));
        
         if($this->input->server('REQUEST_METHOD')=="POST"){
             if(isUserLogin()){
                 
                  $active_check = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));  
                  if($active_check->status =='ACTIVE'){
                      
                  $amount  = $this->input->post('amount');
                  foreach($amount as $key=>$val){
                           
                         $this->form_validation->set_rules('amount['.$key.']', 'value should be greater than 10', 'callback_validate['.$data['market_rate']->min_bid_amount.']');
                     }
                     $this->form_validation->set_rules('market', 'Market', 'required');
                     $this->form_validation->set_rules('date', 'Date', 'required');
                     
                     
                     if ($this->form_validation->run() == TRUE){
                   
                   $amount  = $this->input->post('amount');
                   $check = array();
                     
                        
                   for($i=0; $i<count($amount); $i++){
                       if(!empty($amount[$i])){
                           if($amount[$i] < $data['market_rate']->min_bid_amount){
                            array_push($check,$amount[$i] );
                          }
                        } 
                       }
                       
                       $m =   explode("-",$this->input->post('market'));
                   $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
                    
                     if($this->input->post('date') > date('Y-m-d')){
                          $time_check = true; 
                     }else{
                         
                         if($m[0] == 'OPEN'){
                             if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s') ){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                        
                        }else{
                               if(date('H:i:s',strtotime($market_time->close_time)) < date('H:i:s') ){
                                      $time_check = false; 
                             }else{
                                     $time_check = true; 
                             }
                        }
                     }
                    
                     
                   
                   if($time_check == false ){
                        $this->session->set_flashdata('error', 'Market time is over'); 
                   }
                        else if(count($check) > '0' ){
                        $this->session->set_flashdata('error', 'Please insert the value greater than '.$data['market_rate']->min_bid_amount); 
                         }
                    //      else if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                            
                    //       $this->session->set_flashdata('error', 'Your wallet balance is low'); 
                    //   }
                       else{
                           
                           
                           
                            $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
                            $bonus_balance = GetBonusBalance($this->session->userdata('user_id'));
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $this->input->post('total');
                            $comment = 'Money spent on single patti game';
                            
                            if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                                
                               $diff = (int)$this->input->post('total') -  (int)GetWalletBalance($this->session->userdata('user_id'));
                                
                                if($diff == $this->input->post('total')){
                                      if($bonus_balance < $this->input->post('total')){
                                             $this->session->set_flashdata('error', 'Balance is low in bonus'); 
                                      }else{
                                          $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],3,'SINGLE PATTI',$total,$comment,'bonus','single-patti');
                                      }
                                }else{
                                    if($total_balance < $this->input->post('total')){
                                         $this->session->set_flashdata('error', 'Balance is low in both wallet and bonus'.$total_balance); 
                                    }else{
                                         $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],3,'SINGLE PATTI',$total,$comment,'both','single-patti');
                                    }
                                }
                                
                                
                            }else{
                                $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],3,'SINGLE PATTI',$total,$comment,'wallet','single-patti');
                            }
                           
                           
                           
                            // $m =   explode("-",$this->input->post('market'));
                            //  foreach($amount as $key=>$val){
                            //      if(!empty($val)){
                            //           $saverow['user_id'] = $this->session->userdata('user_id');
                            //      $saverow['bid_number'] = $key;
                            //      $saverow['bid_amount'] = $val;
                            //     // $saverow['market_id'] =  $this->input->post('market');
                            //       $saverow['type'] =  $m[0];
                            //       $saverow['market_id'] =  $m[1];
                            //      $saverow['date'] =  $this->input->post('date');
                            //       $saverow['game_id'] = 3;
                            //      $saverow['min_bid_amount'] = $data['market_rate']->min_bid_amount;
                            //      $saverow['min_win_amount'] =  $data['market_rate']->win_amount;
                                 
                            //       $save = $this->common_model->InsertData('single_patti',$saverow); 
                                  
                            //          $this->common_model->InsertData('all_game',$saverow);
                            //      }

                            //  }
                             
                            //  if($save){
                                 
                            //      $save_w['user_id'] = $this->session->userdata('user_id');
                            //      $save_w['txn_type'] = 'OUT';
                            //      $save_w['amount'] = $this->input->post('total');
                            //      $save_w['comment'] = 'Money spent on single patti game';
                            //     // $save_w['market_id'] = $this->input->post('market');
                            //       $save_w['market_type'] =  $m[0];
                            //       $save_w['market_id'] =  $m[1];
                            //      $save_w['game_name'] = 'SINGLE PATTI';
                            //      $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                            //      $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                            //      if($save_wallet){
                                  
                            //      $this->session->set_flashdata('success', 'Bidding done successfully'); 
                            //      redirect('single-patti'); 
                            //      }
                             
                            //  }
                             
                             
                             
                             
                             
                             
                             
                             
                         }
                     }
                  }else{
                       $this->session->set_flashdata('error', 'You are Blocked, Please contact Admin'); 
                  }      
             }else{
                  $this->session->set_flashdata('error', 'Please login first'); 
             }  
             
         }
        //   $where=[];
        //   $field="";
        //   $order_by = ['key' => 'market_name', 'value' => 'asc'];
        //   $data['market_data'] = $this->common_model->GetResult('market',$where,$field,$order_by);
        $data['market_data']  = $this->common_model->get_market_dropdown(); 
        if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="single-patti";
        $this->load->view('web_template',$data);
    }
     public function double_patti(){
         
         $data['market_rate'] = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'DOUBLE PATTI' ));
         
          if($this->input->server('REQUEST_METHOD')=="POST"){
             if(isUserLogin()){
                 
                  $active_check = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));  
                  if($active_check->status =='ACTIVE'){
                 
                  $amount  = $this->input->post('amount');
                  foreach($amount as $key=>$val){
                         
                         $this->form_validation->set_rules('amount['.$key.']', 'value should be greater than 10', 'callback_validate['.$data['market_rate']->min_bid_amount.']');
                     }
                     $this->form_validation->set_rules('market', 'Market', 'required');
                     $this->form_validation->set_rules('date', 'Date', 'required');
                     
                     
                     if ($this->form_validation->run() == TRUE){
                   
                   $amount  = $this->input->post('amount');
                   $check = array();
                     
                        
                   for($i=0; $i<count($amount); $i++){
                       if(!empty($amount[$i])){
                           if($amount[$i] < $data['market_rate']->min_bid_amount){
                            array_push($check,$amount[$i] );
                          }
                        } 
                       }
                       
                       $m =   explode("-",$this->input->post('market'));
                       $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
                       
                        if($this->input->post('date') > date('Y-m-d')){
                            $time_check = true; 
                        }else{
                            if($m[0] == 'OPEN'){
                             if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s') ){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                        
                        }else{
                               if(date('H:i:s',strtotime($market_time->close_time)) < date('H:i:s') ){
                                      $time_check = false; 
                             }else{
                                     $time_check = true; 
                             }
                        }
                        }
                     
                   
                   if($time_check == false ){
                        $this->session->set_flashdata('error', 'Market time is over'); 
                   }
                        else if(count($check) > '0' ){
                        $this->session->set_flashdata('error', 'Please insert the value greater than '.$data['market_rate']->min_bid_amount); 
                         }
                    //      else if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                            
                    //       $this->session->set_flashdata('error', 'Your wallet balance is low'); 
                    //   }
                       else{
                           
                           
                             $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
                            $bonus_balance = GetBonusBalance($this->session->userdata('user_id'));
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $this->input->post('total');
                            $comment = 'Money spent on double patti game';
                            
                            if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                                
                               $diff = (int)$this->input->post('total') -  (int)GetWalletBalance($this->session->userdata('user_id'));
                                
                                if($diff == $this->input->post('total')){
                                      if($bonus_balance < $this->input->post('total')){
                                             $this->session->set_flashdata('error', 'Balance is low in bonus'); 
                                      }else{
                                          $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],4,'DOUBLE PATTI',$total,$comment,'bonus','double-patti');
                                      }
                                }else{
                                    if($total_balance < $this->input->post('total')){
                                         $this->session->set_flashdata('error', 'Balance is low in both wallet and bonus'.$total_balance); 
                                    }else{
                                         $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],4,'DOUBLE PATTI',$total,$comment,'both','double-patti');
                                    }
                                }
                                
                                
                            }else{
                                $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],4,'DOUBLE PATTI',$total,$comment,'wallet','double-patti');
                            }
                           
                           
                           
                           
                           
                           
                        //   $m =   explode("-",$this->input->post('market')); 
                        //      foreach($amount as $key=>$val){
                        //          if(!empty($val)){
                        //               $saverow['user_id'] = $this->session->userdata('user_id');
                        //          $saverow['bid_number'] = $key;
                        //          $saverow['bid_amount'] = $val;
                        //       //  $saverow['market_id'] =  $this->input->post('market');
                        //             $saverow['type'] =  $m[0];
                        //           $saverow['market_id'] =  $m[1];
                        //          $saverow['date'] =  $this->input->post('date');
                        //           $saverow['game_id'] = 4;
                        //          $saverow['min_bid_amount'] = $data['market_rate']->min_bid_amount;
                        //          $saverow['min_win_amount'] =  $data['market_rate']->win_amount;
                                 
                        //           $save = $this->common_model->InsertData('double_patti',$saverow); 
                                  
                        //           $this->common_model->InsertData('all_game',$saverow); 
                                     
                        //          }

                        //      }
                             
                        //      if($save){
                                 
                        //          $save_w['user_id'] = $this->session->userdata('user_id');
                        //          $save_w['txn_type'] = 'OUT';
                        //          $save_w['amount'] = $this->input->post('total');
                        //          $save_w['comment'] = 'Money spent on double patti game';
                        //           $save_w['market_type'] =  $m[0];
                        //           $save_w['market_id'] =  $m[1];
                        //         // $save_w['market_id'] = $this->input->post('market');
                        //          $save_w['game_name'] = 'DOUBLE PATTI';
                        //          $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                        //          $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                        //          if($save_wallet){
                                  
                        //          $this->session->set_flashdata('success', 'Bidding done successfully'); 
                        //          redirect('double-patti'); 
                        //          }
                             
                        //      }
                             
                             
                             
                             
                             
                             
                             
                         }
                     }
                  }else{
                       $this->session->set_flashdata('error', 'You are Blocked, Please contact Admin'); 
                  }       
             }else{
                  $this->session->set_flashdata('error', 'Please login first'); 
             }  
             
         }
        //   $where=[];
        //   $field="";
        //   $order_by = ['key' => 'market_name', 'value' => 'asc'];
        //   $data['market_data'] = $this->common_model->GetResult('market',$where,$field,$order_by);
        $data['market_data']  = $this->common_model->get_market_dropdown();
       if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="double-patti";
        $this->load->view('web_template',$data);
    }
     public function tripple_patti(){
         
         $data['market_rate'] = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'TRIPLE PATTI' ));
         
          if($this->input->server('REQUEST_METHOD')=="POST"){
              if(isUserLogin()){
                  
                   $active_check = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));  
                  if($active_check->status =='ACTIVE'){
                      
                   $amount  = $this->input->post('amount');
                     foreach($amount as $key=>$val){
                         
                         $this->form_validation->set_rules('amount['.$key.']', 'value should be greater than 10', 'callback_validate['.$data['market_rate']->min_bid_amount.']');
                     }
                  
            $this->form_validation->set_rules('market', 'Market', 'required');
            $this->form_validation->set_rules('date', 'Date', 'required');
             
             if ($this->form_validation->run() == TRUE){
                   
                   $amount  = $this->input->post('amount');
                   $check = array();
                    
                    
                   for($i=0; $i<count($amount); $i++){
                       if(!empty($amount[$i])){
                           if($amount[$i] < $data['market_rate']->min_bid_amount){
                            array_push($check,$amount[$i] );
                          }
                        } 
                       }
                       
                       $m =   explode("-",$this->input->post('market'));
                   $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
                 
                 
                  if($this->input->post('date') > date('Y-m-d')){
                     $time_check = true;  
                  }else{
                       if($m[0] == 'OPEN'){
                             if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s') ){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                        
                        }else{
                               if(date('H:i:s',strtotime($market_time->close_time)) < date('H:i:s') ){
                                      $time_check = false; 
                             }else{
                                     $time_check = true; 
                             }
                        }
                  }
                 
                   if($time_check == false ){
                        $this->session->set_flashdata('error', 'Market time is over'); 
                   }
                   
                  else if(count($check) > '0' ){
                        $this->session->set_flashdata('error', 'Please insert the value greater than '.$data['market_rate']->min_bid_amount); 
                         }
                    //      else if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                            
                    //       $this->session->set_flashdata('error', 'Your wallet balance is low'); 
                    //   }
                       else{
                           
                           
                            $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
                            $bonus_balance = GetBonusBalance($this->session->userdata('user_id'));
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $this->input->post('total');
                            $comment = 'Money spent on tripple patti game';
                            
                            if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('total')){
                                
                               $diff = (int)$this->input->post('total') -  (int)GetWalletBalance($this->session->userdata('user_id'));
                                
                                if($diff == $this->input->post('total')){
                                      if($bonus_balance < $this->input->post('total')){
                                             $this->session->set_flashdata('error', 'Balance is low in bonus'); 
                                      }else{
                                          $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],5,'TRIPPLE PATTI',$total,$comment,'bonus','tripple-patti');
                                      }
                                }else{
                                    if($total_balance < $this->input->post('total')){
                                         $this->session->set_flashdata('error', 'Balance is low in both wallet and bonus'.$total_balance); 
                                    }else{
                                         $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],5,'TRIPPLE PATTI',$total,$comment,'both','tripple-patti');
                                    }
                                }
                                
                                
                            }else{
                                $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],5,'TRIPPLE PATTI',$total,$comment,'wallet','tripple-patti');
                            }
                           
                           
                           
                           
                            //  $m =   explode("-",$this->input->post('market')); 
                            //  foreach($amount as $key=>$val){
                            //      if(!empty($val)){
                            //           $saverow['user_id'] = $this->session->userdata('user_id');
                            //      $saverow['bid_number'] = $key;
                            //      $saverow['bid_amount'] = $val;
                            //   //  $saverow['market_id'] =  $this->input->post('market');
                            //       $saverow['type'] =  $m[0];
                            //       $saverow['market_id'] =  $m[1];
                            //      $saverow['date'] =  $this->input->post('date');
                            //       $saverow['game_id'] = 5;
                            //      $saverow['min_bid_amount'] = $data['market_rate']->min_bid_amount;
                            //      $saverow['min_win_amount'] =  $data['market_rate']->win_amount;
                                 
                            //       $save = $this->common_model->InsertData('tripple_patti',$saverow); 
                                  
                            //          $this->common_model->InsertData('all_game',$saverow);
                            //      }

                            //  }
                             
                            //  if($save){
                                 
                            //      $save_w['user_id'] = $this->session->userdata('user_id');
                            //      $save_w['txn_type'] = 'OUT';
                            //      $save_w['amount'] = $this->input->post('total');
                            //      $save_w['comment'] = 'Money spent on tripple patti game';
                            //   //   $save_w['market_id'] = $this->input->post('market');
                            //       $save_w['market_type'] =  $m[0];
                            //       $save_w['market_id'] =  $m[1];
                            //      $save_w['game_name'] = 'TRIPPLE PATTI';
                            //      $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                            //      $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                            //      if($save_wallet){
                                  
                            //      $this->session->set_flashdata('success', 'Bidding done successfully'); 
                            //      redirect('tripple-patti'); 
                            //      }
                             
                            //  }
                            
                       }
                        
                   }
              }else{
                       $this->session->set_flashdata('error', 'You are Blocked, Please contact Admin'); 
                  } 
              }else{
                  $this->session->set_flashdata('error', 'Please login first'); 
              }
          }
         
         
        //   $where=[];
        //   $field="";
        //   $order_by = ['key' => 'market_name', 'value' => 'asc'];
        //   $data['market_data'] = $this->common_model->GetResult('market',$where,$field,$order_by);
         
         $data['market_data']  = $this->common_model->get_market_dropdown();
         
        if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="tripple-patti";
        $this->load->view('web_template',$data);
    }
      public function jodi_chart(){
          
          if(!empty($this->session->userdata('user_id'))){
          $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
         $data['market_time'] = $this->common_model->market_time_list('market_time');
        $data['content']="jodi-chart";
        $this->load->view('web_template',$data);
    }
      public function panel_chart(){
          
          if(!empty($this->session->userdata('user_id'))){
          $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
         $data['market_time'] = $this->common_model->market_time_list('market_time');
        $data['content']="panel-chart";
        $this->load->view('web_template',$data);
    }
    
    
     public function deposit(){
       $user= $this->session->userdata('user_id');
         if(isset($user)!==TRUE){
             redirect('login'); 
       }
        else{
            
            if(isset($user)){
            $data['t'] = $this->common_model->GetRow('users',array('id'=>($this->session->userdata('user_id'))));
       }

            $page=0;
                if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
            }
        $querystring = "";
       
        $data['per_page'] = 10;
        if ($this->input->get('per_page') != "") {
             $data['per_page'] = $this->input->get('per_page');
        }
        $querystring .= "per_page=" . $data['per_page'];
        $likeSearch = [];
        $order_by = ['key' => 'wallet_id', 'value' => 'DESC'];
        $data['sort'] = 'wallet_id' ; 
        $data['order_by'] = 'DESC';
        
        $where = [];
      
        $data['querystring']=$querystring;
        if ($page > 1) { 
            $page = ($page - 1) * $data['per_page'];
        } else {
            $page = 0;
        }
    
 
    
        $data['record_count'] = $this->common_model->CountResults('wallet',array('user_id'=>$this->session->userdata('user_id'),'txn_type' =>'IN'));
        
        
        $data['row'] = $this->common_model->GetListData($page, $data['per_page'], array('user_id'=>$this->session->userdata('user_id'),'txn_type' =>'IN'), $likeSearch, $order_by,'wallet');
        
        
        
         $page=0;
                if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
            }
        $querystring = "";
       
        $data['per_page'] = 10;
        if ($this->input->get('per_page') != "") {
             $data['per_page'] = $this->input->get('per_page');
        }
        $querystring .= "per_page=" . $data['per_page'];
        $likeSearch = [];
        $order_by = ['key' => 'deposit_request_id', 'value' => 'DESC'];
        $data['sort'] = 'deposit_request_id' ; 
        $data['order_by'] = 'DESC';
        
        $where = [];
      
        $data['querystring']=$querystring;
        if ($page > 1) { 
            $page = ($page - 1) * $data['per_page'];
        } else {
            $page = 0;
        }
        

         $data['record_count'] = $this->common_model->CountResults('deposit_request',array('user_id'=>$this->session->userdata('user_id')));
         $data['data'] = $this->common_model->GetListData($page, $data['per_page'], array('user_id'=>$this->session->userdata('user_id')), $likeSearch, $order_by,'deposit_request');
      //print_r($data['data']); die;
      
        $config = pagination_config($data['per_page']);
        $config['base_url'] = site_url('deposit?' . $querystring.'&sort='. $data['sort'].'&order_by='.$data['order_by']);
        $config['total_rows'] = $data['record_count'];
   
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
           
           
            if($this->input->server('REQUEST_METHOD')=="POST"){
           
                    $this->form_validation->set_rules('name', 'Name', 'trim|required');
                    $this->form_validation->set_rules('mobile_no', 'Mobile', 'trim|required|numeric|min_length[10])');
                    $this->form_validation->set_rules('amount', 'Amount', 'trim|numeric|required');
                    $this->form_validation->set_rules('description', 'Description', 'trim|required');
            
                     if($this->form_validation->run() == TRUE){
                        $saverow['user_id'] = $this->session->userdata('user_id');
                        $saverow['name'] = $this->input->post('name');
                        $saverow['mobile_no'] = $this->input->post('mobile_no');
                        $saverow['amount'] = $this->input->post('amount');
                        $saverow['description'] = $this->input->post('description');
                  
                        $save = $this->common_model->InsertData('deposit_request',$saverow);
                       if($save){
                        $this->session->set_flashdata('success', 'Successfully Requested for money');
                        redirect("deposit");
                       
                       }
                      }
                   
                   } 
             
       }
       
        if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        
        //print_r($this->db->last_query()); die;
        $data['content']="deposit";
        $this->load->view('web_template',$data);
    }
      public function withdraw(){
       $user= $this->session->userdata('user_id');
           if(isset( $user)!==TRUE){
             redirect('login'); 
       }
        else{
            
              $page=0;
                if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
            }
        $querystring = "";
       
        $data['per_page'] = 10;
        if ($this->input->get('per_page') != "") {
             $data['per_page'] = $this->input->get('per_page');
        }
        $querystring .= "per_page=" . $data['per_page'];
        $likeSearch = [];
        $order_by = ['key' => 'id', 'value' => 'DESC'];
        $data['sort'] = 'id' ; 
        $data['order_by'] = 'DESC';
        
        $where = [];
      
        $data['querystring']=$querystring;
        if ($page > 1) { 
            $page = ($page - 1) * $data['per_page'];
        } else {
            $page = 0;
        }
    
        $data['record_count'] = $this->common_model->CountResults('money_request',array('user_id'=>$this->session->userdata('user_id')));
        
       
        $data['record'] = $this->common_model->GetListData($page, $data['per_page'], array('user_id'=>$this->session->userdata('user_id')), $likeSearch, $order_by,'money_request');
     
        $config = pagination_config($data['per_page']);
        $config['base_url'] = site_url('withdraw?' . $querystring.'&sort='. $data['sort'].'&order_by='.$data['order_by']);
        $config['total_rows'] = $data['record_count'];
   
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
            
           
            //  $data['record'] = $this->common_model->GetResult('money_request',array('user_id'=>$this->session->userdata('user_id')));
             
               if($this->input->server('REQUEST_METHOD')=="POST"){
            
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
            $this->form_validation->set_rules('account_number', 'Account Number', 'trim|numeric|required|max_length[15]|limit');
            $this->form_validation->set_rules('account_holder_name', 'Account Holder Name','trim|required');
            $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required|max_length[11]');
            $this->form_validation->set_rules('amount', 'amount', 'trim|numeric|required');
             
             if ($this->form_validation->run() == TRUE){
                   
                 
                 if(GetWalletBalance($this->session->userdata('user_id')) < $this->input->post('amount')){
                            
                           $this->session->set_flashdata('error', 'Request Amount is more than wallet balance'); 
                       }else{
                           
                           
                                 $saverow['user_id'] = $this->session->userdata('user_id');
                                 $saverow['bank_name'] = $this->input->post('bank_name');
                                 $saverow['account_number'] =$this->input->post('account_number');
                                 $saverow['ifsc_code'] =  $this->input->post('ifsc_code');
                                 $saverow['account_holder_name'] =  $this->input->post('account_holder_name');
                                 $saverow['amount'] =  $this->input->post('amount');
                                 
                                 
                                  $save = $this->common_model->InsertData('money_request',$saverow); 
                                  
                             if($save){
                               
                                 $this->session->set_flashdata('success', 'Request send successfully'); 
                                 redirect('withdraw'); 
                               
                             }
                       }
                   }
          }
       }
              if(!empty($this->session->userdata('user_id'))){
             $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="withdraw";
        $this->load->view('web_template',$data);
    }
     public function game_history(){
        $user =$this->session->userdata('user_id');
          if(isset($user)!==TRUE){
             redirect('login'); 
       }
       else{
           
           
             $page=0;
                if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
            }
            $querystring = "";
           
            $data['per_page'] = 10;
            if ($this->input->get('per_page') != "") {
                 $data['per_page'] = $this->input->get('per_page');
            }
            $querystring .= "per_page=" . $data['per_page'];
      
            
            $where = [];
          
            $data['querystring']=$querystring;
            if ($page > 1) { 
                $page = ($page - 1) * $data['per_page'];
            } else {
                $page = 0;
            }
        
        
         
           
     $data['record_count'] = $this->common_model->CountResults('all_game',['user_id'=>$this->session->userdata('user_id')]); 
           
     $data['row']  = $this->common_model->game_history('all_game',['all_game.user_id'=>$this->session->userdata('user_id')],$page, $data['per_page']);

            $config = pagination_config($data['per_page']);
            $config['base_url'] = site_url('game-history?' . $querystring);
            $config['total_rows'] = $data['record_count'];
       
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
           
       
       } 
           
       if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
        $data['content']="game_history";
        $this->load->view('web_template',$data);
    }
     public function jodi_chart_detail($mid=""){
         
        //echo $mid;die;
          if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
             if(!empty($mid)){
                $data['jodi_data'] = $this->common_model->records('result',["market_id"=>$mid]);
                    }
                    if(!empty($mid)){
                        $data['marketName'] = $this->common_model->GetRow('market1',["id"=>$mid]);
                            }
                                
                 //  echo "<pre>"; print_r($data['marketName']); die;
        $data['content']="jodi-chart-detail";
        $this->load->view('web_template',$data);
    }
     public function panel_chart_detail($mid=""){
         
          $query = 'SELECT *, DAYNAME(created_at) as day, WEEK(created_at) as week , YEAR(created_at) as year FROM result where market_id='.$mid;
                $sql = $this->db->query($query);
                $data = $sql->result();
                
            $query1 = 'SELECT year,week, count(week) as c FROM(SELECT *, DAYNAME(created_at) as day, WEEK(created_at) as week , YEAR(created_at) as year FROM result where market_id='.$mid.')as p GROUP BY week';
                $sql1 = $this->db->query($query1);
                $data1 = $sql1->result(); 
         
          $arr = array();
                foreach($data as $d){
                          $dto = new DateTime();
                          $dto->setISODate($d->year, $d->week);
                          $ret['week_start'] = $dto->format('Y-m-d');
                          $dto->modify('+6 days');
                          $ret['week_end'] = $dto->format('Y-m-d');
                        $d->start_date = $ret['week_start'];
                        $d->end_date = $ret['week_end'];
                       array_push($arr,$d) ;
                }
         
           $u = [];
               foreach($data1 as $d){
                
                   $d = $d->week;
                   $y = array_filter($arr, function($v) use($d) {
                            return $v->week == $d;
                        }, ARRAY_FILTER_USE_BOTH);
                        array_push($u,$y);
               }
            
  
      $h=array_map( function($x){
         
            
   // return json_decode(json_encode($x), TRUE);
      // return (object)$x;
        return array_values($x);
   // return   implode(', ', array_column($x, 'open_result_digit'));
      },$u);
          
               $data['data'] =$h;
        $data['row'] = $this->common_model->GetResult('market'); 
        
         if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
             
        $data['content']="panel-chart-detail";
        $this->load->view('web_template',$data);
    }
    
     public function forum(){
         
           if($this->input->server('REQUEST_METHOD')=="POST"){
            
            $this->form_validation->set_rules('msg', 'Message', 'required');
          
             if ($this->form_validation->run() == TRUE){
                
                                 $saverow['user_id'] = $this->session->userdata('user_id');
                                 $saverow['msg'] = $this->input->post('msg');
                                
                                  $save = $this->common_model->InsertData('forum',$saverow); 
                                  
                             if($save){
                               
                                 $this->session->set_flashdata('success', 'Comment added successfully'); 
                                 redirect('forum'); 
                             }
                
                         }
                       }
         
         
            $page=0;
                if (!empty($this->input->get('page'))) {
            $page = $this->input->get('page');
            }
        $querystring = "";
       
        $data['per_page'] = 10;
        if ($this->input->get('per_page') != "") {
             $data['per_page'] = $this->input->get('per_page');
        }
        $querystring .= "per_page=" . $data['per_page'];
        $likeSearch = [];
        $order_by = ['key' => 'forum_id', 'value' => 'DESC'];
        $data['sort'] = 'forum_id' ; 
        $data['order_by'] = 'DESC';
        
        $where = [];
      
        $data['querystring']=$querystring;
        if ($page > 1) { 
            $page = ($page - 1) * $data['per_page'];
        } else {
            $page = 0;
        }
    
        $data['record_count'] = $this->common_model->CountResults('forum',array());
        
        
        $data['row'] = $this->common_model->forumList($page, $data['per_page'], array(), $likeSearch, $order_by,'forum');
     
     
        $config = pagination_config($data['per_page']);
        $config['base_url'] = site_url('forum?' . $querystring.'&sort='. $data['sort'].'&order_by='.$data['order_by']);
        $config['total_rows'] = $data['record_count'];
   
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
         
         
        $data['content']="forum";
        $this->load->view('web_template',$data);
    }
     public function refer_and_earn(){
         
         if(!empty($this->session->userdata('user_id'))){
         $data['referral_code'] = $this->common_model->GetRow('users',array('id'=>$this->session->userdata('user_id') ));
         }
        $data['content']="referAndEarn";
        $this->load->view('web_template',$data);
    }
      public function send(){
          
        $arr['msg'] = $this->input->post('message');
        $arr['sender_id'] = $this->session->userdata('user_id');
        $arr['receiver_id'] = 1;
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
      
      
      public function market_dropdown(){
        $date = $this->input->post('date');
          if( $this->input->post('game')=='jodi'){
              
              $data = $this->common_model->market_time_list('market_time');
                  echo " <option disabled selected value>Select Market</option>";
               foreach($data as $d){
                   
                   if($date > date('Y-m-d')){
                       
                        echo "<option  value='".$d->market_id."'>".$d->name."(".$d->open_time.")</option>";
                       
                   }else{
                       
                     
                         echo '<option value="'.$d->market_id.'" '.((date('H:i:s',strtotime(".$d->open_time.")) < date('H:i:s'))?'disabled="disabled"':"").'>'.$d->name.'('.$d->open_time.')</option>';
                      
                    //   echo '<option value="'.$d->market_id.'" '.((date('H:i:s',strtotime(".$d->open_time.")) < date('H:i:s'))?'disabled="disabled"':"" && $d->market_id .((date('H:i:s',strtotime(".$d->open_time."))
                    //   > strtotime('-60minutes'))?'disabled="disabled"':"")).'>'.$d->name.'('.$d->open_time.')</option>';
                    
                    //  echo '<option value="'.$d->market_id.' " '.((date('H:i:s',strtotime(".$d->open_time.")) < date('H:i:s'))?'disabled="disabled"':"").'>' .$d->name.'('.$d->open_time.')'  &&  '" '.$d->market_id.' " '.((date('H:i:s',strtotime(".$d->open_time.")) > strtotime('-30 minutes'))?'disabled="disabled"':"").'>' .$d->name.'('.$d->open_time.') </option>';
                   }

               }
          }else{
                 $data  = $this->common_model->get_market_dropdown();
                 echo ' <option disabled selected value>Select Market</option>';
                   foreach($data as $d){
                   
                   if($date > date('Y-m-d')){
                     
                        echo "<option  value='".$d->type."-".$d->market_id."'>".$d->market_name."(".$d->time.")</option>";
                   }else{
                       
                      echo '<option value="'.$d->type.'-'.$d->market_id.'" '.((date('H:i:s',strtotime(".$d->time.")) < date('H:i:s'))?'disabled="disabled"':"").'>'.$d->market_name.'('.$d->time.')</option>';
                        
                   }

 
               }
                
          }
     
      }
      
     
    
    public function validate($str, $d){
        
        if(!empty($str)){
                if($str >= $d){
                    if($str%10 ==0){
                        return TRUE;
                    }else{
                      $this->form_validation->set_message('validate','Enter Value in round of 10');
                       return FALSE;
                    }
                 
            }else{
                $this->form_validation->set_message('validate','Enter Value greater than or equal to '.$d);
                 return FALSE;
            }  
        }
      
      
    }
    
     public function notice(){
      $user=  $this->session->userdata('user_id');
    //   if(isset($this->session->userdata('user_id'))!==TRUE){
    //          redirect('login'); 
    //   }
        //  else{
            $data['row'] = $this->common_model->notice_board('notice_board');
            if(isset($user)){
            //$data['row'] = $this->common_model->notice_board('notice_board');
           // print_r($data['row']); die;
       }
       
        if(!empty($this->session->userdata('user_id'))){
         $data['chat_data'] = $this->common_model->ChatResult('chat', array('sender_id'=>$this->session->userdata('user_id')), array('receiver_id'=>$this->session->userdata('user_id')));
             }
          
        $data['content']="notice";
        $this->load->view('web_template',$data);
    // }
}

   public function game_common($m,$amount,$date,$data,$game_id,$game_name,$total,$comment,$where,$redirect){
       
            $m = $m;
            $amount = $amount;
            $date = $date;
            $data = $data;
            $game_id = $game_id;
            $game_name = $game_name;
            $total = $total;
            $comment = $comment;
            $where = $where;
            $redirect = $redirect;
            
            if($game_name == 'JODI'){
                 $saverow['market_id'] =  $m;
                 
                  $save_w['market_id'] =  $m;
                  
                  $save_b['market_id'] =  $m;
                 
            }else{
                 $saverow['type'] =  $m[0];
                 $saverow['market_id'] =  $m[1];
                 
                $save_w['market_type'] =  $m[0];
                $save_w['market_id'] =  $m[1];
                
                 $save_b['market_type'] =  $m[0];
                 $save_b['market_id'] =  $m[1];
            }
            
            
             foreach($amount as $key=>$val){
                     if(!empty($val)){
                    
                    
                     $saverow['user_id'] = $this->session->userdata('user_id');
                     $saverow['bid_number'] = $key;
                     $saverow['bid_amount'] = $val;
                    
                     $saverow['date'] =  $date;
                      $saverow['game_id'] = $game_id;
                     $saverow['min_bid_amount'] = $data->min_bid_amount;
                     $saverow['min_win_amount'] =  $data->win_amount;
                     
                      $save =    $this->common_model->InsertData('all_game',$saverow);
                     }

                }
            
            if($save){
            
       if($where =='wallet'){
               
             $save_w['user_id'] = $this->session->userdata('user_id');
             $save_w['txn_type'] = 'OUT';
             $save_w['amount'] = $total;
             $save_w['comment'] = $comment;
           
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
              $save_w['txn_by'] =  2;
             $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
             
             if($save_wallet){
              
             $this->session->set_flashdata('success', 'Bidding done successfully'); 
             redirect($redirect); 
             }
                             
                             
       }else if($where =='bonus'){
             $save_w['user_id'] = $this->session->userdata('user_id');
             $save_w['txn_type'] = 'OUT';
             $save_w['bonus_amount'] = $total;
             $save_w['comment'] = $comment;
            //   $save_w['market_type'] =  $m[0];
            //   $save_w['market_id'] =  $m[1];
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
             
             $save_wallet = $this->common_model->InsertData('bonus',$save_w); 
             
             if($save_wallet){
              
             $this->session->set_flashdata('success', 'Bidding done successfully'); 
             redirect($redirect); 
             }
       }else{
           
           $wallet_balance = GetWalletBalance($this->session->userdata('user_id'));
           $bonus_balance  = GetBonusBalance($this->session->userdata('user_id'));
           
              $w = (int)$wallet_balance - (int)$total;
              $wallet_reduce = (int)$total + (int)$w;
              $bonus_reduce  = (int)$total - $wallet_reduce;
           
         
             $save_w['user_id'] = $this->session->userdata('user_id');
             $save_w['txn_type'] = 'OUT';
             $save_w['amount'] = $wallet_reduce;
             $save_w['comment'] = $comment;
            //   $save_w['market_type'] =  $m[0];
            //   $save_w['market_id'] =  $m[1];
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
               $save_w['txn_by'] =  2;
             $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
             
             if($save_wallet){
                 
                  $save_b['user_id'] = $this->session->userdata('user_id');
                 $save_b['txn_type'] = 'OUT';
                 $save_b['bonus_amount'] = $bonus_reduce;
                 $save_b['comment'] = $comment;
                //   $save_b['market_type'] =  $m[0];
                //   $save_b['market_id'] =  $m[1];
                 $save_b['game_name'] = $game_name;
                 $save_b['txn_id'] =  date("dmyhis").rand(100,999);
             
             $save_bonus = $this->common_model->InsertData('bonus',$save_b); 
             
              if($save_bonus){
                    $this->session->set_flashdata('success', 'Bidding done successfully'); 
                    redirect($redirect); 
              }
           
            }
           
           
           
       }

   }

   }
  
}