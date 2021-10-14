<?php
if(!function_exists('response')){
    function response($response){
        $ci =& get_instance();
        return $ci->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));
    }
}
if ( ! function_exists('get_success_alert_tpl')){
    function get_alert_tpl($str,$tpl_type='success')
    {
        return '<div class="alert alert-'.$tpl_type.' alert-dismissible fade show" role="alert">
        '.$str.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
       
    }
 }
if(!function_exists('redirect_user')){
    function redirect_user($str=""){
        redirect('user/'.$str);
	}
}
if(!function_exists('user_url')){
    function user_url($str=""){
        return site_url('user/'.$str);
	}
}
if(!function_exists('isUserLogin')){
    function isUserLogin(){
       // print_r('12345'); die;
        $ci =& get_instance();
        
        if(!empty($ci->session->userdata('user_id')) && !empty($ci->session->userdata('__usertoken')) && $ci->session->userdata('__usertoken')=="$2y$10dqB6vI0coniNPLuz"){
            return true;
        }else{
              return false;
            //redirect_user('login');
        }
	}
}

if(!function_exists('dropDownDate')){
    function dropDownDate(){
        	$date = [];
			$today = date('Y-m-d');
			array_push($date, $today);
            $nextday = date("Y-m-d", strtotime("$today +1 day"));
            $thirdday = date("Y-m-d", strtotime("$nextday +1 day"));
			array_push($date, $nextday);
			array_push($date, $thirdday);
			
			return $date;
			
		
			
	}
}

if(!function_exists('GetWalletBalance')){
    function GetWalletBalance($user_id){
        $ci =& get_instance();
        $ci->load->database();
        $in=$ci->db->select_sum('amount')->from('wallet')->where('txn_type','IN')->where('user_id',$user_id)->get()->row();
        $out=$ci->db->select_sum('amount')->from('wallet')->where('txn_type','OUT')->where('user_id',$user_id)->get()->row();
        $balance=0;
        if($in){
            if($out){
                $balance+=round(($in->amount-$out->amount),2);
            }else{
                $balance+=round($in->amount,2);
            }
        }
        return $balance;
    }
}

if(!function_exists('GetBonusBalance')){
    function GetBonusBalance($user_id){
        $ci =& get_instance();
        $ci->load->database();
        $in=$ci->db->select_sum('bonus_amount')->from('bonus')->where('txn_type','IN')->where('user_id',$user_id)->get()->row();
        $out=$ci->db->select_sum('bonus_amount')->from('bonus')->where('txn_type','OUT')->where('user_id',$user_id)->get()->row();
        $balance=0;
        if($in){
            if($out){
                $balance+=round(($in->bonus_amount-$out->bonus_amount),2);
            }else{
                $balance+=round($in->bonus_amount,2);
            }
        }
        return $balance;
    }
}

if ( ! function_exists('pagination_config')){
	function pagination_config($per_page=10){
		$config=[];
		$config['per_page'] = $per_page;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		return $config;
	}
 }


