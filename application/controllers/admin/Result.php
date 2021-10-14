<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Result extends CI_Controller {
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
     //  $data['script']="result/script"; 
      //$data['result_data'] = $this->common_model->result_list('market_time');
       $data['result_data'] = $this->common_model->test_result();
      // print_r($data['result_data']); die;
       $data['content']="result/index";
    
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
       
       $data['count']=$this->admin_model->CountResultList($keyword);
    
         $data['recordsFiltered']=$data['count'];
         $data['aaData']=$this->admin_model->ResultList(10,$offset,$keyword,$orderkey,$ordervalue);
//           $data['aaData']=$this->admin_model->dummyResultList(10,$offset,$keyword,$orderkey,$ordervalue);
      
//   echo "<pre>";
//     print_r($data['aaData']); die;
          //$data['aaData'] = $this->common_model->result_list('market_time');
   // print_r($data['aaData']); die;
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             //print_r($data['aaData']);
         response($data);
     }


    }


    public function edit($user_id = null){
        
      $this->load->model('common_model');

      if($this->input->server('REQUEST_METHOD')=='POST'){
          
        $this->form_validation->set_rules('market_id', 'Market Name', 'required');
        $this->form_validation->set_rules('result_digit', 'Result Digit', 'required|numeric');
         $this->form_validation->set_rules('result_digit_sum', 'Sum', 'required|numeric');
      
  

        if($this->form_validation->run() !== FALSE){
           
              $m =   explode("-",$this->input->post('market_id'));
              
             //  $saverow['market_type'] =  $m[0];
               $saverow['market_id'] =  $m[1];
                
               if( $m[0] == 'OPEN'){
                       $saverow['open_result_digit'] =  $this->input->post('result_digit');
                       $saverow['open_digit_sum'] =  $this->input->post('result_digit_sum');
              }else{
                       $saverow['close_result_digit'] =  $this->input->post('result_digit');
                       $saverow['close_digit_sum'] =  $this->input->post('result_digit_sum');
               }
          
    $result = $this->common_model->GetRow('result',array('market_id'=>$m[1], 'DATE(created_at)'=>date("Y-m-d") ));
    
       if(empty($result)){
          
            $save = $this->common_model->InsertData('result',$saverow); 
           
       }else{
          
            // print_r(1); die; 
           $all_game = $this->common_model->GetResult('all_game',array('market_id'=>$m[1], 'DATE(date)'=>date("Y-m-d"),'game_status'=>'win' ));
                 $wal = [];
                  
                 if(count($all_game) > 0){
                     
                      foreach($all_game as $g){
                              
                              $game_name = $this->common_model->GetRow('market_type_rate',array('id'=>$g->game_id));
                              
                             $t = array('user_id'=>$g->user_id, 'txn_type'=>'OUT','amount'=>$g->won_amount, 'txn_id'=>date("dmyhis").rand(100,999),'market_type'=>$g->type,'comment'=>'Money revert back because of wrong result','market_id'=>$g->market_id,'game_name'=>$game_name->market_type_name);
                             
                             array_push($wal,$t);
                          }
                     
                     
                 }
                        
                        
                    if($result->open_result_digit !==null && !empty($saverow['open_result_digit']) ){
                        
                        $set['won_amount'] = null;
                        $set['game_status'] = null;
                       //print_r(1); die;
                     if(count($wal) >0){
                          $wallet_insert = $this->common_model->InsertBatch('wallet',$wal);
                         
                     }
                      
                     
                       $update = $this->common_model->UpdateResultData('all_game',$set,array('market_id'=>$result->market_id, 'Date(date)'=>date("Y-m-d"), 'type'=>'OPEN'), 'type IS NULL');
            //print_r( $update); die;
           
           
                    }else if($result->close_result_digit !==null && !empty($saverow['close_result_digit'])){
                       
                         $set['won_amount'] = null;
                         $set['game_status'] = null;
                         
                        if(count($wal) >0){
                       $wallet_insert = $this->common_model->InsertBatch('wallet',$wal); 
                        }
                      
                       $update = $this->common_model->UpdateResultData('all_game',$set,array('market_id'=>$result->market_id, 'Date(date)'=>date("Y-m-d"), 'type'=>'CLOSE'), 'type IS NULL');
                        
                    }
           
            $update = $this->common_model->UpdateData('result',$saverow,array('result_id'=>$result->result_id));
           
       }   
        
        $this->result_calculation();
          
             
        //  print_r($result); 
        //  echo "<br>";
        //   print_r($saverow); die;
          
        }else{
        
                   $message =  get_alert_tpl('Fields are empty');
                $this->session->set_flashdata('alert',$message);
                   redirect('admin/result');  
        }
      }
      
    // $data = [];
    // if($user_id !=null){
    //     $data['row'] = $this->common_model->GetRow('result',array('id'=>$user_id));
    //   }
    //   $data['market_data'] = $this->common_model->get_market_dropdown();
    //   //echo "<pre>";
    //   // print_r($data['market_data']); die;
    //   $data['content']="result/edit";
    //   $this->load->view('admin_template',$data);
    

    }
    
    
      public function result_calculation(){
         $this->load->model('common_model');
           $game_data = $this->common_model->GetResult('all_game', array('game_status IS NULL'=>NULL ,'Date(date)'=>date("Y-m-d")));

        $i=0;
        if(count($game_data) !== 0){
           
         foreach($game_data as $g){
             
             $i++;
            $result_data = $this->common_model->GetRow('result', array('market_id'=>$g->market_id ,'Date(created_at)'=>date("Y-m-d")));
           if($result_data){ 
                $bid_number = $g->bid_number;
                $bid_amount = $g->bid_amount;
                $min_bid_amount = $g->min_bid_amount;
                $min_win_amount = $g->min_win_amount;
                $game_id =  $g->game_id;
                $set['won_amount'] = NULL;
                 $set['game_status'] = NULL;
                if($g->type =='OPEN'){
                    
                    if($game_id == '1'){
                        
                        if($bid_number == $result_data->open_digit_sum){
                              $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                              $set['game_status'] = 'win';
                              
                               $save_w['comment'] = 'Money won on single game';
                               $save_w['game_name'] = 'SINGLE';
                             // $set_result_status['close_result_status'] = 'COMPLETE';
                        }else{
                              $set['won_amount'] = 0;
                              $set['game_status'] = 'loose';
                        }
                         
                        
                    }elseif($game_id == '3'){
                                
                             if($bid_number == $result_data->open_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                                $save_w['comment'] = 'Money won on single patti game';
                               $save_w['game_name'] = 'SINGLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                                
                                
                    }elseif($game_id == '4'){
                             if($bid_number == $result_data->open_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                                $save_w['comment'] = 'Money won on double patti game';
                               $save_w['game_name'] = 'DOUBLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }elseif($game_id == '5'){
                            if($bid_number == $result_data->open_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                                $save_w['comment'] = 'Money won on tripple patti game';
                               $save_w['game_name'] = 'TRIPPLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }
                    
                    
                }elseif($g->type =='CLOSE'){
                    
                      if($game_id == '1'){
                         if($bid_number == $result_data->close_digit_sum){
                              $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                              $set['game_status'] = 'win';
                              
                                 $save_w['comment'] = 'Money won on single game';
                                 $save_w['game_name'] = 'SINGLE';
                               
                           
                        }else{
                              $set['won_amount'] = 0;
                              $set['game_status'] = 'loose';
                        }
                    }elseif($game_id == '3'){
                         if($bid_number == $result_data->close_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                               $save_w['comment'] = 'Money won on single patti game';
                               $save_w['game_name'] = 'SINGLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }elseif($game_id == '4'){
                           if($bid_number == $result_data->close_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                               $save_w['comment'] = 'Money won on double patti game';
                               $save_w['game_name'] = 'DOUBLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }elseif($game_id == '5'){
                           if($bid_number == $result_data->close_result_digit)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                                
                               $save_w['comment'] = 'Money won on tripple patti game';
                               $save_w['game_name'] = 'TRIPPLE PATTI';
                               
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }
                    
                    
                }else{
                    //jodi
                    if($result_data->open_digit_sum !==null && $result_data->close_digit_sum !==null ){
                    $bid = $result_data->open_digit_sum; $result_data->close_digit_sum;
                    // print_r($result_data->result_id);  echo "<br>";
                    // print_r($bid_number); echo "<br>";
                    // print_r($bid); 
                    // print_r($result_data->close_digit_sum);die;
                     if($bid_number == $bid)  {
                                $set['won_amount'] = ($bid_amount/$min_bid_amount) * $min_win_amount;
                                $set['game_status'] = 'win';
                             } else{
                                 $set['won_amount'] = 0;
                                 $set['game_status'] = 'loose';
                             }
                    }
                }
        
        
         if(!empty($set['game_status'])){
                $game_update = $this->common_model->UpdateData('all_game',$set,['all_game_id'=>$g->all_game_id]);
                
                
                if($game_update){
                         if($set['game_status'] =='win'){
                             $save_w['txn_by'] = 2;
                             $save_w['user_id'] = $g->user_id;
                             $save_w['txn_type'] = 'IN';
                             $save_w['amount'] = $set['won_amount'];
                             if(!empty($g->type)){
                             $save_w['market_type'] =  $g->type;
                             }
                             $save_w['market_id'] =  $g->market_id;
                            
                             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                         
                             $save_wallet = $this->common_model->InsertData('wallet',$save_w);

                            //  if($save_wallet){
                                    
                            //         //print_r($bid_amount); die;
                            //         $refund['txn_by'] = 2;
                            //         $refund['user_id'] = $g->user_id;
                            //         $refund['txn_type'] = 'IN';
                            //         $refund['amount'] = $bid_amount;
                            //         //print_r($refund['amount']); die;
                            //         if(!empty($g->type)){
                            //         $refund['market_type'] =  $g->type;
                            //         }
                            //         $refund['market_id'] =  $g->market_id;
                                    
                            //         $refund['txn_id'] =  date("dmyhis").rand(100,999);
                            //         $refund['comment'] =  'After win Bid Amount refund';
                            //         $refund_wallet = $this->common_model->InsertData('wallet',$refund);

                            //     }

                             }
                             
                    }
                
        }
        
        //result_data
           }
      
       // print_r($i);
        //print_r(count($game_data)); die;
            if($i == count($game_data)){
                 redirect('admin/result');
             // return true;
            }
        //loop
         } 
            
        }else{
         
          redirect('admin/result');  
        }
         

    }
    
    
    public function dummy_list(){
        
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
    
         $data['aaData']=$this->admin_model->dummyResultList(10,$offset,$keyword,$orderkey,$ordervalue);
   
         response($data);
     }


    }
    
    
}