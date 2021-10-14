<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+5:30'");
        
    }
  
	public function CountUserList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('name',$keyword);
				 // $this->db->like('last_name',$keyword);
				 $this->db->or_like('mobile',$keyword);
				 $this->db->or_like('status',$keyword);
				 $this->db->or_like('user_name',$keyword);
			   
		   $this->db->group_end();
		}
		$this->db->where("user_type","CUSTOMER");
	   return $this->db->count_all_results('users');
	   
		 
	 }
	 public function UserList($limit,$offset,$keyword,$orderKey,$ordervalue){
	     
	     
		 $this->db->select('*');
		 $this->db->from('users');
		// $this->db->join('wallet','users.id = wallet.user_id','LEFT');  
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('name',$keyword);
			 $this->db->or_like('mobile',$keyword);
				 $this->db->or_like('status',$keyword);
				 $this->db->or_like('user_name',$keyword);
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		 $this->db->where("user_type","CUSTOMER");
		 $this->db->limit($limit,$offset);


	return $this->db->get()->result();

	
	   
	 }

	 public function CountMarketTypeList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('market_type_name',$keyword);
			
			   
		   $this->db->group_end();
		}
	
	   return $this->db->count_all_results('market_type_rate');
	   
		 
	 }
	 public function MarketTypeList($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('*');
		 $this->db->from('market_type_rate');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market_type_name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 
	 
	  public function CountMarketList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('market_name',$keyword);
			
			   
		   $this->db->group_end();
		}
	
	   return $this->db->count_all_results('market');
	   
		 
	 }
	 public function MarketList($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('*');
		 $this->db->from('market');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market_name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 
	 
	 
	  public function CountMoneyRequestList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
			  $this->db->like('users.name',$keyword);
			  $this->db->or_like('users.mobile',$keyword);
		//		 $this->db->like('user.name',$keyword);
		//		 $this->db->like('users.mobile',$keyword);
			   
		   $this->db->group_end();
		}
    	 $this->db->join('users','users.id = money_request.user_id','LEFT');  
	   return $this->db->count_all_results('money_request');
	   
		 
		 
	 }
	 public function MoneyRequestList($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('money_request.*,users.name,users.mobile');
		 $this->db->from('money_request');
		    $this->db->join('users','users.id = money_request.user_id');  
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('users.name',$keyword);
			 $this->db->or_like('users.mobile',$keyword);
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();
	   
	 }
	 
	 
	  public function DepositeMoneyRequest($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('deposit_request.*,users.name,users.mobile');
		 $this->db->from('deposit_request');
		    $this->db->join('users','users.id = deposit_request.user_id','LEFT');  
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('users.name',$keyword);
			 $this->db->or_like('users.mobile',$keyword);
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

    	return $this->db->get()->result();

	
	   
	 }
	 
	  
	  public function CountDepositeMoneyList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
			  $this->db->like('users.name',$keyword);
			  $this->db->or_like('users.mobile',$keyword);
		//		 $this->db->like('user.name',$keyword);
		//		 $this->db->like('users.mobile',$keyword);
			   
		   $this->db->group_end();
		}
    	 $this->db->join('users','users.id = deposit_request.user_id','LEFT');  
	   return $this->db->count_all_results('deposit_request');
	   
		 
	 }
	 
	 
	   public function CountMarket1List($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('name',$keyword);
			
			   
		   $this->db->group_end();
		}
	
	   return $this->db->count_all_results('market1');
	   
		 
	 }
	 public function Market1List($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('*');
		 $this->db->from('market1');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 
	 	   public function CountMarketTimeList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('market1.name',$keyword);
			
			   
		   $this->db->group_end();
		}
	    $this->db->join('market1','market1.id = market_time.market_id','LEFT');  
	   return $this->db->count_all_results('market_time');
	   
		 
	 }
	 public function MarketTimeList($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('market_time.*,market1.name');
		 $this->db->from('market_time');
		 $this->db->join('market1','market1.id = market_time.market_id');  
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market1.name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 
	  public function CountResultList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('market1.name',$keyword);
			
			   
		   $this->db->group_end();
		}
	    $this->db->join('market1','market1.id = result.market_id','LEFT');  
	   return $this->db->count_all_results('result');
	   
		 
	 }
	 public function ResultList($limit,$offset,$keyword,$orderKey,$ordervalue){
		 $this->db->select('result.*,market1.name');
		 $this->db->from('result');
		 $this->db->join('market1','market1.id = result.market_id');  
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market1.name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 

	 public function EmployeeList($limit,$offset,$keyword,$orderKey,$ordervalue){
	   
		 $this->db->select('*');
		 $this->db->from('users');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('name',$keyword);
			 $this->db->or_like('mobile',$keyword);
				 $this->db->or_like('status',$keyword);
				 $this->db->or_like('user_name',$keyword);
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		 $this->db->where("user_type","EMPLOYEE");
		 $this->db->limit($limit,$offset);


	return $this->db->get()->result();
	 }
	 
	 	public function CountEmployeeList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('name',$keyword);
				 // $this->db->like('last_name',$keyword);
				 $this->db->or_like('mobile',$keyword);
				 $this->db->or_like('status',$keyword);
				 $this->db->or_like('user_name',$keyword);
			   
		   $this->db->group_end();
		}
		$this->db->where("user_type","EMPLOYEE");
	   return $this->db->count_all_results('users');
	   
		 
	 }
	 
	  public function NoticeList($limit,$offset,$keyword,$orderKey,$ordervalue){
	   
		 $this->db->select('*');
		 $this->db->from('notice_board');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('title',$keyword);
			 $this->db->or_like('description',$keyword);
				 $this->db->or_like('date',$keyword);
				
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		 $this->db->order_by("date", "DESC");
		 $this->db->limit($limit,$offset);


	return $this->db->get()->result();
	 }
	 
		public function CountNoticeList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('title',$keyword);
				 // $this->db->like('last_name',$keyword);
				 $this->db->or_like('description',$keyword);
				 $this->db->or_like('date',$keyword);
				
			   
		   $this->db->group_end();
		}
	
	   return $this->db->count_all_results('notice_board');
	   
		 
	 } 	
	 
	 	public function UsersList($limit,$offset,$keyword,$orderKey,$ordervalue){
	 	    
	 	    $s = '`u`.`id`,`u`.`name`,`dr`.`amount` as `deposit`, "NULL" as `withdraw`';
            $this->db->select($s);
            $this->db->from('users as u');
            $this->db->join('deposit_request as dr','dr.user_id=u.id','LEFT');  
            $this->db->where('dr.status','COMPLETED');
            $sql1 = $this->db->get_compiled_select(); 
	 	    
	 	    $this->db->select('u.id,u.name,"NULL" as deposit,mr.amount as withdraw, ');
            $this->db->from('users as u');
            $this->db->join('money_request as mr','mr.user_id=u.id','LEFT');  
            $this->db->where('mr.status','COMPLETED');
            $sql2 = $this->db->get_compiled_select(); 
	 	   
	 	  
	 	   $this->db->select('SUM(deposit) as total_deposit, SUM(withdraw) as total_withdraw, name, id');
           $this->db->from('('.$sql1." UNION ALL ".$sql2.') as record');
            if(!empty($keyword)){
        			 $this->db->group_start();
        			 $this->db->like('name',$keyword);
        			
        			 $this->db->group_end();
        		 }	
             $this->db->group_by('id'); 
            if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		     }
            $this->db->limit($limit,$offset);

	        return $this->db->get()->result();
	   
	 	}
	 	
	 		public function CountUsersList($keyword){
	 		    
	 		//       $this->db->select('u.name,u.id,dr.amount as deposit, mr.amount as withdraw');
    //         $this->db->from('users as u');
    //          $this->db->join('deposit_request as dr','dr.user_id = u.id','LEFT'); 
    //          $this->db->join('money_request as mr','mr.user_id = u.id','LEFT'); 
    //           if(!empty($keyword)){
    //     			 $this->db->group_start();
    //     			 $this->db->like('u.name',$keyword);
        			
    //     			 $this->db->group_end();
    //     		 }
    //      	 $this->db->where("dr.status","COMPLETED");
    //      	 $this->db->or_where("mr.status","COMPLETED");
    //         $where_clause = $this->db->get_compiled_select();
	 	    
	 	    
	 	 //  $this->db->select('SUM(deposit) as total_deposit, SUM(withdraw) as total_withdraw, name, id');
    //         $this->db->from('('.$where_clause.') as record');
            	
    //       $this->db->group_by('id'); 
          
	 		//     if(!empty($keyword)){
		  //  	 $this->db->group_start();
				//  $this->db->like('u.name',$keyword);
			 
		  // $this->db->group_end();
	 	    
	 		//     }
	 	}
	 	
	 	 public function BettingList($limit,$offset,$keyword,$orderKey,$ordervalue, $date){
	   
		 $this->db->select('market_type_rate.market_type_name,market1.name, all_game.type, all_game.date, all_game.market_id, SUM(all_game.bid_amount) as final');
		 $this->db->from('all_game');
		  $this->db->join('market1','market1.id = all_game.market_id', 'LEFT');
		   $this->db->join('market_type_rate','market_type_rate.id = all_game.game_id', 'LEFT');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market1.name',$keyword);
			 $this->db->or_like('DATE(all_game.date)',$keyword);
		
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		 	if(!empty($date)){
		    $this->db->where("DATE(all_game.date)",$date);
		}
		
		 $this->db->limit($limit,$offset);
		 $this->db->group_by('all_game.market_id,all_game.date'); 
		 


	return $this->db->get()->result();
	 }
	 
	 	public function CountBettingList($keyword,$date){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('market1.name',$keyword);
		         $this->db->or_like('DATE(all_game.date)',$keyword);
			   
		   $this->db->group_end();
		}
		$this->db->join('market1','market1.id = all_game.market_id', 'LEFT');
		if(!empty($date)){
		    $this->db->where("DATE(all_game.date)",$date);
		}
	    
	   return $this->db->count_all_results('all_game');
	   
		 
	 }
	 
	  public function Commentslist($limit,$offset,$keyword,$orderKey,$ordervalue){
	     
	     
		 $this->db->select('*');
		 $this->db->from('forum');
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('user_id',$keyword);
			 $this->db->or_like('msg',$keyword);
			 $this->db->or_like('created_at',$keyword);
			 //$this->db->order_by('created_at',$ordervalue);
				//  $this->db->or_like('user_name',$keyword);
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		    $this->db->limit($limit,$offset);
            $this->db->order_by('created_at','DESC');

        	return $this->db->get()->result();

	 }
	 
	 	public function CountCommentList($keyword){

		if(!empty($keyword)){
			 $this->db->group_start();
				 $this->db->like('user_id',$keyword);
				 $this->db->or_like('msg',$keyword);
                 $this->db->like('created_at',$keyword);
			   
		   $this->db->group_end();
		}
	
	   return $this->db->count_all_results('forum');
	   
		 
	 }
	 
	  public function user_history($where){
		 $this->db->select('all_game.*,market1.name as market_name,market_type_rate.market_type_name as game_name');
		 $this->db->from('all_game');
		 $this->db->join('market1','market1.id = all_game.market_id','LEFT');  
		 $this->db->join('market_type_rate','market_type_rate.id = all_game.game_id','LEFT');  
		  $this->db->where('all_game.user_id',$where);
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market1.name',$keyword);
			 $this->db->or_like('market_type_rate.market_type_name',$keyword);
		   
			 $this->db->group_end();
		 }
	
            
			 $this->db->order_by('all_game.created_at','DESC');
		 
	
	return $this->db->get()->result();

	
	   
	 }
	 
	 public function dummyResultList($limit,$offset,$keyword,$orderKey,$ordervalue){
	     	  
		  
		   $this->db->select('result_id,market_id,result_digit,sum,type,date,market1.name');
        
        
        $s = 'SELECT result_id,market_id, open_result_digit as result_digit, open_digit_sum as sum, "open" as type, DATE(created_at) as date from result where DATE(created_at)="'.date("Y-m-d").'" AND open_result_digit is NOT NULL UNION ALL SELECT result_id,market_id, close_result_digit as result_digit, close_digit_sum as sum, "close" as type, DATE(created_at) as date from result where DATE(created_at)="'.date("Y-m-d").'" AND close_result_digit is NOT NULL';
        
              $this->db->from('('.$s.') as record');
               //$this->db->order_by("market_type_name", "asc");
            //   $this->db->order_by("created_at", "DESC");
            //   $this->db->limit($start ,$limit);
            //     return  $this->db->get()->result();
		$this->db->join('market1','market1.id = market_id', 'LEFT');
		    
		 if(!empty($keyword)){
			 $this->db->group_start();
			 $this->db->like('market1.name',$keyword);
			
		   
			 $this->db->group_end();
		 }
		 if(!empty($orderKey) && $ordervalue){
			 $this->db->order_by($orderKey,$ordervalue);
		 }
		
		 $this->db->limit($limit,$offset);

	return $this->db->get()->result();

	
	   
	 }
	 
	 
	 public function statistics($from_date,$to_date){
	   
	     $query1 =  'SELECT COALESCE(sum(amount),0) as amount FROM `wallet` WHERE txn_type="IN" AND txn_by="1" AND DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
          $sql1 = $this->db->query($query1);
            $data['total_deposit'] =  $sql1->row();
             
             
         $query2 =  'SELECT COALESCE(sum(amount),0) as amount FROM `money_request` WHERE status="COMPLETED" AND DATE(updated_at) >="'.$from_date.'"  AND  DATE(updated_at) <="'.$to_date.'"';
               $sql2 = $this->db->query($query2);
             
            $data['total_withdraw'] = $sql2->row();  
          $query3 =  'SELECT COALESCE(sum(bid_amount),0) as amount FROM `all_game` WHERE  DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
               $sql3 = $this->db->query($query3);
             
            $data['total_betting_amount'] = $sql3->row();  
            
           $query4 =  'SELECT count(*) as total_betting FROM `all_game` WHERE  DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
               $sql4 = $this->db->query($query4);
             
            $data['total_betting'] = $sql4->row(); 
            
            $query5 =  'SELECT COALESCE(sum(bonus_amount),0) as amount FROM `bonus` WHERE txn_type="IN" AND DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
               $sql5 = $this->db->query($query5);
             
            $data['total_bonus_deposit'] = $sql5->row(); 
            //  print_r($data); die;
           return $data;
         
	 }
	 
	 
	   
	 
	 
	
	 
	 
	  
	 
}