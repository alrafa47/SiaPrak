<?php 
require_once 'class.php';
if(ISSET($_POST['update'])){	
	$idMataPraktikum = $_POST['idMataPraktikum'];	
	$namaMataPraktikum	= $_POST['namaMataPraktikum'];
	$tahunAjaran	= $_POST['tahunAjaran'];
	
	$conn = new db_class();
	$conn->update($idMataPraktikum, $namaMataPraktikum, $tahunAjaran);
	header('location: ../../index.php?lihat=matapraktikum/index');
}	
?>