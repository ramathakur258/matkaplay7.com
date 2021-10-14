<!-- CONTENT END -->
	<section class="register-photo" style="padding-bottom: 0px;">
        <div class="container"> 
           <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1" style="text-align:center"><?php echo $marketName->name; ?> </h5>
                    
                   
					<div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							    <th>MON</th>
								<th>TUE</th>
							    <th>WED</th>
							    <th>THU</th>
							    <th>FRI</th>
							    <th>SAT</th>
							    <th>SUN</th>
							</tr>
							
    <?php if(!empty($jodi_data)){  $j=0;   foreach($jodi_data as  $key=>$getData) { 
       ++$j; if($j==1){ ?>
 <tr>
 
    <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
  
  <?php  }
    if($j==2){ ?>
    <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
    <?php  }
    if($j==3){ ?>
   
   <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
    <?php  }
    if($j==4){ ?>
      
      <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
    <?php  }
    if($j==5){ ?>
    
    <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
    <?php  }
    if($j==6){ ?>
     <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
    <?php  }
    if($j==7){ ?>
  <td><?php echo $getData->open_digit_sum; ?> <?php echo $getData->close_digit_sum; ?><br><br><br></td>
   
  </tr>
      
  
      <?php $j=0;}}}?>
     
                            
                          </tbody>
						</table>
					   </div>
					</div>
                </div>
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