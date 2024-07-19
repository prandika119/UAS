<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Jadwal Kegiatan Masjid Al-Hikmah</title>
		<?php include ('style/link.html') ?>
	</head>
	<body>
		<div class="container-fluid px-0">
			<?php include('navbar.php'); ?>
			<!-- Title Section -->
			<div class="container-fluid">
				<div
					class="row text-center text-light"
					style="background-color: var(--color2)"
				>
					<div class="container" data-aos="fade-down" data-aos-duration="1000">
						<div class="row mt-5">
							<p class="h1 mt-5">Jadwal Kegiatan Masjid Al-Hikmah</p>
						</div>
						<div class="row my-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
								"Selamat datang di halaman Jadwal Kegiatan Masjid, tempat Anda mendapatkan informasi terkini tentang berbagai kegiatan dan acara yang diselenggarakan di masjid kami. Temukan jadwal pengajian, kajian ilmu, majlis ta'lim, dan kegiatan sosial lainnya yang dapat Anda ikuti."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title section end -->
	
			<!-- Kegiatan Minggu ini -->
			<?php 
				$query_kegiatan_minggu_ini = mysqli_query($conn, "SELECT * FROM jadwal_kegiatan_minggu_ini");
				$count_kegiatan_minggu_ini = mysqli_num_rows($query_kegiatan_minggu_ini);
				$path_foto = 'assets/';
				?>
				
			
			<div class="container mt-5" data-aos="fade-right" data-aos-duration="1000">
				<div class="row" >
					<div class="col-md-10">
						<p class="h1">Kegiatan Minggu Ini</p>
					</div>
					<div class="col-md-2">
						<button
							type="button"
							class="btn text-light"
							style="background-color: var(--color2)"
						>
							Lihat Semua
						</button>
					</div>
				</div>
				<div class="row">			
					<!-- Kegiatan acara -->
					<?php
						while ($kegiatan_minggu_ini = mysqli_fetch_array($query_kegiatan_minggu_ini)) {
							if ($count_kegiatan_minggu_ini == 0) {
					?>
								<div class="col-md-3 px-0">
									<div class="card text-center m-3 bg-body-secondary">
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
								if ($kegiatan_minggu_ini['nama_kegiatan'] == "Sholat Jumat") {
							?>
								<div class="col-md-3 px-0">
									<div class="card text-center m-3 bg-body-secondary">
										<div class="card-head">
											<p class="h3 mt-3">Sholat Jumat</p>
											<p style="color: var(--color2)"><?=$kegiatan_minggu_ini['tanggal']?></p>
										</div>
										<img
											src="<?=$path_foto.$kegiatan_minggu_ini['foto_jumat'] ?>"
											class="img-top mx-auto"
											alt="..."
											height="100"
											width="100"
										/>
										<div class="card-body">
											<p class="card-text h6">Khatib</p>
											<h5 class="card-title"><?= $kegiatan_minggu_ini['khatib']?></h5>
											<h6><?= $kegiatan_minggu_ini['tema_jumat']?></h6>
										</div>
									</div>
								</div>
							<?php
								} else {
							?>
								<div class="col-md-3 px-0">
									<div class="card text-center m-3 bg-body-secondary">
										<div class="card-head">
											<p class="h3 mt-3">Kajian Rutin</p>
											<p style="color: var(--color2)"><?= $kegiatan_minggu_ini['tanggal'] ?></p>
										</div>
										<img
											src="<?=$path_foto.$kegiatan_minggu_ini['foto_kajian'] ?>"
											class="img-top mx-auto"
											alt="..."
											height="100"
											width="100"
										/>
										<div class="card-body">
											<p class="card-text h6">Pembicara</p>
											<h5 class="card-title"><?= $kegiatan_minggu_ini['pembicara']?></h5>
											<h6><?= $kegiatan_minggu_ini['tema_kajian']?></h6>
										</div>
									</div>
								</div>
							<?php } 
							}
						}?>
								<!-- Kegiatan acara end -->
				</div>
			</div>
			<!-- Kegiatan Minggu ini end -->
			
			<!-- Kegiatan Kajian Rutin -->
			<div class="container mt-5" data-aos="fade-left" data-aos-duration="1000">
				<div class="row" >
					<div class="col-md-10">
						<p class="h1">Kajian Rutin</p>
					</div>
					<div class="col-md-2">
						<button
							type="button"
							class="btn text-light"
							style="background-color: var(--color2)"
						>
							Lihat Semua
						</button>
					</div>
				</div>
				<div class="row">			
					<!-- Kegiatan acara -->
					<?php
						$query_kajian_rutin = mysqli_query($conn, "SELECT * FROM jadwal_kajian_rutin");
						while ($kajian_rutin = mysqli_fetch_array($query_kajian_rutin)) {
					?>
					<div class="col-md-3 px-0">
						<div class="card text-center m-3 bg-body-secondary">
							<div class="card-head">
								<p class="h3 mt-3">Kajian Rutin</p>
								<p style="color: var(--color2)"><?=$kajian_rutin['tanggal'] ?></p>
							</div>
							<img
								src="<?=$path_foto.$kajian_rutin['foto'] ?>"
								class="img-top mx-auto"
								alt="..."
								height="100"
								width="100"
							/>
							<div class="card-body">
								<p class="card-text h6">Pembicara</p>
								<h5 class="card-title"><?=$kajian_rutin['nama'] ?></h5>
								<h6><?=$kajian_rutin['tema'] ?></h6>
							</div>
						</div>
					</div>
					<?php } ?>
					
						<!-- Kegiatan acara end -->
				</div>
			</div>
			<!-- Kegiatan Kajian Rutin end -->
			<!-- Jadwal Sholat Jumat -->
			<div class="container mt-5" data-aos="fade-right" data-aos-duration="1000">
				<div class="row">
					<div class="col-md-10">
						<p class="h1">Jadwal Sholat Jumat</p>
					</div>
					<div class="col-md-2">
						<button
							type="button"
							class="btn text-light"
							style="background-color: var(--color2)"
						>
							Lihat Semua
						</button>
					</div>
				</div>
				<div class="row">			
					<!-- Kegiatan acara -->
					<?php
						$query_jadwal_sholat_jumat = mysqli_query($conn, "SELECT * FROM jadwal_sholat_jumat");
						while ($jadwal_sholat_jumat = mysqli_fetch_array($query_jadwal_sholat_jumat)) {
					?>
					<div class="col-md-3 px-0">
						<div class="card text-center m-3 bg-body-secondary">
							<div class="card-head">
								<p class="h3 mt-3">Sholat Jumat</p>
								<p style="color: var(--color2)"><?=$jadwal_sholat_jumat['tanggal'] ?></p>
							</div>
							<img
								src="<?=$path_foto.$jadwal_sholat_jumat['foto'] ?>"
								class="img-top mx-auto"
								alt="..."
								height="100"
								width="100"
							/>
							<div class="card-body">
								<p class="card-text h6">Khatib</p>
								<h5 class="card-title"><?=$jadwal_sholat_jumat['khatib'] ?></h5>
								<h6><?=$jadwal_sholat_jumat['tema'] ?></h6>
							</div>
						</div>
					</div>
					<?php } ?>
					<!-- Kegiatan acara end -->
				</div>
			</div>
			<!-- Jadwal Sholat Jumat end -->
			<?php include('footer.html'); ?>
		</div>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init({
				once: true
			});
		</script>
	</body>
</html>
