

	
	<div class="pages-hero">
        <div class="container">
            <div class="pages-title"></div>
		</div>  
    </div>
    
        
        
    <!-- CONTENT START -->
    <section>
	
	   <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-8">
                    <div class="content-about">
                        <h5>About Us</h5>
                        <h2>Online Play Matka</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
                       
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mt-view m-none">
                    <figure class="about-pic"><img src="<?php echo base_url('assets/img/satta-chart-banner-3-1.jpg')?>" alt=""></figure>
                </div>
            </div>
        </div>
	</section> 
	
	 <section style="padding: 0px 0px;">
        <div class="container"> 
           <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Matka Play Board</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                Minimum Deposit : 500
                                <span class="badge"><i class="fas fa-chevron-right"></i></span>
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                Minimum Withdrawal:  1000
                                <span class="badge"><i class="fas fa-chevron-right"></i></span>
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                Maximum Withdrawal: No Limits
                                <span class="badge"><i class="fas fa-chevron-right"></i></span>
                              </a>
                            </div>
                        </div>
                        
                    </aside>
					</div>
                </div>
            </div>
			
			
		
           <div class="row mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Matka Play Rate</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                                <?php foreach($game_data as $g){ ?>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">
                               <?php echo $g->market_type_name; echo "&nbsp"; echo  $g->min_bid_amount; echo "&nbsp"; echo "KA"; echo "&nbsp";  echo $g->win_amount; ?>
                                <span class="badge"><i class="fas fa-chevron-right"></i></span>
                              </a>
                              <?php } ?>
         <!--                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                        JODI 10 ka 1000-->
         <!--                       <span class="badge"><i class="fas fa-chevron-right"></i></span>-->
         <!--                     </a>-->
         <!--                     <a href="#" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                       SINGLE PATTI 10 ka 1500-->
         <!--                       <span class="badge"><i class="fas fa-chevron-right"></i></span>-->
         <!--                     </a>-->
							  <!--<a href="#" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                        DOUBLE PATTI 10 ka 3000-->
         <!--                       <span class="badge"><i class="fas fa-chevron-right"></i></span>-->
         <!--                     </a>-->
							  <!--<a href="#" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                       TRIPPLE PATTI 10 ka 8000-->
         <!--                       <span class="badge"><i class="fas fa-chevron-right"></i></span>-->
         <!--                     </a>-->
                            </div>
                        </div>
                        
                    </aside>
					</div>
                </div>
            </div>
        </div>
	</section>	
    <!-- WIDE SECTION COUNTER END -->
	 <div class="cta-counter-alt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="cta-content pad25">
                            <h3>Online Matka Play</h3>
							<p style="color:#fff;">Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cta-btn">
                             <h3 class="mb-0"><strong>Download Now</strong></h3>
							 <a href=""><img src="<?php echo base_url('assets/img/google-play.png') ?>" class="playbtn"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
    <!-- CONTENT END -->
	<section style="padding: 0px 0px;">
        <div class="container"> 
           <div class="row mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Satta Matka Play Results</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        
						<?php foreach($result_data as $r) { ?>
						<div class="result">
						   <h6><?php echo $r->name; ?></h6>
						   <h1 class="awesome"><span> <?php if(!empty($r->open_result_digit)) { echo $r->open_result_digit; }else{echo "***"; }?> </span> - <span> <?php if(!empty($r->open_digit_sum) || $r->open_digit_sum =='0') { echo $r->open_digit_sum; }else{echo "*"; } if(!empty($r->close_digit_sum)  || $r->close_digit_sum =='0') { echo $r->close_digit_sum; }else{echo "*"; } ?>  </span> - <span> <?php if(!empty($r->close_result_digit)) { echo $r->close_result_digit; }else{echo "***"; }?> </span></h1>
						   <div class="leftitme"> <?php echo $r->open_time; ?> -  <?php echo $r->close_time; ?></div>
						</div>
						<?php } ?>
						
						<!--<div class="result">-->
						<!--   <h6>MADHURI DAY</h6>-->
						<!--   <h1 class="awesome"><span> 240 </span> - <span> 06 </span> - <span> 567 </span></h1>-->
						<!--   <div class="leftitme">11:50AM - 12:50AM</div>-->
						<!--</div>-->
						<!--<div class="result">-->
						<!--   <h6>TIME BAZAR</h6>-->
						<!--   <h1 class="awesome"><span> *** </span> - <span> ** </span> - <span> *** </span></h1>-->
						<!--   <div class="leftitme">01:05AM - 02:05AM</div>-->
						<!--</div>-->
						
					</div>
                </div>
            </div>
        </div>
	</section>	
	
	<!-- CONTENT END -->
	<section style="padding: 0px 0px;">
        <div class="container"> 
           <div class="row mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Matka Online Play Table</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        
					<div class="gcon-table">	
						<table>
                          <tbody>
							<tr>
							   <th>Market</th>
							   <th>Open</th>
							   <th>Close</th>
							</tr>
                    <?php foreach($market_time as $mt) { ?>
                            <tr>
                                <td><?php echo $mt->name?> </td>
                                <td><?php echo $mt->open_time?></td>
                                <td><?php echo $mt->close_time?></td>
                            </tr>
                            <?php } ?>
                            <!--<tr>-->
                            <!--    <td>MILAN NIGHT </td>-->
                            <!--    <td>09:00 pm</td>-->
                            <!--    <td>11:00 pm</td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                            <!--    <td>KALYAN NIGHT </td>-->
                            <!--    <td>09:30 pm</td>-->
                            <!--    <td>11:35 pm</td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                            <!--    <td>TIME BAZAR</td>-->
                            <!--    <td>01:05 pm</td>-->
                            <!--    <td>02:05 pm</td>-->
                            <!--</tr>-->
                          </tbody>
						</table>
					   </div>	
					</div>
                </div>
            </div>
        </div>
	</section>
	
	
	
	
	 <section style="padding: 0px 0px;">
        <div class="container"> 
           <div class="row mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Online Matka Play Jodi Charts</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                                 <?php foreach($market_time as $mt) { ?>
                                 
                              <a href="<?php echo base_url('jodi-chart-detail/'.$mt->market_id) ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">
                               <?php if($mt->name == 'STARLINE'){
                              
                               ?>

                               <?php echo $mt->name; echo "&nbsp";  echo "("; echo  $mt->open_time; echo "&nbsp"; echo "-"; echo "&nbsp";  echo $mt->close_time; echo ")";?>

                               
                             <?php   }
                             
                               else{
                                   echo $mt->name;
                               }
                               
                               ?>
                                <span class="badge"><i class="fas fa-angle-double-right"></i></span>
                              </a>
                              <?php } ?>
         <!--                     <a href="<?php echo base_url('jodi-chart-detail') ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                        MILLAN NIGHT-->
         <!--                       <span class="badge"><i class="fas fa-angle-double-right"></i></span>-->
         <!--                     </a>-->
         <!--                     <a href="<?php echo base_url('jodi-chart-detail') ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                       KALYAN NIGHT-->
         <!--                       <span class="badge"><i class="fas fa-angle-double-right"></i></span>-->
         <!--                     </a>-->
							  <!--<a href="<?php echo base_url('jodi-chart-detail') ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                        TIME BAZAR-->
         <!--                       <span class="badge"><i class="fas fa-angle-double-right"></i></span>-->
         <!--                     </a>-->
							  <!--<a href="<?php echo base_url('jodi-chart-detail') ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">-->
         <!--                       RAJDHANI DAY-->
         <!--                       <span class="badge"><i class="fas fa-angle-double-right"></i></span>-->
         <!--                     </a>-->
                            </div>
                        </div>
                        
                    </aside>
					</div>
                </div>
            </div>
			
			
			<div class="row mt-3">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">Online Matka Play Panel Charts</h5>
                        <p>Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.Our vision is to be recognised worldwide as a leader in the field of end to end supply chain solutions.</p>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                                  <?php foreach($market_time as $mt) { ?>
                                  
                              <a href="<?php echo base_url('jodi-chart-detail/'.$mt->market_id) ?>" class="list-group-item d-flex justify-content-between align-items-center colorduskaso">
                               <?php if($mt->name == 'STARLINE'){
                              
                               ?>

                               <?php echo $mt->name; echo "&nbsp"; echo "("; echo $mt->open_time; echo "&nbsp"; echo "-"; echo "&nbsp";  echo $mt->close_time; echo ")"; ?>
                               
                             <?php   }
                             
                               else{
                                   echo $mt->name;
                               }
                               
                               ?>
                                <span class="badge"><i class="fas fa-angle-double-right"></i></span>
                              </a>
                              
                              <?php } ?>
                      
                            </div>
                        </div>
                        
                    </aside>
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
                        <h2>What is Matka Play</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>
				<div class="col-sm-12 col-lg-12">
                    <div class="content-about">
                        <h2>How To Play Matka Online</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>
                       
						<div id="box-container">
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-1</h2>
							<p>The first step is to pick any three (3) numbers from 0-9. In this example, Let us pick 5,3,6. To make the game more interesting and also to have a diversion, The numbers are added and the last number of the sumedup number is given. In the example that we choose 5 + 3 + 6 is 14 so, 4 is given. Hence, In the first draw the result would be 5,3,6 & 4.</p>
						  </div>
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-2</h2>
							<p>In the second step we draw the second set of single digit numbers. We pick the second set of numbers excatly the way we picked the first set of numbers. Let us pick 8,2,8 as the second set of numbers. Here, adding 8 + 2 + 8 would give us 18 so, The last digit 8 is considered in the result. Hence, The result of the second set of the numbers would be 8,2,8 & 8.</p>
						  </div>
						  <div class="box-layers" onclick="window.location='#'">
							<h2>Step-3</h2>
							<p>The third step is the assemble the digits that come as a result of the first and the second draw. In this example when we assemble the first and second set of drawn numbers it would look something like this : 5,3,6 *4 X 8,2,8 *8. This is the end result of the lottery and if the user has placed the bet on any of the numbers mentioned here would win.</p>
						  </div>
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
	
	
	
	<!-- Subscribe Modal -->
<div class="modal fade" id="modal-subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
    top: 0px; right: 0px; z-index: 1;  background: #fff; opacity: 1; width: 30px; height: 30px; border-bottom-left-radius: 15px;"><span aria-hidden="true">&times;</span></button>
			<div class="modal-body" style="padding: 0rem;">
				<h1 class="text-center text-uppercase mb-0">
			
			    	<img src="<?php echo base_url('assets/img/kuber-photo.jpg')?>" alt="" style="width: 100%;"/>
				</h1>
			</div>
		</div>
	</div>
</div>





