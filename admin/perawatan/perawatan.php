
<div class="col-12">
  <h2 class="mb-2 page-title">Data Perawatan Barang Inventaris</h2>
  <p class="card-text">Pendataan Barang Perawatan | Inventaris</p>
  <div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr>
                <th>Perbaikan</th>
                <th>No</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kode Inventaris</th>
                <th>Jumlah</th>
                <th>Tanggal Perawatan</th>
                <th>Kondisi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT perawatan.*,inventaris.nama, inventaris.kode_inventaris , inventaris.jumlah,inventaris.kondisi FROM perawatan
              INNER JOIN inventaris ON inventaris.id_inventaris = perawatan.id_inventaris");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr>
                  <td>
                  <?php if ($data['kondisi'] == 'Rusak') { ?>
                  <a href="?page=pengajuan-perbaikan&kode=<?php echo base64_encode($data['id_perawatan']); ?>&kde=<?= base64_encode($data['id_inventaris']) ?>" class="btn mb-2 btn-primary">Perbaiki</a>
                  <?php } ?>
                  </td>
                  <td align="center">
                    <?= $no++; ?>
                  </td>
                  <td name="id_perw"><?= $data['id_perawatan'] ?></td>
                  <td><?= $data['nama'] ?></td>
                  <td><?= $data['kode_inventaris'] ?></td>
                  <td><?= $data['jumlah'] ?></td>
                  <td><?= $data['tanggal_perawatan'] ?></td>
                  <td><?= $data['kondisi'] ?></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- simple table -->
  </div> <!-- end section -->
</div> <!-- .col-12 -->