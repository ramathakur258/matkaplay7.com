
<style>
.contentpost p {  margin: 0px 0; font-size: 14px; font-style: italic;}
.contentpost h2 { margin-bottom: 0px;}
</style>	
	<div class="pages-hero">
        <div class="container">
            <div class="pages-title"></div>
		</div>  
    </div>
    
    
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
          
         <input type="hidden" class="res" id="receiver" value="<?php echo $_SESSION['user_id']; ?>" />
            <button id="sendMessage">send</button>
        </div>
    </div>
</div>

</section> 