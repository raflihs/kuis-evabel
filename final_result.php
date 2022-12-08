<?php
session_start();
include 'conn.php';

if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

if($_SESSION['status'] == "guru"){
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Pemrograman Dasar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    $siswa = mysqli_query($conn, "SELECT * FROM account WHERE id_acc = '" . $_SESSION['aGlobal']->id_acc . "' ");
    $n = mysqli_fetch_array($siswa);

    $soal = mysqli_query($conn, "SELECT id_soal FROM soal_tabel");
    $s = mysqli_num_rows($soal);

    $nilai_benar = $n['nilai'] / $s * 100;
    ?>
    <div class="box-container">
        <div class="quiz-container">
            <p style="text-align:center; margin-top:15px"><b><?php echo $_SESSION['aGlobal']->name_acc ?> (<?php echo $_SESSION['aGlobal']->nim ?>)</b></p>
            <p style="padding:15px 15px 0px 15px;text-align:center;">Nilai Kamu Adalah <b><?php echo round($nilai_benar) ?></b></p>
            <button style="float:right;margin:15px;"><a href="logout.php" onclick="return confirm('Anda yakin ingin keluar?')">Logout</a></button>
        </div>
    </div>
    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>
</body>

</html>