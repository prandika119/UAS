<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Masjid Al-Hikmah</title>
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
							<p class="h1 mt-5">Layanan Masjid</p>
						</div>
						<div class="row my-5">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<p>
                                "Selamat datang di halaman Layanan Masjid, di mana Anda dapat mengetahui berbagai layanan yang kami sediakan untuk jamaah. Mulai dari konsultasi keagamaan, layanan zakat, nikah, hingga bimbingan haji dan umrah. Kami siap melayani kebutuhan Anda dengan sepenuh hati."
								</p>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- Title section end -->
        <!-- Layanan masjid section -->
        <div class="container">

            <?php
                $query_layanan = mysqli_query($conn, "SELECT * FROM layanan l JOIN galeri g ON l.id = g.id_layanan");
                $path_foto = "assets/";
                $temp = 1;
                while($layanan = mysqli_fetch_array($query_layanan)){
                    if($temp % 2 == 1){
            ?>
                        <div class="row my-5" data-aos="fade-right" data-aos-duration="1000">
                            <div class="col-md-4">
                                <img src="<?= $path_foto.$layanan['link']?>" class= "img-fluid" alt="">
                            </div>
                            <div class="col-md-8">
                                <h1><?php echo $layanan['nama_layanan']; ?></h1>
                                <p><?php echo $layanan['deskripsi']; ?></p>
                            </div>
                        </div>
                        <hr>
            <?php }else { ?>
                <div class="row my-5" data-aos="fade-right" data-aos-duration="1500">
                    <div class="col-md-8" >
                        <h1><?php echo $layanan['nama_layanan']; ?></h1>
                        <p><?php echo $layanan['deskripsi']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?= $path_foto.$layanan['link']?>" class= "img-fluid" alt="">
                    </div>
                </div>
                <hr>
            <?php
                        }
                    $temp++;    
            } 
            ?>
        </div>
        <!-- Layanan masjid section end -->
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