<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            
            <html lang="en">
<head>
    
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
</head>
<body>
<form role="form" method="post" action="<?php echo site_url('dashboard/index');?>">
<!--<label for="search">Search Data</label>-->
<!--<input type="text" class="daterange" name="daterange" value="" id="daterange"/>-->

</form>
<script type="text/javascript">
	$('.daterange').daterangepicker();
	
</script> 


</body>
</html>

          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
    <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $count_user; ?></h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
        
          <div class="col-lg-3 col-6">       
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $count_market_type; ?></h3>
                <p>Market Type</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">       
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $all_user_wallet_balance; ?></h3>
                <p>Wallet balance all users</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
             
            </div>
          </div>
          
           <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $all_request_money->amount; ?></h3>
                <p>Total Requested Money</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
            
            </div>
          </div> 
        </div>
        
<hr style="background-color:black;">


     <section class="content mt-3 mb-3">
    <div class="container-fluid">
        <form method="post">
        <div class="row">
             
            <div class="col-md-4">
                <label>From Date</label>
                 <input type="text" class="form-control" name="from_date" class="" id="fromdatepicker" placeholder="Select From Date">  
            </div>
             <div class="col-md-4">
                   <label>To Date</label>
                  <input type="text" class="form-control" name="to_date" class="" id="todatepicker" placeholder="Select TO Date">  
             </div>
              <div class="col-md-4">
                 
                   <button type="button" onclick="getDate()"class="btn btn-primary" style="margin-top:31px;">Search</button>
              </div>
           
             
        </div>
         </form>
      <div class="row">
        
      </div>
    </div>
</section>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light bg-dark">
              <div class="inner">
                <h3 id="total_bonus_deposit"></h3>
                <p>Bonus Amount Deposit</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">       
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="total_betting"></h3>
                <p>Betting Count</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-hourglass-start"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="total_betting_amount"></h3>
                <p>Total Betting Amount</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
          
            </div>
          </div> 
          
          <div class="col-lg-3 col-6">       
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="total_withdraw"></h3>
                <p>Total Withdraw</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          
           <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3 id="total_deposit"></h3>
                <p>Total Deposit</p>
              </div>
              <div class="icon">
                <i class="fas fa-rupee-sign"></i>
              </div>
              <!--<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>-->
            </div>
          </div> 
        </div> 
        
    
    </div>
</section>

<script>

 function getDate(){
     
  var toDate = $('#todatepicker').val()
  var fromDate = $('#fromdatepicker').val()  
  
       getStatisticsData(fromDate,toDate)
    }
    
  

  $(document).ready(function(){

//var toDate = $('#todatepicker').val()
//var fromDate = $('#fromdatepicker').val()

const yourDate = new Date()
var date = yourDate.toISOString().split('T')[0]
console.log(date)
   getStatisticsData(date,date)

    
  });
  
  function getStatisticsData(fromDate,toDate){
      
      
  
      $.ajax({
        url:SiteUrl+'/dashboard/statistics',
        type : "POST",
        cache: false,
        dataType: "json",
        data : {from_Date:fromDate, to_Date:toDate},
        success:function(result){
          
            $("#total_withdraw").html(result.total_withdraw.amount);
            $("#total_deposit").html(result.total_deposit.amount);
            $("#total_betting_amount").html(result.total_betting_amount.amount); 
            $("#total_betting").html(result.total_betting.total_betting); 
            $("#total_bonus_deposit").html(result.total_bonus_deposit.amount);
            //console.log(result)
          
        } 
      });
      
      
      
  }
  
</script>


