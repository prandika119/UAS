<?php
    include('koneksi.php');
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    function hitungSaldo($recent_saldo, $pemasukan, $pengeluaran) {
        return $recent_saldo + ($pemasukan - $pengeluaran);
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Laporan infaq</title>
		<?php include ('style/link.html') ?>
	</head>
	<body>
		<div class="container-fluid px-0">
			<?php include('navbar.php'); ?>
			<!-- Title Section -->
			<div class="container-fluid">
				<div
					class="row text-center text-light"
					style="background-color: var(--color1)"
				>
					<div class="container" data-aos="fade-down" data-aos-duration="1000">
						<div class="row mt-5">
							<p class="h1 mt-5">Laporan Infaq Masjid Al-Hikmah</p>
						</div>
						<div class="row my-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
                                "Selamat datang di halaman Laporan Infaq, tempat Anda dapat memantau dan mengevaluasi sumbangan infaq yang diterima oleh masjid. Kami menyediakan informasi transparan dan terperinci mengenai penerimaan dan penggunaan dana infaq untuk memastikan amanah Anda tersampaikan dengan baik."
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Titile section end -->

            <!-- Infaq -->
            <div class="container" data-aos="fade-up" data-aos-duration="1000">
                <div class="card my-3">
                    <card-header>
                        <div class="row mt-4">
                            <div class="col-md-8 text-center">
                                <h1>Laporan Infaq Masjid Al-Hikmah</h1>
                            </div>
                            <div class="col-3">
                                <form action="" class='d-flex'>
                                    <!-- <label for="bdaymonth"
                                        >Birthday (month and
                                        year):</label
                                    > -->
                                    <input
                                        type="month"
                                        id="bdaymonth"
                                        name="bdaymonth"
                                        min="2024-01" value="2024-06"
                                        class="form-control"
                                    />
                                    <input type="submit" class="form-control ms-3" />
                                    <?php 
                                    // if(isset($_GET['bdaymonth'])){
                                    //     $inputBulan = $_GET['bdaymonth'];
                                    //     $bulan = explode('-', $inputBulan)[1]; // Mengambil bagian bulan (06)
                                    //     $tahun = explode('-', $inputBulan)[0]; // Mengambil bagian tahun (2024)
                                    //     $query_infaq = mysqli_query($conn, "SELECT * FROM laporan_infaq WHERE MONTH(tanggal) = $bulan");
                                    // }
                                ?>
                                    
                                </form>
                            </div>
                        </div>
                    </card-header>
                    <div class="card-body">
                        <table class="table table-light table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Saldo</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query_infaq = mysqli_query($conn, "SELECT * FROM laporan_infaq");
                                    $recent_saldo = 0;
                                    while ($infaq = mysqli_fetch_array($query_infaq)) {
                                        $buat_tanggal = new DateTime($infaq['tanggal']);
										$format_tanggal = date_format($buat_tanggal,"d F Y");
                                        $saldo = hitungSaldo($recent_saldo, $infaq['pemasukan'], $infaq['pengeluaran']);
                                        $recent_saldo = $saldo;
                                ?>
                                <tr>
                                    <td><?=$format_tanggal?></td>
                                    <td><?=rupiah($infaq['pemasukan']) ?></td>
                                    <td><?=rupiah($infaq['pengeluaran']) ?></td>
                                    <td><?=$infaq['keterangan'] ?></td>
                                    <td><?=rupiah($saldo)?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Infaq section end -->
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
