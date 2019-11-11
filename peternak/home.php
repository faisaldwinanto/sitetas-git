<?php include "../koneksi.php";
$q = "SELECT * FROM `pengguna`";
$q2 = "SELECT * FROM `nilai`";
$h = mysqli_query($con, $q);
$h2 = mysqli_query($con, $q2);
$r = mysqli_fetch_assoc($h);

session_start();

if (empty($_SESSION['ua']))
    header('location:../index.php');
$session = $_SESSION['ua'];
$session2 = $_SESSION['id_alat'];
?>

<html>

<head>
    <title><?php echo $_SESSION['nama']; ?> | Home</title>
    <script type="text/javascript" src="../fc/js/fusioncharts.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../DataTables/DataTables-1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../DataTables/Buttons-1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../DataTables/ColReorder-1.5.2/css/colReorder.dataTables.min.css">
    <!--JS ext-->
    <script src="../DataTables/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <script src="../DataTables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="../DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="../DataTables/Buttons-1.6.1/js/buttons.html5.min.js"></script>
    <script src="../DataTables/Buttons-1.6.1/js/buttons.colVis.min.js"></script>
    <script src="../DataTables/Buttons-1.6.1/js/buttons.flash.min.js"></script>
    <script src="../DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>
    <script src="../DataTables/ColReorder-1.5.2/js/dataTables.colReorder.js"></script>
    <script src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src='angular.js'></script>
    <script src='angular2.js'></script>
    <script src='line.js'></script>
    <script src='line2.js'></script>
    <script src="generate.js"></script>
    <script src="datatables.js"></script>

</head>

<body>


    <nav class="navbar navbar-expand-sm" style="background-color: #a0ff99">

        <!-- Brand/logo -->
        <a class="navbar-brand" href="home.php">
            <img src="images/logo-ayam.png" style="width:40px" alt="logo"></a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#suhu">Tampil Suhu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#kelembaban">Tampil Kelembaban</a>
            </li>

            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo $_SESSION['nama']; ?>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Keluar</a>

                </div>
            </li>
        </ul>

    </nav>



    <section class="generate">
        <div>
            <?php
            include '../koneksi.php';

            $q = "SELECT kepemilikan.id_kepemilikan,pengguna.nama_pengguna,alat.nama_alat FROM kepemilikan JOIN
        pengguna ON kepemilikan.id_pengguna = pengguna.id_pengguna JOIN alat ON alat.id_alat = kepemilikan.id_alat WHERE pengguna.username LIKE '$session' ORDER BY `id_kepemilikan` ASC";
            $hsl = mysqli_query($con, $q);
            ?>
            <h1>Generate Data</h1>
            <form class="id_kepemilikan">
                <label for="">Pilih Pengguna : </label>
                <select id="id_kepemilikan">
                    <option></option>
                    <?php while ($data = mysqli_fetch_assoc($hsl)) { ?>
                        <option value="<?php echo $data['id_kepemilikan']; ?>">
                            <?php echo "Id Kepemilikan : ";
                                echo $data['id_kepemilikan'];
                                echo " | Nama Pengguna : ";
                                echo $data['nama_pengguna'];
                                echo " | Alat : ";
                                echo $data['nama_alat'];
                                ?></option>
                    <?php } ?>
                </select>
            </form>
            <button id="status_sensor">ON</button>
            <div id="loading"></div>
        </div>
    </section>



    <section class="menu2" id="m2">
    <div class="container-fluid">
		<!-- Control the column width, and how they should appear on different devices -->
		<div class="row">
			<div class="col-md-6">
				<div id="angularReal"></div>
			</div>
			<div class="col-md-6">
				<div id="graphSuhu"></div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<div id="angularReal2"></div>
			</div>
			<div class="col-md-6">
				<div id="graphKelembaban"></div>
			</div>
		</div>

		<div class="clear"></div>
		<br>
    </section>
    <div class="clear"></div>
    <div class="clear"></div>


</body>

<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="script.js"> </script>


</html>