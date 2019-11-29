<?php
require_once 'class.php';
if(ISSET($_POST['save'])){
	$idDetilKrs 		= "0";
	$idKrs				= $_POST['idKrs'];
	$idMk				= $_POST['idMk'];
	$uts				= $_POST['uts'];
	$uas				= $_POST['uas'];
	$praktikum			= $_POST['praktikum'];	
	$tugas				= $_POST['tugas'];	
	$conn				= new db_class();
	$conn->create($idDetilKrs, $idKrs, $idMk, $uts, $uas, $praktikum, $tugas);
	header('location: ../../index.php?lihat=detailkrs/index');
}

?>