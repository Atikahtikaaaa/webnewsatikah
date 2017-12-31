<?php
include 'koneksi.php';

if (isset($_GET['submit']))
	{
		$firstname= $_GET['first_name'];
		$lastname= $_GET['last_name'];
		$username= $_GET['user_name'];
		$pwd= $_GET['password'];
		$pwd2= $_GET['retypepassword'];
		$email= $_GET['email'];
		if($pwd==$pwd2)
		{
			try{
				$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo = $conn->prepare('insert into user (first_name, last_name, user_name, password, email)
										values (:first, :last, :user, :pwd, :email)');
										
				$insertdata = array(':first'=>$firstname, ':last'=>$lastname, ':user'=>$username, ':pwd'=>$pwd, ':email'=>$email);
				
				$pdo->execute($insertdata);
				
				echo "<center>".$pdo->rowcount()."data berhasil disimpan</center>";
				echo "<center>Kembali kehalaman <a href='login.html'>Login</a></center>";
				
			}
			
			catch(PDOexception $e)
			{
				print "Insert data gagal: ". $e->getMessage()."</ br>";
				die();
			}
		
		}
		else
		{
			echo "<center>Password anda salah !</center>";
			echo "<center>Kembali kehalaman <a href='signup.html'>Sign Up</a></center>";
		}
	}
	
	



?>