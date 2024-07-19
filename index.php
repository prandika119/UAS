<?php
	include 'koneksi.php';
	$path_foto = "assets/";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Masjid Al-Hikmah</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
		<link rel="stylesheet" href="style/style.css" />
	</head>
	<body>
		<div class="container-fluid px-0">
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
									class="nav-link active"
									aria-current="page"
									href="#"
									>Home</a
								>
							</li>
							<li class="nav-item mx-3">
								<a class="nav-link" href="jadwal_sholat.php"
									>Jadwal Sholat</a
								>
							</li>
							<li class="nav-item mx-3">
								<a
									class="nav-link"
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
			<!-- Hero Section -->
			<div
				id="carouselExampleCaptions"
				class="carousel slide"
				data-bs-ride="carousel"
			>
				<div class="carousel-indicators">
					<button
						type="button"
						data-bs-target="#carouselExampleCaptions"
						data-bs-slide-to="0"
						class="active"
						aria-current="true"
						aria-label="Slide 1"
					></button>
					<button
						type="button"
						data-bs-target="#carouselExampleCaptions"
						data-bs-slide-to="1"
						aria-label="Slide 2"
					></button>
					<button
						type="button"
						data-bs-target="#carouselExampleCaptions"
						data-bs-slide-to="2"
						aria-label="Slide 3"
					></button>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img
							src="assets/Masjid.jpg"
							class="d-block w-100"
							alt="..."
						/>
						<div class="carousel-caption d-none d-md-block">
							<h1>Masjid Al-Hikmah</h1>
							<p>
								Sleman, Yogyakarta
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img
							src="assets/masjid3.jpg"
							class="d-block w-100"
							alt="..."
						/>
						<div class="carousel-caption d-none d-md-block">
							<h1>Dari Masjid, Kita Bangkit</h1>
							<p>
							Masjid Kita, Kebanggaan Kita
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img
							src="assets/masjid4.jpg"
							class="d-block w-100"
							alt="..."
						/>
						<div class="carousel-caption d-none d-md-block">
							<h1>Quote of The Day</h1>
							<p>
							"Jangan biarkan kesulitan menghentikan langkahmu. Yakinlah, setiap kesulitan pasti ada kemudahan."
							</p>
						</div>
					</div>
				</div>
				<button
					class="carousel-control-prev"
					type="button"
					data-bs-target="#carouselExampleCaptions"
					data-bs-slide="prev"
				>
					<span
						class="carousel-control-prev-icon"
						aria-hidden="true"
					></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button
					class="carousel-control-next"
					type="button"
					data-bs-target="#carouselExampleCaptions"
					data-bs-slide="next"
				>
					<span
						class="carousel-control-next-icon"
						aria-hidden="true"
					></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<!-- Hero Section End -->

			<!-- Jadwal Sholat -->
			<?php
				$query_tanggal_sekarang = mysqli_query($conn, "SELECT tanggal, TIME_FORMAT(`shubuh`, '%H:%i') as shubuh, TIME_FORMAT(`dzuhur`, '%H:%i') as dzuhur, TIME_FORMAT(`ashar`, '%H:%i') as ashar, TIME_FORMAT(`maghrib`, '%H:%i') as maghrib, TIME_FORMAT(`isya`, '%H:%i') as isya FROM jadwal_sholat WHERE tanggal = CURDATE()");
				$tanggal_sekarang = mysqli_fetch_array($query_tanggal_sekarang);
				$buat_tanggal_sekarang = new DateTime($tanggal_sekarang['tanggal']);
				$format_tanggal_sekarang = date_format($buat_tanggal_sekarang,"d F Y");
			?>
			<div class="container-fluid my-0 mx-0">
				<div class="row text-light">
					<!-- Ket. tempat dan jam -->
					<div
						class="col-md-3 d-flex flex-column justify-content-center align-items-center"
						style="background-color: var(--color2)"
					>
						<div class="waktu-tempat text-center" data-aos="zoom-in" data-aos-duration="1000">
							<p class="h1">Sleman,</p>
							<p class="h4">Yogyakarta</p>
							<p class="display-1"></p>
							<p class="h3"><?= $format_tanggal_sekarang ?></p>
						</div>
					</div>

					<!-- tabel sholat -->
					<div
						class="col-md-6 py-3 text-center"
						style="background-color: var(--color2)"
					>
						<div class="card my-3" data-aos="zoom-in" data-aos-duration = "1000" data-aos-delay="250">
							<card-header>
								<h1 class='mt-3'>Jadwal Sholat Hari Ini</h1>
							</card-header>
							<div class="card-body">
								<table class="table table-light table-striped">
									<thead>
										<tr>
											<th>Sholat</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Subuh</td>
											<td><?=$tanggal_sekarang['shubuh'] ?></td>
										</tr>
										<tr>
											<td>Dzuhur</td>
											<td><?=$tanggal_sekarang['dzuhur'] ?></td>
										</tr>
										<tr>
											<td>Ashar</td>
											<td><?=$tanggal_sekarang['ashar'] ?></td>
										</tr>
										<tr>
											<td>Maghrib</td>
											<td><?=$tanggal_sekarang['maghrib'] ?></td>
										</tr>
										<tr>
											<td>Isya</td>
											<td><?=$tanggal_sekarang['isya'] ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- Kegiatan acara -->
					<?php
						$query_kegiatan_minggu_ini = mysqli_query($conn, "SELECT * FROM jadwal_kegiatan_minggu_ini LIMIT 1");
						$count_kegiatan_minggu_ini = mysqli_num_rows($query_kegiatan_minggu_ini);
						$kegiatan_minggu_ini = mysqli_fetch_array($query_kegiatan_minggu_ini);
						if($count_kegiatan_minggu_ini == 0){
					?>	
						<div class="col-md-3 px-0">
							<div class="card text-center m-3 bg-body-secondary" data-aos="flip-left">
								<div class="card-head">
									<p class="h3 mt-3">Kajian Rutin</p>
								</div>
								<div class="card-body">
									<h5 class="card-title">Tidak Ada Jadwal</h5>
									<h5>Minggu Ini</h5>
								</div>
							</div>
						</div>
					<?php
						} else {
							if($kegiatan_minggu_ini['nama_kegiatan'] == "Sholat Jumat"){
					?>
								<div class="col-md-3 px-0 ">
								<div class="card text-center m-3 bg-body-secondary" data-aos="flip-left" data-aos-duration="1500" data-aos-delay="500">
									<div class="card-head">
										<p class="h1 mt-3">Sholat Jumat</p>
										<p style="color: var(--color2)"><?=$kegiatan_minggu_ini['tanggal']?></p>
									</div>
									<img
										src="<?= $path_foto.$kegiatan_minggu_ini['foto_jumat'] ?>"
										class="img-top mx-auto"
										alt="..."
										height="100"
										width="100"
									/>
									<div class="card-body">
										<p class="card-text h6">Khatib</p>
										<h5 class="card-title"><?= $kegiatan_minggu_ini['khatib']?></h5>
										<h6><?= $kegiatan_minggu_ini['tema_jumat']?></h6>
										<a
												href="event.php"
												class="btn text-light"
												style="background-color: var(--color2)"
												>Detail Informasi</a
											>
									</div>
								</div>
							</div>
					<?php
							} else {
					?>
								<div
									class="col-md-3 px-0 py-3"
									style="background-color: var(--color2)"
								>
									<div class="card text-center m-3 bg-body-secondary" data-aos="flip-left" data-aos-duration="1500" data-aos-delay="500">
										<div class="card-head">
											<!-- <h1 class="card-title mt-3">Events</h1> -->
											<p class="h1 mt-3"><?=$kegiatan_minggu_ini['nama_kegiatan'] ?></p>
											<p style="color: var(--color2)"><?=$kegiatan_minggu_ini['tanggal'] ?></p>
										</div>
										<img
											src="<?=$path_foto.$kegiatan_minggu_ini['foto_kajian'] ?>"
											class="img-top mx-auto"
											alt="..."
											height="100"
											width="100"
										/>
										<div class="card-body">
											<p class="card-text">Pembicara</p>
											<h5 class="card-title"><?=$kegiatan_minggu_ini['pembicara'] ?></h5>
											<h6><?= $kegiatan_minggu_ini['tema_kajian']?></h6>
											<a
												href="event.php"
												class="btn text-light"
												style="background-color: var(--color2)"
												>Detail Informasi</a
											>
										</div>
									</div>
								</div>
							<?php } 
						}
							?>
					<!-- Jadwal kegiatan acara end -->
				</div>
			</div>
			<!-- Jadwal Sholat & event end -->

			<!-- Layanan masjid -->
			<div class="container my-5">
				<div class="row text-center">
					<p class="h1" data-aos="fade-up">Layanan Masjid</p>
				</div>

				<div class="row my-3">
					<?php
						$query_layanan = mysqli_query($conn, "SELECT * FROM layanan l JOIN galeri gl ON l.id = gl.id_layanan");
						$delay = 100;
						while($layanan = mysqli_fetch_array($query_layanan)){
					?>
					<div class="col-md-3" data-aos="flip-down" data-aos-delay="<?=$delay ?>" data-aos-duration="1500">
						<div class="card">
							<img
								src="<?= $path_foto.$layanan['link']?>"
								class="card-img-top"
								alt="..."
							/>
							<div class="card-body">
								<h5 class="card-title"><?=$layanan['nama_layanan'] ?></h5>
								<p class="card-text multi-line-text-truncate">
									<?=$layanan['deskripsi'] ?>
								</p>
								<a
									href="layanan_masjid.php"
									class="btn text-light"
									style="background-color: var(--color2)"
									>Lihat lebih detail</a
								>
							</div>
						</div>
					</div>
					<?php 
						$delay += 200;
						} ?>


				</div>
			</div>

			<!-- Artikel Berita & Laporan Keuangan -->
			<div class="container">
				<div class="row">
					<!-- Judul dan artikel -->
					<div class="col-md-7 mt-5" data-aos="fade-right" data-aos-duration="1000">
						<p class="h1 mb-3">Kegiatan dan Berita Masjid Al-Hikmah</p>
						<!-- artikel start -->
						<?php
							$query_artikel = mysqli_query($conn, "SELECT * FROM artikel a JOIN galeri g ON a.id = g.id_artikel");
							while ($data = mysqli_fetch_array($query_artikel)) {
								$buat_tanggal = new DateTime($data['tgl_uploud']);
								$format_tanggal = date_format($buat_tanggal,"d F Y");
						?>
						<div class="card mb-3" data-aos="fade-right" data-aos-duration="1000">
							<div class="row g-0">
								<div class="col-md-4">
									<img
										src="<?=$path_foto.$data['link']?>"
										class="img-fluid rounded-start"
										alt="..."
									/>
								</div>
								<div class="col-md-8">
									<div class="card-body" >
										<h5 class="card-title">
											<?= $data['judul']; ?>
										</h5>
										<p class="card-text text-truncate">
											<?= $data['konten']; ?>
										</p>
										<p class="card-text">
											<small class="text-body-secondary"
												><?=$format_tanggal ?></small
											>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<!-- artilek end -->
					</div>

					<!-- Laporan amal jumat -->
					<div class="col-md-5 mt-5">
						<div class="card" data-aos="fade-left" data-aos-duration = "1000">
							<img
								src="https://images.unsplash.com/photo-1705374104830-bbb99e8b77f8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
								class="card-img-top"
								alt="..."
							/>
							<div class="card-body">
								<h5 class="card-title">
									Laporan Infaq Masjid Al-Hikmah
								</h5>
								<p class="card-text multi-line-text-truncate">
								Menu Laporan Infaq pada website masjid kami dirancang untuk memberikan informasi yang 
								komprehensif dan transparan mengenai seluruh sumbangan infaq yang diterima oleh masjid. 
								Melalui menu ini, para jamaah dapat mengakses laporan rinci yang mencakup 
								jumlah total infaq, tanggal penerimaan, serta identitas penyumbang jika tidak bersifat anonim.
								</p>
								<a
									href="infaq.php"
									class="btn text-light"
									style="background-color: var(--color1)"
									>Cek Detail</a
								>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<?php include('footer.html'); ?>
		</div>

		<!-- Script -->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"
		></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>
	</body>
</html>
