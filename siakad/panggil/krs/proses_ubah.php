<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idKrp = $_POST['idKrs'];	
	$npm	= $_POST['npm'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	$conn = new db_class();
	$conn->update($idKrp, $npm, $tahunAjaran, $tanggal);
	header('location: ../../index.php?lihat=krs/index');
}	
?>