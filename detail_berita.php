<?php
	include("koneksi.php");
	session_start();
	$id = $_GET['id'];
	
		$query = $conn->prepare("SELECT * FROM berita WHERE id_berita = :id");
		$query->bindparam(':id', $id);
		$query->execute();
		$row=$query->fetch(PDO::FETCH_OBJ);
		?>
<html>
<head>
	<?php include("title.php"); ?>
</head>
<body>
	<div id="content">
		<div class="Header">
			<div class="header-text">
				<h1>DUNIA DALAM BERITA</h1>	
			</div>
		</div>
		<div class="menu">
			<div class="menu-kiri">
				<a href="index.php">Home</a>
				<a href="Contact-us.php">Contact Us</a>
			</div>

			
			<?php
				if(isset($_SESSION['user']))
				  {
					  $user = $_SESSION['user'];
					  //echo "selamat datang $user";
					  echo "<div class='menu-kanan'>
							<font style='color:white'>Welcome $user</font>
							<a href='logout.php' style='color:#FF3300;text-decoration:underline;font-weight:normal;'>Log out!</a>
							</div>";
				  }
				  else
				  {
					  echo "<div class='menu-kanan'>
							<a href='login.html' style='color:#FF3300;text-decoration:underline;font-weight:normal;'>Login here!</a>
							</div>";
				  }
			?>
				
			
				
		</div>
		<div class="main-content">
		
			<h2><?php echo $row->judul_berita ?></h2>
              
                <?php if ($row->nama_image != "") ?>
                  <img  src="image/news/<?php echo $row->nama_image ?>">
        
                <?php echo $row->isi_berita ?>
              </p>
            
            
		
		<div class="footer">
			<?php include("footer.php"); ?>
		</div>
	</div>
</body>
</html>