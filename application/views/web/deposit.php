  <!-- CONTENT END -->
  
 
	<section class="register-photo" style="padding-bottom: 0px;">
        <div class="container"> 
           <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Steps and Request To Deposit In Your Account</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        
                        <div class="form-group">
						    <a href="" class="withdraw-btn" data-toggle="modal" data-target="#myModal">Deposit Amount</a>
						</div> 
                     
                        <h5 class="bg1">Deposit Request</h5>
                     	<div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							    <th>Mobile Number</th>
							    <th>Requested Amount By You</th>
							    <th>Status</th>
							    <th>Requested Date</th>
							</tr>
							<tr>
							    
					<?php  foreach($data  as $d) { ?>
						
								<td><?php echo $d->mobile_no;?></td>
								<td><?php echo $d->amount;?></td>
								<td><?php echo $d->status;?></td>
                                <td><?php echo date("d M Y g:i A ",strtotime($d->created_at));?></td>
								         
                            </tr>
                     <?php } ?>     
                          </tbody>
						</table>
					   </div>
                     
                    <h5 class="bg1">Deposited Amount Detail</h5>   
					<div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							    <th>Txn. No</th>
							    <th>Deposit Amount</th>
							     <th>Status</th>
							    <th>Deposit Date</th>
							</tr>
							<tr>
							    
						<?php  foreach($row  as $r) { ?>
						
								<td><?php echo $r->txn_id;?></td>
                                <td><?php echo $r->amount;?></td>
                                <td><?php echo $r->comment;?></td>
                                <td><?php echo date("d M Y  g:i A",strtotime($r->created_at));?></td>
								         
								
                            </tr>
                           <?php } ?> 
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
							<p>Ask The Admin For Account details to deposit the amount</p>
						  </div>
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-3</h2>
							<p>Once, Amount is sent to the admin send the screenshot with deposit proof. The admin will add points to your account after successful deposit.</p>
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
						<h4 class="modal-title" id="myModalLabel">Deposit Amount</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					 </button>
				
				</div>

				<div class="modal-body register-photo" style="margin-top: 0px;">
						<form method="post"  style="display: block; width: 100%; padding: 10px 10px;" id="requestform">
							<div class="row">
								<div class="col-sm-12">
								 
								  <label>Name</label>
								  <input type="text" name="name"  class="form-control mb-20" value="<?php echo $t->name; ?>"/>
								   <div class="text-danger"> </div>
								</div>
								<div class="col-sm-12">
								  <label>Mobile Number</label>
								  <input type="text" name="mobile_no" class="form-control mb-20" maxlength="10" value="<?php echo $t->mobile;?>"/>
								 <div class="text-danger"></div>
								</div>
								<div class="col-sm-12">
								  <label>Amount</label>
								  <input type="text"  name="amount" id="amount" class="form-control mb-20" value=""/>
							      <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								</div>
							</div>
							<div class="col-sm-14">
								  <label>Description</label>
								  <input type="text" name="description" id="description" class="form-control mb-20" value=""/>
								 <div class="text-danger"> <?php echo form_error('description'); ?> </div>
								</div>
							<div class="form-group">
							   <button class="btn btn-update btn-block" type="submit" name="submit" style="background-image: linear-gradient(to left, #ffc800, #f4d600, #e6e400, #d4f200, #beff05);">Deposit Now</button>
							</div>
						</form>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->		
	
	
	
	
	
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
            <?php if($c->sender_id == $this->session->userdata('user_id')) { ?>
             <li class="other"><?php echo $c->msg; ?></li>
            <?php }else{ ?>
             <li class="self"><?php echo $c->msg; ?></li>
            <?php } }?>
        </ul>
        <div class="footer">
           <input type="text"  class="text-box" id="message"  />
          
         <input type="hidden" class="res" id="receiver" value="<?php echo $this->session->userdata('user_id');; ?>" />
            <button id="sendMessage">send</button>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url('socket/node_modules/socket.io/client-dist/socket.io.js');?>"></script>



	<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jQuery.Validate/1.6/jQuery.Validate.min.js"></script>	
	<script>
		var form = $("#myModal #requestform");
		console.log(form)
		form.validate({
			rules: {
				name: "required",
				description: "required",
				mobile_no:{
					required: true,
					number: true,
				},  
				amount:{
					required: true,
					number: true,
				}, 
			
			},
			messages: {
		
				name: "Name required",
				description: "Description required",
				mobile_no:{
					required: "Mobile required",
					number: "number should be numeric",
				},
				amount:{
					required: "Amount required",
					number: "Amount should be numeric",
				},
			
			}
		});
	</script>

	
    
  