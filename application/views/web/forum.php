
 <section class="mt-140">
        <div class="container"> 
           <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <p>Matka Forum helps you to connect with the users and win the game. Satta Matka Forum is a matka guessing forum which helps you to become Online Matka Kings.</p>
                        <h5 class="bg1"><i class="fab fa-wpforms"></i> MATKA FORUM</h5>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                DO NOT USE BAD WORDS OR ABUSIVE LANGUAGE IN FORUM.
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                DON'T POST YOUR PHONE NUMBER OR SITE LINKS.
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                DON'T POST GUESSING AT RESULT TIME.
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                 DON'T POST WRONG RESULT.
                              </a>
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                IF YOU DON'T FOLLOW SITE RULES THEN, YOUR * IP * WILL BE BLOCKED PERMENTLY.
                              </a>
                              
                              
                            </div>
                        </div>
                        <?php if(empty($_SESSION['user_id'])){ ?>
                     <h3>Login to Post :</h3>
                     <?php }else{ ?>
                     <hr>
                      <div class="row d-flex justify-content-between ">   
                        <div class="col-md-6">
                            <form method="post">
                                 <textarea class="form-control" name="msg" placeholder="Enter your comment"></textarea>
                             <button class="btn btn-update btn-block mb-3" type="submit">Send Message</button>
                            </form>
                            
                         </div>
                      </div>
                      <?php } ?>
                      
                     <!--<div class="row d-flex justify-content-between "> -->
                     <!--<?php if(!empty($row)){ foreach($row as $r){ ?>-->
                     <!--   <div class="col-md-6">-->
                     <!--      <div class="contentpost">-->
                     <!--         <h2><?php echo $r->msg;?></h2>-->
                     <!--        <h4>By <?php echo $r->name;?> <span class="float-right"><?php echo date("d M Y",strtotime($r->created_at))?></span></h4>-->
                     <!--      </div>-->
                     <!--   </div>-->
                        
                     <!--   <?php } } ?>-->
                        <!--<div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>Very fast service 8000 Withdrawal liya thanks to admin sir</h2>-->
                        <!--       <h4>By Partiyusk <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>2000, withdrawal successful thanku ?? sir</h2>-->
                        <!--       <h4>Krishnas <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>Helo.admin. ek problem ho gayi hai mera whatsapp banned ???? ho gaya hai mujhe ap ka telegram like send karde</h2>-->
                        <!--       <h4>By Balakrishna <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div>-->
                        <!--<div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>5000 withdrawal successful</h2>-->
                        <!--       <h4>By Balakrishna <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div><div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>5000 withdrawal successful</h2>-->
                        <!--       <h4>By Balakrishna <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div><div class="col-md-6">-->
                        <!--   <div class="contentpost">-->
                        <!--      <h2>5000 withdrawal successful</h2>-->
                        <!--       <h4>By Balakrishna <span class="float-right">Jun 01,2021 10:49AM</span></h4>-->
                        <!--   </div>-->
                        <!--</div>-->
                    <!--</div>    -->
                         <div class="site-pagination mt-4">
                            <nav aria-label="Page navigation example">
                                 <?php echo $pagination; ?>
                            </nav>
                        </div>
                     </aside>
					</div>
                </div>
            </div>
			
        </div>
	</section>

