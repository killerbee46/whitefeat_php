<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>White Feathers || CMS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-secondary">
    <div class="card-header text-center">
      <span class="h2 text-info"><small>WF cms</small> &nbsp;<i><small><i class="fas fa-gem"></i></i></small></b><small><small><small><small><small><small></small></small></small></small></small></small></span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login to system</p>

      <form action="process.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="user1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-5">
          <button type="submit" class="btn btn-info btn-block">Sign In &nbsp; <i class="fas fa-sign-in-alt"></i></button></div>          
          <!-- /.col -->
          <div class="col-7 text-right p-2">
            <a href="#" data-toggle="modal" data-target="#forgot_modal" ><small>forgot password?</small></a>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<input type="hidden" id="error_check" value="<?php if(isset($_GET['uerror'])){echo $_GET['uerror'];}else{echo'0';}?>">
<script>


	  	if($('#error_check').val()==='true'){
      toastr["error"]("Invalid Login Details", "ERROR");
	}
	toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "1000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>

		<div class="modal fade" id="forgot_modal" role="dialog">
		
    <div class="modal-dialog">
      <div class="modal-content">
		<div class="modal-header">
              <h4 class="modal-title">Forgot Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
        <div class="modal-body">
          <label>Email: <small><i></i></small><i style="color:red">*</i></label><br>
		  <input type="text" id="input_email" style="width:80%;" class="form-control" placeholder="During registration"></input><br>
        </div>
        <div class="modal-footer justify-content-between" style="text-align:left;">
		  <button type="button" class="btn btn-danger" data-dismiss="modal" id="change_pass">Send Recovery Details</button>
        </div>
      </div>
	  </div>
	  </div>
	 
	 <script>
	 $(document).on('click','#change_pass', function(){var d1=$('#input_email').val();var dataString = 'email='+d1;$.ajax({type: "POST",url: "recovery.php",data: dataString,cache: false,success: function(res){if(res==='1'){toastr["success"]("Details sent to email", "Login sent");}else{toastr["error"]("Email not registered", "INVALID EMAIL");}}});});
	 </script>

</body>
</html>
