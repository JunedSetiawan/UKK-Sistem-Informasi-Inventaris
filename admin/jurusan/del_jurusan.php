<?php
$kode = base64_decode($_GET['kode']);
if(isset($kode)){
    $sql_cek = "select * from jurusan where kode_jurusan='".$kode."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    $sql_hapus = "DELETE FROM jurusan WHERE kode_jurusan='".$kode."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-jurusan'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-jurusan'
        ;}})</script>";
    }
