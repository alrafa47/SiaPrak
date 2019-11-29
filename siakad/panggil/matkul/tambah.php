<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$idMk = $_POST['idMk'];	
	$namaMk	= $_POST['namaMk'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	
	$conn = new db_class();
	$conn->create($idMk, $namaMk, $tahunAjaran);
	header('location: ../../index.php?lihat=matkul/index');
}
?>