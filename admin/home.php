<?php include "../koneksi.php";
$q = "SELECT * FROM `pengguna`";
$q2 = "SELECT * FROM `pengguna` WHERE `status` LIKE 'Pemilik'";
$q3 = "SELECT * FROM `pengguna` WHERE `status` LIKE 'Peternak'";
$q4 = "SELECT * FROM `pengguna` WHERE `status` LIKE 'Admin'";
$q5 = "SELECT kepemilikan.id_kepemilikan, pengguna.nama_pengguna,alat.nama_alat,pengguna.status FROM
kepemilikan JOIN pengguna ON kepemilikan.id_pengguna = pengguna.id_pengguna JOIN alat ON
alat.id_alat = kepemilikan.id_alat";
$h = mysqli_query($con, $q);
$h2 = mysqli_query($con, $q2);
$h3 = mysqli_query($con, $q3);
$h4 = mysqli_query($con, $q4);
$h5 = mysqli_query($con,$q5);
$r = mysqli_fetch_assoc($h);
$r2 = mysqli_fetch_assoc($h4);
$r3 = mysqli_fetch_assoc($h5);
session_start();

if (empty($_SESSION['ua']))
    header('location:../index.php');

?>

<html>

<head>
    <title>SITETAS (Sistem Informasi Alat Tetas telur) | <?php echo $_SESSION['ua']; ?> Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    


    <nav class="navbar navbar-expand-sm" style="background-color: #a0ff99">

        <!-- Brand/logo -->
        <a class="navbar-brand" href="home.php">
            <img src="images/logo-ayam.png" style="width:40px" alt="logo"></a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#m2">Tampil Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#m3">Menambah Pemilik</a>
            </li>
            <li class="nav-item">
                <a class="nav"></a>
            </li>
            <li class="nav-item">
                <a class="nav"></a>
            </li>
            <li class="nav-item">
                <a class="nav"></a>
            </li>
            <li class="nav-item">
                <a class="nav"></a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION['nama']; ?>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="editadmin.php?id_pengguna=<?php echo $r2['id_pengguna']; ?>">Edit Profile</a>
                    <a class="dropdown-item" href="logout.php">Keluar</a>
                </div>
        </ul>

    </nav>

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong>Selamat datang <?php echo $_SESSION['nama']; ?>.
    </div>



    <section class="menu3" id="m3">
        <div class="content">
            <h1>Menambah Pemilik / Pengguna</h1>
            <div class="kotak_login">
                <form action="proses_add.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id_pengguna" class="form_1" placeholder="10304x00x">
                    <input type="text" name="nama" class="form_1" placeholder="Nama Lengkap">
                    <p />
                    <input type="text" name="un" class="form_1" placeholder="username">
                    <p />
                    <input type="password" name="pwd" class="form_1" placeholder="password">
                    <p />
                    <div class="idstat">
                        <select name="stat">
                            <option value="Admin">Admin</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Peternak">Peternak</option>
                        </select>
                    </div>
                    <input type="submit" value="simpan" class="button">
                    </select>
                    <link rel="stylesheet" href="sytleform.css">
                </form>
            </div>
        </div>
    </section>
    <div class="clear"></div>
    <section class="menu4" id="m4">
        <div class="content">
            <h1>Menambah Kepemilikan</h1>
            <?php
            include '../koneksi.php';
            $q = "SELECT * FROM `pengguna` ORDER BY `pengguna`.`id_pengguna` ASC";
            $q2 = "SELECT * FROM `alat` ORDER BY `id_alat` ASC ";
            $hsl = mysqli_query($con, $q);
            $hsl2 = mysqli_query($con, $q2);
            ?>
            <div class="kotak_login2">
                <form action="proses_add2.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_kepemilikan">
                    <select name="id_alat">
                        <?php while ($data = mysqli_fetch_assoc($hsl2)) { ?>
                            <option value="<?php echo $data['id_alat']; ?>">
                                <?php echo "id alat : ";
                                    echo $data['id_alat'];
                                    echo " Nama alat : ";
                                    echo $data['nama_alat'];    
                                ?></option>
                        <?php } ?>
                    </select> <br>
                    <select name="id_pengguna">
                        <?php while ($data = mysqli_fetch_assoc($hsl)) { ?>
                            <option value="<?php echo $data['id_pengguna']; ?>">
                                <?php echo "id Pengguna : ";
                                    echo $data['id_pengguna'];
                                    echo " Nama Pengguna : ";
                                    echo $data['nama_pengguna']; 
                                    ?></option>
                        <?php } ?>
                    </select>
                    
                    <input type="submit" value="simpan" class="button">
                    <link rel="stylesheet" href="sytleform.css">
                </form>
            </div>
        </div>
    </section>

    <div class="clear"></div>
    <div class="clear"></div>

    <section class="menu2" id="m2">
        <div class="content">
            <br><br><br>
            <h1>Data Pemilik</h1>

            <br />
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pengguna</th>
                        <th colspan="3">Nama Pengguna</th>
                        <th>
                        <th>
                        <th>
                        <th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $no = 1;
                    while ($row = mysqli_fetch_array($h2)) {
                        echo '<tr>
                                <td>' . $no . '</td>
                                <td>' . $row['id_pengguna'] . '<td>
                                <td>' . $row['nama_pengguna'] . '<td>
                                <td><a href="edit.php?id_pengguna=' . $row['id_pengguna'] . '" >Ubah</a><td>
                                <td><a href="hapus.php?id_pengguna=' . $row['id_pengguna'] . '">hapus</a><td>
                        </tr>';
                        $no++;
                    }
                    ?>

                </tbody>

            </table>
    </section>
    <div class="clear"></div>



    <section class="menu2" id="m2b">
        <h1>Data Peternak</h1>
        <br>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pengguna</th>
                    <th colspan="3">Nama Pengguna</th>
                    <th>
                    <th>
                    <th>
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($h3)) {
                    echo '<tr>
                                <td>' . $no . '</td>
                                <td>' . $row['id_pengguna'] . '<td>
                                <td>' . $row['nama_pengguna'] . '<td>
                                <td><a href="edit.php?id_pengguna=' . $row['id_pengguna'] . '" >Ubah</a><td>
                                <td><a href="hapus.php?id_pengguna=' . $row['id_pengguna'] . '">hapus</a><td>
                        </tr>';
                    $no++;
                }
                ?>
            </tbody>

        </table>

        </div>
    </section>
    <div class="clear"></div>

    <section class="menu2" id="m2b">
        <h1>Data Kepemilikan</h1>
        <br>
        <table class="data-table" border="1" cellpadding="10" style="text-align:center;">
            <thead>
                <tr>
                    <th>No<th>
                    <th>Id Kepemilikan</th>
                    <th>Nama Pemilik</th>
                    <th colspan="2">Nama Alat</th>
                    <th colspan="2">Status</th>
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($h5)) {
                    echo '<tr>
                                <td>' . $no . '</td>
                                <td>' . $row['id_kepemilikan'] . '<td>
                                <td>' . $row['nama_pengguna'] . '<td>
                                <td>' . $row['nama_alat'] . '<td>
                                <td>' . $row['status'] . '<td>
                        </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
        </div>
    </section>
    <div class="clear"></div>


</body>



<script type="text/javascript" src="script.js">

</script>

</html>