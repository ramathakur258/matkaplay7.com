<!-- CONTENT END -->
	<section class="register-photo" style="padding-bottom: 0px;">
        <div class="container"> 
           <div class="row mt-5">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1">KALYAN PANEL CHART</h5>
                    
                   <?php //echo "<pre>"; print_r($data); ?>
					<div class="gcon-table withdrw table-responsive">	
						<table class="table">
                          <tbody>
							<tr>
							    <th>DATE</th>
							    <th>MON</th>
								<th>TUE</th>
							    <th>WED</th>
							    <th>THU</th>
							    <th>FRI</th>
							    <th>SAT</th>
							    <th>SUN</th>
							</tr>
							  
							<tr>
							 
                                <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
							    <td>*** <Br> ** <br> ***</td>
						        <td>*** <Br> ** <br> ***</td>
						        
                            </tr>
                              
        <!--                    <tr>-->
        <!--                        <td>20/01/20 <Br> to <br> 26/01/20</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr>-->
        <!--                     <tr>-->
        <!--                        <td>20/01/20 <Br> to <br> 26/01/20</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr>-->
        <!--                     <tr>-->
        <!--                        <td>20/01/20 <Br> to <br> 26/01/20</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr>-->
        <!--                     <tr>-->
        <!--                        <td>26/04/21 <Br> to <br> 02/05/21</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr> <tr>-->
        <!--                        <td>03/05/21 <Br> to <br> 09/05/21</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr>-->
        <!--                     <tr>-->
        <!--                        <td>10/05/21 <Br> to <br> 16/05/21</td>-->
								<!--<td>239 <Br> 49 <br> 135</td>-->
							 <!--   <td>780 <Br> 54 <br> 130</td>-->
							 <!--   <td>300 <Br> 31 <br> 245</td>-->
							 <!--   <td>258 <Br> 54 <br> 699</td>-->
							 <!--   <td>228 <Br> 23 <br> 256</td>-->
							 <!--   <td>179 <Br> 77 <br> 359</td>-->
							 <!--   <td>*** <Br> ** <br> ***</td>-->
        <!--                    </tr>-->
                          
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