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
		<h2>Contact Us</h2>

            <img src="image/dp.png" width="200px"/>
            
            <table class="article">
              <tr>
                <ul>
                  <td width="25%">
                    <li><b>NAMA</b></li>
                  </td>
                  <td>: Atikah</td>
                </ul>
              </tr>
            
              <tr>
                <ul>
                  <td>
                    <li><b>NIM</b></li>
                  </td>
                  <td>: 2014-31-189</td>
                </ul>
              </tr>
            
              <tr>
                <ul>
                  <td>
                    <li><b>Jurusan</b></li>
                  </td>
                  <td>: S1 Teknik Informatika</td>
                </ul>
              </tr>
              
              <tr>
                <ul>
                  <td>
                    <li><b>Matakulih</b></li>
                  </td>
                  <td>: Rekayasa Pengembangan Web</td>
                </ul>
              </tr>
            
            <tr>
                <ul>
                  <td>
                    <li><b>Kelas</b></li>
                  </td>
                  <td>: B</td>
                </ul>
              </tr>
              

            </table>
			
			
			</div>
			
            
            
		
		<div class="footer">
			<?php include("footer.php"); ?>
		</div>
	</div>
</body>
</html>