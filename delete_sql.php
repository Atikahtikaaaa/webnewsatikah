<?php
include('koneksi.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try {
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$pdo = $conn->prepare('Delete from berita where id_berita = :id');

			$deletedata = array(':id' => $id);

			$pdo->execute($deletedata);

			echo "<center>".$pdo->rowcount()."data berhasil dihapus</center>";
			echo "<center>Kembali kehalaman depan <a href='admin.php'>Lanjut</a></center>";

		} catch (PDOexception $e) {
			print "Hapus data gagal: " . $e->getMessage() . "<br/>";
		   die();
		}	

	}
?>