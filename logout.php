<?php 
session_start();
// Ketika user menekan tombol logout maka sesi akan dihapus
session_destroy();
header('location:login.php');
 ?>