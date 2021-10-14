
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href= "<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?> ">
  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/mobile-responsive.css')?> ">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
   <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>





  <?php 
            if(!empty($style)){
                $this->load->view($style);
            }
        ?>
<script>
              var BaseUrl='<?php echo base_url(); ?>'
              var SiteUrl='<?php echo admin_url(); ?>';
        </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
 <!--header-->
 <?php $this->load->view('admin/layout/header'); ?>
 <!--sidebar-->


 <?php

  
 
  

 $this->load->view('admin/layout/sidebar'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
     <?php   $this->load->view('admin/'.$content); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--footer-->
  <?php $this->load->view('admin/layout/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


	


<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>



<script type="text/javascript">
            $(function(){
 
               var timeout = 3000; 

               $('#flash-messages').delay(timeout).fadeOut(300);
            
            });
            </script>
            
            
            
 
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    
    <script>
        $(document).ready(function(){
    $('input.timepicker').timepicker({
       // timeFormat: 'HH:mm:ss p',
         interval: 1,
    });
    
   
    
});
    </script>  
   
     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script type="text/javascript">
    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
</script>

   <script>
  $(document).ready(function(){
  //  var $j = jQuery.noConflict();
        $('#datepicker1').datepicker();
  });
  
   $(document).ready(function(){
  //  var $j = jQuery.noConflict();
        $('#todatepicker').datepicker({
            dateFormat: 'yy-mm-dd'
          
        });
        
        $('#todatepicker').datepicker(
       "setDate", "<?php echo date('Y-m-d')?>"
         );
  });
  
    $(document).ready(function(){
  //  var $j = jQuery.noConflict();
        $('#fromdatepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        });
        
         $('#fromdatepicker').datepicker(
       "setDate", "<?php echo date('Y-m-d')?>"
         );
  });
  
</script>
     
            


<?php 
            if(!empty($script)){
              
                $this->load->view('admin/'.$script);
            }
        ?>

</body>
</html>
