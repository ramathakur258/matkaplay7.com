       
    <!-- CONTENT START -->
    <section>
	
	   <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container jodi-width">
						<form method="post" id="trippleform">
                            
                            	<?php if(!empty($market_rate)) {?>
							<h2 class="text-center"><strong><?php echo $market_rate->market_type_name ?></strong> (<?php echo $market_rate->min_bid_amount; echo " KA "; echo $market_rate->win_amount; ?>)</h2>
							<?php } ?>

                            <h6>Select Your Game</h6>
							<div class="row sumtable">
								<div class="form-group col-sm-6">
							  <input type="hidden" id="total_amount" name="total">
							  <select class="form-control"  name="market" id="market_data">
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
								   <div class="text-danger"> <?php echo form_error('date'); ?>  </div>
								</div>
								
								<div class="count-patti">1</div>
								<ul class="single-box  col-sm-12">
								   <li>
								     <span class="count">777</span>
									 <span><input type="text" name="amount[777]" id="777" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[777]'); ?>  </div>
								   </li>
								</ul>

                                <div class="clearfix"></div>
								
								<div class="count-patti">2</div>
								<ul class="single-box  col-sm-12">
								   <li>
								     <span class="count">444</span>
									 <span><input type="text" name="amount[444]" id="444" value="" lass="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[444]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">3</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">111</span>
									 <span><input type="text" name="amount[111]" id="111" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[111]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">4</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">888</span>
									 <span><input type="text" name="amount[888]" id="888" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[888]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">5</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">555</span>
									 <span><input type="text" name="amount[555]" id="555" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[555]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">6</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">222</span>
									 <span><input type="text" name="amount[222]" id="222" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[222]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">7</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">999</span>
									 <span><input type="text" name="amount[999]" id="999" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[999]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">8</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">666</span>
									 <span><input type="text"  name="amount[666]" id="666" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[666]'); ?>  </div>
								   </li>
								</ul>
								
								<div class="count-patti">9</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">333</span>
									 <span><input type="text"  name="amount[333]" id="333" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[333]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">0</div>
								<ul class="single-box col-sm-12">
								   <li>
								     <span class="count">0</span>
									 <span><input type="text" name="amount[0]" id="0" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[0]'); ?>  </div>
								   </li>
								</ul>
								
							   <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								 
								<div class="col-sm-12 text-center"><h5>Total Point : <b  class="total" id="total">0</b></h5></div>
								
							</div>
							
							<div class="form-group">
							   <button class="btn btn-success btn-block " type="submit">Submit Now</button>
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
		 $("#trippleform").validate({
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
          $(".sumtable").after('<label id="single_dropdown-error" class="error mb-2" for="single_dropdown">Please Bet on a Number..!!</label>');
        }
         else
         {
              var v =  $('#total').text()
         
             $('#total_amount').val(v)
             $( "#trippleform" ).submit();
         }
      }
    });
    
     $(document).ready(function() {
         var date = $("#date").val();
           market(date,'tripple_patti')
      $("#date").change(function() {
        var date = $("#date").val();
             market(date,'tripple_patti')
        });
          
    });
		</script>
