<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idKrp = $_POST['idKrp'];	
	$npm	= $_POST['npm'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	$tanggal	= $_POST['tanggal'];
	$conn = new db_class();
	$conn->update($idKrp, $npm, $tahunAjaran, $tanggal);
	header('location: ../../index.php?lihat=krp/index');
}	
?>