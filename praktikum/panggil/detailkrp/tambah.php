<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$idDetilKrp 		= $_POST['idDetilKrp'];	
	$idKrp				= $_POST['idKrp'];
	$idMataPraktikum	= $_POST['idMataPraktikum'];
	$tugas				= $_POST['tugas'];	
	$uts				= $_POST['uts'];
	$uas				= $_POST['uas'];
	$conn				= new db_class();
	$conn->create($idDetilKrp, $idKrp, $idMataPraktikum, $tugas, $uts, $uas);
	header('location: ../../index.php?lihat=detailkrp/index');
}

?>