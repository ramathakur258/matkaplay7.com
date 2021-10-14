<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Game extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();  
        $this->load->database();     
        $this->load->helper("api"); 
        $this->load->model("common_model");  
    }
    
       public function deposit_list($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
        
                 $page=0;
                if (!empty($request->page)) {
                        $page = $request->page;
                        }
       
       
        $data['per_page'] = 10;
        if (!empty($request->per_page)) {
             $data['per_page'] = $request->per_page;
        }
       
        $likeSearch = [];
        $order_by = ['key' => 'wallet_id', 'value' => 'DESC'];
       
        
        if ($page > 1) { 
            $page = ($page - 1) * $data['per_page'];
        } else {
            $page = 0;
        }
    
        $count = $this->common_model->CountResults('wallet',array('user_id'=>$token_check->id,'txn_type' =>'IN','market_id IS NULL'=>NULL));
        
        
        $list_data = $this->common_model->GetListData($page, $data['per_page'], array('user_id'=>$token_check->id,'txn_type' =>'IN','market_id IS NULL'=>NULL), $likeSearch, $order_by,'wallet');
        if($list_data){
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','count'=>$count,'data'=>$list_data]; 
            
        }else{
             $response = ['code'=>200,'status'=>'success','message'=>'No Record Found',]; 
        }
     
      
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invaid Access Token']; 
         }
         return $response;
    }
    
     public function game_history($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
                
                    $page=0;
                    if (!empty($request->page)) 
                     {
                        $page = $request->page;
                     }
       
       
                    $data['per_page'] = 10;
                    if (!empty($request->per_page)) {
                         $data['per_page'] = $request->per_page;
                    }
                   
                   
                    
                    if ($page > 1) { 
                        $page = ($page - 1) * $data['per_page'];
                    } else {
                        $page = 0;
                    }
                
        
     //    $count = $this->common_model->get_merged_count(array('single','jodi','single_patti','double_patti','tripple_patti'),$token_check->id);
            
        
      //   $list_data = $this->common_model->get_merged_result(array('single','jodi','single_patti','double_patti','tripple_patti'),$token_check->id,$page, $data['per_page']);
         
          $count = $this->common_model->CountResults('all_game',['user_id'=>$token_check->id]); 
           
          $list_data = $this->common_model->game_history('all_game',['all_game.user_id'=>$token_check->id],$page, $data['per_page']);

          if($list_data){
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','count'=>$count,'data'=>$list_data]; 
            
            }else{
                 $response = ['code'=>200,'status'=>'success','message'=>'No Record Found',]; 
            }
     
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
       public function withdraw_list($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
            
                   $page=0;
                    if (!empty($request->page))
                     {
                        $page = $request->page;
                      }
       
       
                    $data['per_page'] = 10;
                    if (!empty($request->per_page)) {
                         $data['per_page'] = $request->per_page;
                    }
      
                $likeSearch = [];
                 $order_by = ['key' => 'id', 'value' => 'DESC'];
     
        
       
                    if ($page > 1) { 
                        $page = ($page - 1) * $data['per_page'];
                    } else {
                        $page = 0;
                    }
    
         $count = $this->common_model->CountResults('money_request',array('user_id'=>$token_check->id));
        
       
        $list_data = $this->common_model->GetListData($page, $data['per_page'], array('user_id'=>$token_check->id), $likeSearch, $order_by,'money_request');
     
         if($list_data){
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','count'=>$count,'data'=>$list_data]; 
            
            }else{
                 $response = ['code'=>200,'status'=>'success','message'=>'No Record Found',]; 
            }
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
      public function withdraw_request($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
                 $saverow['bank_name'] = $request->bank_name;
                 $saverow['account_number'] =$request->account_number;
                 $saverow['ifsc_code'] = $request->ifsc_code;
                 $saverow['account_holder_name'] =  $request->account_holder_name;
                 $saverow['amount'] = $request->amount;
                 
             $this->form_validation->set_data($saverow);
             $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
             $this->form_validation->set_rules('account_number', 'Account Number', 'required');
             $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'required');
             $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required');
             $this->form_validation->set_rules('amount', 'amount', 'required');
             
             if ($this->form_validation->run() == TRUE){
                   
                 
                 if(GetWalletBalance($token_check->id) < $request->amount){
                            
                $response = ['code'=>200,'status'=>'fail','message'=>'Request Amount is more than wallet balance']; 
                        
                       }else{
                                  $saverow['user_id'] =$token_check->id;
                                  $save = $this->common_model->InsertData('money_request',$saverow); 
                                  
                             if($save){
                                 
                                $response = ['code'=>200,'status'=>'success','message'=>'Request send successfully'];  

                               
                             }
                       }
                   }else{
                        $error="Something went Wrong";
                       if(form_error('bank_name')){
                            $error=form_error('bank_name');
                        }elseif(form_error('account_number')){
                            $error=form_error('account_number');
                        }elseif(form_error('account_holder_name')){
                            $error=form_error('account_holder_name');
                        }elseif(form_error('ifsc_code')){
                            $error=form_error('ifsc_code');
                        }elseif(form_error('amount')){
                            $error=form_error('amount');
                        }
          
             $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ];  
                   }
             
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
      public function market_dropdown($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($request->game=='jodi'){
                 $data = $this->common_model->market_time_list('market_time');
             }else{
                 $data = $this->common_model->get_market_dropdown();
             }
                
                if($data){
                     $response = ['code'=>200,'status'=>'success','message'=>'Record Found','data'=>$data];   
                }else{
                   $response = ['code'=>200,'status'=>'fail','message'=>'No Record Found'];     
                }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function home($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
               $market_time = $this->common_model->market_time_list('market_time');
               $result_data = $this->common_model->result_list('market_time');
               $game_data = $this->common_model->GetResult('market_type_rate');
              
           
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','market_time'=>$market_time, 'result_data'=>$result_data,'game_data'=>$game_data]; 
             
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function single($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($token_check->status == 'ACTIVE'){
           // print_r($token_check); die;
             $market_rate = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'SINGLE' ));
               $m =   explode("-",$request->market);
             $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
                    
                   if($request->date > date('Y-m-d')){
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
                    
                    
                    
                          if(empty($request->market)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'market is required'];  
                          }else if(empty($request->date)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Date is required'];  
                          }elseif(count($request->amount_val) ==0){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Amount value is required'];  
                          }else if( $time_check == false ){
                               $response = ['code'=>200,'status'=>'fail','message'=>'Market time is over'];
                              }else{
                               $amount  = $request->amount_val;
                               $check_min_bid = array();
                               $check_round = array(); 
                                
                               for($i=0; $i<count($amount); $i++){
                                   if(!empty($amount[$i])){
                                       if($amount[$i] < $market_rate->min_bid_amount){
                                        array_push($check_min_bid,$amount[$i] );
                                      }
                                        if($amount[$i]%10 !==0){
                                        array_push($check_round,$amount[$i] );
                                      }
                                      
                                    
                                   }
                                 }
                                 
                                 
                                   if(count($check_min_bid) > '0' ){
                         
                          $response = ['code'=>200,'status'=>'fail','message'=>'Please insert the value greater than '.$market_rate->min_bid_amount]; 
                       
                         }else if(count($check_round) > '0'){
                           $response = ['code'=>200,'status'=>'fail','message'=>'Enter amount in round of 10'];    
                         }
                        else{
                           
                          $key = $request->amount_key;
                           
                             $wallet_balance = GetWalletBalance($token_check->id);
                            $bonus_balance = GetBonusBalance($token_check->id);
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $request->total;
                            $comment = 'Money spent on single game';
                            $game = 1;
                            $game_name='SINGLE';
                            
                            if(GetWalletBalance($token_check->id) < $request->total){
                                
                               $diff = (int)$request->total -  (int)GetWalletBalance($token_check->id);
                                
                                if($diff == $request->total){
                                      if($bonus_balance < $request->total){
                                           $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in bonus']; 
                                           
                                      }else{
                                        
                                       $response=  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'bonus',$token_check->id);       
                                      }
                                }else{
                                    if($total_balance < $request->total){
                                         $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in both wallet and bonus']; 
                                     
                                    }else{
                                        //  $this->game_common($m,$amount,$this->input->post('date'),$data['market_rate'],1,'SINGLE',$total,$comment,'both','single');
                                        $response =   $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'both',$token_check->id);       
                                    }
                                }
                                
                                
                            }else{
                              
                               $response =  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'wallet',$token_check->id);       
                            }
                            
                       
                            
                       }
                                 
                        
                   }
             }else{
                $response = ['code'=>200,'status'=>'fail','message'=>'You are blocked by admin'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function jodi($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($token_check->status == 'ACTIVE'){
           // print_r($token_check); die;
             $market_rate = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'JODI' ));
               $m =   $request->market;
             $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m ));
             
             
              if( $request->date > date('Y-m-d')){
                     $time_check = true; 
                 }else{
                       if(date('H:i:s',strtotime($market_time->open_time)) < date('H:i:s') ){
                               $time_check = false;  
                             }else{
                               $time_check = true;   
                             }
                 }
                    
                          if(empty($request->market)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'market is required'];  
                          }else if(empty($request->date)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Date is required'];  
                          }elseif(count($request->amount_val) ==0){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Amount value is required'];  
                          }else if( $time_check == false ){
                               $response = ['code'=>200,'status'=>'fail','message'=>'Market time is over'];
                              }else{
                               $amount  = $request->amount_val;
                               $check_min_bid = array();
                               $check_round = array(); 
                                
                               for($i=0; $i<count($amount); $i++){
                                   if(!empty($amount[$i])){
                                       if($amount[$i] < $market_rate->min_bid_amount){
                                        array_push($check_min_bid,$amount[$i] );
                                      }
                                        if($amount[$i]%10 !==0){
                                        array_push($check_round,$amount[$i] );
                                      }
                                      
                                    
                                   }
                                 }
                                 
                                 
                                   if(count($check_min_bid) > '0' ){
                         
                          $response = ['code'=>200,'status'=>'fail','message'=>'Please insert the value greater than '.$market_rate->min_bid_amount]; 
                       
                         }else if(count($check_round) > '0'){
                           $response = ['code'=>200,'status'=>'fail','message'=>'Enter amount in round of 10'];    
                         }
                        else{
                           
                             $key = $request->amount_key;
                           
                             $wallet_balance = GetWalletBalance($token_check->id);
                            $bonus_balance = GetBonusBalance($token_check->id);
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $request->total;
                            $comment = 'Money spent on jodi game';
                            $game = 2;
                            $game_name='JODI';
                            
                            if(GetWalletBalance($token_check->id) < $request->total){
                                
                               $diff = (int)$request->total -  (int)GetWalletBalance($token_check->id);
                                
                                if($diff == $request->total){
                                      if($bonus_balance < $request->total){
                                           $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in bonus']; 
                                             
                                      }else{
                                     
                                       $response=  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'bonus',$token_check->id);       
                                      }
                                }else{
                                    if($total_balance < $request->total){
                                         $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in both wallet and bonus']; 
                        
                                    }else{
                                        $response =   $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'both',$token_check->id);       
                                    }
                                }
                                
                                
                            }else{
                              
                               $response =  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'wallet',$token_check->id);       
                            }
                           
                          
                            
                       }
                                 
                        
                   }
             }else{
                $response = ['code'=>200,'status'=>'fail','message'=>'You are blocked by admin'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function single_patti($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($token_check->status == 'ACTIVE'){
           // print_r($token_check); die;
             $market_rate = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'SINGLE PATTI' ));
               $m =   explode("-",$request->market);
             $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
             
               if($request->date > date('Y-m-d')){
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
                     
                          if(empty($request->market)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'market is required'];  
                          }else if(empty($request->date)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Date is required'];  
                          }elseif(count($request->amount_val) ==0){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Amount value is required'];  
                          }else if( $time_check == false ){
                               $response = ['code'=>200,'status'=>'fail','message'=>'Market time is over'];
                              }else{
                               $amount  = $request->amount_val;
                               $check_min_bid = array();
                               $check_round = array(); 
                                
                               for($i=0; $i<count($amount); $i++){
                                   if(!empty($amount[$i])){
                                       if($amount[$i] < $market_rate->min_bid_amount){
                                        array_push($check_min_bid,$amount[$i] );
                                      }
                                        if($amount[$i]%10 !==0){
                                        array_push($check_round,$amount[$i] );
                                      }
                                      
                                    
                                   }
                                 }
                                 
                                 
                                   if(count($check_min_bid) > '0' ){
                         
                          $response = ['code'=>200,'status'=>'fail','message'=>'Please insert the value greater than '.$market_rate->min_bid_amount]; 
                       
                         }else if(count($check_round) > '0'){
                           $response = ['code'=>200,'status'=>'fail','message'=>'Enter amount in round of 10'];    
                         }
                        else{
                            
                            
                            
                               $key = $request->amount_key;
                           
                             $wallet_balance = GetWalletBalance($token_check->id);
                            $bonus_balance = GetBonusBalance($token_check->id);
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $request->total;
                            $comment = 'Money spent on single patti game';
                            $game = 3;
                            $game_name='SINGLE PATTI';
                            
                            if(GetWalletBalance($token_check->id) < $request->total){
                                
                               $diff = (int)$request->total -  (int)GetWalletBalance($token_check->id);
                                
                                if($diff == $request->total){
                                      if($bonus_balance < $request->total){
                                           $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in bonus']; 
                                            
                                      }else{
                                     
                                       $response=  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'bonus',$token_check->id);       
                                      }
                                }else{
                                    if($total_balance < $request->total){
                                         $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in both wallet and bonus']; 
                                       
                                    }else{
                                        $response =   $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'both',$token_check->id);       
                                    }
                                }
                                
                                
                            }else{
                              
                               $response =  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'wallet',$token_check->id);       
                            }
                           
                          
                       }
                                 
                        
                   }
             }else{
                $response = ['code'=>200,'status'=>'fail','message'=>'You are blocked by admin'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function double_patti($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($token_check->status == 'ACTIVE'){
           // print_r($token_check); die;
             $market_rate = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'DOUBLE PATTI' ));
               $m =   explode("-",$request->market);
             $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
             
               if($request->date > date('Y-m-d')){
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
                     
                          if(empty($request->market)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'market is required'];  
                          }else if(empty($request->date)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Date is required'];  
                          }elseif(count($request->amount_val) ==0){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Amount value is required'];  
                          }else if( $time_check == false ){
                               $response = ['code'=>200,'status'=>'fail','message'=>'Market time is over'];
                              }else{
                               $amount  = $request->amount_val;
                               $check_min_bid = array();
                               $check_round = array(); 
                                
                               for($i=0; $i<count($amount); $i++){
                                   if(!empty($amount[$i])){
                                       if($amount[$i] < $market_rate->min_bid_amount){
                                        array_push($check_min_bid,$amount[$i] );
                                      }
                                        if($amount[$i]%10 !==0){
                                        array_push($check_round,$amount[$i] );
                                      }
                                      
                                    
                                   }
                                 }
                                 
                                 
                                   if(count($check_min_bid) > '0' ){
                         
                          $response = ['code'=>200,'status'=>'fail','message'=>'Please insert the value greater than '.$market_rate->min_bid_amount]; 
                       
                         }else if(count($check_round) > '0'){
                           $response = ['code'=>200,'status'=>'fail','message'=>'Enter amount in round of 10'];    
                         }
                         
                       else{
                           
                           
                               $key = $request->amount_key;
                           
                             $wallet_balance = GetWalletBalance($token_check->id);
                            $bonus_balance = GetBonusBalance($token_check->id);
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $request->total;
                            $comment = 'Money spent on double patti game';
                            $game = 4;
                            $game_name='DOUBLE PATTI';
                            
                            if(GetWalletBalance($token_check->id) < $request->total){
                                
                               $diff = (int)$request->total -  (int)GetWalletBalance($token_check->id);
                                
                                if($diff == $request->total){
                                      if($bonus_balance < $request->total){
                                          $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in bonus']; 
                             
                                      }else{
                                     
                                       $response=  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'bonus',$token_check->id);       
                                      }
                                }else{
                                    if($total_balance < $request->total){
                                           $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in both wallet and bonus']; 
                                         
                                    }else{
                                        $response =   $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'both',$token_check->id);       
                                    }
                                }
                                
                                
                            }else{
                              
                               $response =  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'wallet',$token_check->id);       
                            }
                           
                          
                           
                           
                        //   $key = $request->amount_key;
                           
                        //      for($i=0; $i<count($amount); $i++){
                        //      //foreach($amount as $key=>$val){
                        //          if(!empty($amount[$i])){
                                
                                
                        //          $saverow['user_id'] = $token_check->id;
                        //          $saverow['bid_number'] = $key[$i];
                        //          $saverow['bid_amount'] = $amount[$i];
                        //          $saverow['type'] =  $m[0];
                        //           $saverow['market_id'] =  $m[1];
                        //          $saverow['date'] =  $request->date;
                        //           $saverow['game_id'] = 4;
                        //             $saverow['min_bid_amount'] = $market_rate->min_bid_amount;
                        //          $saverow['min_win_amount'] =  $market_rate->win_amount;
                                 
                        //           $save = $this->common_model->InsertData('double_patti',$saverow); 
                                  
                              
                        //              $this->common_model->InsertData('all_game',$saverow); 
                                  
                                    
                        //          }

                        //      }
                             
                        //      if($save){
                                 
                        //          $save_w['user_id'] = $token_check->id;
                        //          $save_w['txn_type'] = 'OUT';
                        //          $save_w['amount'] = $request->total;
                        //          $save_w['comment'] = 'Money spent on double patti game';
                        //           $save_w['market_type'] =  $m[0];
                        //           $save_w['market_id'] =  $m[1];
                        //          $save_w['game_name'] = 'DOUBLE PATTI';
                        //          $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                        //          $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                        //          if($save_wallet){
                        //             $response = ['code'=>200,'status'=>'success','message'=>'Bidding done successfully']; 
                               
                        //          }
                             
                        //      }
                            
                       }
                                 
                        
                   }
             }else{
                $response = ['code'=>200,'status'=>'fail','message'=>'You are blocked by admin'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function tripple_patti($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             if($token_check->status == 'ACTIVE'){
           // print_r($token_check); die;
             $market_rate = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>'TRIPLE PATTI' ));
               $m =   explode("-",$request->market);
             $market_time = $this->common_model->GetRow('market_time',array('market_id'=>$m[1] ));
             
              if($request->date > date('Y-m-d')){
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
                     
                          if(empty($request->market)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'market is required'];  
                          }else if(empty($request->date)){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Date is required'];  
                          }elseif(count($request->amount_val) ==0){
                                $response = ['code'=>200,'status'=>'fail','message'=>'Amount value is required'];  
                          }else if( $time_check == false ){
                               $response = ['code'=>200,'status'=>'fail','message'=>'Market time is over'];
                              }else{
                               $amount  = $request->amount_val;
                               $check_min_bid = array();
                               $check_round = array(); 
                                
                               for($i=0; $i<count($amount); $i++){
                                   if(!empty($amount[$i])){
                                       if($amount[$i] < $market_rate->min_bid_amount){
                                        array_push($check_min_bid,$amount[$i] );
                                      }
                                        if($amount[$i]%10 !==0){
                                        array_push($check_round,$amount[$i] );
                                      }
                                      
                                    
                                   }
                                 }
                                 
                                 
                                   if(count($check_min_bid) > '0' ){
                         
                          $response = ['code'=>200,'status'=>'fail','message'=>'Please insert the value greater than '.$market_rate->min_bid_amount]; 
                       
                         }else if(count($check_round) > '0'){
                           $response = ['code'=>200,'status'=>'fail','message'=>'Enter amount in round of 10'];    
                         }
                         else if(GetWalletBalance($token_check->id) < $request->total){
                           
                              $response = ['code'=>200,'status'=>'fail','message'=>'Your wallet balance is low']; 
                           
                       }else{
                           
                           
                               $key = $request->amount_key;
                           
                             $wallet_balance = GetWalletBalance($token_check->id);
                            $bonus_balance = GetBonusBalance($token_check->id);
                            $total_balance = (int)$wallet_balance + (int)$bonus_balance;
                            
                            $total = $request->total;
                            $comment = 'Money spent on tripple patti game';
                            $game = 5;
                            $game_name='TRIPPLE PATTI';
                            
                            if(GetWalletBalance($token_check->id) < $request->total){
                                
                               $diff = (int)$request->total -  (int)GetWalletBalance($token_check->id);
                                
                                if($diff == $request->total){
                                      if($bonus_balance < $request->total){
                                          
                                            $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in bonus']; 
                             
                                      }else{
                                     
                                       $response=  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'bonus',$token_check->id);       
                                      }
                                }else{
                                    if($total_balance < $request->total){
                                          $response = ['code'=>200,'status'=>'fail','message'=>'Balance is low in both wallet and bonus']; 
                                 
                                    }else{
                                        $response =   $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'both',$token_check->id);       
                                    }
                                }
                                
                                
                            }else{
                              
                               $response =  $this->game_common($m,$key,$amount,$request->date,$market_rate,$game,$game_name,$total,$comment,'wallet',$token_check->id);       
                            }
                           
                           
                           
                          
                           
                           
                        //   $key = $request->amount_key;
                           
                        //      for($i=0; $i<count($amount); $i++){
                        //      //foreach($amount as $key=>$val){
                        //          if(!empty($amount[$i])){
                                
                                
                        //          $saverow['user_id'] = $token_check->id;
                        //          $saverow['bid_number'] = $key[$i];
                        //          $saverow['bid_amount'] = $amount[$i];
                        //          $saverow['type'] =  $m[0];
                        //           $saverow['market_id'] =  $m[1];
                        //          $saverow['date'] =  $request->date;
                        //           $saverow['game_id'] = 5;
                        //             $saverow['min_bid_amount'] = $market_rate->min_bid_amount;
                        //          $saverow['min_win_amount'] =  $market_rate->win_amount;
                                 
                        //           $save = $this->common_model->InsertData('tripple_patti',$saverow); 
                                  
                        //              $this->common_model->InsertData('all_game',$saverow);
                        //          }

                        //      }
                             
                        //      if($save){
                                 
                        //          $save_w['user_id'] = $token_check->id;
                        //          $save_w['txn_type'] = 'OUT';
                        //          $save_w['amount'] = $request->total;
                        //          $save_w['comment'] = 'Money spent on tripple patti game';
                        //           $save_w['market_type'] =  $m[0];
                        //           $save_w['market_id'] =  $m[1];
                        //          $save_w['game_name'] = 'TRIPPLE PATTI';
                        //          $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                                 
                        //          $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
                                 
                        //          if($save_wallet){
                        //             $response = ['code'=>200,'status'=>'success','message'=>'Bidding done successfully']; 
                               
                        //          }
                             
                        //      }
                            
                       }
                                 
                        
                   }
             }else{
                $response = ['code'=>200,'status'=>'fail','message'=>'You are blocked by admin'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function forum_list($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
                $page=0;
                    if (!empty($request->page))
                     {
                        $page = $request->page;
                      }
       
       
                    $data['per_page'] = 10;
                    if (!empty($request->per_page)) {
                         $data['per_page'] = $request->per_page;
                    }
      
                $likeSearch = [];
                 $order_by = ['key' => 'forum_id', 'value' => 'DESC'];
     
        
       
                    if ($page > 1) { 
                        $page = ($page - 1) * $data['per_page'];
                    } else {
                        $page = 0;
                    }
    
          $count = $this->common_model->CountResults('forum',array());
        
        
        $list_data = $this->common_model->forumList($page, $data['per_page'], array(), $likeSearch, $order_by,'forum');
     
         if($list_data){
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','count'=>$count,'data'=>$list_data]; 
            
            }else{
                 $response = ['code'=>200,'status'=>'success','message'=>'No Record Found',]; 
            }
            
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
      public function forum_post($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
              $saverow['msg'] = $request->message;
          
           
            $this->form_validation->set_data($saverow);
            $this->form_validation->set_rules('msg', 'Message', 'required');
          
      
           if($this->form_validation->run() !== FALSE){
            
                                  $saverow['user_id'] =$token_check->id;
                                  $save = $this->common_model->InsertData('forum',$saverow); 
                                  
                             if($save){
                               
                                 $response=["code"=>200,'status'=>'success','message'=>'Comment added successfully' ]; 
                             }else{
                                  $response=["code"=>200,'status'=>'fail','message'=>'Failed to add comment' ];  
                             }
            
                }else{
                     $error="Something went Wrong";
                       if(form_error('msg')){
                            $error=form_error('msg');
                        }
                  
                     $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ]; 
                }
             
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function game_and_rate($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
              $data = $this->common_model->GetRow('market_type_rate',array('market_type_name'=>$request->game_name ));
              if($data){
              $response = ['code'=>200,'status'=>'success','message'=>'Record Found','data'=>$data]; 
              }else{
            $response = ['code'=>200,'status'=>'success','message'=>'No Record Found'];
              }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
    
      public function money_detail($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
                $query_deposit = 'SELECT COALESCE(SUM(amount),0) as sum FROM wallet where user_id='.$token_check->id.' AND txn_type="IN" AND market_id IS NULL';
                $sql_deposit = $this->db->query($query_deposit);
                $data_deposit = $sql_deposit->row();
                 
                $query_withdraw = 'SELECT COALESCE(SUM(amount),0) as sum FROM money_request where user_id='.$token_check->id.' AND status="COMPLETED"';
                $sql_withdraw = $this->db->query($query_withdraw);
                $data_withdraw = $sql_withdraw->row();
                
                $query_win_amount = 'SELECT COALESCE(SUM(won_amount),0) as sum FROM all_game where user_id='.$token_check->id.' AND game_status="win"';
                $sql_win_amount = $this->db->query($query_win_amount);
                $data_win_amount = $sql_win_amount->row();
                
                $d['total_deposit'] = $data_deposit->sum;
                $d['total_withdraw'] = $data_withdraw->sum;
                $d['total_win_amount'] = $data_win_amount->sum;
                 $response = ['code'=>200,'status'=>'success','message'=>'Record Found', 'data'=>$d]; 
             
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function post_chat($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
             if(!empty($request->message)){
            $this->load->model('common_model');
                    $arr['msg'] = $request->message;
                    $arr['sender_id'] = $token_check->id;
                    $arr['receiver_id'] = '1';
                    $arr['date'] = date('Y-m-d H:i:s');
                    
                    $this->db->insert('chat', $arr);
                    $insertId = $this->db->insert_id();
                    
                    $data = $this->common_model->GetRow('chat',array('chat_id'=>$insertId ));
                  
           
              $response = ['code'=>200,'status'=>'success','message'=>'Message send successfully','data'=>$data];  
             }else{
                 $response = ['code'=>200,'status'=>'fail','message'=>'message field missing'];  
             }
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
     public function chat_list($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
             
              $update = $this->common_model->UpdateData('chat',['is_read'=>'1'], array('receiver_id'=>$token_check->id));
              $data = $this->common_model->ChatResult('chat', array('sender_id'=>$token_check->id), array('receiver_id'=>$token_check->id));
                  
              $response = ['code'=>200,'status'=>'success','message'=>'Record Found','data'=>$data];  
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
      public function deposit_request($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
           
                        $saverow['name'] = $request->name;
                        $saverow['mobile_no'] = $request->mobile_no;
                        $saverow['amount'] = $request->amount;
                        $saverow['description'] = $request->description;
           
                   $this->form_validation->set_data($saverow);
                   
                    $this->form_validation->set_rules('name', 'Name', 'required');
                    $this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
                    $this->form_validation->set_rules('amount', 'Amount', 'required');
                    $this->form_validation->set_rules('description', 'Description', 'required');
                   
                   if($this->form_validation->run() !== FALSE){
            
                                  $saverow['user_id'] =$token_check->id;
                                  $save = $this->common_model->InsertData('deposit_request',$saverow); 
                                  
                             if($save){
                               
                                 $response=["code"=>200,'status'=>'success','message'=>'Request added successfully' ]; 
                             }else{
                                  $response=["code"=>200,'status'=>'fail','message'=>'Failed to add request' ];  
                             }
            
                }else{
                     $error="Something went Wrong";
                       if(form_error('name')){
                            $error=form_error('name');
                        }elseif(form_error('mobile_no')){
                            $error=form_error('mobile_no');
                        }elseif(form_error('amount')){
                            $error=form_error('amount');
                        }elseif(form_error('description')){
                            $error=form_error('description');
                        }
                  
                     $response=["code"=>200,'status'=>'fail','message'=>strip_tags($error) ]; 
                }
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    public function result_detail($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            $ar = array();
             $query = 'SELECT *, DAYNAME(created_at) as day, WEEK(created_at) as week , YEAR(created_at) as year FROM result where market_id='.$request->market_id;
                $sql = $this->db->query($query);
                $data = $sql->result();
                
            $query1 = 'SELECT year,week, count(week) as c FROM(SELECT *, DAYNAME(created_at) as day, WEEK(created_at) as week , YEAR(created_at) as year FROM result where market_id='.$request->market_id.')as p GROUP BY week';
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
                        });
                      
                        array_push($u,$y);
              }
                
                $h=array_map( function($x){
       
                     return array_values($x);
                  },$u);
                  
                //   $p=array_map( function($x){
       
                //   return array_replace_key('name', 'full_name', $user));
                //     // return array_values($x);
                //   },$h);
               
                // $p=array_map( function($x){
               
                //     $j['record']['open_digit'] = implode(', ', array_column($x, 'open_result_digit'));
                //     $j['record']['close_digit'] = implode(', ', array_column($x, 'close_result_digit'));
                //     $j['record']['close_sum'] = implode(', ', array_column($x, 'close_digit_sum'));
                //     $j['record']['open_sum'] = implode(', ', array_column($x, 'open_digit_sum'));
                //     $j['record']['day'] = implode(', ', array_column($x, 'day'));
                //   return $j;
                //   },$h);
             
              $response = ['code'=>200,'status'=>'success','message'=>'Record Found','data'=>$h];
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
     public function notice_board($request=[],$response=[])
    {
         $token_check=verifyToken();
         if($token_check){
            
            
                   $page=0;
                    if (!empty($request->page))
                     {
                        $page = $request->page;
                      }
       
       
                    $data['per_page'] = 10;
                    if (!empty($request->per_page)) {
                         $data['per_page'] = $request->per_page;
                    }
      
                $likeSearch = [];
                 $order_by = ['key' => 'date', 'value' => 'DESC'];
     
        
       
                    if ($page > 1) { 
                        $page = ($page - 1) * $data['per_page'];
                    } else {
                        $page = 0;
                    }
    
        $count = $this->common_model->CountResults('notice_board');
       // print_r($count); die;
        $list_data = $this->common_model->GetListData($page, $data['per_page'], array('notice_id'), $likeSearch, $order_by,'notice_board');
        // print_r($list_data); die;

         if($list_data){
             $response = ['code'=>200,'status'=>'success','message'=>'Record Found','count'=>$count,'data'=>$list_data]; 
            
            }else{
                 $response = ['code'=>200,'status'=>'success','message'=>'No Record Found',]; 
            }
            
         }else{
             $response = ['code'=>400,'status'=>'fail','message'=>'Invalid Access Token']; 
         }
         return $response;
    }
    
    
    
     public function game_common($m,$key,$amount,$date,$data,$game_id,$game_name,$total,$comment,$where,$token_id){
            $m = $m;
            $key = $key;
            $amount = $amount;
            $date = $date;
            $data = $data;
            $game_id = $game_id;
            $game_name = $game_name;
            $total = $total;
            $comment = $comment;
            $where = $where;
            $token_id = $token_id;
            
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
            
            
            
                
                  for($i=0; $i<count($amount); $i++){
                             
                                 if(!empty($amount[$i])){
                                 $saverow['user_id'] = $token_id;
                                 $saverow['bid_number'] = $key[$i];
                                 $saverow['bid_amount'] = $amount[$i];
                                
                                 $saverow['date'] =  $date;
                                  $saverow['game_id'] = $game_id;;
                                 $saverow['min_bid_amount'] = $data->min_bid_amount;
                                 $saverow['min_win_amount'] =  $data->win_amount;
                                 
                                  
                                  
                                  $save =   $this->common_model->InsertData('all_game',$saverow);
                                 }

                             }
                
            if($save){
            
       if($where =='wallet'){
               
             $save_w['user_id'] = $token_id;
             $save_w['txn_type'] = 'OUT';
             $save_w['amount'] = $total;
             $save_w['comment'] = $comment;
           
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
             $save_w['txn_by'] =  2;
             $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
             
             if($save_wallet){
              
               $response = ['code'=>200,'status'=>'success','message'=>'Bidding done successfully']; 
            
             }
                             
                             
       }else if($where =='bonus'){
             $save_w['user_id'] =$token_id;
             $save_w['txn_type'] = 'OUT';
             $save_w['bonus_amount'] = $total;
             $save_w['comment'] = $comment;
            //   $save_w['market_type'] =  $m[0];
            //   $save_w['market_id'] =  $m[1];
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
             
             $save_wallet = $this->common_model->InsertData('bonus',$save_w); 
             
             if($save_wallet){
              
             $response = ['code'=>200,'status'=>'success','message'=>'Bidding done successfully'];  
             }
       }else{
           
           $wallet_balance = GetWalletBalance($token_id);
           $bonus_balance  = GetBonusBalance($token_id);
           
              $w = (int)$wallet_balance - (int)$total;
              $wallet_reduce = (int)$total + (int)$w;
              $bonus_reduce  = (int)$total - $wallet_reduce;
           
         
             $save_w['user_id'] = $token_id;
             $save_w['txn_type'] = 'OUT';
             $save_w['amount'] = $wallet_reduce;
             $save_w['comment'] = $comment;
            //   $save_w['market_type'] =  $m[0];
            //   $save_w['market_id'] =  $m[1];
             $save_w['game_name'] = $game_name;
             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
              $save_w['txn_by'] = 2;
             $save_wallet = $this->common_model->InsertData('wallet',$save_w); 
             
             if($save_wallet){
                 
                  $save_b['user_id'] =$token_id;
                 $save_b['txn_type'] = 'OUT';
                 $save_b['bonus_amount'] = $bonus_reduce;
                 $save_b['comment'] = $comment;
                //   $save_b['market_type'] =  $m[0];
                //   $save_b['market_id'] =  $m[1];
                 $save_b['game_name'] = $game_name;
                 $save_b['txn_id'] =  date("dmyhis").rand(100,999);
             
             $save_bonus = $this->common_model->InsertData('bonus',$save_b); 
             
              if($save_bonus){
                     $response = ['code'=>200,'status'=>'success','message'=>'Bidding done successfully']; 
              }
           
            }
           
           }
    
       }
              return $response;
       }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}