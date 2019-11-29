<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idMk = $_POST['idMk'];	
	$namaMk	= $_POST['namaMk'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	
	$conn = new db_class();
	$conn->update($idMk, $namaMk, $tahunAjaran);
	header('location: ../../index.php?lihat=matkul/index');
}	
?>