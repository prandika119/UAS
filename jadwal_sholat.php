<?php
	require('koneksi.php');	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Jadwal Sholat</title>
		<?php include ('style/link.html') ?>
	</head>
	<body>
		
		<div class="container-fluid p-0">
			<?php include('navbar.php'); ?>
			<!-- Title Section -->
			<div class="container-fluid mt-5">
				<div
					class="row text-center text-light"
					style="background-color: var(--color1)"
				>
					<div class="container" data-aos="fade-down" data-aos-duration="1000">
						<div class="row mt-5">
							<p class="h1">Jadwal Sholat</p>
						</div>
						<div class="row my-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
									“Selamat datang di halaman Jadwal Sholat,
									panduan Anda untuk menunaikan ibadah sholat
									lima waktu dengan tepat. Kami menyediakan
									informasi akurat mengenai waktu Subuh,
									Dzuhur, Ashar, Maghrib, dan Isya."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Titile section end -->

			<!-- Jadwal Sholat Section -->
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-8">
						<div class="card my-3" data-aos="fade-right" data-aos-duration="1000">
							<card-header>
								<div class="row mt-4 px-2">
									<div class="col-md-7 text-center">
										<h1>Jadwal Sholat Yogyakarta</h1>
									</div>
									<div class="col-md-5">
									<form action="" class="d-flex align-items-center h-100">
										<input type="month" id="bdaymonth" name="bdaymonth" min="2024-01" value="" class="form-control"/>
										<input type="submit" class="form-control ms-3"/>
										<?php 
										// if(isset($_GET['bdaymonth'])){
										// 	$inputBulan = $_GET['bdaymonth'];
										// 	$bulan = explode('-', $inputBulan)[1]; // Mengambil bagian bulan (06)
										// 	$tahun = explode('-', $inputBulan)[0]; // Mengambil bagian tahun (2024)
										// 	$query_jadwal_sholat=mysqli_query($conn, "SELECT tanggal, TIME_FORMAT(`shubuh`, '%H:%i') as shubuh, TIME_FORMAT(`dzuhur`, '%H:%i') as dzuhur, TIME_FORMAT(`ashar`, '%H:%i') as ashar, TIME_FORMAT(`maghrib`, '%H:%i') as maghrib, TIME_FORMAT(`isya`, '%H:%i') as isya FROM jadwal_sholat");
										// }
										// ?>
										
										
									</form>
									</div>
								</div>
							</card-header>
							<div class="card-body">
								<table class="table table-light table-striped">
									<thead>
										<tr>
											<th>Tanggal</th>
											<th>Shubuh</th>
											<th>Dhuhur</th>
											<th>Ashar</th>
											<th>Maghrib</th>
											<th>Isya</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$query_jadwal_sholat=mysqli_query($conn, "SELECT tanggal, TIME_FORMAT(`shubuh`, '%H:%i') as shubuh, TIME_FORMAT(`dzuhur`, '%H:%i') as dzuhur, TIME_FORMAT(`ashar`, '%H:%i') as ashar, TIME_FORMAT(`maghrib`, '%H:%i') as maghrib, TIME_FORMAT(`isya`, '%H:%i') as isya FROM jadwal_sholat");
											while($data = mysqli_fetch_array($query_jadwal_sholat)){
												$buat_tanggal = new DateTime($data['tanggal']);
												$format_tanggal = date_format($buat_tanggal,"d F Y");
										?>
										<tr>
											<td><?=$format_tanggal?></td>
											<td><?=$data['shubuh']?></td>
											<td><?=$data['dzuhur']?></td>
											<td><?=$data['ashar']?></td>
											<td><?=$data['maghrib']?></td>
											<td><?=$data['isya']?></td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- Jadwal Sekarang -->
					<?php
						$query_tanggal_sekarang = mysqli_query($conn, "SELECT tanggal, TIME_FORMAT(`shubuh`, '%H:%i') as shubuh, TIME_FORMAT(`dzuhur`, '%H:%i') as dzuhur, TIME_FORMAT(`ashar`, '%H:%i') as ashar, TIME_FORMAT(`maghrib`, '%H:%i') as maghrib, TIME_FORMAT(`isya`, '%H:%i') as isya FROM jadwal_sholat WHERE tanggal = CURDATE()");
						$tanggal_sekarang = mysqli_fetch_array($query_tanggal_sekarang);
						$buat_tanggal_sekarang = new DateTime($tanggal_sekarang['tanggal']);
						$format_tanggal_sekarang = date_format($buat_tanggal_sekarang,"d F Y");
					?>
					<div class="col-md-4">
						<div class="card my-3 text-center" data-aos="fade-left" data-aos-duration="1000">
							<card-header>
								<h1 class="text-center mt-4"> Jadwal Hari Ini</h1>
								<small class="text-body-secondary "><?= $format_tanggal_sekarang ?></small>

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
											<td><?=$tanggal_sekarang['shubuh']?></td>
										</tr>
										<tr>
											<td>Dzuhur</td>
											<td><?=$tanggal_sekarang['dzuhur']?></td>
										</tr>
										<tr>
											<td>Ashar</td>
											<td><?=$tanggal_sekarang['ashar']?></td>
										</tr>
										<tr>
											<td>Maghrib</td>
											<td><?=$tanggal_sekarang['maghrib']?></td>
										</tr>
										<tr>
											<td>Isya</td>
											<td><?=$tanggal_sekarang['isya']?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- jadwal sekarang end -->
				</div>
			</div>
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
