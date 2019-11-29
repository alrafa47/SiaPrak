<?php
	require_once 'class.php';
	
	$idDetilKrs	= $_REQUEST['idDetilKrs'];
	$conn 		= new db_class();
	$conn->delete($idDetilKrs);
	
	header('location: index.php?lihat=detailkrs/index');
	
?>