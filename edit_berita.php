<html>
  <head>
     <title>Ubah Berita</title>
     <link rel="stylesheet" type="text/css" href="styleclass.css">
  </head>
  <body>
  <!-- tag form -->
    <div class="news-table">
      <h1>Tambah Berita Baru</h1>
      <form Action = "edit_sql.php" method="POST" enctype="multipart/form-data">
        <?php
        	include "koneksi.php";
        	session_start();
        	if(isset($_GET['id'])){
        		$_SESSION['id'] = $_GET['id'];
        		$result = $conn->prepare("Select * From berita where id_berita = :id");
				$result->bindparam(':id', $_SESSION['id']);
				$result->execute();
				$row=$result->fetch(PDO::FETCH_OBJ);
				echo "<table>
			            <tr>
			              <td>Judul</td>
			              <td><input type='text' name='txtjudul' autocomplete='off' value = {$row->judul_berita}></td>
			            </tr>

			            <tr>
			              <td>Berita</td>
			              <td><textarea name='txtberita' rows='5' cols='50'>$row->isi_berita</textarea></td>
			            </tr>

			            <tr>
			              <td>Select Image</td>
			              <td><input type='file' name='fileToUpload' id='fileToUpload'></td>
			            </tr>
			            <tr>
			              <td><input id='back' type='submit' value='Back' name='back'></td>
			              <td><input type='submit' value='Update' name='submit'></td>
			            </tr>

			         </table>";
			 }	        
        ?> 
      </form>
    </div>
	<!-- tag form -->
  </body>
</html>
