
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <title>SIGIPTO</title>

  <!-- Stylesheets -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
  <link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
  <link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <!-- Color Switcher Mockup -->
  <link href="assets/css/color-switcher-design.css" rel="stylesheet">
  <link href="admin/css/map.css" rel="stylesheet">
  <!-- Color Themes -->
  <link id="theme-color-file" href="assets/css/color-themes/default-theme.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
  <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="admin/assets/plugins/slick2/slick.css">
  <link rel="stylesheet" href="admin/assets/plugins/slick2/custom-slick.css">
  <link rel="stylesheet" type="text/css" href="admin/assets/plugins/slick/slick-theme.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!--Google Map APi Key-->
 <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k"></script>
 <script src="assets/js/map-script.js"></script>
<!--End Google Map APi-->
  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    </head>

    
    <body class="hidden-bar-wrapper">
      <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>
        <!-- Main Header-->
        <header class="main-header header-style-one">
          <!-- Header Top -->
          <div class="header-top">
            <div class="outer-container">
             <div class="clearfix">
          <!-- Top Right -->
          <div class="top-right pull-right">
                    </div>
                  </div>
                </div>
              </div>
              <!-- Header Upper -->
              <div class="header-upper">
                <div class="outer-container clearfix">
                  <!-- <div class="pull-left logo-box">
                    <div class="logo"><a href="index.php"><img src="assets/images/logo.png" alt="" title=""></a></div>
                  </div> -->
                  <div class="nav-outer clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                      <div class="navbar-header">
                        <!-- Toggle Button -->      
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                      </div>
                      <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                          <li class="<?php if($_GET['page']==''){echo 'current';} ?>"><a href="index.php">Home</a></li>
                          <li <?php error_reporting(0); if($_GET['page']=='user/maps') echo "class='current'"; ?>><a href="?page=user/maps">Peta</a></li>
                          <li <?php error_reporting(0); if($_GET['page']=='user/faq') echo "class='current'"; ?>><a href="?page=user/faq">Faq</a></li>
                        </ul>
                      </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
          </div>
        </div>
                </div>
              </div>
              <!--End Header Upper-->
              <!-- Sticky Header  -->
              <div class="sticky-header">
                <div class="auto-container clearfix">
                  <!--Logo-->
                  <div class="logo pull-left">
                    <a href="index.php" title=""><!-- <img src="assets/images/logo-small.png" alt="" title=""> --></a>
                  </div>
                  <!--Right Col-->
                  <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                      <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                    </div>
                  </div>
                </div>
              </div><!-- End Sticky Menu -->
              <!-- Mobile Menu  -->
              <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
                <nav class="menu-box">
                  <div class="nav-logo"><a href="index.php"><!-- <img src="assets/images/logo-2.png" alt="" title=""> --></a></div>
                  <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                </nav>
              </div><!-- End Mobile Menu -->
            </header>
            <!-- End Main Header -->
            <!-- Sidebar Cart Item -->
            <div class="xs-sidebar-group info-group">
              <div class="xs-overlay xs-bg-black"></div>
              <div class="xs-sidebar-widget">
                <div class="sidebar-widget-container">
                  <div class="widget-heading">
                    <a href="#" class="close-side-widget">
                      X
                    </a>
                  </div>
                  <div class="sidebar-textwidget">
                   <!-- Sidebar Info Content -->
                   <div class="sidebar-info-contents">
                    <div class="content-inner">
                      <div class="logo">
                        <a href="index.html"><img src="assets/images/logo.png" alt="" /></a>
                      </div>

                      <div class="content-box">
                        <h2>About Ussadfasdfa</h2>
                        <p class="text">The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review point you’ll end up reviewing and negotiating the content itself and not the design.</p>
                        <a href="#" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END sidebar widget item -->


<?php
error_reporting(0);
  include 'koneksi.php';
  // koneksi perpage
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
    $file = "$page.php";

    if (!file_exists($file)) {
      include("home.php");
    } else {
      include("$page.php");
    }
  } else {
    include("user/home.php");
  }

?>

<!-- Main Footer -->
<footer class="main-footer" style="background-image:url(assets/images/background/2.jpg)">
  <div class="auto-container">
    <!-- Widgets Section -->
    <div class="widgets-section">
      <div class="row clearfix">
        <!-- Big Column -->
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
          <div class="row clearfix">
            <!--Footer Column-->
            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
              <div class="footer-widget logo-widget">
               <!--  <div class="logo">
                  <a href="index.php"><img src="assets/images/footer-logo.png" alt="" /></a>
                </div> -->
                <div class="social-links">
                  <span>Follow on Socials </span>
                  <a href="https://www.facebook.com/al.watii" class="fa fa-facebook"></a>
                  <a href="https://instagram.com/sintiya_wati?utm_medium=copy_link" class="fa fa-instagram"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Big Column -->
        <div class="big-column col-lg-6 col-md-12 col-sm-12">
          <div class="row clearfix">
            <!-- Footer Column -->
            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
              <div class="footer-widget links-widget">
                <!-- <h4>Our Services</h4>
                <ul class="list-link">
                  <li><a href="">Fat Burn</a></li>
                  <li><a href="">Streching</a></li>
                  <li><a href="">Weight Loss</a></li>
                  <li><a href="">Self Defense</a></li>
                  <li><a href="">Body Building</a></li>
                  <li><a href="">Psycho Trainning</a></li>
                  <li><a href="">Strength Trainning</a></li>
                </ul> -->
              </div>
            </div>
            <!-- Footer Column -->
            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
              <div class="footer-widget timing-widget">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <div class="copyright">Copyright @2021</div>
    </div>
  </div>
</footer>

</div>
<!--End pagewrapper-->
<!-- Color Palate / Color Switcher -->
  <div class="color-palate">
    <div class="color-trigger">
      <i class="fa fa-gear"></i>
    </div>
    <div class="color-palate-head">
      <h6>Choose Your Color</h6>
    </div>
    <div class="various-color clearfix">
      <div class="colors-list">
        <span class="palate default-color active" data-theme-file="assets/css/color-themes/default-theme.css"></span>
        <span class="palate green-color" data-theme-file="assets/css/color-themes/green-theme.css"></span>
        <span class="palate olive-color" data-theme-file="assets/css/color-themes/olive-theme.css"></span>
        <span class="palate orange-color" data-theme-file="assets/css/color-themes/orange-theme.css"></span>
        <span class="palate purple-color" data-theme-file="assets/css/color-themes/purple-theme.css"></span>
        <span class="palate teal-color" data-theme-file="assets/css/color-themes/teal-theme.css"></span>
        <span class="palate brown-color" data-theme-file="assets/css/color-themes/brown-theme.css"></span>
        <span class="palate redd-color" data-theme-file="assets/css/color-themes/redd-color.css"></span>
      </div>
    </div>    
    <div class="palate-foo">
      <span>Rubah warna menu sesuai yang kalian suka</span>
    </div>
  </div>

<!-- Search Popup -->
<div class="search-popup">
  <button class="close-search style-two"><span class="flaticon-multiply"></span></button>
  <button class="close-search"><span class="flaticon-up-arrow-1"></span></button>
  <form method="post" action="blog.html">
    <div class="form-group">
      <input type="search" name="search-field" value="" placeholder="Search Here" required="">
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>
  </form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>
<script src="assets/js/jquery.js"></script>
<!--Revolution Slider-->

<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>

<script src="assets/js/main-slider-script.js"></script>

<script src="assets/js/popper.min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.js"></script>

<script src="assets/js/jquery.fancybox.js"></script>

<script src="assets/js/appear.js"></script>

<script src="assets/js/parallax.min.js"></script>

<script src="assets/js/tilt.jquery.min.js"></script>

<script src="assets/js/jquery.paroller.min.js"></script>

<script src="assets/js/owl.js"></script>

<script src="assets/js/wow.js"></script>

<script src="assets/js/nav-tool.js"></script>

<script src="assets/js/jquery-ui.js"></script>

<script src="assets/js/script.js"></script>

<script src="assets/js/color-settings.js"></script>
<!-- page script -->
<script src="admin/assets/plugins/slick2/slick.min.js"></script>
<script src="admin/assets/plugins/slick2/custom-slick.js"></script>
<script type="text/javascript" src="assets/js/cari.js"></script>
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
    dots: false,
    prevArrow: false,
    nextArrow: false,
    centerMode: true,
    focusOnSelect: true,
    centerPadding: '70px'

  });
</script>

<!-- <script>
        $(document).ready(function(){

            $('#search').keyup(function(){
                $('#hasil').load('cari-tempat.php?search=' + $('#search').val());
            });
            
        });
    </script>
 -->

</body>

</html>