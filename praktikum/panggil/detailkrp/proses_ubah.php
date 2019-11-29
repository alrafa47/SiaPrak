<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idDetilKrp 		= $_POST['idDetilKrp'];	
	$idKrp				= $_POST['idKrp'];
	$idMataPraktikum	= $_POST['idMataPraktikum'];
	$tugas				= $_POST['tugas'];	
	$uts				= $_POST['uts'];
	$uas				= $_POST['uas'];
	$conn				= new db_class();
	$conn->update($idDetilKrp, $idKrp, $idMataPraktikum, $tugas, $uts, $uas);
	header('location: ../../index.php?lihat=detailkrp/index');
	// echo "<script>alert('Data Terupdate')</script>";
	// 	echo "<script> document.location.href='../../index.php?lihat=detailkrp/index'; </script>";


}
?>