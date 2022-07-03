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
    header("Content-Disposition: attachment; filename=Laporan Perawatan.xls");
    ?>
    <div style="margin: 0 auto;">
    <center>
        <br />
        <h3> Laporan Perawatan </h3>
    </center>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kode Inventaris</th>
                <th>Jumlah</th>
                <th>Tanggal Perawatan</th>
                <th>Ruang</th>
                <th>Jurusan</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Konek =  new mysqli('localhost', 'root', '', 'invent');
           
            $no = 1;
            $sql = mysqli_query($Konek, "SELECT perawatan.*,inventaris.*,ruang.nama_ruang,jurusan.nama_jurusan FROM perawatan
            INNER JOIN inventaris ON inventaris.id_inventaris = perawatan.id_inventaris
            INNER JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
            INNER JOIN jurusan ON jurusan.kode_jurusan = inventaris.kode_jurusan");
            while ($data = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td align="center">
                        <?= $no++; ?>
                    </td>
                    <td name="id_perw"><?= $data['id_perawatan'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kode_inventaris'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                    <td><?= $data['tanggal_perawatan'] ?></td>              
                    <td><?= $data['nama_ruang'] ?></td>
                    <td><?= $data['nama_jurusan'] ?></td>
                    <td><?= $data['kondisi'] ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</body>

</html>