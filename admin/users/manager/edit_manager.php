<?php
$data_id = $_SESSION["ses_id"];
$kode = base64_decode($_GET['kode']);
if (isset($kode)) {
  $sql_cek = "SELECT * FROM admin WHERE id_admin='" . $kode . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
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
          <input type="hidden" name="id" value="<?= $data_cek['id_admin'] ?>">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Manager :</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $data_cek['nama'] ?>" id="inputEmail3" placeholder="Nama Barang" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Username :</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" value="<?= $data_cek['username'] ?>" id="inputPassword3" placeholder="Kondisi" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Nomor Hp :</label>
            <div class="col-sm-9">
              <input type="text" name="no_hp" class="form-control" id="inputPassword3" placeholder="Keterang" required value="<?= $data_cek['no_hp'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan :</label>
            <div class="col-sm-9">
              <input type="text" name="keterangan" class="form-control" id="inputPassword3" placeholder="Keterang" required value="<?= $data_cek['keterangan'] ?>">
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
    if (isset($_POST['submit'])) {
      $sql_ubah = "UPDATE admin SET
		nama ='" . $_POST['nama'] . "',
		username='" . $_POST['username'] . "',	
		no_hp='" . $_POST['no_hp'] . "',		
		keterangan='" . $_POST['keterangan'] . "'		
      WHERE id_admin='" . $_POST['id'] . "'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);

      if ($query_ubah) {
        echo "<script>  
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-manager';
            }
        })</script>";
      } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-manager';
            }
        })</script>";
      }
    }
