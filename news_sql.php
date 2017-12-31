<?php
	include 'koneksi.php';

	if(isset($_POST['submit'])){
		$judul = $_POST['txtjudul'];
		$berita = $_POST['txtberita'];
		$image = $_FILES['fileToUpload']['name'];

		$target_dir = "image/news/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        //echo "File is not an image.";
	        $uploadOk = 0;
	    }

	    if ($uploadOk == 1) {
	    	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
		    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    // } else {
		    //     echo "Sorry, there was an error uploading your file.";
		    // }
		}

		try {
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$pdo = $conn->prepare('INSERT INTO berita (judul_berita, isi_berita, nama_image) 
									values (:judul, :isi_berita, :nama_image)');

			$insertdata = array(':judul' => $judul, ':isi_berita' => $berita,
						':nama_image' => $target_file);

			$pdo->execute($insertdata);

			echo "<center>".$pdo->rowcount()."data berhasil disimpan</center>";
			echo "<center>Kembali kehalaman depan <a href='admin.php'>Lanjut</a></center>";

		} catch (PDOexception $e) {
			print "Insert data gagal: " . $e->getMessage() . "<br/>";
		   die();
		}	
	}elseif (isset($_POST['back']))
		{
		header("location:admin.php");
	}

	
?>