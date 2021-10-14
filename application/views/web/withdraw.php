
<!-- CONTENT END -->
	<section class="register-photo" style="padding-bottom: 0px;">
        <div class="container"> 
           <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                      
                        <h5 class="bg1">Steps and Request To Withdraw From Your Account</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        
                        <div class="form-group">
						    <a href="" class="withdraw-btn" data-toggle="modal" data-target="#myModal">Request for Withdraw</a>
						</div>
                        
					<div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							  
							    <th>Username</th>
								<th>Bank name</th>
							    <th>IFSC Code</th>
							   <th>Withdraw Amount</th>
							   <th>Requested date</th>
							   <th>Status</th>
							</tr>
							 <?php if(!empty($record)) { foreach($record as $row) { ?>
							<tr>
							   
                               
								<td><?php echo $row->account_holder_name;?></td>
								<td><?php echo $row->bank_name;?></td>
								<td><?php echo $row->ifsc_code;?></td>
                                <td>INR <?php echo $row->amount;?></td>
								<td><?php  echo date("d M Y",strtotime($row->created_at))?></td>
								<td><?php echo $row->status;?></td>
                            </tr>
                            <?php } }  ?>
                          </tbody>
						</table>
					   </div>
					   
					   <div class="site-pagination mt-4">
                            <nav aria-label="Page navigation example">
                                 <?php echo $pagination; ?>
                            </nav>
                        </div>
					   
					   
					   
					</div>
                </div>
            </div>
        </div>
	</section>
	
	
	
	 <!-- CONTENT START -->
    <section>
	
	   <div class="container">
            <div class="row">
				<div class="col-sm-12 col-lg-12">
                    <div class="content-about">
                        <h2>How To Withdraw your amount</h2>
                       
						<div id="box-container">
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-1</h2>
							<p>Message +91 123-456-7890 Number.</p>
						  </div>
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-2</h2>
							<p>Send your username, amount to withdraw and your bank account details.</p>
						  </div>
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-3</h2>
							<p>Once, these details are sent to the admin. The admin will verify your details and credit your amount within 24hours.</p>
						  </div>
						</div>
						
						
                    </div>
                </div>
            </div>
        </div>
	</section> 
	
	
	
	
<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Request for withdraw your amount</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				
				</div>

				<div class="modal-body register-photo" style="margin-top: 0px;">
						<form method="post" style="display: block; width: 100%; padding: 10px 10px;" id="requestform">
							<div class="row">
								<div class="col-sm-12">
								  <label>Bank name</label>
								  <input type="text" name="bank_name" id="bank_name" class="form-control mb-20" value=""/>
								   <div class="text-danger"> <?php echo form_error('bank_name'); ?>  </div>
								</div>
								<div class="col-sm-12">
								  <label>Account number</label>
								  <input type="text" name="account_number" id="account_number" class="form-control mb-20" value="" maxlength="15">
								 <div class="text-danger"> <?php echo form_error('account_number'); ?>  </div>
								</div>
								<div class="col-sm-12">
								 <label>Account holder name</label>
								 <input type="text" name="account_holder_name" id="account_holder_name" class="form-control mb-20" value=""/>
							     <div class="text-danger"> <?php echo form_error('account_holder_name'); ?>  </div>
								</div>
								<div class="col-sm-12">
								  <label>IFSC code</label>
								  <input type="text"  name="ifsc_code" id="ifsc_code" class="form-control mb-20" maxlength="11" value=""/>
						         <div class="text-danger"> <?php echo form_error('ifsc_code'); ?>  </div>
								</div>
								<div class="col-sm-12">
								  <label>Amount</label>
								  <input type="text"  name="amount" id="amount" class="form-control mb-20" value=""/>
							      <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								</div>
							</div>
							
							<div class="form-group">
							   <button class="btn btn-update btn-block" type="submit" name="submit" style="background-image: linear-gradient(to left, #ffc800, #f4d600, #e6e400, #d4f200, #beff05);">Send</button>
							</div>
							
						</form>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->	
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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery.Validate/1.6/jQuery.Validate.min.js"></script>	
	<script>
		var form = $("#myModal #requestform");
		console.log(form)
		form.validate({
			rules: {
				bank_name: "required",
				account_holder_name: "required",
				account_number:{
					required: true,
					number: true,
				},  
				ifsc_code:"required",
				amount:{
					required: true,
					number: true,
				}, 
			
			},
			messages: {
		
				bank_name: "Bank Name required",
				account_holder_name: "Account Holder Name required",
				account_number:{
					required: "Mobile required",
					number: "number should be numeric",
				},
				ifsc_code:"IFSC Code required"
				amount:{
					required: "Amount required",
					number: "Amount should be numeric",
				},
			
			}
		});
	</script>
	