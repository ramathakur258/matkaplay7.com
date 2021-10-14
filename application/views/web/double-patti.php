

        
    <!-- CONTENT START -->
    <section>
	
	   <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container width60-single-patti">
						<form method="post" id="doubleform">
						   	 
						<?php if(!empty($market_rate)) {?>
							<h2 class="text-center"><strong><?php echo $market_rate->market_type_name ?></strong> (<?php echo $market_rate->min_bid_amount; echo " KA "; echo $market_rate->win_amount; ?>)</h2>
							<?php } ?>
							
                            <h6>Select Your Game</h6>
							<div class="row sumtable">
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
								   <div class="text-danger"> <?php echo form_error('date'); ?>  </div>
								</div>
								
								<div class="count-patti">1</div>
								<ul class="single-box">
								   <li>
								     <span class="count">100</span>
									 <span><input type="text" name="amount[100]" id="100" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[100]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">119</span>
									 <span><input type="text" name="amount[119]" id= "119" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[119]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">155</span>
									 <span><input type="text" name="amount[155]" id="155" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[155]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">227</span>
									 <span><input type="text" name="amount[227]" id="227" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[227]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">335</span>
									 <span><input type="text" name="amount[335]" id="335" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[335]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">344</span>
									 <span><input type="text" name="amount[344]" id="344" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[344]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">399</span>
									 <span><input type="text" name="name[399]" id="399" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[399]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">588</span>
									 <span><input type="text" name="name[588]" id="588" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[588]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">669</span>
									 <span><input type="text" name="name[669]" id="669" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[669]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">2</div>
								<ul class="single-box">
								   <li>
								     <span class="count">200</span>
									 <span><input type="text" name="amount[200]" id="200" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[669]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">110</span>
									 <span><input type="text" name="amount[110]" id="110" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[110]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">228</span>
									 <span><input type="text" name="amount[228]" id="228" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[228]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">255</span>
									 <span><input type="text" name="amount[255]" id="255" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[255]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">336</span>
									 <span><input type="text" name="amount[336]" id="336" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[336]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">499</span>
									 <span><input type="text" name="amount[499]" id="499" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[499]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">660</span>
									 <span><input type="text" name="amount[660]" id="660" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[660]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">688</span>
									 <span><input type="text" name="amount[688]" id="688" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[688]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">778</span>
									 <span><input type="text" name="amount[778]" id="778" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[778]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">3</div>
								<ul class="single-box">
								   <li>
								     <span class="count">300</span>
									 <span><input type="text" name="amount[300]" id="300" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[300]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">166</span>
									 <span><input type="text" name="amount[166]" id="166" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[166]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">229</span>
									 <span><input type="text" name="amount[229]" id="229" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[229]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">337</span>
									 <span><input type="text" name="amount[337]" id="337" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[337]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">355</span>
									 <span><input type="text" name="amount[355]" id="355" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[355]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">445</span>
									 <span><input type="text" name="amount[445]" id="445" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[445]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">599</span>
									 <span><input type="text" name="amount[599]" id="599" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[599]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">779</span>
									 <span><input type="text" name="amount[779]" id="779" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[779]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">788</span>
									 <span><input type="text" name="amount[788]" id="788" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[788]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">4</div>
								<ul class="single-box">
								   <li>
								     <span class="count">400</span>
									 <span><input type="text" name="amount[400]" id="400" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[400]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">112</span>
									 <span><input type="text" name="amount[112]" id="112" value=""  class="form-control single_box"/></span><div class="text-danger"> <?php echo form_error('amount[112]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">220</span>
									 <span><input type="text" name="amount[220]" id="220" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[220]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">266</span>
									 <span><input type="text" name="amount[266]" id="266" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[266]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">338</span>
									 <span><input type="text" name="amount[338]" id="338" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[338]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">446</span>
									 <span><input type="text" name="amount[446]" id="446" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[446]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">455</span>
									 <span><input type="text" name="amount[455]" id="455" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[455]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">699</span>
									 <span><input type="text" name="amount[699]" id="699" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[699]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">770</span>
									 <span><input type="text" name="amount[770]" id="770" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[770]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">5</div>
								<ul class="single-box">
								   <li>
								     <span class="count">500</span>
									 <span><input type="text" name="amount[500]" id="500" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[500]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">113</span>
									 <span><input type="text" name="amount[113]" id="113" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[113]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">122</span>
									 <span><input type="text" name="amount[122]" id="122" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[122]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">177</span>
									 <span><input type="text" name="amount[177]" id="177" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[177]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">339</span>
									 <span><input type="text" name="amount[339]" id="339" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[339]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">366</span>
									 <span><input type="text" name="amunt[366]" id="366" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[366]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">447</span>
									 <span><input type="text" name="amount[447]" id="447" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[447]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">799</span>
									 <span><input type="text" name="amount[799]" id="799" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[799]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">889</span>
									 <span><input type="text" name="amount[899]" id="889" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[899]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">6</div>
								<ul class="single-box">
								   <li>
								     <span class="count">600</span>
									 <span><input type="text" name="amount[600]" id="600" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[600]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">114</span>
									 <span><input type="text" name="amount[114]" id="114" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[114]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">277</span>
									 <span><input type="text" name="amount[277]" id="277" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[277]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">330</span>
									 <span><input type="text" name="amount[330]" id ="330" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[330]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">448</span>
									 <span><input type="text" name="amount[448]" id="448" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[448]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">466</span>
									 <span><input type="text" name="amount[466]" id="466" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[466]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">556</span>
									 <span><input type="text" name="amount[556]" id="556" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[556]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">880</span>
									 <span><input type="text" name="amount[880]" id="880" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[880]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">899</span>
									 <span><input type="text" name="amount[899]" id="899" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[899]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">7</div>
								<ul class="single-box">
								   <li>
								     <span class="count">700</span>
									 <span><input type="text" name="amount[700]" id="700" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[700]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">115</span>
									 <span><input type="text" name="amount[115]" id="115" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[115]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">133</span>
									 <span><input type="text" name="amount[133]" id="133" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[133]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">188</span>
									 <span><input type="text" name="amount[188]" id="188" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[188]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">223</span>
									 <span><input type="text" name="amount[223]" id="223" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[223]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">377</span>
									 <span><input type="text" name="amount[377]" id="377" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[377]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">449</span>
									 <span><input type="text" name="amount[449]" id="449" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[449]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">557</span>
									 <span><input type="text" name="amount[557]" id="557" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[557]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">566</span>
									 <span><input type="text" name="amount[566]" id="566" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[566]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">8</div>
								<ul class="single-box">
								   <li>
								     <span class="count">800</span>
									 <span><input type="text" name="amount[800]" id="800" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[800]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">116</span>
									 <span><input type="text" name="amount[116]" id="116" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[116]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">224</span>
									 <span><input type="text" name="amount[224]" id="224" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[224]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">233</span>
									 <span><input type="text" name="amount[233]" id="233" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[233]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">288</span>
									 <span><input type="text" name="amount[288]" id="288" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[288]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">440</span>
									 <span><input type="text" name="amount[440]" id="440" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[440]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">477</span>
									 <span><input type="text" name="amount[477]" id="477" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[477]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">558</span>
									 <span><input type="text" name="amount[558]" id="558" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[558]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">990</span>
									 <span><input type="text" name="amount[990]" id="990" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[990]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">9</div>
								<ul class="single-box">
								   <li>
								     <span class="count">900</span>
									 <span><input type="text" name="amount[900]" id="900" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[900]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">117</span>
									 <span><input type="text" name="amount[117]" id="117" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[117]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">144</span>
									 <span><input type="text" name="amount[144]" id="144" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[144]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">199</span>
									 <span><input type="text" name="amount[199]" id="199" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[199]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">225</span>
									 <span><input type="text" name="amount[225]" id="225" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[225]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">388</span>
									 <span><input type="text" name="amount[388]" id="388" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[388]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">559</span>
									 <span><input type="text" name="amount[559]" id="559" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[559]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">577</span>
									 <span><input type="text" name="amount[577]" id="577" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[577]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">667</span>
									 <span><input type="text" name="amount[667]" id="667" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[667]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">0</div>
								<ul class="single-box">
								   <li>
								     <span class="count">550</span>
									 <span><input type="text" name="amount[550]" id="550" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[550]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">668</span>
									 <span><input type="text" name="amount[668]" id="668" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[668]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">244</span>
									 <span><input type="text" name="amount[244]" id="244" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[244]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">299</span>
									 <span><input type="text" name="amount[299]" id="299" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[299]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">226</span>
									 <span><input type="text" name="amount[226]" id="226" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[226]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">488</span>
									 <span><input type="text" name="amount[488]" id="488" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[488]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">677</span>
									 <span><input type="text" name="amount[677]" id="677" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[677]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">118</span>
									 <span><input type="text" name="amount[118]" id="118" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[118]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">334</span>
									 <span><input type="text" name="amount[334]" id="334" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[334]'); ?>  </div>
								   </li>
								</ul>
								
								 <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
								<div class="col-sm-12 text-center "><h5>Total Point : <b id="total">0</b></h5></div>
								
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
		 $("#doubleform").validate({
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
             $( "#doubleform" ).submit();
         }
      }
    });
    
      $(document).ready(function() {
         var date = $("#date").val();
           market(date,'double_patti')
      $("#date").change(function() {
        var date = $("#date").val();
             market(date,'double_patti')
        });
          
    });
		</script>

	