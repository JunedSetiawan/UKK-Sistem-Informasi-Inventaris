<div class="col-12">
  <h2 class="mb-2 page-title">Ruang Inventaris</h2>
  <p class="card-text">Ruang Barang | Inventaris</p>
  <a href="?page=add-ruang" class="btn mb-2 btn-primary">Tambah Ruang Inventaris Barang</a>
  <div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-body">
          <!-- table -->
          <table class="table datatables" id="dataTable-1">
            <thead>
              <tr>
                <th>No</th>
                <th class="text-center">Action</th>
                <th>ID</th>
                <th>Nama Ruang</th>
                <th>Kode Ruang</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT * FROM ruang");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr>
                  <td  align="center">
                    <?= $no++; ?>
                  </td>
                  <td align="center">
                 
                    <a class="btn btn-success btn-sm" href="?page=edit-ruang&kode=<?php echo base64_encode($data['kode_ruang']); ?>"><i class="fe fe-settings fe-22 align-self-center text-black"></i></a>

                    <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#del_ruang<?= $data['id_ruang'] ?>" href="#"><span class="fe fe-22 fe-trash-2"></span></a>
      
                  </td>

                  <div class="modal fade" id="del_ruang<?= $data['id_ruang'] ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Hapus Data Inventaris</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">Apakah Anda Yakin Ingin Menghapus ?</div>
                          <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                            <a href="?page=del-ruang&kode=<?php echo base64_encode($data['kode_ruang']); ?>" class="btn mb-2 btn-primary">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  <td><?= $data['id_ruang'] ?></td>
                  <td><?= $data['nama_ruang'] ?></td>
                  <td><?= $data['kode_ruang'] ?></td>
                  <td><?= $data['keterangan_ruang'] ?></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- simple table -->
  </div> <!-- end section -->
</div> <!-- .col-12 -->