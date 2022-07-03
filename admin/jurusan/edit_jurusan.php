<?php
    $data_id = $_SESSION["ses_id"];
    $kode = base64_decode($_GET['kode']);
    if(isset($kode)){
        $sql_cek = "SELECT * FROM jurusan WHERE kode_jurusan='".$kode."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="row justify-content-center"> 
<div class="col-md-11">
<div class="card shadow">
                  <div class="card-header">
                    <strong class="card-title">Edit Jenis Inventaris</strong>
                  </div>
                  <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data_cek['id_jurusan'] ?>">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jurusan :</label>
                        <div class="col-sm-9">
                          <input type="text" name="nama" class="form-control" value="<?= $data_cek['nama_jurusan'] ?>" id="inputEmail3" placeholder="Nama Barang" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Kode Jurusan :</label>
                        <div class="col-sm-9">
                          <input type="text" name="kondisi" class="form-control" value="<?= $data_cek['kode_jurusan'] ?>"id="inputPassword3" placeholder="Kondisi" required>
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
    $sql_ubah = "UPDATE jurusan SET
		nama_jurusan='".$_POST['nama']."',
		kode_jurusan='".$_POST['kondisi']."'	
    WHERE id_jurusan='".$_POST['id']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
	
    if ($query_ubah) {
        echo "<script>  
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-jurusan';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-jurusan';
            }
        })</script>";
    }
}