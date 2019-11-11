<?php 
    include "../koneksi.php";
    $kiriman = $_GET["id_pengguna"];
    
    $q = "DELETE FROM `pengguna` WHERE `pengguna`.`id_pengguna` = '$kiriman'";
    mysqli_query($con,$q);

    header('location:home.php');

?>