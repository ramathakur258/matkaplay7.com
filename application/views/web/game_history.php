
    <!-- CONTENT END -->
	<section class="register-photo" style="padding-bottom: 0px;">
        <div class="container"> 
           <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Game History</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
					<!--<div class="row">	-->
					<!--	<div class="col-4 col-sm-6">-->
					<!--		 <label>Show Entries</label>-->
					<!--		 <select class="selecbox"><option>1</option></select>-->
					<!--	</div>-->
					<!--	<div class="col-8 col-sm-6">-->
					<!--	   <input type="text" class="searchb" placeholder="search">-->
					<!--	</div>-->
					<!--</div>-->
					
					 <div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							    <!--<th>S.No</th>-->
							    <th>Game</th>
								<th>Bazar</th>
							    <!--<th>Digit</th>-->
							    <th>Bid Number</th>
							    <th>Bid Amount</th>
							    <th>Game Status</th>
							    <th>Won Amount</th>
							    <th>Placed Bet On </th>
							    <th>Date</th>
							</tr>
							<tr>
							   
							    <?php  foreach($row  as $r) { ?>
                                <!--<td>01</td>-->
								<td><?php echo $r->market_type_name;?></td>
								<td><?php echo $r->market_name; echo "&nbsp";echo $r->type;?></td>
								<td><?php echo $r->bid_number;?></td>
								<td><?php echo $r->bid_amount;?></td>
								<td><?php if(!empty($r->game_status)){ echo $r->game_status;}else{echo "-";}?></td>
								<td><?php if(!empty($r->won_amount) || $r->won_amount =='0'){echo $r->won_amount;}else{echo "-";}?></td>
								<td><?php echo date("d M Y ",strtotime($r->date))?></td>
								<td><?php echo date("d M Y g:i A",strtotime($r->created_at))?></td>
							   
                            </tr>
                             <?php } ?> 
                          </tbody>
						</table>
					   </div>	
					    <div class="site-pagination mt-4">
                            <nav aria-label="Page navigation example">
                                 <?php echo $pagination; ?>
                              <!--<ul class="pagination">-->
                              <!--  <li class="page-item"></li>-->
                              <!--  <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                              <!--  <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                              <!--  <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                              <!--  <li class="page-item">-->
                              <!--    <a class="page-link" href="#" aria-label="Next">-->
                              <!--      <i class="fas fa-chevron-right"></i>-->
                              <!--    </a>-->
                              <!--  </li>-->
                              <!--</ul>-->
                            </nav>
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
