
 <section class="mt-140">
        <div class="container"> 
           <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="cly-content">
                        <h5 class="bg1"><i class="fas fa-gift"></i> Refer & Gifts</h5>
                        <p>Your friend joined matkaplay.com using your referral code and deposited ₹10,000 you will get ₹1,000 in your account.</p>
                        <p>If you invite 100 users and each one deposits ₹10,000 you will get ₹1,00,000 in your account.</p>
                        <p>So, why wait? Invite your friends to matkaplay.com now!</p>
                        <aside>
                        <div class="sidebar-list">                
                            <div class="list-group">
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                                अपने दोस्तों को आमंत्रित करें और अपने मित्र द्वारा बनाई गई पहली जमा राशि का 10% प्राप्त करें!
                               
                              </a>
                             </div>
                        </div>
                        <h3>उदाहरण :</h3>
                         <p>आपका मित्र आपके रेफ़रल कोड का उपयोग करके matkaplay.com में शामिल हो गया और जमा किया गया ₹10,000 तुम्हे मिल जाएगा ₹1,000 आपके खाते में।</p>
                         
                         <p>अगर आप आमंत्रित करते हैं 100 उपयोगकर्ता और प्रत्येक एक जमा करता है ₹10,000 तुम्हे मिल जाएगा ₹1,00,000 आपके खाते में।</p>
                         
                         
                         <p>तो, प्रतीक्षा क्यों? दोस्तों को अभी matkaplay.com पर आमंत्रित करें।</p>

                        <div class="sidebar-list">                
                            <div class="list-group">
                              <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                               Invite Your Friends & Get 10% Of The First Deposit Made By Your Friend!
                              </a>
                             </div> 
                        </div>
                        
                        <div class="result">
						   <h6> Invite Your Friends</h6>
						   <?php if(!empty($_SESSION['user_id'])) {?>
						   <div style="font-weight: bold">Your referral code is: <?php echo $referral_code->referral_code;?></div>
						   
						   <div style="cursor:pointer;" class="leftitme"  onclick="copy('<?php echo $referral_code->referral_code?>')">Click here to copy the link</div>
						   <?php }else{?>
						    <div class="leftitme" >Please login to invite</div>
						    <?php }?>
						</div>
                        
                        
                     </aside>
					</div>
                </div>
            </div>
			
        </div>
	</section>
<script>
  
    function copy(text) {
    var dummy = document.createElement("textarea");
    document.body.appendChild(dummy);
    dummy.value = "http://3.13.210.26/public/matka/matka_new/register?referral_code="+text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    toastr.success('Link Copied Successfully');
}
</script>
