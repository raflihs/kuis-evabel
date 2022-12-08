<?php
include 'conn.php';
session_start();
error_reporting(0);

if ($_SESSION['status_login'] == true) {
    echo '<script>window.location="quiz.php"</script>';
}

if (isset($_POST))
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
        <div class="quiz-container" style="width:270px;">
            <h1>Login</h1>
            <form action="" Method="POST">
                <input type="text" name="username" placeholder="Username" class="input-control">
                <input type="password" name="password" placeholder="Password" class="input-control">
                <input type="submit" name="submit" value="Login" class="btn-login">
            </form>
            <button class="btn-register"><a href="register.php">Register</a></button>

            <?php
        session_start();

        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $cek = mysqli_query($conn, "SELECT * FROM account WHERE username = '" . $username . "' AND password = '" . $password . "' ");
            if (mysqli_num_rows($cek) > 0) {
                $d = mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['aGlobal'] = $d;
                $_SESSION['status'] = $d->status;
                $_SESSION['id'] = $d->id_acc;

                if ($d->status == "guru") {
                    echo '<script>alert("Selamat Datang!")</script>';
                    echo '<script>window.location="dashboard.php"</script>';
                } else if ($d->status == "siswa") {
                    $update = mysqli_query($conn, "UPDATE account SET nilai = 0 WHERE id_acc = '" . $_SESSION['aGlobal']->id_acc . "' ");
                    echo '<script>alert("Selamat Datang!")</script>';
                    echo '<script>window.location="quiz.php"</script>';
                }
            } else {
                echo '<script>alert("Username atau Password Anda Salah!")</script>';
            }
        }
            ?>
        </div>
    </div>
</body>

</html>