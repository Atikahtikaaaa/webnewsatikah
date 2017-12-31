<?php
include 'koneksi.php';
session_start();
if(isset($_GET['submit']))
{
	$user = $_GET['nama'];
	$pwd = $_GET['password'];
	
	$pdo = $conn->prepare('select * from user where user_name= :user and password= :pwd');
	
	$pdo->execute(array(':user'=>$user, ':pwd' => $pwd));
	
	$count = $pdo->rowcount();
	
	if($count==0)
	{
		echo "<center>Wrong user dan password!
				<br><b><a href='login.html'>Login ulang</a></b></center>";
	}
	else
	{
		$_SESSION['user'] = $user;  //tulisan session harus gede
		header("location:admin.php");
	}
}



?>