
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img
                src="assets/logo.png"
                alt="Bootstrap"
                height="30"
            />
            <img
                src="assets/title_tagline.png"
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
                        href="index.php"
                        >Home</a
                    >
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" 
                    href="jadwal_sholat.php">Jadwal Sholat</a>
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
                        href="layanan_masjid.php"
                        aria-disabled="true"
                        >Layanan Masjid</a
                    >
                </li>
                <li class="nav-item mx-3">
                    <a
                        class="nav-link"
                        href="artikel.php"
                        aria-disabled="true"
                        >Artikel</a
                    >
                </li>
            </ul>

            <a href="admin/login.php" class="btn text-light" style="background-color: var(--color1)">Login</a>
        </div>
    </div>
</nav>
<!-- Navbar end -->
