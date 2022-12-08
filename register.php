<?php
include 'conn.php';
error_reporting(0);

if ($_SESSION['status_login'] == true) {
    echo '<script>window.location="quiz.php"</script>';
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
    <div class="box-container">
        <div class="quiz-container">
            <h1>Daftar Akun</h1>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" class="form-input" required>
                <input type="text" name="nisn" placeholder="NISN" class="form-input" required>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-input" required>
                <input type="email" name="email" placeholder="Email" class="form-input" required>
                <input type="password" name="password" placeholder="Password" class="form-input" required>
                <input type="submit" name="submit" class="btn btn-primary" style="width:80%; margin: 10px 60px; margin-bottom:20px;" required>
            </form>

            <?php

            if (isset($_POST['submit'])) {
                $username = ($_POST['username']);
                $nisn = ($_POST['nisn']);
                $nama = strtoupper($_POST['nama']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);

                $add = mysqli_query($conn, "INSERT INTO account VALUES 
            (null,'" . $nisn . "','" . $username . "', '" . $nama . "', '" . $email . "','" . $password . "','siswa', 0)");

                echo '<script>alert("Akun Berhasil Didaftarkan")</script>';
                echo '<script>window.location="login.php"</script>';
            }
            ?>
        </div>
    </div>
</body>