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
if(!function_exists('redirect_admin')){
    function redirect_admin($str=""){
        redirect('admin/'.$str);
	}
}
if(!function_exists('admin_url')){
    function admin_url($str=""){
        return site_url('admin/'.$str);
	}
}
if(!function_exists('isAdminLogin')){
    function isAdminLogin(){
        $ci =& get_instance();
        if(!empty($ci->session->userdata('admin_id')) && !empty($ci->session->userdata('__admintoken')) && $ci->session->userdata('__admintoken')=="$2y$10dqB6vI0coniNPLuz"){
            return true;
        }else{
            redirect_admin('auth');
        }
	}
}

// if(!function_exists('isAdmin')){
//     function isAdmin($module="",$action="")
//     {
//       $CI =& get_instance();
//       $CI->load->library('session');
  
//       if($CI->session->userdata('adminin')){
//           $user=new stdClass();        
//           $user->display_name=$CI->session->userdata('display_name');
//           $user->user_id=$CI->session->userdata('user_id');
//           $user->phone=$CI->session->userdata('phone');
//           $user->email=$CI->session->userdata('email');
//           $user->referral_code=$CI->session->userdata('referral_code');
//           $user->avatar=$CI->session->userdata('avatar');
//           $user->permission=$CI->session->userdata('permission');
  
//           if(!empty($module) && !empty($action))
//           {
//              $pm=$user->permission;
//              if(!empty($pm["$module"]["$action"])){
  
//              }else{
//                 // echo "<pre>";print_r( $pm);
//                 echo "permission denied"; die;
//              }
  
//           } 
//           //echo "<pre>";print_r($user->permission);die;
//           return $user;
  
//       }else{
//           redirect('auth/login');
//       }
  
//     }
//   }


if(!function_exists('GetAllUserWalletBalance')){
    function GetAllUserWalletBalance(){
        $ci =& get_instance();
        $ci->load->database();
        $in=$ci->db->select_sum('amount')->from('wallet')->where('txn_type','IN')->get()->row();
        $out=$ci->db->select_sum('amount')->from('wallet')->where('txn_type','OUT')->get()->row();
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
