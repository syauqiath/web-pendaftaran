<?php
session_start();
include 'admin/dbconnect.php';

$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR npm LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}
// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <style>
        /* card */
        .thumbnail img {
            width: 100%;
            height: 300px;
        }

        .thumbnail p {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .header {
            min-height: 48vh;
            width: 100%;
            background-image: linear-gradient(270deg, rgba(0, 0, 0, 0.33) 0%, rgba(0, 0, 0, 0.15) 48.96%, rgba(0, 0, 0, 0.32) 100%), url(img/cover.jpg);
            backdrop-filter: blur(4px);
            background-position: center;
            background-size: cover;
            position: relative;
            margin-top: -19px;
        }

        .text-box {
            width: 90%;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .text-box h1 {
            font-size: 62px;
        }

        .text-box p {
            margin: 10px 0 40px;
            font-size: 14px;
            color: #fff;
        }
        .konten{
            margin: 48px;
        }
    </style>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <section class="header">
        <div class="text-box">
            <h1>Laboratorium Kursus</h1>
            <p>Kursus dengan sertifikasi BNSP
            </p>
        </div>
    </section>
    <section class="konten">
        <div class="container">
            <h2>Hasil Pencarian : <?php echo $keyword ?></h2>
            <!-- Jika kosong -->
            <?php if (empty($semuadata)) : ?>
                <div class="alert alert-danger">Mahasiswa <strong><?php echo $keyword  ?></strong> Tidak Ditemukan</div>
            <?php endif  ?>

            <div class="row">
                <?php foreach ($semuadata as $key => $value) : ?>
                     <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NPM</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $value['npm']; ?></td>
                                    <td><?php echo $value['nama']; ?></td>
                                    <td><?php echo $value['status']; ?></td>
                                </tr>  
                        </tbody>
                    </table>
                <?php endforeach  ?>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>