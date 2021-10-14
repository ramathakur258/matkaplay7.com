
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+5:30'");
    }
    
    
    public function GetResult($table,$where=array(),$field="*", $order_by=""){
		$this->db->select($field);
		$this->db->from($table);
		if(!empty($where)){
			$this->db->where($where);
		}
		if(!empty($order_by)){
		    $this->db->order_by($order_by['key'],$order_by['value']);
		}
		return $this->db->get()->result();
	}
	public function GetRow($table,$where=array(),$field="*"){
		$this->db->select($field);
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row();
	}
	public function CountResults($table,$where=array()){
		$this->db->where($where);
		return $this->db->count_all_results($table);
	}
	public function DeleteData($table,$where){
		$this->db->where($where);
		return  $this->db->delete($table);
	}
	public function InsertBatch($table,$data){
	    print_r($table);
	    print_r($data); die;
		return  $this->db->insert_batch($table,$data);
	}
	public function InsertData($table,$data){
	return $this->db->insert($table,$data);
		 
	}
	public function UpdateData($table,$data,$where){
		$this->db->where($where);
		return  $this->db->update($table,$data);
	}
	public function UpdateResultData($table,$data,$where,$w){
		$this->db->where($where);
    	$this->db->or_where($w);
		return  $this->db->update($table,$data);
	}
	
	public function UpdateWhereIn($table,$data,$where,$in){
		$this->db->where_in($where,$in);
		return  $this->db->update($table,$data);
	}
	public function CountResultsForDashboard($table){
	//	$this->db->where($where);
		return $this->db->count_all_results($table);
	}


	 public function GetListData($limit,$start,$where=[],$like=[],$order_by='', $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        if(!empty($where))
        {
            $this->db->where($where); 
        }
        if(!empty($like))
        {
            $i=true;
            foreach($like as $key=>$value)
            {
                if($i)
                    $this->db->like($key, $value, 'both'); 
                else
                    $this->db->or_like($key, $value, 'both'); 

            }            
        }
        $this->db->order_by($order_by['key'],$order_by['value']);
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_merged_result($table=[],$id,$limit,$start){   
        
        for($i=0; $i<count($table); $i++){
            $sql = '`market1`.`name` as market_name,`market_type_rate`.`market_type_name`,`users`.`name`,'.$table[$i].'.`user_id`,'.$table[$i].'.`market_id`,'.$table[$i].'.`date`      ,'.$table[$i].'.`bid_amount`,'.$table[$i].'.`bid_number`,'.$table[$i].'.`created_at`,'.$table[$i].'.`type`';
            
              $this->db->select($sql);
            $this->db->from($table[$i]);
            $this->db->join('users','users.id = '.$table[$i].'.user_id','LEFT');  
            $this->db->join('market_type_rate','market_type_rate.id = '.$table[$i].'.game_id','LEFT');  
            $this->db->join('market1','market1.id = '.$table[$i].'.market_id','LEFT');  
            $this->db->where($table[$i].'.user_id',$id);
            ${"query" . $i} = $this->db->get_compiled_select(); 
          
            
        }
           
        $this->db->select('market_name,market_type_name,name,user_id,market_id,date,bid_amount,bid_number,created_at,type');
        
              $this->db->from('('.$query0." UNION ALL ".$query1." UNION ALL ".$query2." UNION ALL ".$query3." UNION ALL ".$query4.') as record');
               //$this->db->order_by("market_type_name", "asc");
              $this->db->order_by("created_at", "DESC");
              $this->db->limit($start ,$limit);
                return  $this->db->get()->result();
     
     }
     
      function get_merged_count($table=[],$id){   
        
        for($i=0; $i<count($table); $i++){
            $sql = '`market1`.`name` as market_name,`market_type_rate`.`market_type_name`,`users`.`name`,'.$table[$i].'.`user_id`,'.$table[$i].'.`market_id`,'.$table[$i].'.`date`      ,'.$table[$i].'.`bid_amount`,'.$table[$i].'.`bid_number`,'.$table[$i].'.`created_at`,,'.$table[$i].'.`type`';
            
              $this->db->select($sql);
            $this->db->from($table[$i]);
            $this->db->join('users','users.id = '.$table[$i].'.user_id','LEFT');  
            $this->db->join('market_type_rate','market_type_rate.id = '.$table[$i].'.game_id','LEFT');  
            $this->db->join('market1','market1.id = '.$table[$i].'.market_id','LEFT');  
            $this->db->where($table[$i].'.user_id',$id);
            ${"query" . $i} = $this->db->get_compiled_select(); 
          
            
        }
           
        $this->db->select('market_name,market_type_name,name,user_id,market_id,date,bid_amount,bid_number,created_at,type');
        
              $this->db->from('('.$query0." UNION ALL ".$query1." UNION ALL ".$query2." UNION ALL ".$query3." UNION ALL ".$query4.') as record');
              $this->db->order_by("date", "DESC");
         
              	return $this->db->count_all_results();
     
     }
     
       function get_market_dropdown(){ 
       
        $query = 'SELECT market_id, time, name, type,market_name FROM(SELECT CONCAT(market1.name," ","OPEN") as market_name,`market_time`.`market_id`, `market_time`.`open_time` as `time`, "OPEN" as `type`, `market1`.`name` FROM `market_time` LEFT JOIN `market1` ON `market1`.`id` = `market_time`.`market_id` UNION ALL SELECT CONCAT(market1.name," ","CLOSE") as market_name,`market_time`.`market_id`, `market_time`.`close_time` as `time`, "CLOSE" as `type`, `market1`.`name` FROM `market_time` LEFT JOIN `market1` ON `market1`.`id` = `market_time`.`market_id`) as record ORDER BY name asc';
        
        
                  $sql = $this->db->query($query);
                  return $sql->result();
       }
       
         function market_time_list($table){
             $this->db->select('*');
            $this->db->from($table);
            $this->db->join('market1','market1.id = '.$table.'.market_id','LEFT');   
            $this->db->order_by($table.".sort_time", "asc");
             return  $this->db->get()->result();
         }
           function result_list($table){
             $this->db->select('result.open_result_status,result.close_result_status,result.result_id,result.market_id,result.created_at,market1.name,result.open_result_digit,result.open_digit_sum,result.close_digit_sum,result.close_result_digit, market_time.open_time,market_time.close_time ');
            $this->db->from($table);
            $this->db->join('market1','market1.id = '.$table.'.market_id','LEFT');  
            $this->db->join('result','result.market_id = '.$table.'.market_id AND DATE(result.created_at) ="'.date("Y-m-d").'"','LEFT');
             $this->db->order_by($table.".sort_time", "asc");
             return  $this->db->get()->result();
         }
         
          public function ChatResult($table,$where_s=array(),$where_r=array(),$field="*", $order_by=""){
		$this->db->select($field);
		$this->db->from($table);
		if(!empty($where_r)){
			$this->db->where($where_r);
			$this->db->or_where($where_s);
		
		}
		if(!empty($order_by)){
		    $this->db->order_by($order_by['key'],$order_by['value']);
		}
		return $this->db->get()->result();
	}
	
		public function getallchatuser($table, $where=array()){
	 	    
	 	 //   $query = 'SELECT '.$table.'.sender_id,COUNT(case '.$table.'.is_read when "0" then 1 else null end)as unread, users.name FROM '.$table.' LEFT JOIN users ON users.id='.$table.'.sender_id WHERE '.$table.'.receiver_id=1 GROUP BY '.$table.'.sender_id ORDER BY '.$table.'. created_at DESC';
            // $query = 'SELECT '.$table.'.sender_id,0 as unread, users.name FROM '.$table.' LEFT JOIN users ON users.id='.$table.'.sender_id WHERE '.$table.'.receiver_id=1 GROUP BY '.$table.'.sender_id  ORDER BY '.$table.'.chat_id DESC';
         $query = 'SELECT '.$table.'.sender_id,(SELECT COUNT(case '.$table.'.is_read when "0" then 1 else null end)  FROM '.$table.' WHERE '.$table.'.sender_id= users.id) as unread, users.name FROM '.$table.' LEFT JOIN users ON users.id='.$table.'.sender_id WHERE '.$table.'.chat_id IN (
             SELECT max('.$table.'.chat_id) from '.$table.' GROUP by '.$table.'.sender_id 
            ) AND '.$table.'.receiver_id=1 ORDER BY '.$table.'. chat_id DESC';
        
        //  $query = 'SELECT '.$table.'.sender_id,COUNT(case '.$table.'.is_read when "0" then 1 else null end)as unread, users.name FROM '.$table.' LEFT JOIN users ON users.id='.$table.'.sender_id WHERE '.$table.'.receiver_id=1  ORDER BY '.$table.'. chat_id DESC';
            
                  $sql = $this->db->query($query);
                  return $sql->result();
	 	}
	 	
	  public function detail_conversation($table,$sender_id, $receiver_id){

		 $query = 'SELECT * FROM '.$table.' WHERE (sender_id='.$sender_id.' AND receiver_id='.$receiver_id.') OR (sender_id='.$receiver_id.' AND receiver_id='.$sender_id.')';
		 
		   $sql = $this->db->query($query);
                  return $sql->result();
	}
	
	public function forumList($limit,$start,$where=[],$like=[],$order_by='', $table)
    {
        $this->db->select($table.'.*,users.name');
        $this->db->from($table);
        if(!empty($where))
        {
            $this->db->where($where); 
        }
        if(!empty($like))
        {
            $i=true;
            foreach($like as $key=>$value)
            {
                if($i)
                    $this->db->like($key, $value, 'both'); 
                else
                    $this->db->or_like($key, $value, 'both'); 

            }            
        }
         $this->db->join('users','users.id = '.$table.'.user_id ','LEFT');
        $this->db->order_by($order_by['key'],$order_by['value']);
        $this->db->limit($start ,$limit);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function game_history($table,$where=array(),$limit,$start){
         //$this->db->query("SET time_zone='+5:30'");
         $this->db->select($table.'.*,market_type_rate.market_type_name,market1.name as market_name');
         $this->db->from($table);
         	if(!empty($where)){
			$this->db->where($where);
		
		}
		$this->db->join('market1','market1.id = '.$table.'.market_id ','LEFT');
		$this->db->join('market_type_rate','market_type_rate.id = '.$table.'.game_id ','LEFT');
		$this->db->order_by($table.'.created_at', 'DESC');
        $this->db->limit($start ,$limit);
         $query = $this->db->get();
        return $query->result();
    }
    
     function test_result(){ 
       
       
     $query =  'SELECT market_id, time, name, type,market_name,sort_time,result_digit,sum FROM(SELECT CONCAT(market1.name," ","OPEN") as market_name,`market_time`.`market_id`, `market_time`.`open_time` as `time`,`sort_time` as `sort_time`, "OPEN" as `type`, `market1`.`name`,`result`.`open_result_digit` as `result_digit`, `result`.`open_digit_sum` as `sum` FROM `market_time` LEFT JOIN `market1` ON `market1`.`id` = `market_time`.`market_id` LEFT OUTER JOIN `result` ON `result`.`market_id` = `market_time`.`market_id` AND DATE(`result`.`created_at`)="'.date("Y-m-d").'" UNION ALL SELECT CONCAT(market1.name," ","CLOSE") as market_name,`market_time`.`market_id`, `market_time`.`close_time` as `time`,`sort_close_time` as `sort_time`, "CLOSE" as `type`, `market1`.`name`,`result`.`close_result_digit` as `result_digit`, `result`.`close_digit_sum` as `sum` FROM `market_time` LEFT JOIN `market1` ON `market1`.`id` = `market_time`.`market_id` LEFT OUTER JOIN `result` ON `result`.`market_id` = `market_time`.`market_id` AND DATE(`result`.`created_at`)="'.date("Y-m-d").'" ) as record ORDER BY sort_time asc';
       
       
         $sql = $this->db->query($query);
                  return $sql->result();
       
       }
       
       public function notice_board(){
           
        
        //   $query = 'SELECT * FROM `notice_board` ORDER BY date DESC';
            $query = 'SELECT *  FROM `notice_board` WHERE DATE(date) = DATE(NOW()) ORDER BY created_at ASC';
            $sql = $this->db->query($query);
                  return $sql->result();
       }
       
      public function bid_amount($from_date,$to_date){
           
            $query =  'SELECT SUM(bid_amount) as amount FROM `all_game` WHERE  DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
             $sql = $this->db->query($query);
                  return $sql->result();
           
      }
       
       public function count_bonus($from_date,$to_date){
           
            $query =  'SELECT SUM(bonus_amount) as amount FROM `bonus` WHERE  DATE(created_at)>="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
             $sql = $this->db->query($query);
                  return $sql->result();
           
      }

       public function withdraw_money($from_date,$to_date){
           
            $query =  'SELECT SUM(amount) as amount FROM `money_request` WHERE  DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
             $sql = $this->db->query($query);
                  return $sql->result();
           
      }
      
       public function deposit_money($from_date,$to_date){
           
            $query =  'SELECT SUM(amount) as amount FROM `deposit_request` WHERE  DATE(created_at) >="'.$from_date.'"  AND  DATE(created_at) <="'.$to_date.'"';
             $sql = $this->db->query($query);
                  return $sql->result();
           
      }
      
      public function records($table,$where=[],$select="*")
      {
          $this->db->select($select);
          $this->db->from($table);   
          if(!empty($where)){
              $this->db->where($where);           
          }
          $result=$this->db->get();
          if($result->num_rows() > 0)
          {
              return $result->result();
              
          }else{
              return false;
          }    
          
      
      }
}