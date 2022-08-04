<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Laboratorium Kursus</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               
                <?php
                // jika sudah login (ada session pelanggan)
                if (isset($_SESSION["mahasiswa"])) : ?>
                    <li><a href="daftarkursus.php">Daftar Kursus</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <!-- selain itu blm login /blm ada session mahasiswa -->
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>

                    <!-- <button type="button" class="btn btn-default navbar-btn">
                    <a href="login.php">Login</a>
                </button> -->
                    <!-- <li><a href="login.php">Login</a></li> -->
                <?php endif ?>
            </ul>
            <form action="pencarian.php" method="GET" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" name="keyword">
                </div>
                <button class="btn btn-primary">Cari</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>