<?php
try{
	$koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","aoki","password");
	//echo "koneksi berhasil";
}catch(PDOException$e){
	echo $e->getMessage();
}

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$id = $_POST['id'];

		$sql = "UPDATE login SET email='$email',password='$password' WHERE id='$id';";
		$ins = $koneksi->prepare($sql);
		$r = $ins->execute();
		if ($r) {
			header("location:../guest-user/all-user.php");
		}else{
			echo "gagal";
		}
		
	}
?>