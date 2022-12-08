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

    <!-- CONTENT -->
    <!-- CONTENT -->

    <div class="section">
        <div class="container">
            <h3><a href="data_soal.php">Data Soal</a> - <a href="tambah-soal.php?id=<?php echo $_GET['id']; ?>">Tambah Soal</a> </h3>
            <div class="box">
                <form action="" method="POST">
                    <label for="">Soal</label>
                    <input type="text" name="soal"  class="input-form" required>
                    <label for="">Opsi A</label>
                    <input type="text" name="opsiA"  class="input-form" required>
                    <label for="">Opsi B</label>
                    <input type="text" name="opsiB"  class="input-form" required>
                    <label for="">Opsi C</label>
                    <input type="text" name="opsiC"  class="input-form" required>
                    <label for="">Opsi D</label>
                    <input type="text" name="opsiD" class="input-form" required>
                    <input type="submit" name="submit" value="Submit" class="input-submit">
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $max = mysqli_query($conn, "SELECT MAX(id_soal) FROM soal_tabel");
                        $no = $_GET['id'];
                        
                        
                        
                        $soal = $_POST['soal'];
                        $opsiA = $_POST['opsiA'];
                        $opsiB = $_POST['opsiB'];
                        $opsiC = $_POST['opsiC'];
                        $opsiD = $_POST['opsiD'];

                        $add_soal = mysqli_query($conn, "INSERT INTO soal_tabel VALUES ('".$no."','".$soal."',0)");
                        $add_opsiA = mysqli_query($conn, "INSERT INTO opsi_jawab VALUES ('".$no."', '".$opsiA."',1)");
                        $add_opsiB = mysqli_query($conn, "INSERT INTO opsi_jawab VALUES ('".$no."', '".$opsiB."',2)");
                        $add_opsiC = mysqli_query($conn, "INSERT INTO opsi_jawab VALUES ('".$no."', '".$opsiC."',3)");
                        $add_opsiD = mysqli_query($conn, "INSERT INTO opsi_jawab VALUES ('".$no."', '".$opsiD."',4)");
                        if($add_soal){
                            $next_opsi = $_GET['id'];
                            echo '<script>alert("Soal berhasil ditambahkan")</script>';
                            header("location:tambah-opsi.php?id=$next_opsi");
                            // <script>window.location=""</script>
                        }else{
                            echo '<script>alert("Gagal menambah soal")</script>';
                        }
                    }
                ?>
            </div>
        </div> 
    </div>
    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>

</body>

</html>