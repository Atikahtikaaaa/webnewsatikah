<?php

	try{
		$conn = new PDO('mysql:host=localhost; dbname=mahasiswa',"root","");
		
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		/*echo 'connected to database<br />';*/
		
	}
	catch(Exception $e){
		print "koneksi atau query bermasalah" .$e->getMessage()."<br />";
		die();
		
	}

?>