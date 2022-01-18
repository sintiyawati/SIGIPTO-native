<?php
error_reporting(0);
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_pemilik'])){
  echo '<script language="javascript">
  alert ("Maaf, Anda belum login silahkan login terlebih dahulu.");
  window.location="index.php";
     </script>';//jika belum login jangan lanjut..
   }else{

    include '../koneksi.php';

    $id = $_SESSION['id_pemilik'];
    $sqlll = mysqli_query($koneksi, "SELECT * FROM pemilik_tempat WHERE id_pemilik='$id'");
    $pemilik = mysqli_fetch_array($sqlll);
    $ids = $pemilik['id_pemilik'];
    $nama = $pemilik['nama_lengkap'];
    $email = $pemilik['email'];
    $username = $pemilik['username'];
    $password = $pemilik['password'];
    $foto = $pemilik['foto'];
    $status= $pemilik['status_akun'];

    
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>ADMIN || SIGIPTO</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <!-- Morries chart CSS -->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
     <!-- summernotes CSS -->
    <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Map CSS -->
    <link href="../admin/css/map.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/plugins/Owl/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick/custom-slick.css">
    <link rel="stylesheet" type="text/css" href="../admin/assets/plugins/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k"></script>
</head>

<body class="fix-header fix-sidebar card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#" style="color: #FFF;padding: 10px 0">
                        <span style="font-weight: bold;">SIGIPTO</span>
                        </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                if ($foto=='') {?>
                                    <img src="../admin/pemilik_tempat/foto_pemilik/icon.png" class="profile-pic" />
                                <?php }else{?>
                                    <img src="../admin/pemilik_tempat/foto_pemilik/<?php echo $foto; ?>" class="profile-pic" />
                                <?php } ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <?php 
                                                if ($foto=='') {?>
                                                    <img src="../admin/pemilik_tempat/foto_pemilik/icon.png" alt="user" style="border-radius:70px;width: 70px;height: 70px;" />
                                                <?php }else{?>
                                                    <img src="../admin/pemilik_tempat/foto_pemilik/<?php echo $foto; ?>" alt="user" style="border-radius:70px;width: 70px;height: 70px;" />
                                                <?php } ?>
                                            </div>
                                            <div class="u-text">
                                                <h4><?php echo $nama ?></h4>
                                                <p class="text-muted"><?php echo $email ?></p>
                                                <a href="?page=profil/index" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php" onclick="return confirm('Yakin ingin keluar dari sistem ini?!!!');"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> 
                        <?php 
                        if ($foto=='') {?>
                            <img src="../admin/pemilik_tempat/foto_pemilik/icon.png" alt="user" style="width: 100%;height: 70px;" />
                        <?php }else{?>
                            <img src="../admin/pemilik_tempat/foto_pemilik/<?php echo $foto; ?>" alt="user" style="width: 100%;height: 70px;"/>
                        <?php } ?>
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php echo $nama ?></h5>
                    </div>
                    <h5><center style="font-weight: bold;">ADMIN</center></h5>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENU</li>
                        <li><a class="waves-effect waves-dark <?php if($_GET['page']==''){echo 'active';} ?>" href="app.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li><a class="waves-effect waves-dark <?php if($_GET['page']=='tempat_olahraga/index' || $_GET['page']=='tempat_olahraga/tambah' || $_GET['page']=='tempat_olahraga/edit' || $_GET['page']=='tempat_olahraga/detail'){echo 'active';} ?>" href="?page=tempat_olahraga/index" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Tempat Olahraga</span></a>
                        </li>
                        <!-- <li> <a class="waves-effect waves-dark <?php if($_GET['page']=='profil/index' || $_GET['page']=='profil/tambah' || $_GET['page']=='profil/edit' || $_GET['page']=='profil/detail'){echo 'active';} ?>" href="?page=profil/index" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Akun</span></a>
                        </li> -->
                        <li> <a class="waves-effect waves-dark <?php if($_GET['page']=='faq/index' || $_GET['page']=='faq/tambah' || $_GET['page']=='faq/edit' || $_GET['page']=='faq/detail'){echo 'active';} ?>" href="?page=faq/index" href="#" aria-expanded="false"><i class="mdi mdi-information-variant"></i><span class="hide-menu">FAQ</span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php 
                include '../koneksi.php';
                if (isset($_GET["page"])) {
                  $page = $_GET["page"];
                  $file = "$page.php";

                  if (!file_exists($file)) {
                    include ("dashboard.php");
                  }else{
                    include ("$page.php");
                  }

                }else{
                  include ("dashboard.php");
                }

                ?>
                <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                    <div class="r-panel-body">
                        <ul id="themecolors" class="m-t-20">
                            <li><b>With Light sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                            <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                            <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                            <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                            <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                            <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                            <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                            <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                            <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                            <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
        
        <!-- ============================================================== -->
                
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © Copyright 2021
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <!--  <script src="assets/plugins/morrisjs/morris.min.js"></script> -->
    <!-- sparkline chart -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/plugins/Owl/dist/owl.carousel.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
    <!-- page script -->
    <script src="../admin/assets/plugins/slick/slick.min.js"></script>
    <script src="../admin/assets/plugins/slick/custom-slick.js"></script>
    <!-- <script src="assets/js/dashboard4.js"></script> -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../admin/assets/js/map.js"></script>
    <script type="text/javascript">
      $('.naf-for').slick({
        autoplay: false,
        slidesToShow: 1,
        arrows: true,
        fade: true,
        asNavFor: '.naf-bottom'
    });
      $('.naf-bottom').slick({
        slidesToShow: 1,
        asNavFor: '.naf-for',
        dots: false,
        prevArrow: false,
        nextArrow: false,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '70px'

    });
    </script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>
    <script>
    $(document).ready(function() {
        // For select 2
        $(".select2").select2();
        // For datatable
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
        $('.owl-carousel').owlCarousel({
                    items: 1,
        });

        $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });

    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
</body>

</html>
<?php } ?>