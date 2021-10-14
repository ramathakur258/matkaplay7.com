<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Calcutta"); 
class V1 extends CI_Controller
{
	private $modelPath='api/v1/';
	private $request=[];
	public function __construct() {
		parent::__construct();
		$this->load->helper('api');
        $this->request=params();
         $this->load->model('common_model');
    }

  
    public function Login()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->Login($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
	 public function register()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->register($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		 public function forgot_password()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->forgot_password($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
	 public function reset_password()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->reset_password($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function edit_profile()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->edit_profile($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
	 public function change_password()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->change_password($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function deposit_list()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->deposit_list($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function game_history()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->game_history($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
     public function withdraw_list()
    	{	 
      
    	    if($this->input->server('REQUEST_METHOD')=='GET'){
    	        
    	     	$this->load->model($this->modelPath.'game');
    			return $this->response($this->game->withdraw_list($this->request()));
          
    		}else{
    			return $this->invalidMethod();
    		}	    
    	}
    	
	 public function withdraw_request()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->withdraw_request($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function market_dropdown()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->market_dropdown($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function home()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->home($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function single()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->single($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		public function jodi()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->jodi($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
			public function single_patti()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->single_patti($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
			public function double_patti()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->double_patti($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		public function tripple_patti()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->tripple_patti($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function forum_list()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->forum_list($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function forum_post()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->forum_post($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		public function wallet_balance()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->wallet_balance($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
		public function bonus_balance()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->bonus_balance($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function result_calculation()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->result_calculation($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		public function game_and_rate()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->game_and_rate($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
		public function money_detail()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->money_detail($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	
		public function result_detail()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->result_detail($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
		 public function profile_upload()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'auth');
			return $this->response($this->auth->profile_upload($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function post_chat()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->post_chat($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	 public function chat_list()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->chat_list($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}
	public function deposit_request()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='POST'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->deposit_request($this->request()));
      
		}else{
			return $this->invalidMethod();
		}	    
	}

	public function request(){

	    $get = (array)$this->input->get();
		$post = (array)$this->input->post();
		$jsonpost = (array)json_decode($this->input->raw_input_stream);
		return (object)array_merge($jsonpost,$get,$post);
	}
	public function response($response){
		$this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));
	}
	public function invalidMethod(){
		
		$this->response(["code"=>200,"status"=>"fail","message"=>"Invalid method"]);
	}
    public function notice_board()
	{	 
  
	    if($this->input->server('REQUEST_METHOD')=='GET'){
	        
	     	$this->load->model($this->modelPath.'game');
			return $this->response($this->game->notice_board($this->request()));
      
		}else{
		    
		    
			return $this->invalidMethod();
		}	    
	}
  
}