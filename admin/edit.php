<html>
<head>
  <title>update user</title>
</head>
<body>
<h1>Form update User</h1>
<?php
     include "../koneksi.php";

    $kiriman = $_GET["id_pengguna"];
    $q = "select * from pengguna where id_pengguna = '$kiriman'";
    $h = mysqli_query($con,$q); 
    $r = mysqli_fetch_assoc($h);

    $Alevel = array("peternak","admin");
?>
<div class="kotak_login">
<form action="proses_edit.php" method="POST" enctype="multipart/form-data"> 
    <input type="text" name="nama" placeholder="Nama Lengkap" class="form_login"  value="<?php echo $r["nama_pengguna"]; ?>"><p/>
    <input type="text" name="un" placeholder="username" class="form_login" value="<?php echo $r["username"]; ?>"><p/>
    <input type="password" name="pwd" placeholder="password" class="form_login" value="<?php echo $r["password"]; ?>"><p/>
    <select name="stat" >
        <option value="Admin">Admin</option>
        <option value="Pemilik">Pemilik</option>
        <option value="Peternak">Peternak</option>
      </select> <p/>
        <input type="submit" value="simpan" class="button">
        <input type="hidden" name="idnya" value="<?php echo $r["id_pengguna"];?>"> 
              
    </select>
</form>
</div>

<link rel="stylesheet" href="sytleform.css">
</body>

</html>
