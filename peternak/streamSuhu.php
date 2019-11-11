<?php
    include "../koneksi.php";

    session_start();

    if (empty($_SESSION['ua']))
        header('location:../index.php');
        $session = $_SESSION['ua'];

    $sql = "SELECT `nilai_suhu` FROM `nilai` JOIN kepemilikan 
            ON nilai.id_kepemilikan = kepemilikan.id_kepemilikan JOIN pengguna
            ON pengguna.id_pengguna = kepemilikan.id_pengguna
            WHERE id_nilai = (SELECT MAX(id_nilai)FROM nilai) AND pengguna.username LIKE '$session'
            ";
    $hsl = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($hsl);
    foreach($r as $r=>$nsuhu);


   echo  "&value=".$nsuhu."";
?>