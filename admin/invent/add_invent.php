<?php
$data_id = $_SESSION["ses_id"];
?>
<div class="row justify-content-center">
	<div class="col-md-11">
		<div class="card shadow mb-4">
			<div class="card-header">
				<strong class="card-title">Tambah Data Barang Inventaris</strong>
			</div>
			<div class="card-body">
				<form action="" method="POST" class="needs-validation" novalidate>
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="exampleInputEmail1">Nama Barang</label>
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="nama">
							<div class="invalid-feedback"> Nama Barang Tidak Boleh Kosong ! </div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustomUsername">Kondisi</label>
							<div class="input-group">
								<select class='form-control select2' id='validationSelect6' name='kondisi'>
									<option value='Baik'>Baik</option>
									<option value='Rusak'>Rusak</option>
								</select>
								<div class="invalid-feedback"> Mohon Masukkan Kondisi Barang ! </div>
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">Jumlah</label>
							<input type="number" min="1" max="999" class="form-control" id="validationCustom01" required name="jumlah">
							<div class="invalid-feedback"> Masukkan Jumlah ! </div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationCustom02">Keterangan</label>
							<input type="text" class="form-control" id="validationCustom02" name="keterangan">
						</div>
						<div class="col-md-3 mb-3">
							<label for="date-input1">Tanggal Register</label>
							<div class="input-group">
								<input type="date" class="form-control" id="date-input1" value="<?= date('Y-m-d'); ?>" aria-describedby="button-addon2" name="tgl_regis">
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationCustom02">Tahun Anggaran</label>
							<input type="text" class="form-control" id="validationCustom02" name="thn_anggaran" value="<?= date('Y') ?>" required readonly>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-3 mb-3">
							<label for="validationCustom04">Dana</label>
							<?php
							$dana = mysqli_query($koneksi, "SELECT * FROM dana");
							echo "<select class='form-control select2' id='validationSelect1' name='dana'>";
							while ($row = mysqli_fetch_array($dana)) {
								echo "<option value='" . $row["id_dana"] . "'>" . $row["nama_dana"] . "</option>";
							}
							echo "</select>";
							?>
							<div class="invalid-feedback"> Please select a valid state. </div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationCustom04">Jenis Barang</label>
							<?php
							$jenis = mysqli_query($koneksi, "SELECT * FROM jenis");
							echo "<select class='form-control select2' id='validationSelect2' name='jenis'>";
							while ($row = mysqli_fetch_array($jenis)) {
								echo "<option value='" . $row["kode_jenis"] . "'>" . $row["nama_jenis"] . " - " . $row['keterangan_jenis'] . "</option>";
							}
							echo "</select>";
							?>
							<div class="invalid-feedback"> Please select a valid state. </div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationCustom04">Jurusan</label>
							<?php
							$jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
							echo "<select class='form-control select2' id='validationSelect3' name='jurusan'>";
							while ($row = mysqli_fetch_array($jurusan)) {
								echo "<option value='" . $row["kode_jurusan"] . "'>" . $row["id_jurusan"] . " - " . $row['nama_jurusan'] . "</option>";
							}
							echo "</select>";
							?>
							<div class="invalid-feedback"> Please select a valid state. </div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="validationCustom04">Ruang</label>
							<?php
							$ruang = mysqli_query($koneksi, "SELECT * FROM ruang");
							echo "<select class='form-control select2' id='validationSelect4' name='ruang'>";
							while ($row = mysqli_fetch_array($ruang)) {
								echo "<option value='" . $row["id_ruang"] . "'>" . $row["kode_ruang"] . " - " . $row['nama_ruang'] . "</option>";
							}
							echo "</select>";
							?>
							<div class="invalid-feedback"> Please select a valid state. </div>
						</div>

						<button class="btn btn-primary" name="tambah" type="submit" onclick="return confirm('Ingin Menambahkan Data ?')">Tambah Barang</button>

					</div>
				</form>
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
	</div> <!-- /.col -->
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>

<?php
if (isset($_POST['tambah'])) {
	// generate random number
	$random = rand(100, 999);
	$nama = htmlspecialchars($_POST['nama']);
	$kondisi = htmlspecialchars($_POST['kondisi']);
	$ket = htmlspecialchars($_POST['keterangan']);
	$jumlah = htmlspecialchars($_POST['jumlah']);
	$tgl_regis =htmlspecialchars($_POST['tgl_regis']);
	$thn_anggar = htmlspecialchars($_POST['thn_anggaran']);
	$dana = htmlspecialchars($_POST['dana']);
	$jenis = htmlspecialchars($_POST['jenis']);
	$jurusan = htmlspecialchars($_POST['jurusan']);
	$ruang = htmlspecialchars($_POST['ruang']);
	//membuat kode/nomor inventartis
	$no_invent = $jurusan . "." . $jenis . "." . $dana . "." . $thn_anggar . "." . $random;
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO inventaris (id_inventaris, nama, kondisi, keterangan, jumlah, tanggal_register, tahun_anggaran, kode_inventaris, nomor, id_dana, kode_jenis, kode_jurusan, id_ruang, id_level,stat) VALUES (
			'" . NULL . "',
			'" . $nama . "',
			'" . $kondisi . "',
			'" . $ket . "',
			'" . $jumlah . "',
			'" . $_POST['tgl_regis'] . "',
			'" . $_POST['thn_anggaran'] . "',
			'" . $no_invent . "',
			'" . $random . "',
			'" . $_POST['dana'] . "',
			'" . $_POST['jenis'] . "',
			'" . $_POST['jurusan'] . "',
			'" . $_POST['ruang'] . "',
			'" . $data_id . "',
			'" . NULL . "');";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	
	if ($query_simpan) {
		mysqli_query($koneksi, "INSERT INTO aktivitas_log (tanggal_log,ip,agent,browser,status,id_level)VALUES('$currentDateTime','$ip','$agent','$browser','$tambah','$data_level')");
		mysqli_close($koneksi);
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-invent';
			}
		})
		  </script>";
	} else {
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-invent';
			}
		})</script>";
	}
}
		//selesai proses simpan data