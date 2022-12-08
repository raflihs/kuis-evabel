<?php
session_start();
include 'conn.php';

session_destroy();
echo '<script>window.location="login.php"</script>';
?>