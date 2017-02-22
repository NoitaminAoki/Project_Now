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

$id = $_GET['id'];

$data = $koneksi->prepare("SELECT * FROM login WHERE id='$id'");
$data->execute();
$row = $data->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
<head>

	<title>Edit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/primary.css" media="screen" title="no title" charset="utf-8">

	
</head>
<body>
<ul>
  <li><a class="active" href="../index.php">Home</a></li>
  <li><a href="../input.php">New Article</a></li>
  <li><a href="../guest-user/all-user.php">User</a></li>
  <li><a href="../logout.php">Logout</a></li>
</ul>

<form method="POST" action="update-user.php">
<input type="hidden" name="id" value="<?=$row->id;?>">
	<table>
		<tr>
		  <td><span style="color:green;font-size: 25px;">
              Email :
              </span></td>
			<td><input type="text" name="email" value="<?=$row->email;?>"></td>
		</tr>
        <tr>
            <td><br></td>
        </tr>
		<tr>
        <td><span style="color:green;font-size: 25px;">
              Password :
              </span></td>
		<td><input type="text" name="password" value="<?=$row->password;?>"></td>
		</tr>
        <tr>
            <td><br></td>
        </tr>
			<tr>
				<td><button name="submit" type="submit" class="button">Update</button></td>
			</tr>
	</table>
</form>

</body>
</html>