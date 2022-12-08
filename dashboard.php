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

    <!-- START Section -->

    <div class="container">
        <div class="section">
            <p style="font-weight:bold;font-size:22px;">Dashboard</p>
            <div class="box">
                <p>Selamat Datang <b> <?php echo $_SESSION['aGlobal']->name_acc ?></b></p>
            </div>
        </div>
    </div>
    <!-- END Section -->

    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>
</body>

</html>