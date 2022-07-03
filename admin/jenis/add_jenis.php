<?php 
$data_id = $_SESSION["ses_id"];
 ?>
<div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Tambah Data Jenis Inventaris</strong>
                    </div>
                    <div class="card-body">
                      <form action="" method="POST" class="needs-validation" novalidate>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Nama Jenis</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="nama">
                            <div class="invalid-feedback"> Nama Jenis Tidak Boleh Kosong ! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Kode Jenis</label>
                            <div class="input-group">
                              <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="kondisi">
                              <div class="invalid-feedback"> Mohon Masukkan Kondisi Barang ! </div>
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="validationCustom02">Keterangan</label>
                            <input type="text" class="form-control" id="validationCustom02" name="keterangan" required>
							<div class="invalid-feedback"> Keterangan Tidak Boleh Kosong ! </div>
                          </div>
						                        
                        <button class="btn btn-primary" name="tambah" type="submit" onclick="return confirm('Ingin Menambahkan Data ?')">Tambah Jenis</button>
						
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
		if (isset($_POST['tambah'])){
			//mulai proses simpan data
			$sql_simpan = "INSERT INTO jenis (id_jenis, nama_jenis,kode_jenis, keterangan_jenis) VALUES (
			'".NULL."',
			'".$_POST['nama']."',
			'".$_POST['kondisi']."',
			'".$_POST['keterangan']."');";
			$query_simpan = mysqli_query($koneksi, $sql_simpan);
			mysqli_close($koneksi);

		if ($query_simpan) {
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=data-jenis';
			}
		})
		  </script>";
		} else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-jenis';
			}
		})</script>"
		;
		}}
		//selesai proses simpan data