<?php
$data_id = $_SESSION["ses_id"];
$kode = base64_decode($_GET['kode']);
if (isset($kode)) {
  $sql_cek = "SELECT * FROM inventaris WHERE kode_inventaris='" . $kode . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="row justify-content-center">
  <div class="col-md-11">
    <div class="card shadow">
      <div class="card-header">
        <strong class="card-title">Edit Data Inventaris</strong>
      </div>
      <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data_cek['id_inventaris'] ?>">
          <input type="hidden" name="nomor" value="<?= $data_cek['nomor'] ?>">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Barang :</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $data_cek['nama'] ?>" id="inputEmail3" placeholder="Nama Barang" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Kondisi :</label>
            <div class="col-sm-9">
              <select class='form-control select2' id='validationSelect6' name='kondisi'>
                <option value='Baik'>Baik</option>
                <option value='Rusak'>Rusak</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="disabledInput" class="col-sm-3 col-form-label">Jumlah :</label>
            <div class="col-sm-9">
              <input class="form-control" id="disabledInput" type="number" min="1" max="999" placeholder="Jumlah" name="jumlah" required value="<?= $data_cek['jumlah'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan :</label>
            <div class="col-sm-9">
              <input type="text" name="keterangan" class="form-control" id="inputPassword3" placeholder="Keterang" required value="<?= $data_cek['keterangan'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="date-input1" class="col-sm-3 col-form-label">Tanggal Register</label>
            <div class="col-sm-9">
              <input type="date" name="tgl_regis" class="form-control" id="date-input1" value="<?= date('Y-m-d'); ?>" aria-describedby="button-addon2" name="tgl_regis">
            </div>
          </div>
          <div class="form-group row">
            <label for="date-input1" class="col-sm-3 col-form-label">Tahun Anggaran :</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="validationCustom02" name="thn_anggaran" value="<?= date('Y') ?>" required readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Dana :</label>
            <div class="col-sm-9">
              <?php
              $dana = mysqli_query($koneksi, "SELECT * FROM dana");
              echo "<select class='form-control select2' id='validationSelect1' name='dana'>";
              while ($row = mysqli_fetch_array($dana)) {
                echo "<option value='" . $row["id_dana"] . "'>" . $row["nama_dana"] . "</option>";
              }
              echo "</select>";
              ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis :</label>
            <div class="col-sm-9">
              <?php
              $jenis = mysqli_query($koneksi, "SELECT * FROM jenis");
              echo "<select class='form-control select2' id='validationSelect2' name='jenis'>";
              while ($row = mysqli_fetch_array($jenis)) {
                echo "<option value='" . $row["kode_jenis"] . "'>" . $row["nama_jenis"] . " - " . $row['keterangan'] . "</option>";
              }
              echo "</select>";
              ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Jurusan :</label>
            <div class="col-sm-9">
              <?php
              $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
              echo "<select class='form-control select2' id='validationSelect3' name='jurusan'>";
              while ($row = mysqli_fetch_array($jurusan)) {
                echo "<option value='" . $row["kode_jurusan"] . "'>" . $row["id_jurusan"] . " - " . $row['nama_jurusan'] . "</option>";
              }
              echo "</select>";
              ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Ruang :</label>
            <div class="col-sm-9">
              <?php
              $ruang = mysqli_query($koneksi, "SELECT * FROM ruang");
              echo "<select class='form-control select2' id='validationSelect4' name='ruang'>";
              while ($row = mysqli_fetch_array($ruang)) {
                echo "<option value='" . $row["id_ruang"] . "'>" . $row["kode_ruang"] . " - " . $row['nama_ruang'] . "</option>";
              }
              echo "</select>";
              ?>
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
      $no_invent = $_POST['jurusan'] . "." . $_POST['jenis'] . "." . $_POST['dana'] . "." . $_POST['thn_anggaran'] . "." . $_POST['nomor'];

      $sql_ubah = "UPDATE inventaris SET
		nama='" . $_POST['nama'] . "',
		kondisi='" . $_POST['kondisi'] . "',
		keterangan='" . $_POST['keterangan'] . "',
		jumlah='" . $_POST['jumlah'] . "',		
		tanggal_register='" . $_POST['tgl_regis'] . "',				
		tahun_anggaran='" . $_POST['thn_anggaran'] . "',
    kode_inventaris='" . $no_invent . "',
    id_dana='" . $_POST['dana'] . "',
    kode_jenis='" . $_POST['jenis'] . "',
    kode_jurusan='" . $_POST['jurusan'] . "',
    id_ruang='" . $_POST['ruang'] . "',
    id_level='" . $data_id . "'			
      WHERE id_inventaris='" . $_POST['id'] . "'";
      $query_ubah = mysqli_query($koneksi, $sql_ubah);

      if ($query_ubah) {
        mysqli_query($koneksi, "INSERT INTO aktivitas_log (tanggal_log,ip,agent,browser,status,id_level)VALUES('$currentDateTime','$ip','$agent','$browser','$update','$data_level')");
        echo "<script>  
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-invent';
            }
        })</script>";
      } else {
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=edit-invent';
            }
        })</script>";
      }
    }
