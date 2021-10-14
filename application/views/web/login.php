  <!-- CONTENT START -->
    <section>
	
	   <div class="container">
                <div class="register-photo">
					<div class="form-container">
						<div class="image-holder"></div>
						<form method="post">
							<h2 class="text-center"><strong>Log In</strong> Account.</h2>
							<div class="form-group">
							    <!--<input class="form-control" type="email" name="email" placeholder="Mobile">-->
							    
							     <input type="text" name="mobile"  <?php if(form_error('mobile')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('mobile')){ echo set_value('mobile'); }elseif(!empty($row->mobile)){ echo $row->mobile; } ?>"   class="form-control" id="mobile" placeholder="Mobile number">
							     <div class="text-danger"> <?php echo form_error('mobile'); ?>  </div>
							    
							    </div>
							<div class="form-group">
							    <!--<input class="form-control" type="password" name="password" placeholder="Password">-->
							    
							     <input type="password" name="password" <?php if(form_error('password')){ echo 'style="border-color:red"'; } ?>  class="form-control" id="password" placeholder="Password">
                                 <div class="text-danger"> <?php echo form_error('password'); ?>  </div>
							    
							    
							    </div>
							
							<a href="<?php echo base_url('forgotpassword') ?>" class="fg">Forgot Password?</a>
							<div class="form-group">
							   <button class="btn btn-success btn-block" type="submit">LOG IN</button>
							</div>
							<p>I don't have an account? <a href="<?php echo base_url('register') ?>">Sign Up.</a></p>
						</form>
					</div>
				</div>
	</section> 
	