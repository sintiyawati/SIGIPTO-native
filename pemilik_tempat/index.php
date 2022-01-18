<?php 


include '../koneksi.php';

// Login pemilik tempat
if (isset($_POST['login_pemilik'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];


  $log =  mysqli_query($koneksi, "SELECT * FROM pemilik_tempat WHERE username='$username' AND password='$password'");
  $data = mysqli_fetch_array($log);

  if(mysqli_num_rows($log) == 1){
    session_start();
    $_SESSION['id_pemilik'] = $data['id_pemilik'];

    echo "<script>alert('Login berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0; url=app.php'></script>";
    
  }else{
    echo "<script>alert('Periksa Username dan Password Anda, coba ulangi kembali.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'></script>";
  }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../admin/assets/images/favicon.png">
    <title>ADMIN || SIGIPTO</title>
    <!-- Bootstrap Core CSS -->
    <link href="../admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../admin/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../admin/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <link rel="stylesheet" href="../admin/assets/plugins/swal/sweetalert2.min.css">
    <style type="text/css">
    .field-icon {
    float: right;
    margin-left: -35px;
    margin-right: 10px;
    margin-top: 10px;
    position: absolute;
    z-index: 2;
}
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
  <section id="wrapper">
        <div class="login-register" style="background-image:url(../admin/assets/images/18.jpeg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="" method="POST">
                        <br><h4 class="box-title m-b-20"> <center><b>Sistem Informasi Geografis<br> Persebaran Tempat Olahraga</b></center></h4>
                        <center><font size="2" face="cambria"><b>Silahkan anda log In dengan akun admin yang telah didaftarkan!!</b></font></center><br>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" required="" placeholder="Username"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password-field" type="password" class="form-control" name="password" required="" placeholder="Password">
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"></span>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                         </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login_pemilik">Log In</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <div><a class="text m-l-5" style=""><b>Belum punya akun?</b></a><a href="registrasi.php" class="text-info m-l-5"><b>Daftar di sini</b></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../admin/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../admin/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../admin/assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../admin/assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../admin/assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../admin/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../admin/assets/js/custom.min.js"></script>
    <script src="../admin/assets/plugins/swal/sweetalert2.all.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../admin/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
      $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    </script>
</body>

</html>