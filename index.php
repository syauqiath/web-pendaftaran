<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Pendaftaran Kursus</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
        .header {
            min-height: 100vh;
            width: 100%;
            background-image: linear-gradient(270deg, rgba(0, 0, 0, 0.33) 100%, rgba(0, 0, 0, 0.15) 2%, rgba(0, 0, 0, 0.32) 100%), url(img/cover.jpg);
            backdrop-filter: blur(6px);
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

        .hero-btn {
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            color: #fff;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 6px;
            background: #24a0ed;
            position: relative;
            cursor: pointer;
        }

        .hero-btn:hover {
            border-radius:6px;
            border: 2px solid #24a0ed;
            background: #fff;
        }

        .daftar{
            font-weight:bold;
            color: #fff;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 6px;
            background: #24a0ed;
        }

        .daftar:hover{
            border: 1px solid #24a0ed;
            background:#fff;
            color: #24a0ed;
            cursor:pointer;
        }

        .konten h1 {
            text-align: center;
        }

        .konten img {
            width: 100%;
            height: auto;
        }
    </style>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Heaader -->
    <section class="header">
        <div class="text-box">
            <h1>Web Pendaftaran kursus</h1>
            <p>Kursus dengan sertifikasi BNSP
            </p>
            <a onclick="location.href='daftarkursus.php'" class="daftar">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <?php
    include 'footer.php'
    ?>
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="admin/assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="admin/assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="admin/assets/js/custom.js"></script>
</body>

</html>