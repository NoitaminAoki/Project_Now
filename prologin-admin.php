<?php
session_start();
require_once("koneksi.php");
$username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT*FROM login_admin WHERE username = '$username'";
  $query = $db->query($sql);
  $hasil = $query->fetch_assoc();
  if ($query->num_rows == 0) {
    echo "email tidak terdaftar!";
  }else {
    ?>
    


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
        <link rel="stylesheet" href="css/secondary.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div class="div-pri-content">

  <div class="div-card" style="width:100%;">
    <header class="div-pri-content header-colour">
      <center><h3><?php if ($password != $hasil['password']) {
      echo "password salah"; 
      }else {
      $_SESSION['username'] = $hasil['username'];
      header('location: guest-user/all-user.php');
    }
  }?></h3></center>
    </header>
    <div class="div-pri-content div-colour">
      <p></p>
      <hr>
      <div style="display:block;width:100%;"></div>
      <br>
    </div>
    <a href="login-admin.php"><button class="button-readmore button-darkgrey">Back to Login</button></a>
  </div>
</div>
</div>
</body>
</html>