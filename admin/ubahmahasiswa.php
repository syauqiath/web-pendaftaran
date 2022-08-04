<h3>Ubah Data Mahasiswa</h3>
<?php
$ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE id_mahasiswa='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

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

<form method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama']; ?>" required>
    </div>
    <div class="form-group">
        <label>NPM</label>
        <input type="tezt" class="form-control" name="npm" value="<?php echo $pecah['npm']; ?>" required>
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
        <label>Ganti KRS</label>
        <input type="file" class="form-control" name="krs">
    </div>
    <div class="form-group">
        <label>Status Mahasiswa</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" name = "status" type="checkbox" id="tidak" value="Tidak Terverifikasi">
            <label class="form-check-label" for="inlineCheckbox1">Tidak Verifikasi</label>
        </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" name = "status" type="checkbox" id="verif" value="Terverifikasi">
            <label class="form-check-label" for="inlineCheckbox2">Verifikasi</label>
        </div>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<!-- Script Untuk Mengubah Data -->

<?php
if (isset($_POST['ubah'])) {
    $namakrs = $_FILES['krs']['name'];
    $lokasikrs = $_FILES['krs']['tmp_name'];
    // Jika Foto dirubah
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasikrs, "../krs/$namakrs");

        $koneksi->query("UPDATE mahasiswa SET nama='$_POST[nama]',npm='$_POST[npm]',status='$_POST[status]', krs='$namakrs',id_materi='$_POST[id_materi]' WHERE id_mahasiswa='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE mahasiswa SET nama='$_POST[nama]',npm='$_POST[npm]',status='$_POST[status]',id_materi='$_POST[id_materi]' WHERE id_mahasiswa='$_GET[id]'");
    }
    echo "<script>alert('Data Telah Diubah');</script>";
    echo "<script>location='index.php?halaman=mahasiswa';</script>";
}
