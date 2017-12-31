<?php
	include("koneksi.php");
	session_start();
?>
<html>
<head>
	<?php include("title.php"); ?>
</head>
<body>
	<div id="content">
		<div class="Header">
			<div class="header-text">
				<h1>ADMIN</h1>	
			</div>
		</div>
		<div class="menu">
			<div class="menu-kiri">
				<a href="admin.php">Home</a>
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
     	</br>
		<?php
					
					?>
						<a href="add_news.php" data-toggle='tooltip' data-placement='right'><img src='image/add.png'></a>
				<?php 
						$result= $conn->query('select * from berita');
						echo"<table border=1>
								<tr>
									<th>ID</th>
									<th>Judul Berita</th>
									<th>Isi Berita</th>
									<th>Proses</th>
								</tr>";
						while($row=$result->fetch(PDO::FETCH_OBJ))
							{
								$isiberita = substr($row->isi_berita,1,30);
								?>
								<tr>
									<td><?php echo $row->id_berita?></td>
									<td><?php echo  $row->judul_berita ?></td>
									<td><?php echo $isiberita ?> </td>
									<td>
									<a href='edit_berita.php?id=<?php echo $row->id_berita ?>' >Edit</a>
									<a href='delete_sql.php?id=<?php echo $row->id_berita ?>'>Hapus</a>
									</td>
								</tr>
                                <?php
							}
							echo "</table>";
					
					

			
				?>
			
			
			
            
            
		</div>
		<div class="footer">
			<?php include("footer.php"); ?>
		</div>
	</div>
</body>
</html>