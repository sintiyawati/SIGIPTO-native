<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">FAQ</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Faq</li>
        </ol>
    </div>
    <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-b-0">
                        <h4 class="card-title">FAQ</h4>
                        <h6 class="card-subtitle">Frequently Asked Questions</h6>
                        <?php 
                            $mysql = mysqli_query($koneksi, "SELECT * FROM faq WHERE id_faq='$_GET[id_faq]'");
                            while ($data = mysqli_fetch_array($mysql)){ 
                                ?>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs customtab2" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home7" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down"><?php echo $data['pertanyaan'] ?></span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="home7" role="tabpanel">
                                <div class="m-t-20 m-b-20">
                                <!-- <h3>Best Clean Tab ever</h3>
                                    <h4>you can use it with the small code</h4> -->
                                    <p><?php 
                                    if ($data['jawaban'] == "") {
                                      echo "Belum Ada Jawaban Untuk Pertanyaan ini";
                                  }else {
                                      echo "$data[jawaban]";
                                  }

                              ?></p>
                          </div>
                          <h5>Video <?php echo $data['pertanyaan'] ?><span class="text-danger">*</span></h5>
                          <iframe width="100%" height="300" position="center" src="https://www.youtube.com/embed/<?php echo $data['link_video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                          <br>
                          <br>
                          <a href="?page=faq/index" type="reset" class="btn btn-inverse">Kembali</a>
                      </div>
                      <div class="m-t-20">
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <?php } ?>

</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->