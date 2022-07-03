<div class="col-12">
  <h2 class="mb-2 page-title">Jenis Inventaris</h2>
  <p class="card-text">Jenis Barang | Inventaris</p>
  <a href="?page=add-jenis" class="btn mb-2 btn-primary">Tambah Jenis Barang</a>
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
                <th>Nama Jenis</th>
                <th>Kode Jenis</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT * FROM jenis");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr>
                  <td  align="center">
                    <?= $no++; ?>
                  </td>
                  <td align="center">
                 
                    <a class="btn btn-success btn-sm" href="?page=edit-jenis&kode=<?php echo base64_encode($data['kode_jenis']); ?>"><i class="fe fe-settings fe-22 align-self-center text-black"></i></a>

                    <a class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#del_jenis<?php echo base64_encode($data['kode_jenis']); ?>" href="#"><span class="fe fe-22 fe-trash-2"></span></a>
      
                  </td>

                  <div class="modal fade" id="del_jenis<?= base64_encode($data['kode_jenis']); ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                            <a href="?page=del-jenis&kode=<?php echo base64_encode($data['kode_jenis']); ?>" class="btn mb-2 btn-primary">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  <td><?= $data['id_jenis'] ?></td>
                  <td><?= $data['nama_jenis'] ?></td>
                  <td><?= $data['kode_jenis'] ?></td>
                  <td><?= $data['keterangan_jenis'] ?></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- simple table -->
  </div> <!-- end section -->
</div> <!-- .col-12 -->