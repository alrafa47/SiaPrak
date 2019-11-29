<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$npm				= $_POST['npm'];
	$nama				= $_POST['nama'];
	$alamat				= $_POST['alamat'];
	$password			= $_POST['pass'];
	$status				= $_POST['Status'];	
	$conn				= new db_class();
	$conn->create($npm, $nama, $alamat, $password, $status);
	header('location: ../../index.php?lihat=mahasiswa/index');
}

?>