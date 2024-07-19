<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infaq masjid</title>
    <?php include('../style/link.html') ?>
</head>
<body>
    <div class="container-fluid">
        <?php include('../navbar.php') ?>
        <div class="container pt-5">
            <h2 class="mt-5">Tambah Data Infaq</h2>
            <form action="edit_infaq.php" method="POST">
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="pemasukan">Pemasukan:</label>
                    <input type="number" class="form-control" id="pemasukan" name="pemasukan" placeholder="Masukkan jumlah pemasukan" required>
                </div>
                <div class="form-group">
                    <label for="pengeluaran">Pengeluaran:</label>
                    <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="Masukkan jumlah pengeluaran" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                </div>
                <button type="submit" name="tambah" class="btn btn-primary mt-3">Tambah</button>
            </form>
            <?php
            include ('../koneksi.php');
            if(isset($_POST['tambah'])){
                $tanggal = $_POST['tanggal'];
                $pemasukan = $_POST['pemasukan'];
                $pengeluaran = $_POST['pengeluaran'];
                $keterangan = $_POST['keterangan'];
                $query = mysqli_query($conn,"INSERT INTO laporan_infaq (tanggal, pemasukan, pengeluaran, keterangan) VALUES ('$tanggal', '$pemasukan', '$pengeluaran', '$keterangan');") ;
                if ($query){
                    ?>
					<div class="alert alert-warning mt-3" role="alert">
					Berhasil disimpan!
					</div>
					<?php
				};
            };
            ?>
        </div>

        <!-- Isi tabel -->
        <div class="container mt-5">
            <p class="h1 text-center">Data Infaq</p>
            <table class="table mt-3">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">pemasukan</th>
                    <th scope="col">pengeluaran</th>
                    <th scope="col">keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    function rupiah($angka){
                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                        return $hasil_rupiah;
                    }
                    function hitungSaldo($recent_saldo, $pemasukan, $pengeluaran) {
                        return $recent_saldo + ($pemasukan - $pengeluaran);
                    }
                    $query_infaq = mysqli_query($conn, "SELECT * FROM laporan_infaq");
                    $recent_saldo = 0;
                    while ($infaq = mysqli_fetch_array($query_infaq)) {
                        $buat_tanggal = new DateTime($infaq['tanggal']);
                        $format_tanggal = date_format($buat_tanggal,"d F Y");
                        $saldo = hitungSaldo($recent_saldo, $infaq['pemasukan'], $infaq['pengeluaran']);
                        $recent_saldo = $saldo;
                ?>
                    <tr>
                        <th scope="row"><?=$infaq['id'] ?></th>
                        <td><?=$format_tanggal ?></td>
                        <td><?=$infaq['pemasukan'] ?></td>
                        <td><?=$infaq['pengeluaran'] ?></td>
                        <td><?=$infaq['keterangan'] ?></td>
                    </tr>
                <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>