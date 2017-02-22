<?php  
session_start();
if (!isset($_SESSION['username'])) {
  header('location: ../login-admin.php');
}
else {
  $username = $_SESSION['username'];
}

 try{
    $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","aoki","password");
    //echo "koneksi berhasil";
}catch(PDOException$e){
    echo $e->getMessage();
}

$hasil = $koneksi->prepare("SELECT * FROM login");
$hasil->execute();
$data = $hasil->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/primary.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="../css/secondary.css" media="screen" title="no title" charset="utf-8">
<title>All User</title>

</head>
<body>

<ul>
  <li><a class="active" href="../index.php">Home</a></li>
  <li><a href="../input.php">New Article</a></li>
  <li><a href="guest-user/all-user.php">User</a></li>
  <li><a href="../logout.php">Logout</a></li>
</ul>

<?php
 

 foreach ($data as $key) {


?>
<br>
<div class="div-pri-content">

  <div class="div-card" style="width:100%;">
  <header class="div-pri-content header-colour">
      <center><h3><?= $key['nama'];?></h3></center>
    </header>
    <div class="div-pri-content">
      <p>Email : <?= $key['email']?></p>
      <hr>
      <div style="display:block;width:100%;">Password : <?= $key['password']?></div>
      <br>
</div>
<table style="width: 100%;color: #fff; background-color: #616161;">
<tr>
<td><a class="button button-green" href="../admin-access/edit-user.php?id=<?=$key['id'];?>">Edit</a></td>
<td><a class="button button-red" onclick="return confirm('Sure want to delete <?=$key['email'];?> with the name = <?=$key['nama'];?> ?')" href="../admin-access/delete-user.php?id=<?=$key['id'];?>">Delete</a></td>
</tr>
</table></div>
</div>
<br>
<?php

}

?>

</div>


</body>
</html>
