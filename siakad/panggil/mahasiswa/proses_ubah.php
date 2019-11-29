<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$npm				= $_POST['npm'];
	$nama				= $_POST['nama'];
	$alamat				= $_POST['alamat'];
	$password			= $_POST['pass'];
	$status				= $_POST['status'];		
	$conn				= new db_class();
	$conn->update($npm, $nama, $alamat, $password, $status);
	header('location: ../../index.php?lihat=mahasiswa/index');
	// echo "<script>alert('Data Terupdate')</script>";
	// 	echo "<script> document.location.href='../../index.php?lihat=detailkrp/index'; </script>";


}
?>