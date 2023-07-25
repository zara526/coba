<?php

$server = "Localhost";
$user = "root";
$pass ="";
$database = "zabaya_login";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>