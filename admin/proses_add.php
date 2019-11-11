<?php

$id = $_POST["id_pengguna"];
$nama = $_POST["nama"];
$a = $_POST["un"];
$b = md5($_POST["pwd"]); //Membuat Password menjadi encryp
$c = $_POST["stat"];


    include "../koneksi.php";
   $q ="INSERT INTO `pengguna`
    (`id_pengguna`, `nama_pengguna`, `username`, `password`, `status`)
    VALUES ('$id', '$nama', '$a', '$b', '$c')";

   mysqli_query($con,$q);

   header("location:home.php");
 ?>

