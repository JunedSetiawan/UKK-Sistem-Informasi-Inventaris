<?php
$ddd = mysqli_query($koneksi, "SELECT * FROM perbaikan");
$aaa = mysqli_fetch_array($ddd);
error_reporting(0);
?>
<div class="col-12">
  <h2 class="mb-2 page-title">Data Perbaikan Persetujuan </h2>
  <p class="card-text">Pendataan Barang Persetujuan | Inventaris</p>
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
                <th>Setuju</th>
                <th>ID</th>
                <th>Kode Inventaris</th>
                <th>Nama</th>
                <th>Tanggal Perbaikan</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT perbaikan.*,inventaris.kode_inventaris, admin.nama FROM perbaikan
              INNER JOIN admin ON admin.id_admin = perbaikan.id_admin
              INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr align="center">
                  <td align="center">
                    <?= $no++; ?>
                  </td>
                  <td>
                    <?php if ($data['status_perbaikan'] == 1) : ?>
                      <a href="?page=persetujuan&kode=<?php echo base64_encode($data['id_perbaikan']); ?>&kde=<?= base64_encode($data['id_inventaris']) ?>" class="btn mb-2 btn-warning">Setujui</a>
                    <?php endif ?>
                    <?php if ($data['status_perbaikan'] == 2) : ?>
                      <a href="?page=selesai&kode=<?php echo base64_encode($data['id_perbaikan']); ?>&kde=<?= base64_encode($data['id_inventaris']) ?>" class="btn mb-2 btn-info">Selesai</a>
                    <?php endif ?>
                  </td>
                  <td><?= $data['id_perbaikan'] ?></td>
                  <td><?= $data['kode_inventaris'] ?></td>
                  <td>admin</td>
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
                $sql = $koneksi->query("SELECT perbaikan.*,inventaris.kode_inventaris, operator.nama_oper FROM perbaikan
              INNER JOIN operator ON operator.id_operator = perbaikan.id_operator
              INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris");
                while ($data = $sql->fetch_assoc()) {
              ?>
                  <tr align="center">
                    <td align="center">
                      <?= $no++; ?>
                    </td>
                    <td>
                      <?php if ($data['status_perbaikan'] == 1) : ?>
                        <a href="?page=persetujuan&kode=<?php echo base64_encode($data['id_perbaikan']); ?>&kde=<?= base64_encode($data['id_inventaris']) ?>" class="btn mb-2 btn-warning">Setujui</a>
                      <?php endif ?>
                      <?php if ($data['status_perbaikan'] == 2) : ?>
                        <a href="?page=selesai&kode=<?php echo base64_encode($data['id_perbaikan']); ?>&kde=<?= base64_encode($data['id_inventaris']) ?>" class="btn mb-2 btn-info">Selesai</a>
                      <?php endif ?>
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