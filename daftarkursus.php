<?php
session_start();
include 'admin/dbconnect.php'
?>
<style>
    p {
        color: #777;
        font-size: 16px;
        font-weight: 300;
        line-height: 22px;
        padding: 10px;
    }

    h2 {
        text-align: center;
        font-weight: bold;
        margin: 10px 0;
    }

    form{
        margin: 24px 480px;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Isi -->
    <?php
$datamateri = array();

$ambil = $koneksi->query("SELECT * FROM materi");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>
<h2>Daftar Kursus</h2>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa">
    </div>
    <div class="form-group">
        <label>NPM</label>
        <input type="text" class="form-control" name="npm" placeholder="NPM">
    </div>
    <div class="form-group">
        <label>Materi</label>
        <select name="id_materi" class="form-control">
            <option value="">Pilih Materi</option>
            <?php foreach ($datakategori as $key => $value) : ?>
                <option value="<?php echo $value["id_materi"] ?>"><?php echo $value["nama_materi"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Upload KRS</label>
        <input type="file" class="form-control" name="krs">
    </div>
    <button class="btn btn-primary" name="save">Submit</button>
</form>

<!-- Untuk Fungsi Post -->
<?php
if (isset($_POST['save'])) {
    $nama = $_FILES['krs']['name'];
    $lokasi = $_FILES['krs']['tmp_name'];
    move_uploaded_file($lokasi, "krs/".$nama);
    $koneksi->query("INSERT INTO mahasiswa (nama,npm,krs,id_materi) VALUES('$_POST[nama]','$_POST[npm]','$nama','$_POST[id_materi]')");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=daftarkursus.php?'>";
}
?>

    <?php include 'footer.php'; ?>
</body>

</html>