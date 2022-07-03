<?php
    $data_id = $_SESSION["ses_id"];
    $kode = base64_decode($_GET['kode']);
    if(isset($kode)){
        $sql_cek = "SELECT * FROM ruang WHERE kode_ruang='".$kode."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row justify-content-center"> 
<div class="col-md-11">
<div class="card shadow">
                  <div class="card-header">
                    <strong class="card-title">Edit Ruang Inventaris</strong>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data_cek['id_ruang'] ?>">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Ruang :</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama" class="form-control" value="<?= $data_cek['nama_ruang'] ?>" id="inputEmail3" placeholder="Nama Barang" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kode Ruang :</label>
                        <div class="col-sm-9">
                          <input type="text" name="kondisi" class="form-control" value="<?= $data_cek['kode_ruang'] ?>"id="inputPassword3" placeholder="Kondisi" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan :</label>
                        <div class="col-sm-9">
                          <input type="text" name="keterangan" class="form-control" id="inputPassword3" placeholder="Keterang" required value="<?= $data_cek['keterangan_ruang'] ?>" >
                        </div>
                      </div>
                    
                      <div class="form-group mb-2">
                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Ingin Mengubah Data ?')">Edit</button>
                      </div>
                    </form>
                  </div>
                </div>
                </body>
			  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			  </html>


<?php 
if (isset ($_POST['submit'])){
    $sql_ubah = "UPDATE ruang SET
		nama_ruang='".$_POST['nama']."',
		kode_ruang='".$_POST['kondisi']."',
		keterangan_ruang='".$_POST['keterangan']."'		
      WHERE id_ruang='".$_POST['id']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
	
    if ($query_ubah) {
        echo "<script>  
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-ruang';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-ruang';
            }
        })</script>";
    }
}