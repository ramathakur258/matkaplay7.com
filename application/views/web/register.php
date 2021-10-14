<!-- CONTENT START -->
    <section>
	
	   <div class="container">
                <div class="register-photo">
					<div class="form-container">
						<div class="image-holder"></div>
						<form method="post" id="msform">
							<h2 class="text-center"><strong>Register </strong>an Account.</h2>
							<div class="form-group">
							   
							     <input type="text" name="name" <?php if(form_error('name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('name')){ echo set_value('name'); }elseif(!empty($row->name)){ echo $row->name; } ?>"     class="form-control" id="name" placeholder="Name">
                                   <div class="text-danger"> <?php echo form_error('name'); ?>  </div>
							    
							    </div>
							<div class="form-group">
							      <input type="text"  name="user_name"  <?php if(form_error('user_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('user_name')){ echo set_value('user_name'); }elseif(!empty($row->user_name)){ echo $row->user_name; } ?>"   class="form-control" id="user_name" placeholder="Username">
                                  <div class="text-danger"> <?php echo form_error('user_name'); ?>  </div>
							    
							    
							</div>
							<div class="form-group">
							     <input type="text" name="mobile"  <?php if(form_error('mobile')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('mobile')){ echo set_value('mobile'); }elseif(!empty($row->mobile)){ echo $row->mobile; } ?>"   class="form-control" id="mobile" placeholder="Mobile number">
                                 <div class="text-danger"> <?php echo form_error('mobile'); ?>  </div>
							    
							    
							</div>
							<div class="form-group">
							   
							     <input type="password" name="password" <?php if(form_error('password')){ echo 'style="border-color:red"'; } ?>  class="form-control" id="password" placeholder="Password">
                                 <div class="text-danger"> <?php echo form_error('password'); ?>  </div>
							    
							</div>
							<div class="form-group">
							   
	                    	 <input type="referral_code" name="referral_code" class="form-control" id="referral_code" placeholder="Referral Code(Optional)" value="<?php if(!empty($referral_code)){echo $referral_code; } ?>">
                                
							    
							</div>
							<!--<div class="form-group">-->
							<!--	<div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree Terms and Conditions</label></div>-->
							<!--</div>-->
							<div class="form-group"><button class="btn btn-success btn-block" type="submit">Sign Up</button></div>
							<p>You already have an account? <a href="<?php echo base_url('login')?>">Login here.</a></p>
						</form>
					</div>
				</div>
	</section> 
	
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery.Validate/1.6/jQuery.Validate.min.js"></script>	
	<script>
		var form = $("#msform");
		console.log(form)
		form.validate({
			rules: {
				name: "required",
				user_name: "required",
				mobile:{
					required: true,
					number: true,
					remote: {
						url: "user/check_phone",
						type: "post",
						data:{
                          email: function()
                          {
                              return $('#msform :input[name="mobile"]').val();
                          }
                      },
					
					},
				},  
				password:"required",
			
			
			},
			messages: {
		
				name: "First Name required",
				user_name: "User Name required",
				mobile:{
					required: "Mobile required",
					number: "number should be numeric",
					remote:"Mobile already exist",
				},
				password:"Password required",
			
			}
		});


</script>
