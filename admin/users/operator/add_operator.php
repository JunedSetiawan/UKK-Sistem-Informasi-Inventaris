<div class="col-md-12">
    <form action="" method="POST" class="col-lg-10 col-md-8 col-12 mx-auto">
    <h4 class="text-center">Tambah User Operator</h4>
        <div class="form-group">
            <label for="inputEmail4">Nama : </label>
            <input type="text" class="form-control" id="inputEmail4" name="nama" required autofocus>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="validationCustom3">Username : </label>
                <input type="text" class="form-control" id="validationCustom3" name="username" required>
                <div class="valid-feedback"> Looks good! </div>
            </div>
            <div class="form-group col-md-6">
                <label for="validationCustom4">Password</label>
                <input type="password" class="form-control" id="validationCustom4" name="password" required>
                <div class="valid-feedback"> Looks good! </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="validationCustom3">Keterangan</label>
                <input type="text" class="form-control" id="validationCustom3" name="keterangan" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputPassword5">Nomor Hp</label>
                    <input type="text" name="no_hp" class="form-control" id="inputPassword5" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="inputState">Jurusan</label>
              <?php
              $sql_res = "SELECT * FROM jurusan";
              $result_res = mysqli_query($koneksi, $sql_res);
  						echo "<select class='form-control' name='jurusan'>";
						while ($row = mysqli_fetch_array($result_res)){
						echo "<option value='" . $row["kode_jurusan"] . "'>" . $row["kode_jurusan"] . " - " . $row['nama_jurusan'] ."</option>";
						}
						echo "</select>";
					?>
                
                </div>
            </div>
        </div>
        <button name="Simpan" class="btn btn-md btn-primary" style="margin-top: 28px;" type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menambahkan ?')">Tambah User</button>
        
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
<?php

if (isset ($_POST['Simpan'])){
    $password = md5($_POST['password']);
  //mulai proses simpan data
    $sql_simpan = "INSERT INTO operator (id_operator,nama_oper,username,password,no_hp,keterangan,kode_jurusan,id_level) VALUES (
    '".NULL."',
    '".$_POST['nama']."',
    '".$_POST['username']."',
    '".$password."',
    '".$_POST['no_hp']."',
    '".$_POST['keterangan']."',
    '".$_POST['jurusan']."',
    '"."3"."')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

  if ($query_simpan) {
  echo "<script>
  Swal.fire({title: 'Tambah User Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
    window.location = '?page=data-operator';
    }
  })</script>";
  } else{
  echo "<script>
  Swal.fire({title: 'Registrasi Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
    window.location = '?page=add-operator';
    }
  })</script>"
  ;
  }}
  //selesai proses simpan data