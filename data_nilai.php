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
            <h3>Daftar Nilai Siswa</h3>
            <div class="box">
                <table border="1" cellspacing="0" class="table" style="margin-top:10px">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th width="150px">NIM</th>
                            <th>Nama Siswa</th>
                            <th width="90px">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $list_siswa = mysqli_query($conn, "SELECT * FROM account WHERE status = 'siswa' ORDER BY nim ASC");
                        if (mysqli_num_rows($list_siswa) > 0) {
                            while ($no_siswa = mysqli_fetch_array($list_siswa)) {
                                $soal = mysqli_query($conn, "SELECT * FROM soal_tabel ORDER BY id_soal DESC");
                                $s = mysqli_fetch_object($soal);
                                $nilai_benar = $no_siswa['nilai'];
                                $jumlah_soal = $s->id_soal;

                                $nilai = $nilai_benar / $jumlah_soal * 100;
                        ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $no_siswa['nim'] ?></td>
                                    <td><?php echo $no_siswa['name_acc'] ?></td>
                                    <td id="nilai"><?php echo round($nilai) ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <p style="margin-top:20px;font-size:14px;">* Penambahan/pengurangan soal akan memengaruhi nilai siswa.</p>
            </div>
        </div>
    </div>
    <footer>Copyright &copy; 2022 - Rafli Hada Setiawan</footer>

    <!-- END SECTION -->
    <!-- <script>
        var number = <?php echo $nilai ?>;
        var nilai = document.getElementById("nilai").innerHTML = (number.toFixed(2));
    </script> -->
</body>

</html>