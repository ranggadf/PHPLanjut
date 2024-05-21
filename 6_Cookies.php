<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Cokies </title>
</head>
<?php
$nama = "Rangga Dhiyaf";
$email = "ranggadf@example.com";

setcookie("nama", $nama, time() + (10 * 30), "/"); 
setcookie("email", $email, time() + (10 * 30), "/");

echo "Data identitas Anda telah disimpan dalam cookies.";

if(isset($_COOKIE['nama']) && isset($_COOKIE['email'])) {
    $nama = $_COOKIE['nama'];
    $email = $_COOKIE['email'];
    echo "<br>Nama: $nama <br>Email: $email";
} else {
    echo "<br>Data identitas tidak ditemukan dalam cookies.";
}
?>