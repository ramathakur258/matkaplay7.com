
    <section>
	
	   <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container width60-single-patti">
					  
						<div class="dashboard-header-avatar">
						    <?php if(!empty($row->profile)){ ?>
								<img src="<?php echo base_url('uploads/profile/'.$row->profile)?>" alt="image">
								<?php }else{?>
								<img src="<?php echo base_url('uploads/profile/default.png')?>" alt="image">
									<?php }?>
									<div class="avatar-edit">
							 <form action="<?php echo base_url('user/profile_upload') ?>" method="post" enctype="multipart/form-data">
									<input type="file" id="imageUpload" onchange="this.form.submit()" name="avatar" accept=".png, .jpg, .jpeg">
									<label for="imageUpload"><i class="fas fa-edit"></i></label>
							</form>
								</div>
							</div>
					
						<form method="post" action = <?php echo base_url('user/profile') ?> style="display: block; width: 100%;padding: 25px 30px;">
							<h5 class="bg1 mt-2">Edit Profile</h5>
							<div class="row">
								<div class="col-sm-6">
								  <label>Name</label>
								  <input type="text" name="name"class="form-control mb-20" value="<?php echo $row->name;?>"/>
								</div>
								<div class="col-sm-6">
								  <label>User Name</label>
								  <input type="text" name="user_name" class="form-control mb-20" value="<?php echo $row->user_name; ?>">
								</div>
								<div class="col-sm-6">
								  <label>Phone</label>
								  <input type="text"  name="mobile" class="form-control mb-20" value="<?php echo $row->mobile;?>"/>
								</div>
							</div>
							
							<div class="form-group">
							   <button class="btn btn-update btn-block" type="submit" name="submit" style="background-image: linear-gradient(to left, #ffc800, #f4d600, #e6e400, #d4f200, #beff05);">Update Profile</button>
							</div>
							
						</form>
						
						
						<form method="post" action =<?php echo base_url('user/changepassword')?>  style="display: block; width: 100%;padding: 25px 30px;">
							<h5 class="bg1">Change Password</h5>
							<div class="row">
								<div class="col-sm-6">
								  <label>Old Password</label>
								  <input type="text" name= "password" class="form-control mb-20" value="" placeholder="Enter your old password"/>
								</div>
								<div class="col-sm-6">
								</div>
								<div class="col-sm-6">
								  <label>New Password</label>
								  <input type="text" name="password" class="form-control mb-20" value=""/>
								</div>
								<div class="col-sm-6">
								  <label>Confirm New Password</label>
								  <input type="text" name="password" class="form-control mb-20" value=""/>
								</div>
							</div>
							
							<div class="form-group">
							   <button class="btn btn-update btn-block" type="submit" style="background-image: linear-gradient(to left, #ffc800, #f4d600, #e6e400, #d4f200, #beff05);">Update Password </button>
							</div>
							
						</form>
						
						
						
					</div>
				</div>
				
	<?php if(!empty($_SESSION['user_id'])) { ?>	
	<div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    <div class="chat">
        <div class="header">
            <span class="title">
                Welcome to Matka Game <small>How can i help you?</small>
            </span>
            <button>
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <ul class="messages" id="recent_message">
            <?php foreach($chat_data as $c){ ?>
            <?php if($c->sender_id == $_SESSION['user_id']) { ?>
             <li class="other"><?php echo $c->msg; ?></li>
            <?php }else{ ?>
             <li class="self"><?php echo $c->msg; ?></li>
            <?php } }?>
        </ul>
        <div class="footer">
           <input type="text"  class="text-box" id="message"  />
          
         <input type="hidden"  id="receiver" value="<?php echo $_SESSION['user_id']; ?>" />
            <button id="sendMessage">send</button>
        </div>
    </div>
</div>
 <?php } ?>					
	</section> 
	
    <!-- JAVASCRIPTS -->
    <script src='js/jquery-3.4.1.min.js'></script>
    <script src='js/plugins.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/main.js'></script>
    <script src="js/slider.js"></script>
    <script src='js/nav-fixed-top.js'></script>
    <!-- JAVASCRIPTS END -->
    
		<script>
	$('html').click(function() {
	  $('.dd-menu').removeClass("active");
	});

	$('.dd-menu ul li').each(function() {
		var delay = $(this).index() * 50 + 'ms';

		$(this).css({
			'-webkit-transition-delay': delay,
			'-moz-transition-delay': delay,
			'-o-transition-delay': delay,
			'transition-delay': delay
		});                  
	});

	$(".drop").click (function(e){
	  e.stopPropagation();
	  $('.dd-menu').toggleClass("active");
	});

	 $('.dd-menu').click (function(e){
	  e.stopPropagation();
	});
</script>
	
	
	
    </body>
    
</html>