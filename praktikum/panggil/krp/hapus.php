<?php
require_once 'class.php';
$idKrp= $_REQUEST['idKrp'];
$conn = new db_class();
$conn->delete($idKrp);
header('location: index.php?lihat=krp/index');
?>