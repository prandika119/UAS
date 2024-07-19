<?php
    include('koneksi.php');
    $id = $_GET['id'];
    $query_artikel = mysqli_query ($conn, "SELECT * FROM artikel a JOIN galeri g ON a.id = g.id_artikel JOIN takmir t ON t.id_takmir = a.penulis_id WHERE a.id = $id ");
    $artikel = mysqli_fetch_array ($query_artikel);
    $buat_tanggal = new DateTime($artikel['tgl_uploud']);
	$format_tanggal = date_format($buat_tanggal,"d F Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Artikel</title>
    <?php include('style/link.html')?>
</head>
<body>
    <div class="container-fluid px-0">
        <?php include('navbar.php')?>

        <!-- Isi artikel -->
        <div class="container mt-5">
            
            <div class="row mt-5">
                <div class="col-md-8 mt-5">
                    <!-- Artikel Utama -->
                    <div class="card mb-4">
                        <img src="assets/<?= $artikel['link']?>" class="card-img-top" alt="Gambar Artikel">
                        <div class="card-body">
                            <div class="row d-flex text-center">
                                <div class="col-md-6">
                                    <small class="text-body-secondary"><?= $format_tanggal?></small>
                                </div>
                                <div class="col-md-6">
                                    <p>penulis: <?= $artikel['nama']?></p>
                                </div>
                            </div>
                            <hr>
                            <h1 class="card-title text-center"><?= $artikel['judul'] ?></h1>
                            <p class="card-text text-center mt-3">
                                <?=$artikel['konten'] ?>
                            </p>
                        </div>
                    </div>  
                </div>

                <!-- Sidebar -->
                <div class="col-md-4 mt-5">
                    <div class="card my-4">
                        <h5 class="card-header">Artikel Lain</h5>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <?php 
                                    $all_artikel = mysqli_query($conn, "SELECT*FROM artikel");
                                    while ($data = mysqli_fetch_array($all_artikel)) {
                                ?>
                                <li><a href="detail-artikel.php?id=<?=$data['id'] ?>"><?=$data['judul'] ?></a></li>
                                    <?php }; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
