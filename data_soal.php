<?php
session_start();
include 'conn.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if($_SESSION['status'] == "siswa"){
    header("location:quiz.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--START NAVBAR -->
    <div class="container-nav">
        <h2><a href="#">Kuis Pemrograman Dasar</a></h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="data_soal.php">Data Soal</a></li>
            <li><a href="data_nilai.php">Data Nilai</a></li>
            <li><a onclick="return confirm('Anda yakin ingin keluar?')" href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <!-- END NAVBAR -->

    <!-- START SECTION -->

    <!-- CONTENT -->
    <div class="section">
        <div class="container">
            <h3>Daftar Soal</h3>
            <div class="box">
                <?php
                $list_soal = mysqli_query($conn, "SELECT * FROM soal_tabel ORDER BY id_soal DESC");
                $no_soal = mysqli_fetch_array($list_soal);
                ?>
                <button><a style="color:black " href="tambah-soal.php?id=<?php echo $no_soal['id_soal'] + 1 ?>">Tambah Soal</a></button>
                <table border="1" cellspacing="0" class="table" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Soal</th>
                            <th width="90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        $list_soal = mysqli_query($conn, "SELECT * FROM soal_tabel ORDER BY id_soal ASC");
                        $opsi_benar = mysqli_query($conn, "SELECT * FROM opsi_jawab");
                        $o = mysqli_fetch_array($opsi_benar);
                        if (mysqli_num_rows($list_soal) > 0) {
                            while ($row = mysqli_fetch_array($list_soal)) {
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td style="text-align: justify"><?php echo $row['teks_soal'] ?></td>
                                    <td>
                                        <a href="proses-hapus.php?ids=<?php echo $row['id_soal'] ?>" onclick="return confirm('Yakin ingin Hapus?')"">Hapus</a></td>
                            </tr>
                        <?php }
                        } else { ?>
                            <tr>
                                <td colspan=" 3">Data tidak tersedia
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>

    <!-- END SECTION -->
</body>

</html>