  <div class="row clearfix">
    <?php 
    error_reporting(0);
    include '../koneksi.php';
    $keyword = $_GET['keyword'];
    
    $data_tempat = mysqli_query($koneksi,"SELECT * FROM tempat_olahraga WHERE nama_tempat LIKE '%$keyword%' OR alamat_tempat LIKE '%$keyword%'");
    $nomor = $halaman_awal+1;
    while($d = mysqli_fetch_array($data_tempat)){

      $ids = $d['kode_tempat'];
      $sqlrating=mysqli_query($koneksi,"SELECT AVG(rating.rate) AS totalRating FROM rating JOIN tempat_olahraga ON rating.kode_tempat=tempat_olahraga.kode_tempat WHERE rating.kode_tempat='$d[kode_tempat]'");
      $dataRating = mysqli_fetch_array($sqlrating);
      $rating = round($dataRating['totalRating'],2);

      ?>
      <!-- Shop Item -->
      <div class="single-product-item col-lg-4 col-md-6 col-sm-12 text-center">
       <div class="img-holder">
        <?php
          // Syntax memanggil data gambar
          $m1 = mysqli_query($koneksi, "SELECT * FROM gambar_tempat JOIN tempat_olahraga ON gambar_tempat.kode_tempat=tempat_olahraga.kode_tempat WHERE tempat_olahraga.kode_tempat='$ids' GROUP BY tempat_olahraga.kode_tempat");
          while ($d1 = mysqli_fetch_array($m1)) {
              ?>
        <img src="admin/tempat_olahraga/gambar/<?php echo $d1['gambar']; ?>" class="" alt="" style="width: 250px;height:250px;">
      <?php } ?>
      </div>
      <div class="title-holder text-center">
        <div class="static-content">
          <h3 class="title text-center"><a href="shop-single.html"><?php echo $d['nama_tempat']; ?></a></h3>
          <span class="price"><span class="amount">
           <center>
             <div id="star">
               <?php if ($rating == '') {
                echo '<span style="color:grey;">
                <i class="fa fa-star"></i></span>
                <span style="color:grey;">
                <i class="fa fa-star"></i></span>
                <span style="color:grey;"><i class="fa fa-star"></i></span>
                <span style="color:grey;"><i class="fa fa-star"></i></span>
                <span style="color:grey;"><i class="fa fa-star"></i></span>';
              }else{
                for ($i=0; $i < $rating; $i++){
                  echo'<span style="color:orange;"><i class="fa fa-star"></i></span>';
                }
              } 
              ?>
            </div>
          </center>

        </div>
        <div class="overlay-content">
          <ul class="clearfix">
            <li>
              <a href="admin/tempat_olahraga/gambar/<?php echo $d['gambar']; ?>" class="lightbox-image" data-fancybox="shop-gallery"><span class="fa fa-expand"></span>
                <div class="toltip-content">
                  <p>Zoom Gambar</p>
                </div>
              </a>
            </li>
            <li>
              <a href="?page=user/detail_tempat&kode=<?php echo $d['kode_tempat']; ?>"><span class="fa fa-eye"></span>
                <div class="toltip-content">
                  <p>Detail Tempat</p>
                </div>
              </a>
            </li>
                      <!-- <li>
                        <a href="#" class=""><span class="fa fa-star"></span>
                          <div class="toltip-content">
                            <p>Beri Rating</p>
                          </div>
                        </a>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>