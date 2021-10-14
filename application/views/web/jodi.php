
    <!-- CONTENT START -->
       <section>
	
	       <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container jodi-width">
						<form method="post" id="jodiform">
						
							  <?php if(!empty($market_rate)) {?>
							<h2 class="text-center"><strong><?php echo $market_rate->market_type_name ?></strong> (<?php echo $market_rate->min_bid_amount; echo " KA "; echo $market_rate->win_amount; ?>)</h2>
							<?php } ?>
							
							
                            <h6>Select Your Game</h6>
							<div class="row">
								<div class="form-group col-sm-6">
								     <input type="hidden" id="total_amount" name="total">
								    <select class="form-control" name="market" id="market_data">
								    <option disabled selected value>Select Market</option>
								
								  </select>
								   <div class="text-danger"> <?php echo form_error('market'); ?>  </div>
								</div>
								<div class="form-group col-sm-6">
								  <select class="form-control" name="date" id="date">
								    <!--<option disabled selected value>Select Date</option>-->
								     <?php  $date =dropDownDate();
								    
								    for($i=0; $i<count($date); $i++){
								    echo '<option value="'.$date[$i].'">'.date("d M Y ",strtotime($date[$i])).'</option>';
								    }
								    ?>
								  </select>
								   <div class="text-danger"> <?php echo form_error('date'); ?></div>
								</div>
								
								<div class="select-number" id="style-6">
								    <ul class="list">
								        <?php 
								      
								        
								        for($i=0; $i<100; $i++){ 
								        
								        ;?>
								        <li class="list-item" >
											<input type="checkbox"  onclick="add(<?php echo $i
											
											;?>)" class="hidden-box" id="add<?php echo $i;?>"/>

											<label for="add<?php echo $i;?>" class="check--label">
											  <span class="check--label-box"></span>
											  <span class="check--label-text"><?php if($i<10){echo "0".$i; }else{ echo $i;} ?></span>
											</label>
										</li>
										
								        
								       <?php    }
								        
								        ?>
							
									</ul>
								</div>
								
								
								<ul class="single-box-jodi sumtable">
								     <?php 
								        for($i=0; $i<100; $i++){  ?>
								    <li id="li<?php echo $i?>" style="display:none">
								     <span class="count"><?php echo $i; ?></span>
									 <span><input type="text" class="form-control single_box" name="amount[<?php if($i<10){ echo "0".$i;}else{echo $i;} ?>]" id="in<?php echo $i; ?>"/></span>
									 <a  onclick="remove(<?php echo $i?>)" class="remove" style="cursor:pointer">x</a>
								   </li>
								   
								   
								   <?php } ?>
								</ul>
								
								 <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								<div class="col-sm-12 text-center"><h5>Total Point : <b id="total">0</b></h5></div>
								
							</div>
							
							<div class="form-group">
							   <button class="btn btn-success btn-block" type="submit">Submit Now</button>
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
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery.Validate/1.6/jQuery.Validate.min.js"></script>	
	
	<script>
	  $("#jodiform").validate({
      rules:{
         market:"required",
         date:"required"
        
      },
      messages:{
      market:"Please select the market",
      date:"Please select the date"
      },
      submitHandler: function(form) {
        var flag=0;
        $( ".single_box" ).each(function( index ) {
          if($( this ).val()!="")
          {
            flag=1;
          }
        });
        if(flag==0)
        {
          $(".sumtable").after('<label id="single_dropdown-error" class="error" for="single_dropdown">Please Bet on a Number..!!</label>');
        }
         else
         {
           var v =  $('#total').text()
         
             $('#total_amount').val(v)
             $( "#jodiform" ).submit();
       
         }
      }
    });
    
 $(document).ready(function() {
         var date = $("#date").val();
           market(date,'jodi')
      $("#date").change(function() {
        var date = $("#date").val();
             market(date,'jodi')
        });
          
    });

	</script>
