<?php 
include '../inc/koneksi.php';
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Register Manager</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="../css/app-dark.css" id="darkTheme">
  </head>
  <body class="dark ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form action="" method="POST" class="col-lg-6 col-md-8 col-10 mx-auto">
          <div class="mx-auto text-center my-4">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                  <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                  <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                  <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
            </a>
            <h2 class="my-3">Register Manager</h2>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Nama</label>
            <input type="text" class="form-control" id="inputEmail4" name="nama" required autofocus>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <label for="validationCustom3">Username</label>
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
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputPassword5">Nomor Hp</label>
                <input type="text" name="no_hp" class="form-control" id="inputPassword5">
              </div>
              <div class="form-group">
                <label for="inputPassword5">level</label>
                <input type="text" name="id_level" class="form-control" id="inputPassword5" value="2" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <p class="mb-2">Password requirements</p>
              <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
              <ul class="small text-muted pl-4 mb-0">
                <li> Minimum 8 character </li>
                <li>At least one special character</li>
                <li>At least one number</li>
                <li>Can’t be the same as a previous password </li>
              </ul>
            </div>
          </div>
          <button name="Simpan"class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
          <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
        </form>
      </div>
    </div>
    <?php $da = 1100; ?>
    <script>
      var secret; 

    while (secret !== <?= $da ?>) {
    secret = prompt("KODE ???");
  }
    </script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/simplebar.min.js"></script>
    <script src='../js/daterangepicker.js'></script>
    <script src='../js/jquery.stickOnScroll.js'></script>
    <script src="../js/tinycolor-min.js"></script>
    <script src="../js/config.js"></script>
    <script src='../js/jquery.mask.min.js'></script>
    <script src='../js/select2.min.js'></script>
    <script src='../js/jquery.steps.min.js'></script>
    <script src='../js/jquery.validate.min.js'></script>
    <script src='../js/jquery.timepicker.js'></script>
    <script src='../js/dropzone.min.js'></script>
    <script src='../js/uppy.min.js'></script>
    <script src='../js/quill.min.js'></script>
    <script src="../js/apps.js"></script>
    <script src="script.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Alert -->
		<script src="../plugins/alert.js"></script>
  </body>
</html>
</body>
</html>
<?php 
include '../inc/koneksi.php';

if (isset ($_POST['Simpan'])){
  //mulai proses simpan data
    $sql_simpan = "INSERT INTO admin (id_admin,username,password,nama,no_hp,keterangan,id_level) VALUES (
    '".""."',
    '".$_POST['username']."',
    '".$_POST['password']."',
    '".$_POST['nama']."',
    '".$_POST['no_hp']."',
    '".$_POST['keterangan']."',
    '"."2"."')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

  if ($query_simpan) {
  echo "<script>
  Swal.fire({title: 'Registrasi Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
    window.location = '../login.php';
    }
  })</script>";
  } else{
  echo "<script>
  Swal.fire({title: 'Registrasi Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
    window.location = 'index.php';
    }
  })</script>"
  ;
  }}
  //selesai proses simpan data