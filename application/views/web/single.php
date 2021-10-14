
  <section>
	
	   <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container">
						<form method="post" id="singleform">
						    <?php if(!empty($market_rate)) {?>
							<h2 class="text-center"><strong><?php echo $market_rate->market_type_name ?></strong> (<?php echo $market_rate->min_bid_amount; echo " KA "; echo $market_rate->win_amount; ?>)</h2>
							<?php } ?>
							
                            <h6>Select Your Game</h6>
							<div class="row">
								<div class="form-group col-sm-6">
								    <input type="hidden" id="total_amount" name="total">
								  <select class="form-control" name="market" id="market_data">
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
								   <div class="text-danger"> <?php echo form_error('date'); ?>  </div>
								</div>
								
								<ul class="single-box sumtable" >
								   <li>
								     <span class="count">0</span>
									 <span><input type="text"  name="amount[0]" id="0"  class="form-control single_box"/ ></span>
									  <div class="text-danger"> <?php echo form_error('amount[0]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">1</span>
									 <span><input type="text"  name="amount[1]" id="1"  class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[1]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">2</span>
									 <span><input type="text"  name="amount[2]" id="2"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[2]'); ?> 
								   </li>
								   <li>
								     <span class="count">3</span>
									 <span><input type="text"  name="amount[3]"  id="3"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[3]'); ?> 
								   </li>
								   <li>
								     <span class="count">4</span>
									 <span><input type="text"  name="amount[4]" id="4"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[4]'); ?> 
								   </li>
								   <li>
								     <span class="count">5</span>
									 <span><input type="text"  name="amount[5]" id="5"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[5]'); ?> 
								   </li>
								   <li>
								     <span class="count">6</span>
									 <span><input type="text"  name="amount[6]" id="6"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[6]'); ?> 
								   </li>
								   <li>
								     <span class="count">7</span>
									 <span><input type="text"  name="amount[7]" id="7"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[7]'); ?> 
								   </li>
								   <li>
								     <span class="count">8</span>
									 <span><input type="text"  name="amount[8]" id="8"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[8]'); ?> 
								   </li>
								   <li>
								     <span class="count">9</span>
									 <span><input type="text"  name="amount[9]" id="9"  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[9]'); ?> 
								   </li>
								</ul>
								 <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								
								<div class="col-sm-12 text-center sumtablew"><h5>Total Point : <b class="total" id="total">0</b></h5></div>
								
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
	  $("#singleform").validate({
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
             $( "#singleform" ).submit();
       
         }
      }
    });
    
 $(document).ready(function() {
         var date = $("#date").val();
           market(date,'single')
      $("#date").change(function() {
        var date = $("#date").val();
             market(date,'single')
        });
          
    });



	</script>

	