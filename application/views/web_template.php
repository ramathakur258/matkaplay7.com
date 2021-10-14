<!DOCTYPE html>
<html lang="en-US" class="no-js">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0XEGHLH7P9"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-0XEGHLH7P9');
        </script>

<head>
    
        <script type="text/javascript"> 
function disableselect(e){  
return false  
}  

function reEnable(){  
return true  
}  

//if IE4+  
document.onselectstart=new Function ("return false")  
document.oncontextmenu=new Function ("return false")  
//if NS6  
if (window.sidebar){  
document.onmousedown=disableselect  
document.onclick=reEnable  
}
</script>
    
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- TITLE -->
		<title>Online Matka Play | Satta Matka Play Results | Online Satta</title>
		
		<!-- SEO TAG META KEYWORD AND description-->
		<meta name="google-site-verification" content="GCtPLXkzxouJ2dhvDXRUvYxVSqQ6sn0E3ztyAw-SNQY" />
		<meta name="language" content="English"/>
        <meta name="Search Engine" content="http://www.google.com/">
        <meta name="revisit-after" content="3 days" />
        <meta name="allow-search" content="yes"/>
        <meta name="distribution" content="Global"/>
            
        <meta name="description" content="Register for free and play the online satta matka on a trusted website - Matkaplay7.com. Play Online Matka, Online Satta matka, online matka play full rate, online matka result">
            
        <meta name="keyword" content="online matka play, online satta matka, satta online play, Play Matka Online, Satta Matka Play, online matka play full rate, kalyan online game, online matka result, satta matta matka online result, online matka games, satta game online, Online play Matka, satta matka online result, online matka play websites, satta matta matka online play, satta matka online
game, online kalyan game, New Matka online play, satta matka online play, kalyan online game result, full rate matka online, matka online game
play, matka game result online, play online matka game, kalyan online">
        
        <meta name="author" content="Online Matka Play">
    	
    	<!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0XEGHLH7P9"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-0XEGHLH7P9');
        </script>

        
        <!-- FONT AWESOME ICONS LIBRARY -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">  
        
        <!--  FAVICON  -->

        <!-- BOOTSTRAP FRAMEWORK STYLES -->
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/bootstrap.min.css')?>">
       
        <!-- MAIN CSS STYLE SHEET -->
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/custom.css')?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/stylesheet.css')?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/navbar.css')?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/responsive.css')?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/slick.min.css')?>"> 
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/owl.carousel.min.css')?>">
        <link rel='stylesheet' href=" <?php echo base_url('assets/css/flickity.min.css')?>">

        <!-- MODERNIZR LIBRARY -->
        <script src=" <?php echo base_url('assets/js/modernizr-custom.js')?>"></script>
        
        
      
        
    <style>
        .error{
            color:red;
        }
        .text-danger p{
             color:red;
        }
      
    </style>

	</head>

<body>
    
 
      <header>
        <!-- TOP HEADER START -->
        <div class="top-header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-7 col-md-7">
                        <ul class="top-contact text-left">
                            <li class=""><a href="<?php echo base_url('forum');?>">Forum</a></li>
                            <li class=""><a href="<?php echo base_url('refer-and-earn') ;?>">Refer & Earn</a></li>
                             <li class=""><a href="<?php echo base_url('notice');?>">Notice Board</a></li>
                             <!--<li class=""><a href="#">jodi Chart</a></li>-->
                             <!--<li class=""><a href="#">Panel Chart</a></li>-->
                        </ul>
                    </div>
                    <div class="col-5 col-md-5 text-right">
                        <div class="top-social">
                            <ul class="top-contact">
                                
                                   <?php if(empty($this->session->userdata('name')))  {  ?>
                                   <li><a  href="<?php echo base_url('login')?>">Login</a></li>
                                   <li><a  href="<?php echo base_url('register')?>">Signup</a></li>
                            <?php    }else{ ?>
                              
                             
                              	<li><a href="#"><i class="fas fa-wallet"></i> ₹ <?php if(!empty($this->session->userdata('user_id'))) { echo GetWalletBalance($_SESSION['user_id']); } ?></a></li>
                          		<li><a href="#"><i class="fa fa-gift"></i> ₹ <?php if(!empty($this->session->userdata('user_id'))) { echo GetBonusBalance($_SESSION['user_id']); } ?></a></li>
								<li>
								<a href="#" class="mailuser drop"> <?php echo $this->session->userdata('name') ?>
								<i class="fas fa-caret-square-down"></i></a>
								<div class="dd-menu">
									<ul>
									   <li><a href="<?php echo base_url('deposit') ?>">Deposit</a></li>
									   <li><a href="<?php echo base_url('withdraw') ?>">Withdraw</a></li>
									   <li><a href="<?php echo base_url('game-history') ?>">Game History</a></li>
									   <li><a href="<?php echo base_url('profile') ?>">Profile</a></li>
									   <li><a href="<?php echo base_url('logout') ?>">Logout</a></li>
									</ul>
								  </div>
								</li>
                              
                              
                               
                               <?php } ?>
                                
                                
                                <!--<li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="top-header-line">
            </div>
        </div>
        <!-- TOP HEADER END -->
        
        <!-- NAV START -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container p-0">
                     
                <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>
                	<a href="<?php echo base_url('home') ?>" class="navbar-brand"><img src="<?php echo base_url('assets/img/matkaplay-logo.jpg')?>" alt=""></a>

                <div id="main-nav" class="collapse navbar-collapse">
                     <ul class="navbar-nav mr-auto">
                        <li><a href="<?php echo base_url('home')?>" class="nav-item nav-link">Home</a></li>
                        <li><a href="<?php echo base_url('single')?>" class="nav-item nav-link">Single</a></li>
						<li><a href="<?php echo base_url('jodi')?>" class="nav-item nav-link">Jodi</a></li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li><a href="<?php echo base_url('single-patti')?>" class="nav-item nav-link">Single Patti</a></li>
						<li><a href="<?php echo base_url('double-patti')?>" class="nav-item nav-link">Double Patti</a></li>
						<li><a href="<?php echo base_url('tripple-patti')?>" class="nav-item nav-link">Tripple Patti</a></li>
						<!--<li><a href="<?php echo base_url('jodi-chart')?>" class="nav-item nav-link">Jodi Chart</a></li>
						<li><a href="<?php echo base_url('panel-chart')?>" class="nav-item nav-link">Panel Chart</a></li>-->
					</ul>
                </div>
            </div>
        </nav>
        <!-- NAV END -->
		
    </header>
    
    

    <?php   $this->load->view('web/'.$content); ?>

     <!-- FOOTER START -->
     <footer class="layout-dark">
        <div class="container padding-tb-15px">
            
            <div class="row">
                 <div class="col-12 col-lg-4">
                     <img src="<?php echo base_url('assets/img/footer-logo.png')?>" class="w-100"/>
                 </div>
                 
                 <div class="col-12 col-lg-8">
                      <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="nile-widget widget_nav_menu">
                                <ul class="footer-menu">
                                    <li><a href="#">Online Matka Play</a></li>
                                    <li><a href="#">Matka Online </a></li>
                                    <li><a href="#">Matka Kalyan</a></li>
                                    <li><a href="#">Matka143</a></li>
                                    <li><a href="#">Matka Result</a></li> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="about-us">
                                <div class="text">
                                    Matkaplay7, Satta Matka, Satta, Matka, Kalyan Chart Kalyan Open, Dpboss, Matka Results, Kalyan Matka, Fastest Matka Results, Live Results, Kalyan Open Jodi,Dhankuber
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="copy-right">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="copy-right-text text-lg-left text-center sm-mb-15px">© 2021 Online Matka Play - All rights reserved </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!--  Social -->
                                        <ul class="social-media list-inline text-lg-right text-center margin-0px text-white">
                                            <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a class="linkedin" href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a class="google" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                            <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                        </ul>
                                        <!-- // Social -->
                                    </div>
                                </div>
                        </div>
            
                    
                    
                 </div>
            </div>
            
            
           
            
            
            
        </div>
        
    </footer>
    <!-- FOOTER END -->
    
 

   

    <!-- JAVASCRIPTS -->
    <script src=' <?php echo base_url('assets/js/jquery-3.4.1.min.js')?>'></script>
    <script src=' <?php echo base_url('assets/js/plugins.js')?>'></script>
    <script src=' <?php echo base_url('assets/js/bootstrap.min.js')?>'></script>
    <script src=' <?php echo base_url('assets/js/main.js')?>'></script>
    <script src=" <?php echo base_url('assets/js/slider.js')?>"></script>
    <script src=' <?php echo base_url('assets/js/nav-fixed-top.js')?>'></script>
    
    <script src=' <?php echo base_url('assets/js/chat.js')?>'></script>
    <!-- JAVASCRIPTS END -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script type="text/javascript">


<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>


</script>
<script>
	$('html').click(function() {
	  $('.dd-menu').removeClass("active");
	});

	$('.dd-menu ul li').each(function() {
		var delay = $(this).index() * 50 + 'ms';

		$(this).css({
			'-webkit-transition-delay': delay,
			'-moz-transition-delay': delay,
			'-o-transition-delay': delay,
			'transition-delay': delay
		});                  
	});

	$(".drop").click (function(e){
	  e.stopPropagation();
	  $('.dd-menu').toggleClass("active");
	});

	 $('.dd-menu').click (function(e){
	  e.stopPropagation();
	});
</script>

	<script>
	   // $(function(){           
    //     $('input').each(function() {
    //         $(this).keyup(function(){  
    //             console.log($(this))
    //             calculateTotal($(this));
    //         });
    //     });
    // });
    $(document).ready(function() {
       
         $('input').each(function() {
            $(this).keyup(function(){  
               
                calculateTotal($(this));
            });
        });
    });

    function calculateTotal(src) {
       
        var sum = 0;
        var sumtable = src.closest('.sumtable');

        sumtable.find('input').each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
           
            }
        });

 
 $("#total").text(sum);
   
    }   
	</script>
	<script>
	     function add(e){
	       console.log(e)
	         $("#li"+e).toggle();
	          $("#in"+e).val('')
	   
  }
  function remove(e){
     
     var inputValue =$("#in"+e).val();
       if(inputValue){
       $("#li"+e).toggle();
      $("#add"+e).prop('checked', false);
      $("#in"+e).val('')
       }else{
         $("#li"+e).toggle();
      $("#add"+e).prop('checked', false);    
       }
     
      
  }
	</script>
<script>
    $ (window).ready (function () {
	setTimeout (function () {
		$ ('#modal-subscribe').modal ("show")
	}, 100)
})

 function market(date,g){
        var dataString = {
        game : g,
        date : date
       };
       console.log(dataString);
         $.ajax({
        type: "POST",
        url: "<?php echo base_url('home/market_dropdown');?>",
        data: dataString,
        cache : false,
        success: function(data){
        if(data){
              $('#market_data').html(data);
     console.log(data)
        }
        } ,error: function(xhr, status, error) {
            console.log(error)
        alert(error);
        },
        });
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url('socket/node_modules/socket.io/client-dist/socket.io.js');?>"></script>



<script>
$(document).ready(function(){
    
    
 var input = document.getElementById("message");
 console.log(input)

input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("sendMessage").click();
  }
});
   
    
    
    
    
    console.log(589)
$(document).on("click","#sendMessage",function() {
   var rece = $("#receiver").val()
   console.log($("#receiver").val())
var dataString = {
message : $(".text-box").val()
};

if(dataString.message.replace(/^\s+/g, '') !== ''){
     console.log('ttyl')
console.log(dataString.message)
$.ajax({
type: "POST",
url: "<?php echo base_url('home/send');?>",
data: dataString,
dataType: "json",
cache : false,
success: function(data){
if(data.success ==true){
    $(".text-box").val('');
   
var socket = io.connect( 'https://'+window.location.hostname+':3007',{ transports: ["websocket"] }  );
socket.emit('new_message', {
message: data.message,
sender_id:data.sender_id,
receiver_id:data.receiver_id
});

}
} ,error: function(xhr, status, error) {
    console.log(error)
alert(error);
},
});

}
});
});
  var socket = io.connect( 'https://'+window.location.hostname+':3007',{ transports: ["websocket"]} ); 
console.log('http://'+window.location.hostname+':3007')
socket.on( 'new_message', function( data ) {
    console.log(data)
    console.log('depon')
    var rece = $("#receiver").val()
    console.log($("#receiver").val())
 if(data.receiver_id == $("#receiver").val()  ) {
     console.log('depon here')
$("#recent_message").append('<li class="self">'+data.message+'</li>');
const audio = new Audio('<?php echo base_url('assets/notification.wav')?>');
//const audio = new Audio('http://3.13.210.26/public/matka/matka_new/assets/notification.wav');
  audio.play();
}else if(data.sender_id == $("#receiver").val() ){
    $("#recent_message").append('<li class="other">'+data.message+'</li>');
    const audio = new Audio('<?php echo base_url('assets/notification.wav')?>');
   // const audio = new Audio('http://3.13.210.26/public/matka/matka_new/assets/notification.wav');
  audio.play();
}
});


</script>


</body>
</html>