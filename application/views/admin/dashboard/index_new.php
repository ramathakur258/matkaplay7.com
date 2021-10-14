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
<label for="search">Search Data</label>
<input type="text" class="daterange" name="daterange" value="" id="daterange"/>

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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light bg-dark">
              <div class="inner">
                <h3><?php echo $count_bonus->amount; ?></h3>
                <p>Bonus Amount</p>
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
                <h3><?php echo $BettingList; ?></h3>
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
                <h3><?php echo $bid_amount->amount; ?></h3>
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
                <h3><?php echo $withdraw_money->amount; ?></h3>
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
                <h3><?php echo $deposit_money->amount; ?></h3>
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

<script type="text/javascript">
  $(document).ready(function(){

    var from_Date = "";
    var to_Date = "";
    
     getDateRangeRecord(fromDate,toDate);

    $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
    });

    $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

    $('input[name="daterange"]').daterangepicker({
      opens: 'center',
      autoUpdateInput: false,
    },

    // From to To date range function
    function(start, end) {
      var from_Date = start.format('YYYY-MM-DD');
      var to_Date = end.format('YYYY-MM-DD');
      if(from_Date !== "" && to_Date !== "") {
        getDateRangeRecord(fromDate,toDate);
      }
    });  

     function getDateRangeRecord(fromDate, toDate){
      $.ajax({
        url:SiteUrl+'/dashboard/index,
        type : "POST",
        cache: false,
        data : {from_Date:from_Date, to_Date:to_Date},
        success:function(result){
          $("#daterange").html(result);
          
        } 
      });
    }    
  });



