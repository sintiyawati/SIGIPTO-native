<?php 
$mysqlS = mysqli_query($koneksi, "SELECT * FROM tempat_olahraga WHERE kode_tempat='$_GET[kd]'");
$dE = mysqli_fetch_array($mysqlS);
$id_tempat = $dE['id_tempat'];
$kode_tempat = $dE['kode_tempat'];
?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h3 class="text-themecolor">Tempat Olahraga</h3>
	</div>
	<div class="col-md-7 align-self-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">Tempat Olahraga</li>
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
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="">
						<h4 class="card-title">Edit Gambar Tempat Olahraga</h4>
						<!-- /.box-header -->
						<div class="table-responsive m-t-40">
							<table id="myTable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th><center>No</center></th>
										<th><center>Gambar</center></th>
										<th><center>Pilih</center></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$no = 1;
									$mysql = mysqli_query($koneksi, "SELECT * FROM gambar_tempat WHERE kode_tempat='$_GET[kd]'");
									while ($d = mysqli_fetch_array($mysql)) {
										?>
										<tr>
											<td><center><?php echo $no++ ?></center></td>
											<td><center><img src="../admin/tempat_olahraga/gambar/<?php echo $d['gambar'] ?>" style="width:150px;height:150px"></center></td>
											<td><center>
												<label class="custom-control custom-checkbox">
													<input type="checkbox" name="id_gambar[]" value="<?php echo $d['id_gambar'] ?>" class="custom-control-input"><span class="custom-control-label"></span></label>
												</center>
											</td>
										</tr>

									<?php } ?>
								</table>
							</div>
							
							<div class="text-xs-right">
								<button type="submit" name="update" class="btn btn-info">Pilih</button>
								<a href="?page=tempat_olahraga/edit&kode_tempat=<?php echo $kode_tempat ?>" type="reset" class="btn btn-inverse">Kembali</a>
							</div>

							<!-- /.box -->
						</form>
					</div>
				</div>
			</div>

			<!-- /.col -->
			<?php 

			if (isset($_POST['update'])) {
				?>
				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="" enctype="multipart/form-data">
								<input type="hidden" name="kode_tempat" value="<?php echo $kode_tempat ?>">
								<?php 

								$idGambar = $_POST['id_gambar'];
								$count = count($idGambar);

								for ($i=0; $i < $count; $i++) { 

									$ambilId = $idGambar[$i];
									$ambilSql = mysqli_query($koneksi, "SELECT * FROM gambar_tempat WHERE id_gambar='$ambilId'");
									while ($tampilSql = mysqli_fetch_array($ambilSql)) { ?>
										<input type="hidden" name="id_gambar[]" value="<?php echo $tampilSql['id_gambar']; ?>" class="form-control">
										<label>Update Id Gambar <?php echo $tampilSql['id_gambar']; ?></label>
										<input type="file" name="gambar[]" class="form-control" required>
										<br>
									<?php	} }  ?>
								</div>
								<div class="text-xs-right" style="padding:20px;">
									<button type="submit" name="simpan" class="btn btn-info">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>


		<?php 

		if (isset($_POST['simpan'])) {

			$kode_tempat = $_POST['kode_tempat'];
			$id_gambar = $_POST['id_gambar'];
			$namaGambar = $_FILES['gambar']['name'];
			$tempatGambar = $_FILES['gambar']['tmp_name'];

			$pilihanID = count($id_gambar);

			for ($x=0; $x < $pilihanID; $x++) { 
			
			$ambilId = $id_gambar[$i];
				$u = mysqli_query($koneksi, "SELECT * FROM gambar_tempat WHERE id_gambar='$ambilId'");
		    $us=mysqli_fetch_array($u);
		    file_exists("../admin/tempat_olahraga/gambar/".$us['gambar']);
		    unlink("../admin/tempat_olahraga/gambar/".$us['gambar']);
				move_uploaded_file($tempatGambar[$x], "tempat_olahraga/gambar/".$namaGambar[$x]);

				$kk = mysqli_query($koneksi, "UPDATE gambar_tempat SET gambar='$namaGambar[$x]' WHERE id_gambar='$id_gambar[$x]'");
			}

			if ($kk) {

				echo "<script>alert('Gambar Berhasil Diedit')</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/edit&kode_tempat=$kode_tempat'></script>";
			}else{
				echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=tempat_olahraga/edit&kode_tempat=$kode_tempat'></script>";
			}

		}


		?>


