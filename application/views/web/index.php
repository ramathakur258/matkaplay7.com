    
    <!-- CONTENT START -->
    <section class="pt-180">
	
	   <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="content-about">
                        <h2>Take The Chance To Change Your Life With MatkaPlay7</h2>
                        <p>INDIA'S BEST MATKA SITE MATKAPLAY7.COM IS PROVIDING RELIABLE INDIAN MATKA SATTA RESULTS, EASY WITHDRAWAL WITHIN 24 HOURS</p>
                        
                        <a href="" class="playbtn-new">Play Now</a>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mt-view m-none">
                    <figure class="about-pic"><img src="<?php echo base_url('assets/img/right-banner-new.jpg')?>" alt="image"></figure>
                </div>
            </div>
        </div>
	</section> 
	 <div class="cta-counter-alt">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-8">
                        <div class="cta-content">
                            <h3>Matka Play Board</h3>
							<p class="title-newp">We Welcome You To India's Most Popular Matka Online Play Website matkaplay7.com Here You Can Play All Games Like Kalyan, Kalyan Night, Milan Day & Night, Rajdhani Day & Night, Starline, Dhankuber etc.</p>
							<p class="title-newp">We are providing you existing features like wallet, chat and 24X7 Support.</p>
							<p class="title-newp">Matkaplay7 introducing with refer & earn and notice functionality which will fulfill matkaplay7 customers’ expectations every time sets you apart from the crowd.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="cta-btn">
                             <ul>
                                 <li>
                                     <spna><img src="assets/img/hand-new.png" alt="image"/></spna> 
                                     <span class="ml-2">Minimum Deposit : 500</span>
                                 </li>
                                  <li>
                                     <spna><img src="assets/img/hand-new.png" alt="image"/></spna> 
                                     <span class="ml-2">Minimum Withdrawal: 1000</span>
                                 </li>
                                  <li>
                                     <spna><img src="assets/img/hand-new.png" alt="image"/></spna> 
                                     <span class="ml-2">Maximum Withdrawal: No Limits</span>
                                 </li>
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
	<section style="padding: 0px 0px;">
        <div class="container"> 
           <h3 class="title-newheading">Matka Play Rate</h3>
              <div class="row mt-3">
                 <div class="col-md-12 col-lg-12">
                         <?php foreach($game_data as $key=>$g){ ?>
                    <div class="platrate <?php if($key == 0){ echo "gradiant-blue";}else if($key == 1){ echo "gradiant-orange";}else if($key == 2){echo "gradiant-pink";}else if($key == 3){echo "gradiant-green";}else if($key == 4){echo "gradiant-red mr-0"; }?> ">
                        <h5><?php echo $g->market_type_name; ?> </h5>
                        <h2><?php echo  $g->min_bid_amount; echo "&nbsp"; echo "KA"; echo "&nbsp";  echo $g->win_amount; ?></h2>
                    </div>
                    <?php } ?>
                    <!-- <div class="platrate gradiant-orange">-->
                    <!--    <h5>JODI </h5>-->
                    <!--    <h2>10 KA 1250</h2>-->
                    <!--</div>-->
                    <!-- <div class="platrate gradiant-pink">-->
                    <!--    <h5>SINGLE PATTI </h5>-->
                    <!--    <h2>10 KA 5500</h2>-->
                    <!--</div>-->
                    <!-- <div class="platrate gradiant-green">-->
                    <!--    <h5>DOUBLE PATTI </h5>-->
                    <!--    <h2>10 KA 9500</h2>-->
                    <!--</div>-->
                    <!-- <div class="platrate gradiant-red mr-0">-->
                    <!--    <h5>TRIPLE PATTI</h5>-->
                    <!--    <h2>10 KA 25000</h2>-->
                    <!--</div>-->
                    
                </div>
            </div>
        </div>
	</section>	
    <!-- WIDE SECTION COUNTER END -->
    
    
    <section style="padding: 40px 0px;">
        <div class="container"> 
          
              <div class="row mt-3">
                 <div class="col-md-12 col-lg-6">
                    <div class="patter-bgnew">
                        <h3>Download Now</h3>
                        <img src="assets/img/google-play.png" class="widtg230" alt="image"/>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="content-about p-20">
                        <h2>Online Matka Play</h2>
                        <p>India's best satta matka provider, our vision is to be working ardently for its customers to provide them world class service and guaranteed customer satisfaction with our services.</p>
                      </div>
                </div>
            </div>
        </div>
	</section>	
	 <section class="resutltbale-bgnew">
        <div class="container"> 
              <div class="row mt-3">
                 <div class="col-md-12 col-lg-7">
                    <h3 class="title-newheading">Satta Matka Play Results</h3>
                    
                 <div class="result-mshow">  
                 
                       <?php foreach($result_data as $r) { ?>
						<div class="result">
						   <h6><?php echo $r->name; ?></h6>
						   <h1 class="awesome"><span>  <?php if(!empty($r-> open_result_digit) && time() >= strtotime($r->open_time)) { echo $r->open_result_digit; } else{echo "***"; }?> </span> - <span> <?php if(!empty($r->open_digit_sum) && time() >= strtotime($r->open_time)) { echo $r->open_digit_sum; }else{echo "*"; } if(!empty($r->close_digit_sum) && time() >= strtotime($r->close_time) ) { echo $r->close_digit_sum; }else{echo "*"; } ?>  </span> - <span> <?php if(!empty($r-> open_result_digit) && time() >= strtotime($r->close_time)) { echo $r->close_result_digit; }else{echo "***"; }?> </span></h1>
						   <div class="leftitme">  <?php echo $r->open_time; ?> -  <?php echo $r->close_time; 
						   ?></div>
						</div>
						<?php } ?>
                 
                 	
                    <!--<div class="platrate gradiant-gold">-->
                    <!--    <h5>DHANKUBER MORNING</h5>-->
                    <!--    <h2>123 - 99 - 675</h2>-->
                    <!--    <p>10:30 AM - 11:30 AM</p>-->
                    <!--</div>-->
                    <!--<div class="platrate gradiant-gold">-->
                    <!--    <h5>DHANKUBER MORNING</h5>-->
                    <!--    <h2>*** - ** - ***</h2>-->
                    <!--    <p>10:30 AM - 11:30 AM</p>-->
                    <!--</div>-->
                    <!--<div class="platrate gradiant-gold">-->
                    <!--    <h5>DHANKUBER MORNING</h5>-->
                    <!--    <h2>123 - 99 - 675</h2>-->
                    <!--    <p>10:30 AM - 11:30 AM</p>-->
                    <!--</div>-->
                </div>    
                    
                    <div class="trophy-bg">
                       	<?php foreach($result_data as $key=>$r) { 
                       	//print_r($r); die;
                       	?>
                       <ul class="firstrow <?php if($key%2 ==0){echo "bgwhite";}?>">
                            <li><h3><?php echo $r->name; ?></h3></li>
                            <li><p><?php echo $r->open_time; ?> - <?php echo $r->close_time;?></p></li>
                            <li><h1>
                               <?php //if(date_default_timezone_set('Asia/Kolkata') == open_digit_sum || close_digit_sum){
                               //if(timezone_transitions_get == open_sum_digit||close_sum_digit){
                         //   if(date("Hi") == "open_digit_sum" || "close_digit_sum")
                         

                               ?> 
                                <?php if(!empty($r-> open_result_digit ) && time() >= strtotime($r->open_time)) { echo $r->open_result_digit; } else{echo "***"; }?> </span> - <span> <?php if(!empty($r->open_digit_sum) || $r->open_digit_sum =='0' && time() >= strtotime($r->open_time)) { echo $r->open_digit_sum; }else{echo "*"; } if(!empty($r->close_digit_sum) || $r->close_digit_sum =='0'&& time() >= strtotime($r->close_time) ) { echo $r->close_digit_sum; }else{echo "*"; } ?>  </span> - <span> <?php if(!empty($r-> open_result_digit) && time() >= strtotime($r->close_time)) { echo $r->close_result_digit; }else{echo "***"; }?>
                                <?php //}  
                              //else{
                               //echo "***"; echo "-"; echo "**"; echo "-"; echo "***" ;
                                
                            // }?>  
                            </h1></li>
                       </ul>
                       	<?php } ?>
                    </div>
                    
                    <!--<h3 class="seealltxt"><a href="">See All Result</a></h3>-->
                 </div>
                
                
                <div class="col-md-12 col-lg-5">
                    <h3 class="title-newheading">Matka Online Play Table</h3>
                      <div class="bgwhite playtable">
                        <div class="gcon-table">	
    						<table class="table">
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
                              </tbody>
    						</table>
					     </div>
                      </div>
                    <!--<h3 class="seealltxt"><a href="">See All Play Table</a></h3>-->
                </div>
            </div>
        </div>
	</section>	
	
	

	
	<section style="padding: 0px 0px;">
        <div class="container"> 
            <div class="row mt-3">
                <div class="col-md-12 col-lg-6 mb-4">
                    <h3 class="title-newheading">Online Matka Play Jodi Charts</h3>
                      <?php foreach($market_time as $key=>$mt) { ?>
                    <div class="jodichart <?php if($key%2==0){echo "jodichart-bgcolor";}?>">
                        <a href="<?php echo base_url('jodi-chart-detail/'.$mt->market_id) ?>"><span>
                            <img src="assets/img/hand-new.png" alt="image"/></span>
                        <span class="txtjdir"><?php  echo $mt->name; ?></span></a>
                    </div>
                    <?php } ?>
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">SRIDEVI</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MADHUR DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MADHUR NIGHT</span></a>-->
                    <!--</div>-->
                    
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MILAN DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MILAN NIGHT</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">RAJDHANI DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">RAJDHANI NIGHT</span></a>-->
                    <!--</div>-->
                    
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">SRIDEVI NIGHT</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER MORNIG </span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">TIME</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER NIGHT</span></a>-->
                    <!--</div>-->
                    
                </div>
                
                
                
                <div class="col-md-12 col-lg-6 mb-4">
                    <h3 class="title-newheading">Online Matka Play Panel Charts</h3>
                    
                    
                     <?php foreach($market_time as $key=>$mt) { ?>
                    <div class="jodichart <?php if($key%2==0){echo "jodichart-bgcolor";}?>">
                        <a href="<?php echo base_url('panel-chart-detail/'.$mt->market_id) ?>"><span>
                            <img src="assets/img/hand-new.png" alt="image"/></span>
                        <span class="txtjdir"><?php  echo $mt->name; ?></span></a>
                    </div>
                    <?php } ?>
                    
                    
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">KALYAN</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">SRIDEVI</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MADHUR DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MADHUR NIGHT</span></a>-->
                    <!--</div>-->
                    
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MILAN DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">MILAN NIGHT</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">RAJDHANI DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">RAJDHANI NIGHT</span></a>-->
                    <!--</div>-->
                    
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">SRIDEVI NIGHT</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER MORNIG </span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">TIME</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart jodichart-bgcolor">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER DAY</span></a>-->
                    <!--</div>-->
                    <!--<div class="jodichart">-->
                    <!--    <a href=""><span><img src="assets/img/hand-new.png"/></span>-->
                    <!--    <span class="txtjdir">DHANKUBER NIGHT</span></a>-->
                    <!--</div>-->
                    
                </div>
                
                
            </div>
        </div>
	</section>	
    <!-- WIDE SECTION COUNTER END -->


<!-- CONTENT START -->
<section>
  <div class="container"> 
    <div class="row d-flex justify-content-between "> 
          <div class="col-md-12"><h5 class="bg1"><i class="fab fa-wpforms"></i> MATKA NOTICE</h5> </div>
         <?php foreach($row as $r){ ?>
          <div class="col-md-6">
                <div class="contentpost">
                    <h2><?php echo $r->title;?></h2>
                    <p><?php  echo date("d M Y",strtotime($r->date));?></p>
                     <h4><?php echo $r->description;?></h4>
                 </div>
                
            </div>
           <?php } ?>
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



















	 <!-- CONTENT START -->
    <section style="padding-bottom:0px; padding-top:60px;">
	   <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-5">
                    <div class="content-about">
                        <h2 class="title-newheading">What is Matka Play</h2>
                        <p>Matkaplay7 is India's best satta matka provider, our vision is to be working ardently for its customers to provide them world class service and guaranteed customer satisfaction with our services.</p>
                        <p>We are providing you existing features like wallet, chat and 24X7 Support.</p>
                        <p>Matkaplay7 introducing with refer & earn and notice functionality which will fulfill matkaplay7 customers’ expectations every time sets you apart from the crowd.</p>
                    </div>
                    
                    
                    <div class="content-about mt-3">
                        <h2 class="title-newheading">How To Play Matka Online</h2>
                        
                        <span class="oneline">1</span>
                        <p>Sign up - Create an account with minimum information</p>
                        
                        
                        <span class="oneline">2</span>
                        <p>Wallet - Load money or request we will load in your digital wallet</p>
                        
                        <span class="oneline">3</span>
                        <p>Play - Select market and place your bet.</p>
                    </div>
                    
                </div>
				<div class="col-sm-12 col-lg-7">
                    <div class="content-about">
                        <img src="assets/img/last-girl-right.jpg" class="w-100" alt="image"/>
                    </div>
                </div>
            </div>
        </div>
	</section> 
	
	
	
	<!-- Subscribe Modal -->
<div class="modal fade" id="modal-subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
    top: 0px; right: 0px; z-index: 1;  background: #fff; opacity: 1; width: 30px; height: 30px; border-bottom-left-radius: 15px;"><span aria-hidden="true">&times;</span></button>
			<div class="modal-body" style="padding: 0rem;">
				<h1 class="text-center text-uppercase mb-0">
			
			    	<img src="<?php echo base_url('assets/img/kuber-photo.jpg')?>" alt="image" style="width: 100%;"/>
				</h1>
			</div>
		</div>
	</div>
</div>





