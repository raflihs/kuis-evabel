<?php
    include 'conn.php';

    if($_GET['ids']){
        $delete_soal = mysqli_query($conn, "DELETE FROM soal_tabel WHERE id_soal = '".$_GET['ids']."' ");
        $delete_opsi = mysqli_query($conn, "DELETE FROM opsi_jawab WHERE id_soal = '".$_GET['ids']."'");
        echo '<script>alert("Soal berhasil di hapus")</script>';
        echo '<script>window.location="data_soal.php"</script>';
    }
?>