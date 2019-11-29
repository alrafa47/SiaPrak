<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idDetilKrs			= $_POST['idDetilKrs'];	
	$idKrs				= $_POST['idKrs'];
	$idMk				= $_POST['idMk'];
	$uts				= $_POST['uts'];
	$uas				= $_POST['uas'];
	$praktikum			= $_POST['praktikum'];	
	$tugas				= $_POST['tugas'];	
	$conn				= new db_class();
	$conn->update($idDetilKrs, $idKrs, $idMk, $uts, $uas, $praktikum, $tugas);
	header('location: ../../index.php?lihat=detailkrs/index');
	// echo "<script>alert('Data Terupdate')</script>";
	// 	echo "<script> document.location.href='../../index.php?lihat=detailkrp/index'; </script>";


}
?>