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

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Faq</h4>
           <!--  <div class="header">
                <a href="?page=faq/tambah" class="btn btn-sm btn-secondary pull-right">Tambah Data</a>
            </div> -->
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><center>No.</center></th>
                            <th><center>Pertanyaan</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM faq");
                        while ($data = mysqli_fetch_array($my)) {
                          ?>
                          <tr>
                            <td><center><?php echo $no++ ?></center></td>
                            <td><center><?php echo $data['pertanyaan'] ?></center></td>
                            <td>
                             <center>
                             </a>
                             <a href="?page=faq/detail&id_faq=<?php echo $data['id_faq'] ?>" class="btn btn-warning" >
                                <i class="fa fa-info-circle"></i>
                            </a>
                        </center>
                    </td>
                </tr>
                
            <?php } ?>

        </tbody>
    </table>
</div>
</div>
</div>
</div>
