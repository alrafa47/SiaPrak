<?php
require_once 'class.php';
$idMk= $_REQUEST['idMk'];
$conn = new db_class();
$conn->delete($idMk);
header('location: index.php?lihat=matkul/index');
?>