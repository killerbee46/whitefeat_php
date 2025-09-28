<?php 
include('session_control.php');
include('db_connect.php');
                    $queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='".$_SESSION['u_id']."'"; 
                    $displayud = mysqli_query($con,$queryud);
		            $rowud=mysqli_fetch_array($displayud);
{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WF ADMIN || system</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/sweet-alert.css">
  <style>
  .Hunter-pop-up {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
    padding: 1px;
    background-color: #ffffff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 2px solid #cccccc;
    border: 2px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.Hunter-pop-up:before,
.Hunter-pop-up:after {
    content: '';
    display: block;
    width: 0;
    height: 0;
    border-width: 10px;
    border-style: solid;
    position: absolute;
    left: 20px;
    z-index: 999999;
}

.Hunter-pop-up-right:before,
.Hunter-pop-up-right:after {
    left: auto;
    right: 20px;
}

.Hunter-pop-up:before {
    border-color: transparent transparent #f5f5f5;
    top: -17px;
    z-index: 9999999;
	left:5px;
}

.Hunter-pop-up:after {
    border-color: transparent transparent #c9cbce;
    top: -20px;
	left:5px;
}

.Hunter-pop-up ul {
    list-style: none;
}

.Hunter-pop-up ul li {
    display: inline-block;
    position: relative;
    margin: 4px;
    cursor: pointer;
}

.Hunter-pop-up p {
    font-weight: 1;
    padding: 0 4px;
    margin-top: 4px;
    margin-bottom: 0px;
}

.Hunter-pop-up .line {
    width: 340px;
    margin: 0 auto;
    margin-top: 4px;
    border-bottom: 1px solid #d8d8d8;
}

.Hunter-pop-up .close {
    position: absolute;
    top: 8px;
    right: 8px;
    font-size: 16px;
	z-index:1000;
}

.Hunter-pop-up .title {
    padding: 8px 14px;
    margin: 0;
    font-size: 14px;
    font-weight: bold;
    line-height: 18px;
    background-color: #f5f5f5;
    border-bottom: 1px solid #ddd;
    border-radius: 5px 5px 0 0;
}



.Hunter-pop-up .Hunter-wrap {
    position: relative;
    background: #ffffff;
    padding: 0.5em;
    overflow: auto;
	padding-bottom:0;
	padding-left:0.6em;
	padding-right:0.6em;
	
}


  </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed letter-spacing">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="navmenu">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="pushmenu_link"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="main.php" class="nav-link open_main"><strong><i class="fas fa-home"></i> DASHBOARD</strong></a>
      </li>
	  <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link open_walk">Account</a>
      </li>-->
	  
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	
     
      <!-- Notifications Dropdown Menu -->
	  <!--
	    <li class="nav-item">
        <a class="nav-link" href="#" role="button">
         <button class="btn btn-xs btn-outline-info">KOT <i class="fas fa-print"></i></button> 
        </a>
      </li>-->
	  
	  
	  
	  
	  
	   
	  
	  
	  
	  
      
	  
      
	  
	  <li class="nav-item">
        <a class="nav-link btn btn-light"  href="../" target="_blank" role="button" id="">
          View site &nbsp; <i class="fas fa-eye"></i>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" id="fscreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
	  <!--
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
	  
	  
	  
      
        
	  
	  <!-- USERS Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
        <a class="nav-link lights" href="#" role="button">
		<i class="fas fa-moon mr-2"></i> Dark mode
          <input id="toggle-light" class="light-button" type="checkbox" data-toggle="toggle" data-size="xs" data-onstyle="secondary" >
        </a>
      
		  
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#inquiry_modal">
            <i class="fas fa-lock mr-2"></i> Change password
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout <small><small style="color:red;">(<?php echo ucfirst($rowud['u_name']); ?>)</small></small>
          </a>
        </div>
      </li>
	  
	  
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4" style="background: rgb(28,68,74);
background: linear-gradient(0deg, rgba(28,68,74,1) 0%, rgba(17,111,130,1) 26%, rgba(23,162,184,1) 100%);">
    <!-- Brand Logo -->
    <a href="main.php" class="brand-link open_main" style="border-color:#138296; padding-left:1.5em;">
	<strong style="font-weight:400;">WF</strong>
      <span class="brand-text font-weight-light"> <small><small><small>( White Feather )</small></small></small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
    <?php include('aside.php'); ?>
      
    </div>
    <!-- /.sidebar -->

    <!-- /.sidebar-custom -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      
    <!-- Main content -->
    <section class="content" style="padding-top:1em;">

       
	   
	   
	   
	   
	   
	   

      <div class="container-fluid app_area">
	  
	  
	  
	  <div class="row" style="padding-top:5%;">
	           
            <div class="col">			   
          <div style="text-align:center; margin-top:2%;"><img src="img/namaste.png"></div>
		    </div>
	   </div>	  
		  
		  <div class="container" style="padding-top:4%;" >
		  <div class="col">
          <!-- Main content -->
          <section class="" style="">
            <div class="callout callout-info bg-info" id="main_info" style=" border-color:#ccc!important;">
              <h3 style="text-align:center">Tip!</h3>
              <h4 style="text-align:center">From here you are able to manage all of the contents of your Website! </h4></br>
			   <h5 style="text-align:center"><i>We wish you happy posting times..... :) </i></h5>
            </div><!-- /.box -->
          </section><!-- /.content -->
	       </div>
	  
      </div> 
	  </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/app.js"></script>
<script src="dist/js/alert.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- FLOT CHARTS -->
<script src="plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="plugins/flot/plugins/jquery.flot.pie.js"></script>



		<div class="modal fade" id="inquiry_modal" role="dialog">
		
    <div class="modal-dialog">
      <div class="modal-content">
		<div class="modal-header">
              <h4 class="modal-title">Change Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        <div class="modal-body">
          <label>Old password: <i style="color:red">*</i></label><br><input type="password" id="input_old_pass" style="width:80%;" class="form-control"></input><br>
		  <label>New password: <i style="color:red">*</i></label><br><input type="password" id="input_new_pass" style="width:80%;" class="form-control"></input><br>
		  <label>Re-enter New password: <i style="color:red">*</i></label><br><input type="password" id="input_new_pass2" style="width:80%;" class="form-control"></input><br>
        </div>
        <div class="modal-footer justify-content-between" style="text-align:left;">
		  <button type="button" class="btn btn-danger" data-dismiss="modal" id="change_pass">Change Password</button>
        </div>
      </div>
	  </div>
	  </div>
	 

<div class="modal fade bd-example-modal-lg" id="reprint_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="padding-bottom:0; margin-bottom:0">
    <div class="modal-content" style="padding-bottom:0; margin-bottom:0">
      
            <div class="card card-secondary"style="padding-bottom:1em; margin-bottom:0">
              <div class="card-header">
                <h3 class="card-title">Re Print Bill</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-dismiss="modal"><i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="fetch_bill_reprint" style="margin-bottom:0; padding-bottom:0;">
			  
			  
			  
			  
			  
			  
			  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
	  
	  
	  
    </div>
  </div>
</div>

<a href="" id="r_print" target="_blank"></a>

<script>
  $(function () {
	  
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Delivered',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Cancel',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [5, 2, 0, 1, 5, 3, 0]
        },
      ]
    }

//-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
 

 });

</script>


<script>

 $(function () {
/*
     * DONUT CHART
     * -----------
     */

var data        = [];

    var donutData = [
      {
        label: 'Pending',
        data : 30,
        color: '#3c8dbc'
      },
      {
        label: 'Cancel',
        data : 20,
        color: '#0073b7'
      },
      {
        label: 'Delivered',
        data : 50,
        color: '#00c0ef'
      }
    ];
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    /*
     * END DONUT CHART
     */
	 
	 /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
 });

</script>


<div id="menu_order" style="display:none;"> 
	<a href="#" id="closem" class="text-white"><span style="float:right; margin-right:10px; margin-top:10px; color:#fff;"> Close [X] </span></a>
	<div id="mo_fetch" style="color:#ddd;">
	</div>
    </div> 
</body>
</html>
<?php }?>