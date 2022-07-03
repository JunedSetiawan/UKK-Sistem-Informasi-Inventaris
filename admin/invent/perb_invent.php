<?php
error_reporting(0);

?>
<div class="col-12">
  <h2 class="mb-2 page-title">Data Inventaris</h2>
  <p class="card-text">Pendataan Barang | Inventaris</p>
  <form action="" method="post">
    <input type="submit" name="sub" class="btn mb-2 btn-primary" value="Tambah Barang Perawatan">

    <p></p>
    <div class="row my-4">
      <!-- Small table -->
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <!-- table -->
            <table class="table datatables" id="dataTable-1">
              <thead>
                <tr>
                  <th class="text-center">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="selectAll" class="custom-control-input mb-3 ml-3">
                      <label class="custom-control-label" for="selectAll">Rawat</label>
                  </th>
                  <th>No</th>
                  <th class="text-center">Action</th>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Kondisi</th>
                  <th>Jumlah</th>
                  <th>Tanggal Register</th>
                  <th>Tahun Anggaran</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $nomor = 1;   
                $sql = $koneksi->query("SELECT inventaris.*, dana.nama_dana,jenis.*,jurusan.nama_jurusan,ruang.*, level.role FROM inventaris
              INNER JOIN dana ON dana.id_dana = inventaris.id_dana
              INNER JOIN jenis ON jenis.kode_jenis = inventaris.kode_jenis
              INNER JOIN jurusan ON jurusan.kode_jurusan = inventaris.kode_jurusan
              INNER JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
              INNER JOIN level ON level.id_level = inventaris.id_level");
                while ($data = $sql->fetch_assoc()) {
                ?>
                  <tr>
                    <td align="center">
                    <?php if ($data['stat'] == 0) { ?>
                        <a id="terima" class="btn mb-2 btn-primary">Terima</a>
                      <?php }else{ ?>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input chk" id="all<?= $no ?>" name="check[]" value="<?= $data['id_inventaris'] ?>">
                        <label class="custom-control-label" for="all<?= $no++ ?>"></label>
                      </div>
                      <?php } ?>
                    </td>
  </form>
  <td align="center">
    <?= $nomor++; ?>
  </td>
  <td align="center">

    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#detail_invent<?= $data['id_inventaris']; ?>"><span class="fe fe-22 fe-eye"></span></a>

  </td>

  <div class="modal fade bd-example" id="detail_invent<?= $data['id_inventaris']; ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="verticalModalTitle">Detail Data Inventaris</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Kode Inventaris :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['kode_inventaris'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Nama Barang :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['nama'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Kondisi :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['kondisi'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Jumlah :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['jumlah'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Keterangan :</label>
            <div class="col-sm-8">
              <textarea disabled name="nama" class="form-control-plaintext border-bottom" rows="4"><?= $data['keterangan'] ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Tanggal Register :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['tanggal_register'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Tahun Anggaran :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['tahun_anggaran'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Nomor Barang :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['nomor'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Dana :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['nama_dana'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?php echo
                                                                                              $data['kode_jenis'] . " - " . $data['nama_jenis'] . " - " . $data['keterangan_jenis'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Jurusan :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['kode_jurusan'] . " - " . $data['nama_jurusan'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Ruang :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['kode_ruang'] . " - " . $data['nama_ruang'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-4 col-form-label">Job Desk :</label>
            <div class="col-sm-8">
              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['role'] ?>">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <td><?= $data['id_inventaris'] ?></td>
  <td><?= $data['nama'] ?></td>
  <td><?= $data['kondisi'] ?></td>
  <td><?= $data['jumlah'] ?></td>
  <td><?= $data['tanggal_register'] ?></td>
  <td><?= $data['tahun_anggaran'] ?></td>

  </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div> <!-- simple table -->
</div> <!-- end section -->

<h6><span class="foo bg-warning" style="color: black;"></span></h6>
</div> <!-- .col-12 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  var terima = document.querySelector('#terima');
  terima.addEventListener('click', function(){
    Swal.fire({title: 'Hanya Operator Yang Bisa Menerima Barang',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value) {window.location='index.php?page=perb-invent'
      ;}})
  })
</script>
<script>
  $('#selectAll').click(function(event) {
    if (this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
        this.checked = true;
      });
    } else {
      $(':checkbox').each(function() {
        this.checked = false;
      });
    }
  });
</script>

<?php
$date = date("Y-m-d");
if (isset($_POST['sub'])) {
  $checkbox1 = $_POST['check'];
  $dd = "";
  foreach ($checkbox1 as $chk1) {
    $query_cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM perawatan WHERE id_inventaris='$chk1'"));

    if ($query_cek > 0) {
      echo "<script>Swal.fire({title: 'Barang Sudah Masuk Perawatan',text: '',icon: 'info',confirmButtonText: 'OK'
      }).then((result) => {if (result.value) {window.location='index.php?page=perawatan'
      ;}})</script>";
    } else {
      $in_ch = mysqli_query($koneksi, "INSERT INTO perawatan (id_perawatan, id_inventaris, tanggal_perawatan) values (NULL,'$chk1','$date')");
    }
  }
  if ($in_ch) {
    echo "<script> Swal.fire({title: 'Data Berhasil Masuk Ke Perawatan',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value) {window.location='index.php?page=perawatan'
    ;}})</script>";
  } else {
    echo '<script>alert("Maaf Terjadi Kesalahan !");
      var fe = document.querySelector(".foo");
      fe.textContent = "NB : Untuk Menambahkan Data Barang ke Perawatan, Silahkan Checklist Terlebih Dahulu Pada Kolom Tabel Sebelah Kiri (Rawat)";
      </script>';
  }
}
?>