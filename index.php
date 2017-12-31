<?php
	session_start();
	include("koneksi.php");
	
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
		<?php
					if(empty($_GET['page']))  //agar pas masuk ke kategori tidak error
						{
							$_GET['page']=1;
						}
						$batas = 4;
						$index=($_GET['page']-1)* $batas;  //masukan rumusnya

					$query = $conn->prepare("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $index,$batas");
					$query->execute();
					
					$data = $query->fetchAll();
						
						foreach ($data as $value)
						{

							  $isi = substr($value['isi_berita'],1,30);
							  $isi = substr($value['isi_berita'],0,strrpos($isi," "));
							  
						?>
							
									<div class='article'>
                                    <a href="?page=detail_berita&id=<?php echo $value['id_berita'] ?>">
										<h3><?php echo $value['judul_berita'] ?></h3>
										<p><img src="<?php echo $value['nama_image'] ?>"><?php echo $isi?></p>
                                    </a>
									</div>
						<?php

					

					}
					?>
             </div>
            <div class='pagging'>	
			<?php	
			$semua = $conn->prepare("SELECT * FROM berita");
			$semua->execute();
			$jmldata = $semua->rowCount();
			$jml_page = ceil($jmldata/4);
			$start=1;
			if($_GET['page'] >1) //untuk previous
						{
							?>
								<a href="index.php?=<?php echo $_GET['page']-1; ?>">
							<?php
							echo '<';
							echo '&nbsp;&nbsp;';
						}


					while($start<=$jml_page)  //memunculkan angka
						{
							if($start==$_GET['page'])  //agar tulisan currentpagenya nge-blod
							{
								$varClass='currentpage';
							}
							else
							{
								$varClass='';
							}
							?>
                            
                            <span class="<?php echo $varClass;?>">
                                    <a href="index.php?page=<?php echo $start;?>" >
                                    
                                    <?php
                                    echo $start;
                                    ?>
									</a>
                            </span>
							<?php
							echo '&nbsp;&nbsp;';
							$start++;
					  }
					  
					if($_GET['page']<$jml_page) //buat next page
						{
							?>
							<a href="index.php?page=<?php echo $_GET['page']+1 ;?>" >
							<?php
							echo '>';
							?>
							</a>
							<?php
                    	}
				?>
			
			
			</div>
			
            
            
		
		<div class="footer">
			<?php include("footer.php"); ?>
		</div>
	</div>
</body>
</html>