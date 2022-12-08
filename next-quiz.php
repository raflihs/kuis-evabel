<?php
session_start();
error_reporting(0);
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
    if ($_GET['no'] == "" || $_GET['no'] == "0") {
        echo '<script>window.location="quiz-next.php?no=1"</script>';
    }
    $soal = mysqli_query($conn, "SELECT * FROM soal_tabel WHERE id_soal = " . $_GET['no'] . "");
    $s = mysqli_fetch_array($soal);
    ?>
    <div class="box-container">
        <div class="quiz-container">
            <p class="text-name"><b><?php echo $_SESSION['aGlobal']->name_acc ?> (<?php echo $_SESSION['aGlobal']->nim ?>)</b></p>
            <h1>Quiz Pemrograman Dasar #<?php echo $s['id_soal'] ?> </h1>
            <div class="quiz-poin">
                <h2 id="question" name="question" value="<?php echo $s['id_soal'] ?>"><?php echo $s['teks_soal'] ?></h2>
                <form action="" method="POST">
                    <ul>
                        <li>
                            <?php
                            $opsi1 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['no'] . "' AND id_opsi = 1 ");
                            $o1 = mysqli_fetch_array($opsi1);

                            $opsi2 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['no'] . "' AND id_opsi = 2 ");
                            $o2 = mysqli_fetch_array($opsi2);

                            $opsi3 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['no'] . "' AND id_opsi = 3 ");
                            $o3 = mysqli_fetch_array($opsi3);

                            $opsi4 = mysqli_query($conn, "SELECT * FROM opsi_jawab WHERE id_soal = '" . $_GET['no'] . "' AND id_opsi = 4 ");
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

                $list_soal = mysqli_query($conn, "SELECT * FROM soal_tabel ORDER BY id_soal DESC");
                $no_soal = mysqli_fetch_array($list_soal);

                if (isset($_POST['submit'])) {
                    $jawab = mysqli_query($conn, "SELECT * FROM soal_tabel WHERE id_soal = '" . $_GET['no'] . "' ");
                    $jawab1 = mysqli_query($conn, "SELECT id_opsi FROM soal_tabel WHERE id_soal = '" . $_GET['no'] . "' ");
                    $j = mysqli_fetch_array($jawab1);

                    $jawaban = ($_POST['answer']);
                    $nextQuiz = $s['id_soal'] + 1;

                    $ac = $_SESSION['aGlobal']->id_acc;
                    $acc = mysqli_query($conn, "SELECT * FROM account WHERE id_acc = '" . $ac . "' ");
                    $acc1 = mysqli_fetch_array($acc);

                    if ($s['id_soal'] == $no_soal['id_soal']) {
                        if ($jawaban != $j['id_opsi']) {
                            $nilai = $_SESSION['aGlobal']->nilai;
                        } else if (isset($_POST['answer']) == $j['id_opsi']) {
                            $update = mysqli_query($conn, "UPDATE account SET nilai = '" . $acc1['nilai'] + 1 . "' WHERE id_acc = '" . $_SESSION['aGlobal']->id_acc . "' ");
                        }
                        header("location:final_result.php");
                    } else if ($s['id_soal'] != $no_soal['id_soal']) {
                        if ($jawaban != $j['id_opsi']) {
                            $nilai = $_SESSION['aGlobal']->nilai;
                        } else if (isset($_POST['answer']) == $j['id_opsi']) {
                            $update = mysqli_query($conn, "UPDATE account SET nilai = '" . $acc1['nilai'] + 1 . "' WHERE id_acc = '" . $_SESSION['aGlobal']->id_acc . "' ");
                        }
                        header("location:next-quiz.php?no=$nextQuiz");
                    }
                }
                if ($_GET['no'] > $no_soal['id_soal']) {
                    header("location:next-quiz.php?no=1");
                }
                ?>
            </div>
        </div>
    </div>
    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>
</body>

</html>