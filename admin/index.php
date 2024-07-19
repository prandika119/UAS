<?php
    require "session.php";
    require "../koneksi.php";

    $query_artikel = mysqli_query($conn, "SELECT * FROM artikel");
    $count_artikel = mysqli_num_rows($query_artikel);

    $query_jadwal_kegiatan = mysqli_query($conn, "SELECT * FROM jadwal_kegiatan");
    $count_jadwal_kegiatan = mysqli_num_rows($query_jadwal_kegiatan);

    $query_laporan_infaq = mysqli_query($conn, "SELECT * FROM laporan_infaq");
    $count_laporan_infaq = mysqli_num_rows($query_laporan_infaq);

    $query_layanan = mysqli_query($conn, "SELECT * FROM layanan");
    $count_layanan = mysqli_num_rows($query_layanan);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="../style/style.css" />
</head>
<body>
    <div class="container-fluid px-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img
                        src="../assets/logo.png"
                        alt="Bootstrap"
                        height="30"
                    />
                    <img
                        src="../assets/title_tagline.png"
                        alt=""
                        height="30"
                    />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-3">
                            <a
                                class="nav-link"
                                aria-current="page"
                                href="../index.php"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" 
                            href="../jadwal_sholat.php">Jadwal Sholat</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a
                                class="nav-link "
                                href="event.php"
                                aria-disabled="true"
                                >Jadwal Kegiatan</a
                            >
                        </li>
                        <li class="nav-item mx-3">
                            <a
                                class="nav-link"
                                href="../layanan_masjid.php"
                                aria-disabled="true"
                                >Layanan Masjid</a
                            >
                        </li>
                        <li class="nav-item mx-3">
                            <a
                                class="nav-link"
                                href="../artikel.php"
                                aria-disabled="true"
                                >Artikel</a
                            >
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- Navbar end -->

        <!-- Title Section -->
        <div class="container-fluid">
            <div
                class="row text-center text-light"
                style="background-color: var(--color1)"
            >
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <p class="h1 mt-5">Halaman admin</p>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <p>
                                “Selamat datang di halaman Jadwal Sholat,
                                panduan Anda untuk menunaikan ibadah sholat
                                lima waktu dengan tepat. Kami menyediakan
                                informasi akurat mengenai waktu Subuh,
                                Dzuhur, Ashar, Maghrib, dan Isya,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Title section end -->
        <div class="container my-5">
            <div class="row">
                <!-- laporan infaq -->
                <div class="col-md-3">
                    <div class="card mb-3 text-light" style = "background-color: var(--color2)">
                        <div class="card-header">laporan infaq</div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Data : <?= $count_laporan_infaq; ?> </h5>
                            <a href="edit_infaq.php" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <!-- laporan infaq end -->
            </div>
        </div>
    </div>
</body>
</html>