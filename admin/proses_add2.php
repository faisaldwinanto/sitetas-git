<?php
$id_alat = $_POST['id_alat'];
$id_pengguna = $_POST['id_pengguna'];

include "../koneksi.php";

$q = "INSERT INTO `kepemilikan`(`id_alat`, `id_pengguna`) 
VALUES ('$id_alat','$id_pengguna')";

mysqli_query($con,$q);

header("location:home.php");
 ?>

