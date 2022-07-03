<div class="col-12">
    <h2 class="mb-2 page-title">Data User Manager</h2>
    <p class="card-text">Setting User Manager | Inventaris</p>
    <a href="?page=add-manager" class="btn mb-2 btn-primary">Tambah Manager</a>
    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table datatables" id="dataTable-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Action</th>
                                <th>Nama Manager</th>
                                <th>username</th>
                                <th>No Hp</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM admin WHERE id_level = 2");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td align="center">
                                        <?= $no++; ?>
                                    </td>
                                    <td align="center">

                                        <a class="btn btn-success btn-sm" href="?page=edit-manager&kode=<?php echo base64_encode($data['id_admin']); ?>"><i class="fe fe-settings fe-22 align-self-center text-black"></i></a>

                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_manager<?= $data['id_admin'] ?>" href="#"><span class="fe fe-22 fe-trash-2"></span></a>

                                    </td>

                                    <div class="modal fade" id="del_manager<?= $data['id_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                                                    <a href="?page=del-manager&kode=<?php echo base64_encode($data['id_admin']); ?>" class="btn mb-2 btn-primary">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['no_hp']; ?></td>
                                    <td><?= $data['keterangan']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->
</div> <!-- .col-12 -->