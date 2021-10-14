<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class New_Result extends CI_Controller {
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
       //$data['script']="new_result/script"; 
      //$data['result_data'] = $this->common_model->result_list('market_time');
          $data['result_data'] = $this->common_model->test_result();
       $data['content']="new_result/index";
    
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
           
            $update = $this->common_model->UpdateData('result',$saverow,array('result_id'=>$result->result_id));
           
       }   
        $this->result_calculation();
          
             
        //  print_r($result); 
        //  echo "<br>";
        //   print_r($saverow); die;
          
        }
      }
      
    // $data = [];
    // if($user_id !=null){
    //     $data['row'] = $this->common_model->GetRow('result',array('id'=>$user_id));
    //   }
    //   $data['market_data'] = $this->common_model->get_market_dropdown();
    //     $data['result_data'] = $this->common_model->test_result();
    //   // echo "<pre>";
    //   //print_r($data['result_data']); die;
    //   $data['content']="new_result/edit";
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
                             
                             $save_w['user_id'] = $g->user_id;
                             $save_w['txn_type'] = 'IN';
                             $save_w['amount'] = $set['won_amount'];
                             if(!empty($g->type)){
                             $save_w['market_type'] =  $g->type;
                             }
                             $save_w['market_id'] =  $g->market_id;
                            
                             $save_w['txn_id'] =  date("dmyhis").rand(100,999);
                         
                            $save_wallet = $this->common_model->InsertData('wallet',$save_w);
                             }
                    }
            
            
            
        }
        
        //result_data
           }
      
       // print_r($i);
        //print_r(count($game_data)); die;
            if($i == count($game_data)){
                 redirect('admin/new_result');
             // return true;
            }
        //loop
         } 
            
        }else{
         
          redirect('admin/new_result');  
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
       //  $data['count']=   $this->db->count_all_results(TBL_LANDLORD);
       
    //   $data['count']=$this->admin_model->CountResultList($keyword);
    
         //$data['recordsFiltered']=$data['count'];
         
        //  SELECT result_id,market_id, open_result_digit as result_digit, open_digit_sum as sum, 'open' as type, DATE(created_at) as date from result where DATE(created_at)='2021-06-02' AND close_result_digit is NOT NULL UNION ALL SELECT result_id,market_id, close_result_digit as result_digit, close_digit_sum as sum, 'close' as type, DATE(created_at) as date from result where DATE(created_at)='2021-06-02' AND close_result_digit is NOT NULL
         $data['aaData']=$this->admin_model->dummyResultList(10,$offset,$keyword,$orderkey,$ordervalue);
          //$data['aaData'] = $this->common_model->result_list('market_time');
  // echo "<pre>";
  // print_r($this->db->last_query());
  //  print_r($data['aaData']); die;
        // $data['aaData']=   $this->db->get()->result(TBL_LANDLORD);
             //print_r($data['aaData']);
         response($data);
     }


    }
    
    
}