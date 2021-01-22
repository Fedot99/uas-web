<?php
session_start();

echo "Sedang keluar. Silahkan Tunggu....";

session_destroy();
header("Location: /komunitas/index.php")
?>