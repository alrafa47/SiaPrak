<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$idKrs 			= $_POST['idKrs'];	
	$npm			= $_POST['npm'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	$conn = new db_class();
	$conn->create($idKrs, $npm, $tahunAjaran);
	header('location: ../../index.php?lihat=krs/index');
}
?>