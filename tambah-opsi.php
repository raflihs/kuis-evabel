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


    <div class="box-container">
        <div class="quiz-container">
            <h2 style="margin-top:10px;text-align:center;">Silahkan Pilih Jawaban yang Benar</h2>
            <?php
            $soal = mysqli_query($conn, "SELECT * FROM soal_tabel WHERE id_soal = " . $_GET['id'] . "");
            $s = mysqli_fetch_array($soal);
            ?>
            <div class="quiz-poin">
                <h2 id="question" name="question" value="<?php echo $s['id_soal'] ?>"><?php echo $s['teks_soal'] ?></h2>
                <form action="" method="POST">
                    <ul>
                        <li>
                            <?php
                            $opsi1 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['id'] . "' AND id_opsi = 1 ");
                            $o1 = mysqli_fetch_array($opsi1);

                            $opsi2 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['id'] . "' AND id_opsi = 2 ");
                            $o2 = mysqli_fetch_array($opsi2);

                            $opsi3 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['id'] . "' AND id_opsi = 3 ");
                            $o3 = mysqli_fetch_array($opsi3);

                            $opsi4 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['id'] . "' AND id_opsi = 4 ");
                            $o4 = mysqli_fetch_array($opsi4);

                            ?>
                            <input type="radio" name="answer" value="<?php echo $o1['id_opsi'] ?>">
                            <label class="answer" for="a"><?php echo $o1['opsi'] ?></label>
                        </li>

                        <li>
                            <input type="radio" name="answer" value="<?php echo $o2['id_opsi'] ?>">
                            <label class="answer" for="a"><?php echo $o2['opsi'] ?></label>
                        </li>

                        <li>
                            <input type="radio" name="answer" value="<?php echo $o3['id_opsi'] ?>">
                            <label class="answer" for="a"><?php echo $o3['opsi'] ?></label>
                        </li>

                        <li>
                            <input type="radio" name="answer" value="<?php echo $o4['id_opsi'] ?>">
                            <label class="answer" for="a"><?php echo $o4['opsi'] ?></label>
                        </li>
                    </ul>

                    <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="color:white;">

                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $jawaban = ($_POST['answer']);

                    $update = mysqli_query($conn, "UPDATE soal_tabel SET id_opsi = '" . $jawaban . "' WHERE id_soal = '" . $_GET['id'] . "'");

                    if ($update) {
                        echo '<script>alert("Jawaban Berhasil ditambahkan!")</script>';
                        header("location:data_soal.php");
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>