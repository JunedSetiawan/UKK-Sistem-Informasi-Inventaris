<div class="col-12">
    <h2 class="mb-2 page-title">Aktivitas Log Manager</h2>
    <p class="card-text">Akses Manager | Aplikasi Inventaris</p>
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
                                <th>Tanggal Akses</th>
                                <th>Ip</th>
                                <th>Browser</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM aktivitas_log WHERE id_level = 2");
                            while ($data = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td align="center">
                                        <?= $no++; ?>
                                    </td>
                                    <td><?= $data['tanggal_log']; ?></td>
                                    <td><?= $data['ip'] ?></td>
                                    <td><?= $data['browser'] ?></td>
                                    <td><?= $data['status'] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->
</div> <!-- .col-12 -->