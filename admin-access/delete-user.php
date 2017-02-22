<?php
try{
    $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","aoki","password");
    //echo "koneksi berhasil";
}catch(PDOException$e){
    echo $e->getMessage();
}

$id = $_GET['id'];

$data = $koneksi->prepare("DELETE FROM login where id='$id'");
$del = $data->execute();

if ($del) {
			header("location:../guest-user/all-user.php");
		}else{
			echo "gagal";
		}
?>