<?php
$perawatan = mysqli_query($koneksi, "SELECT COUNT(id_perawatan) AS perawatan FROM perawatan");
$pending = mysqli_query($koneksi, "SELECT COUNT(status_perbaikan) AS pending FROM perbaikan WHERE perbaikan.status_perbaikan = 1");
$proses = mysqli_query($koneksi, "SELECT COUNT(status_perbaikan) AS proses FROM perbaikan WHERE perbaikan.status_perbaikan = 2");
$finish = mysqli_query($koneksi, "SELECT COUNT(status_perbaikan) AS finish FROM perbaikan WHERE perbaikan.status_perbaikan = 3");

$perw = mysqli_fetch_array($perawatan);
$pend = mysqli_fetch_array($pending);
$pros = mysqli_fetch_array($proses);
$fin = mysqli_fetch_array($finish);
?>
<div class="row justify-content-center">
  <div class="col-12">
    <div class="row align-items-center mb-2">
      <div class="col">
        <h2 class="h5 page-title">Welcome! <?php echo $data_nama; ?></h2>
      </div>
      <div class="col-auto">
        <form class="form-inline">
          <div class="form-group d-none d-lg-inline">
            <span class="small"><?= date('F d, Y') ?></span>
          </div>
        </form>
      </div>
    </div>
    <!-- widgets -->
    <div class="row my-4">
      <div class="col-md-3 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <span class="h2 mb-0"><?= $perw['perawatan']; ?> </span>
                <p class="small text-muted mb-0">Barang Inventaris Perawatan</p>
                <span class="badge badge-pill badge-success"></span>
              </div>
              <div class="col-auto">
                <i class="fe fe-32 fe-shopping-bag text-muted mb-0"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <span class="h2 mb-0"><?= $pend['pending']; ?> </span> <span class='dot dot-lg bg-danger mr-2'></span>
                <p class="small text-muted mb-0">Perbaikan Inventaris Menunggu Persutujuan</p>
                <span class="badge badge-pill badge-success"></span>
              </div>
              <div class="col-auto">
                <i class="fe fe-32 fe-alert-circle text-muted mb-0"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <span class="h2 mb-0"><?= $pros['proses']; ?> </span> <span class='dot dot-lg bg-warning mr-2'></span>
                <p class="small text-muted mb-0">Perbaikan Inventaris Dalam Proses</p>
                <span class="badge badge-pill badge-success"></span>
              </div>
              <div class="col-auto">
                <span class="fe fe-32 fe-refresh-cw text-muted mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <span class="h2 mb-0"><?= $fin['finish']; ?></span> </span> <span class='dot dot-lg bg-success mr-2'></span>
                <p class="small text-muted mb-0">Inventaris Selesai Di Perbaiki</p>
                <span class="badge badge-pill badge-warning"></span>
              </div>
              <div class="col-auto">
                <span class="fe fe-32 fe-check-circle text-muted mb-0"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end section -->
    <h2 class="h3 mb-5 page-title">Profile</h2>
    <div class="row mt-5 align-items-center">
      <div class="col-md-3 text-center mb-5">
        <div class="avatar avatar-xl">
          <img src="../assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
        </div>
      </div>
      <div class="col">
        <div class="row align-items-center">
          <div class="col-md-7">
            <h4 class="mb-1"><?php echo $data_nama; ?> | Jurusan : <?= $data_namajurusan; ?></h4>
            <p class="small mb-3"><span class="badge badge-dark">Indonesia, Ponorogo</span></p>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md-4">
            <p class="text-muted mb-0">Operator, <?= $data_ket; ?></p>
            <p class="text-muted"><?= $data_hp; ?></p>
          </div>
          <div class="col">
            <p class="small mb-0 text-muted">SMK NEGERI 1 JENANGAN</p>
            <p class="small mb-0 text-muted">Kabupaten PONOROGO</p>
          </div>
        </div>
      </div>
    </div>
    <h5 class="mb-3">Berita Penerimaan Inventaris Terbaru <span class="fe fe-20 fe-alert-octagon
 text-muted mb-0"> </span></h5>
    <table class="table table-borderless table-striped">
      <thead>
        <tr role="row">
          <th>Nomor</th>
          <th>Tanggal</th>
          <th class="text-center">Berita Penerimaan</th>
          <th>Nama Operator</th>
          <th>Nama Inventaris</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sos = mysqli_query($koneksi, "SELECT berita.*, operator.nama_oper,inventaris.nama FROM berita
          INNER JOIN operator ON operator.id_operator = berita.id_operator
          INNER JOIN inventaris ON inventaris.id_inventaris = berita.id_Inventaris WHERE berita.id_operator = $data_id ORDER BY id DESC LIMIT 5");
        while ($data = mysqli_fetch_array($sos)) {
        ?>
          <tr>
            <th scope="col"><?= $no++; ?></th>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $data['berita']; ?></td>
            <td><?= $data['nama_oper']; ?></td>
            <td><?= $data['nama']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div> <!-- /.col -->
</div> <!-- .row -->