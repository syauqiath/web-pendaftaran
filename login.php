<?php
session_start();
include 'admin/dbconnect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
          </div>
          <div class="panel-body">
            <form method="POST">
              <div class="form-group">
                <label>NPM</label>
                <input type="text" class="form-control" name="npm">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button class="btn btn-success" name="simpan">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  //jika ada tombol simpan ditekan
  if (isset($_POST["simpan"])) {
    //buat variable untuk mengambil email dan password yang diinpun lenggan
    $npm = $_POST["npm"];
    $password = $_POST["password"];

    // Lalu Cek akun Di database
    $ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE npm='$npm' AND password='$password'");
    // ngitung akun yg terambil
    $akuncocok = $ambil->num_rows;
    //Jika 1 akun yang cocok, maka diloginkan
    if ($akuncocok == 1) {
      //anda sudah login
      // mendapatkan akun dalam bentuk array
      $akun = $ambil->fetch_assoc();
      // simpan akun yg login
      $_SESSION["mahasiswa"] = $akun;
      echo "<script>alert('anda succes login');</script>";
      echo "<script>location='index.php';</script>";
     
    } else {
			//gagal login
			echo "<script>alert('anda gagal login, Periksa akun anda kebali');</script>";
			echo "<script>location='login.php';</script>";
		}
  }
  ?>
</body>

</html>