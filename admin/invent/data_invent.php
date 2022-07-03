<div class="col-12">
  <h2 class="mb-2 page-title">Data Inventaris</h2>
  <p class="card-text">Pendataan Barang | Inventaris</p>
  <a href="?page=add-invent" class="btn mb-2 btn-primary">Tambah Data Barang</a>
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
                <th>Nama Barang</th>
                <th>Kondisi</th>
                <th>Jumlah</th>
                <th>Tanggal Register</th>
                <th>Tahun Anggaran</th>
                <th>Jurusan</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = $koneksi->query("SELECT inventaris.*, dana.nama_dana,jenis.*,jurusan.nama_jurusan,ruang.*, level.role FROM inventaris
        INNER JOIN dana ON dana.id_dana = inventaris.id_dana
        INNER JOIN jenis ON jenis.kode_jenis = inventaris.kode_jenis
        INNER JOIN jurusan ON jurusan.kode_jurusan = inventaris.kode_jurusan
        INNER JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
        INNER JOIN level ON level.id_level = inventaris.id_level");
              while ($data = $sql->fetch_assoc()) {
              ?>
                <tr>
                  <td  align="center">
                    <?= $no++; ?>
                  </td>
                  <td align="center">

                    
                  <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#detail_invent<?= $data['id_inventaris']; ?>"><span class="fe fe-22 fe-eye"></span></a>
                 
                    <a class="btn btn-success btn-sm" href="?page=edit-invent&kode=<?php echo base64_encode($data['kode_inventaris']); ?>"><i class="fe fe-settings fe-22 align-self-center text-black"></i></a>

                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#del_invent<?= base64_encode($data['kode_inventaris']); ?>"><span class="fe fe-22 fe-trash-2"></span></a>

                  </td>

                    <div class="modal fade" id="del_invent<?= base64_encode($data['kode_inventaris']); ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                            <a href="?page=del-invent&kode=<?php echo base64_encode($data['kode_inventaris']); ?>" class="btn mb-2 btn-primary">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>


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
                              <input disabled name="nama" class="form-control-plaintext border-bottom" value="<?= $data['keterangan'] ?>">
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
                              $data['kode_jenis'] . " - " .$data['nama_jenis'] . " - " . $data['keterangan_jenis']?>">
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
                  <td><?= $data['nama_jurusan']; ?></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div> <!-- simple table -->
  </div> <!-- end section -->
</div> <!-- .col-12 -->