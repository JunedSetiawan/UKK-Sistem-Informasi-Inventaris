<?php
ob_start();
session_start();

?>
<html>

<head>
</head>
<style type="text/css">
    body {
        font-family: sans-serif;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }

    a {
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
</style>

<body>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan Perbaikan.xls");
    ?>
    <div style="margin: 0 auto;">
        <center>
            <br />
            <h3> Laporan Perbaikan </h3>
        </center>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Kode Inventaris</th>
                    <th>Nama Operator</th>
                    <th>Tanggal Perbaikan</th>
                    <th>Tanggal Selesai</th>
                    <th>Jurusan</th>
                    <th>Ruang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include '../../inc/koneksi.php';
            $ddd = mysqli_query($koneksi, "SELECT * FROM perbaikan");
            $aaa = mysqli_fetch_array($ddd);
              $no = 1;
              if ($aaa['id_operator'] == 0) {
                $sql = mysqli_query($koneksi,"SELECT perbaikan.*,inventaris.*, admin.nama,ruang.nama_ruang,jurusan.nama_jurusan FROM perbaikan
                INNER JOIN admin ON admin.id_admin = perbaikan.id_admin
                INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris
                INNER JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
                INNER JOIN jurusan ON jurusan.kode_jurusan = inventaris.kode_jurusan");
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
                    <td><?= $data['nama_jurusan']; ?></td>
                    <td><?= $data['nama_ruang']; ?></td>
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
              <?php
              if ($aaa['id_operator'] !== 0) {
                $sql = mysqli_query($koneksi,"SELECT perbaikan.*,inventaris.*, operator.nama_oper,ruang.nama_ruang,jurusan.nama_jurusan FROM perbaikan
                INNER JOIN operator ON operator.id_operator = perbaikan.id_operator
                INNER JOIN inventaris ON inventaris.id_inventaris = perbaikan.id_inventaris
                INNER JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
                INNER JOIN jurusan ON jurusan.kode_jurusan = inventaris.kode_jurusan");
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
                    <td><?= $data['nama_jurusan']; ?></td>
                    <td><?= $data['nama_ruang']; ?></td>
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
</body>

</html>