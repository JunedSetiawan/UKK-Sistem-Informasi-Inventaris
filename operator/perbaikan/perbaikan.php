<?php
$data_idjurusan = $_SESSION["ses_idjurusan"];
$data_level = $_SESSION["ses_level"];
$ddd = mysqli_query($koneksi, "SELECT * FROM perbaikan");
$aaa = mysqli_fetch_array($ddd);
error_reporting(0);
?>
<div class="col-12">
  <h2 class="mb-2 page-title">Data Perbaikan Barang Inventaris</h2>
  <p class="card-text">Pendataan Barang Perbaikan | Inventaris</p>
  <div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr class="text-center">
                <th>No</th>
                <th>ID</th>
                <th>Kode Inventaris</th>
                <th>Nama Pengaju Perbaikan</th>
                <th>Tanggal Perbaikan</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT perbaikan.*,inventaris.*, admin.nama FROM perbaikan
              INNER JOIN admin ON admin.id_admin = perbaikan.id_admin
              INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris WHERE inventaris.kode_jurusan = $data_idjurusan");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr align="center">
                  <td align="center">
                    <?= $no++; ?>
                  </td>
                  <td><?= $data['id_perbaikan'] ?></td>
                  <td><?= $data['kode_inventaris'] ?></td>
                  <td>Admin</td>
                  <td><?= $data['tanggal_perbaikan'] ?></td>
                  <td align="center"><?php if ($data['tanggal_selesai'] == 0000 - 00 - 00) {
                                        echo "-";
                                      } else {
                                        echo $data['tanggal_selesai'];
                                      } ?>

                  </td>
                  <td><?php if ($data['status_perbaikan'] == 1) {
                        echo "<span class='dot dot-lg bg-danger mr-2'></span>Menunggu Persetujuan";
                      } elseif ($data['status_perbaikan'] == 2) {
                        echo "<span class='dot dot-lg bg-warning mr-2'></span>Proses";
                      } else {
                        echo "<span class='dot dot-lg bg-success mr-2'></span>Selesai";
                      } ?>
                  </td>
                </tr>
              <?php } ?>
              <?php
              if ($aaa['id_operator'] !== 0) {
                $sql = $koneksi->query("SELECT perbaikan.*,inventaris.*, operator.nama_oper FROM perbaikan
              INNER JOIN operator ON operator.id_operator = perbaikan.id_operator
              INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris WHERE inventaris.kode_jurusan = $data_idjurusan");
                while ($data = $sql->fetch_assoc()) {
              ?>
                  <tr align="center">
                    <td align="center">
                      <?= $no++; ?>
                    </td>
                    <td><?= $data['id_perbaikan'] ?></td>
                    <td><?= $data['kode_inventaris'] ?></td>
                    <td><?= $data['nama_oper'] ?></td>
                    <td><?= $data['tanggal_perbaikan'] ?></td>
                    <td align="center"><?php if ($data['tanggal_selesai'] == 0000 - 00 - 00) {
                                          echo "-";
                                        } else {
                                          echo $data['tanggal_selesai'];
                                        } ?>

                    </td>
                    <td><?php if ($data['status_perbaikan'] == 1) {
                          echo "<span class='dot dot-lg bg-danger mr-2'></span>Menunggu Persetujuan";
                        } elseif ($data['status_perbaikan'] == 2) {
                          echo "<span class='dot dot-lg bg-warning mr-2'></span>Proses";
                        } else {
                          echo "<span class='dot dot-lg bg-success mr-2'></span>Selesai";
                        } ?>
                    </td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- simple table -->
  </div> <!-- end section -->
</div> <!-- .col-12 -->