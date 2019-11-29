<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$idKrp = $_POST['idKrp'];	
	$npm	= $_POST['npm'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	$tanggal	= $_POST['tanggal'];
	$conn = new db_class();
	$conn->create($idKrp, $npm, $tahunAjaran, $tanggal);
	header('location: ../../index.php?lihat=krp/index');
}
?>