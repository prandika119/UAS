<?php 
	include('koneksi.php');
	$path_foto = "assets/";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Berita dan Artikel Masjid Al-Hikmah</title>
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
							<p class="h1 mt-5">Berita dan Artikel Masjid Al-Hikmah</p>
						</div>
						<div class="row my-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
								"Selamat datang di halaman Artikel Berita Masjid, sumber informasi terpercaya mengenai perkembangan dan kegiatan terbaru di masjid kami. Baca berita terkini, artikel keagamaan, serta liputan kegiatan yang dapat menambah wawasan dan keimanan Anda."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Title section end -->

			<!-- Bagian Artikel -->
			<section class="container-fluid">
				<div class="row mt-5">
					<!-- Artikel highlight -->
					<?php
					$query_artikel_highlight = mysqli_query($conn, "SELECT * FROM artikel a JOIN galeri g ON a.id = g.id_artikel ORDER BY tgl_uploud LIMIT 3");
					$temp = 0;
					$judul_highlight = ['','',''];
					$desc_highlight = ['','',''];
					$foto_highlight = ['','',''];
					while($data = mysqli_fetch_array($query_artikel_highlight)){
						$judul_highlight[$temp] = $data['judul'];
						$foto_highlight[$temp] = $data['link'];
						$desc_highlight[$temp] = $data['konten'];
						$temp++;
					};
					?>
					<div class="col-md-6" data-aos="fade-right" data-aos-duration="1000">
						<div
							id="carouselExampleDark"
							class="carousel carousel-dark slide"
						>
							<div class="carousel-indicators">
								<button
									type="button"
									data-bs-target="#carouselExampleDark"
									data-bs-slide-to="0"
									class="active"
									aria-current="true"
									aria-label="Slide 1"
								></button>
								<button
									type="button"
									data-bs-target="#carouselExampleDark"
									data-bs-slide-to="1"
									aria-label="Slide 2"
								></button>
								<button
									type="button"
									data-bs-target="#carouselExampleDark"
									data-bs-slide-to="2"
									aria-label="Slide 3"
								></button>
							</div>
							<div class="carousel-inner">
								<div
									class="carousel-item active"
									data-bs-interval="10000"
								>

									<img
										src="<?=$path_foto.$foto_highlight[0];?>"
										class="d-block w-100"
										alt="..."
									/>
									<div
										class="carousel-caption d-none d-md-block text-light"
									>
										<h5><?= $judul_highlight[0]?></h5>
										<p class='text-truncate'>
											<?= $desc_highlight[0]?>
										</p>
									</div>
								</div>
								<div
									class="carousel-item"
									data-bs-interval="2000"
								>
									<img
										src="<?=$path_foto.$foto_highlight[1];?>"
										class="d-block w-100"
										alt="..."
									/>
									<div
										class="carousel-caption d-none d-md-block text-light"
									>
										<h5><?= $judul_highlight[1]?></h5>
										<p class='text-truncate'>
											<?= $desc_highlight[1]?>
										</p>
									</div>
								</div>
								<div class="carousel-item">
									<img
										src="<?=$path_foto.$foto_highlight[2];?>"
										class="d-block w-100"
										alt="..."
									/>
									<div
										class="carousel-caption d-none d-md-block text-light"
									>
										<h5><?= $judul_highlight[2]?></h5>
										<p class='text-truncate'>
											<?= $desc_highlight[2]?>
										</p>
									</div>
								</div>
							</div>
							<button
								class="carousel-control-prev"
								type="button"
								data-bs-target="#carouselExampleDark"
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
								data-bs-target="#carouselExampleDark"
								data-bs-slide="next"
							>
								<span
									class="carousel-control-next-icon"
									aria-hidden="true"
								></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
					<div class="col-md-6">
						<?php
							$query_artikel = mysqli_query($conn, "SELECT * FROM artikel a JOIN galeri g ON a.id = g.id_artikel");
							
							while ($data = mysqli_fetch_array($query_artikel)) {
								$buat_tanggal = new DateTime($data['tgl_uploud']);
								$format_tanggal = date_format($buat_tanggal,"d F Y");
						?>
						<!-- berita1 mulai -->
						<a href="detail-artikel.php?id=<?= $data['id'] ?>" class="card mb-3 text-decoration-none" data-aos="fade-left" data-aos-duration="1000">
							<div class="row g-0">
								<div class="col-md-4">
									<img
										src="<?=$path_foto.$data['link'];?>"
										class="img-fluid rounded-start"
										alt="..."
									/>
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title">
											<?= $data['judul']; ?>
										</h5>
										<p class="card-text text-truncate">
											<?= $data['konten']; ?>
										</p>
										<p class="card-text">
											<small class="text-body-secondary"
												><?= $format_tanggal ?></small
											>
										</p>
									</div>
								</div>
							</div>
						</a>
						<!-- berita1 end -->
						<?php } ?>
					</div>
				</div>
			</section>
			<!-- Bagian Artikel end -->
			<?php include('footer.html'); ?>

			<!-- Script -->
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
			crossorigin="anonymous"
		></script>
		</div>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init({
				once: true
			});
		</script>
	</body>
</html>
