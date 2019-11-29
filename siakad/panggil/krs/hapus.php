<?php
require_once 'class.php';
$idKrs= $_REQUEST['idKrs'];
$conn = new db_class();
$conn->delete($idKrs);
header('location: index.php?lihat=krs/index');
?>