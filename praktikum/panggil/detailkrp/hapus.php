<?php
	require_once 'class.php';
	
	$idDetilKrp	= $_REQUEST['idDetilKrp'];
	$conn 		= new db_class();
	$conn->delete($idDetilKrp);
	
	header('location: index.php?lihat=detailkrp/index');
	
?>