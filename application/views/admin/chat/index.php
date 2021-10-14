
<style>
    .main-footer { display: none;}
@media all and (max-width: 767px) and (min-width: 320px) {
.navbar-light { display: none !important;}
}

</style>

<section class="content">
   <div class="container-fluid">
      <div class="row">
          
<div class="app">
  <a href="<?php echo base_url('admin/dashboard');?>" class="btnchatnew-1">Back to Dashboard</a>
  <a href="" class="btnchatnew" data-toggle="modal" data-target="#mobilechat">User List</a>
  
  <!-- Modal -->
	<div class="modal left fade" id="mobilechat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">User List</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					     <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="conversation-area" id="scroll" class="close" data-dismiss="modal"></div>
				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
  
  
  
  <div class="wrapperchat">
  <div class="conversation-area" id="scroll">
    
   <!--<div class="msg active">-->
   <!--   <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="" />-->
   <!-- <div class="msg-detail">-->
   <!--  <div class="msg-username">Miguel Cohen</div>-->
   <!--  <div class="msg-content">-->
   <!--   <span class="msg-message">Adaptogen taiyaki austin jean shorts brunch</span>-->
   <!--   <span class="msg-date">20m</span>-->
   <!--  </div>-->
   <!-- </div>-->
   <!--</div>-->
  
   <!--<div class="msg online">-->
   <!--  <img class="msg-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="" />-->
   <!-- <div class="msg-detail">-->
   <!--  <div class="msg-username">Lea Debere</div>-->
   <!--  <div class="msg-content">-->
   <!--   <span class="msg-message">Shoreditch iPhone jianbing</span>-->
   <!--   <span class="msg-date">45m</span>-->
   <!--  </div>-->
   <!-- </div>-->
   <!--</div>-->
  
  </div>
  <div class="chat-area" >

   <div class="chat-area-main">

    <!--<div class="chat-msg owner">-->
    <!-- <div class="chat-msg-profile">-->
    <!--  <img class="chat-msg-img" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="" />-->
    <!--  <div class="chat-msg-date">Message seen 1.22pm</div>-->
    <!-- </div>-->
    <!-- <div class="chat-msg-content">-->
    <!--  <div class="chat-msg-text">Sit amet risus nullam eget felis eget. Dolor sed viverra ipsum</div>-->
    <!--  <div class="chat-msg-text">Cras mollis nec arcu malesuada tincidunt.</div>-->
    <!-- </div>-->
    <!--</div>-->
    
   
   </div>
   <div class="chat-area-footer">
   
   
    <input type="text" id="text-box" placeholder="Type something here..." />
    <input type="hidden" id="receiver" />
    <a id="sendMessage"><i class="fa fa-paper-plane"></i></a>
   
   </div>
  </div>
 
 </div>
</div>


</div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url('socket/node_modules/socket.io/client-dist/socket.io.js');?>"></script>

<!--<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-1.11.1.js"></script>-->

<script>
$(document).ready(function(){


$.ajax({
type: "GET",
url: "<?php echo base_url('admin/chat/getall');?>",
//dataType: "json",
cache : false,
success: function(data){
    if(data){
        $('.conversation-area').html(data);
    }
    

} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});

});

  var socket = io.connect( 'https://'+window.location.hostname+':3007',{ transports: ["websocket"] } ); 

socket.on( 'new_message', function( data ) {

if(data.sender_id == '1'){
     const audio = new Audio('<?php echo base_url('assets/notification.wav')?>');
  audio.play();
    $(".chat-area-main").append('<div class="chat-msg owner"><div class="chat-msg-profile"><div class="chat-msg-date"></div></div><div class="chat-msg-content"><div class="chat-msg-text">'+data.message+'</div></div></div>');
    

}else{
        const audio = new Audio('<?php echo base_url('assets/notification.wav')?>');
  audio.play();
  var receiver_id =  $('#receiver').val()
  if(data.sender_id == receiver_id ){
      
     $(".chat-area-main").append('<div class="chat-msg"><div class="chat-msg-profile"><div class="chat-msg-date"></div></div><div class="chat-msg-content"><div class="chat-msg-text">'+data.message+'</div></div></div>');
     
  }
}



$.ajax({
type: "GET",
url: "<?php echo base_url('admin/chat/getall');?>",
//dataType: "json",
cache : false,
success: function(data){
    if(data){
        $('.conversation-area').html(data);
    }
    

} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});



});

function conv(e){
 


    $("#receiver").val(e)
    var dataString = {
        sender_id : e
    };
    $.ajax({
type: "POST",
url: "<?php echo base_url('admin/chat/detail_conversation');?>",
data: dataString,
//dataType: "json",
cache : false,
success: function(data){
    if(data){
         $('.chat-area-main').html(data);
    }
    

} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});
 list();
 
}

$(document).on("click","#sendMessage",function() {
  
var dataString = {
message : $("#text-box").val(),
receiver_id: $("#receiver").val()
};
if(dataString.message.replace(/^\s+/g, '') !== ''){

$.ajax({
type: "POST",
url: "<?php echo base_url('admin/chat/send');?>",
data: dataString,
dataType: "json",
cache : false,
success: function(data){
if(data.success ==true){
    $("#text-box").val('');
   console.log('http://'+window.location.hostname+':3007')
var socket = io.connect( 'https://'+window.location.hostname+':3007',{ transports: ["websocket"] }  );
socket.emit('new_message', {
message: data.message,
sender_id:data.sender_id,
receiver_id:data.receiver_id
});
    list();
}
} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});
}
});

function list(){
    $.ajax({
type: "GET",
url: "<?php echo base_url('admin/chat/getall');?>",
//dataType: "json",
cache : false,
success: function(data){
    if(data){
        $('.conversation-area').html(data);
        console.log(data)
    }
    

} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});
}

var input = document.getElementById("text-box");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("sendMessage").click();
  }
});
</script>
