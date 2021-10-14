
    <!-- CONTENT START -->
    <section>
	
	   <div class="container">
                <div class="register-photo mob-responsive">
					<div class="form-container width60-single-patti">
						<form method="post" id="singleform">
						
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
								<ul class="single-box ">
								   <li>
								     <span class="count">128</span>
									 <span><input type="text" name="amount[128]" id="128" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[128]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">137</span>
									 <span><input type="text" name="amount[137]" id="137" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[137]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">146</span>
									 <span><input type="text" name="amount[146]" id="146" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[146]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">236</span>
									 <span><input type="text" name="amount[236]" id="236" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[236]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">245</span>
									 <span><input type="text" name="amount[245]" id="245" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[245]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">290</span>
									 <span><input type="text" name="amount[290]" id="290" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[290]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">380</span>
									 <span><input type="text" name="amount[380]" id="380" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[380]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">470</span>
									 <span><input type="text" name="amount[470]" id="470" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[470]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">489</span> 
									 <span><input type="text" name="amount[489]" id="489" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[489]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">560</span>
									 <span><input type="text" name="amount[560]" id="560" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[560]'); ?>  </div>
								   </li>
								    <li>
								     <span class="count">678</span>
									 <span><input type="text" name="amount[678]" id="678" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[678]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">579</span>
									 <span><input type="text" name="amount[579]" id="579" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[579]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">2</div>
								<ul class="single-box">
								   <li>
								     <span class="count">129</span>
									 <span><input type="text" name="amount[129]" id="129" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[129]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">138</span>
									 <span><input type="text" name="amount[138]" id="138" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[138]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">147</span>
									 <span><input type="text"  name="amount[147]" id="147" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[147]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">156</span>
									 <span><input type="text" name="amount[156]" id="156" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[156]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">237</span>
									 <span><input type="text" name="amount[237]" id="237" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[237]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">246</span>
									 <span><input type="text" name="amount[246]" id="246" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[246]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">345</span>
									 <span><input type="text" name="amount[345]" id="345" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[345]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">390</span>
									 <span><input type="text" name="amount[390]" id="390" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[390]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">480</span>
									 <span><input type="text" name="amount[480]" id="480" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[480]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">570</span>
									 <span><input type="text" name="amount[570]" id="570" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[570]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">679</span>
									 <span><input type="text" name="amount[679]" id="679" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[679]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">589</span>
									 <span><input type="text" name="amount[589]" id="589" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[589]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">3</div>
								<ul class="single-box">
								   <li>
								     <span class="count">120</span>
									 <span><input type="text" name="amount[120]" id="120" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[120]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">139</span>
									 <span><input type="text" name="amount[139]" id="139" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[139]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">148</span>
									 <span><input type="text" name="amount[148]" id="148" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[148]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">157</span>
									 <span><input type="text" name="amount[157]" id="157" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[157]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">238</span>
									 <span><input type="text" name="amount[238]" id="238" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[238]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">247</span>
									 <span><input type="text" name="amount[247]" id="247" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[247]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count"> 256</span>
									 <span><input type="text" name="amount[256]" id="256" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[256]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">346</span>
									 <span><input type="text" name="amount[346]" id="346" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[346]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">490</span>
									 <span><input type="text" name="amount[490]" id="490" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[490]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">580</span>
									 <span><input type="text" name="amount[580]" id="580" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[580]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">670</span>
									 <span><input type="text" name="amount[670]" id="670" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[670]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">689</span>
									 <span><input type="text" name="amount[689]" id="689" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[689]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">4</div>
								<ul class="single-box">
								   <li>
								     <span class="count">130</span>
									 <span><input type="text" name="amount[130]" id="130" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[130]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">149</span>
									 <span><input type="text" name="amount[149]" id="149" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[149]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">158</span>
									 <span><input type="text" name="amount[158]" id="158" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[158]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">167</span>
									 <span><input type="text" name="amount[167]" id="167" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[167]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">239</span>
									 <span><input type="text" name="amount[239]" id="239" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[239]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">248</span>
									 <span><input type="text" name="amount[248]" id="248" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[248]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count"> 257</span>
									 <span><input type="text" name="amount[257]" id="257" value=""  class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[257]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">347</span>
									 <span><input type="text" name="amount[347]" id="347" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[347]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">356</span>
									 <span><input type="text" name="amount[356]" id="356" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[356]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">590</span>
									 <span><input type="text" name="amount[590]" id="590" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[590]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">680</span>
									 <span><input type="text" name="amount[680]" id="680" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[680]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">789</span>
									 <span><input type="text" name="amount[789]" id="789" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[789]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">5</div>
								<ul class="single-box">
								   <li>
								     <span class="count">140</span>
									 <span><input type="text" name="amount[140]" id="140" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[140]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">159</span>
									 <span><input type="text" name="amount[159]" id="159" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[159]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">168</span>
									 <span><input type="text" name="amount[168]" id="168" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[168]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">230</span>
									 <span><input type="text" name="amount[230]" id="230" value="" class="form-control"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[230]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">249</span>
									 <span><input type="text" name="amount[249]" id="249" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[249]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">258</span>
									 <span><input type="text" name="amount[258]" id="258" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[258]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count"> 267</span>
									 <span><input type="text" name="amount[267]" id="267" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[267]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">348</span>
									 <span><input type="text" name="amount[348]" id="348" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[348]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">357</span>
									 <span><input type="text" name="amount[357]" id="357" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[357]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">456</span>
									 <span><input type="text" name="amount[456]" id="456" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[456]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">690</span>
									 <span><input type="text" name="amount[690]" id="690" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[690]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">780</span>
									 <span><input type="text" name="amount[780]" id="780" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[780]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">6</div>
								<ul class="single-box">
								   <li>
								     <span class="count">123</span>
									 <span><input type="text" name="amount[123]" id="123" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[123]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">150</span>
									 <span><input type="text" name="amount[150]" id="150" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[150]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">169</span>
									 <span><input type="text" name="amount[169]" id="169" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[169]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">178</span>
									 <span><input type="text" name="amount[178]" id="178" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[178]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">240</span>
									 <span><input type="text" name="amount[240]" id="240" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[240]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">259</span>
									 <span><input type="text" name="amount[259]" id="259" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[259]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">268</span>
									 <span><input type="text" name="amount[268]" id="268" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[268]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">349</span>
									 <span><input type="text" name="amount[349]" id="349" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[349]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">358</span>
									 <span><input type="text" name="amount[358]" id="358" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[358]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">457</span>
									 <span><input type="text" name="amount[457]" id="457" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[457]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">367</span>
									 <span><input type="text" name="amount[367]" id="367" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[367]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">790</span>
									 <span><input type="text" name="amount[790]" id="790" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[790]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">7</div>
								<ul class="single-box">
								   <li>
								     <span class="count">124</span>
									 <span><input type="text" name="amount[124]" id="124" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[124]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">160</span>
									 <span><input type="text" name="amount[160]" id="160" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[160]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">179</span>
									 <span><input type="text" name="amount[179]" id="179" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[179]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">250</span>
									 <span><input type="text" name="amount[900]" id="900" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[900]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">269</span>
									 <span><input type="text" name="amount[269]" id="269" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[269]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">278</span>
									 <span><input type="text" name="amount[278]" id="278" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[278]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">340</span>
									 <span><input type="text" name="amount[340]" id="340" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[340]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">359</span>
									 <span><input type="text" name="amount[359]" id="359" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[359]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">368</span>
									 <span><input type="text" name="amount[368]" id="368" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[368]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">458</span>
									 <span><input type="text" name="amount[458]" id="458" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[458]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">467</span>
									 <span><input type="text" name="amount[467]" id="467" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[467]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">890</span>
									 <span><input type="text" name="amount[890]" id="890" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[890]'); ?>  </div>
								   </li>
								</ul>
								
								
								<div class="count-patti">8</div>
								<ul class="single-box">
								   <li>
								     <span class="count">125</span>
									 <span><input type="text" name="amount[125]" id="125" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[125]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">134</span>
									 <span><input type="text" name="amount[134]" id="134" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[134]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">170</span>
									 <span><input type="text" name="amount[170]" id="170" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[170]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">189</span>
									 <span><input type="text" name="amount[189]" id="189" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[189]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">260</span>
									 <span><input type="text" name="amount[260]" id="260" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[260]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">279</span>
									 <span><input type="text" name="amount[279]" id="279" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[279]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">350</span>
									 <span><input type="text" name="amount[350]" id="350" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[350]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">369</span>
									 <span><input type="text" name="amount[369]" id="369" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[369]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">378</span>
									 <span><input type="text" name="amount[378]" id="378" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[378]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">459</span>
									 <span><input type="text" name="amount[459]" id="459" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[459]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">567</span>
									 <span><input type="text"  name="amount[567]" id="567" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[567]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">468</span>
									 <span><input type="text" name="amount[468]" id="468" value="" class="form-control single_box"/></span>
									 <div class="text-danger"> <?php echo form_error('amount[468]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">9</div>
								<ul class="single-box">
								   <li>
								     <span class="count">126</span>
									 <span><input type="text" name="amount[126]" id="126" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[126]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">135</span>
									 <span><input type="text" name="amount[135]" id="135" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[135]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">180</span>
									 <span><input type="text" name="amount[180]" id="180" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[468]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">234</span>
									 <span><input type="text" name="amount[180]" id="180" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[234]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">270</span>
									 <span><input type="text" name="amount[270]" id="270" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[270]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">289</span>
									 <span><input type="text" name="amount[289]" id="289" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[289]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">360</span>
									 <span><input type="text" name="amount[360]" id="360" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[360]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">379</span>
									 <span><input type="text" name="amount[379]" id="379" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[379]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">450</span>
									 <span><input type="text" name="amount[450]" id="450" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[450]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">469</span>
									 <span><input type="text" name="amount[469]" id="469" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[469]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">478</span>
									 <span><input type="text" name="amount[478]" id="478" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[478]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">568</span>
									 <span><input type="text" name="amount[568]" id="568" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[568]'); ?>  </div>
								   </li>
								</ul>
								
								
								
								<div class="count-patti">0</div>
								<ul class="single-box">
								   <li>
								     <span class="count">127</span>
									 <span><input type="text" name="amount[127]" id="127" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[127]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">136</span>
									 <span><input type="text" name="amount[136]" id="136" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[136]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">145</span>
									 <span><input type="text" name="amount[145]" id="145" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[145]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">190</span>
									 <span><input type="text" name="amount[190]" id="190" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[190]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">235</span>
									 <span><input type="text" name="amount[235]" id="235" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[235]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">280</span>
									 <span><input type="text" name="amount[280]" id="280" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[280]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">370</span>
									 <span><input type="text" name="amount[370]" id="370" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[370]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">479</span>
									 <span><input type="text" name="amount[479]" id="479" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[479]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">460</span>
									 <span><input type="text" name="amount[460]" id="460" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[460]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">569</span>
									 <span><input type="text" name="amount[569]" id="569" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[569]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">389</span>
									 <span><input type="text" name="amount[389]" id="389" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[389]'); ?>  </div>
								   </li>
								   <li>
								     <span class="count">578</span>
									 <span><input type="text" name="amount[578]" id="578" value="" class="form-control single_box"/></span>
									  <div class="text-danger"> <?php echo form_error('amount[578]'); ?>  </div>
								   </li>
								</ul>
	 
								<div class="col-sm-12 text-center"><h5>Total Point : <b class="total" id="total">0</b></h5></div>
								
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
          $(".sumtable").after('<label id="single_dropdown-error" class="error mb-2" for="single_dropdown">Please Bet on a Number..!!</label>');
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
           market(date,'single_patti')
      $("#date").change(function() {
        var date = $("#date").val();
             market(date,'single_patti')
        });
          
    });
		</script>
