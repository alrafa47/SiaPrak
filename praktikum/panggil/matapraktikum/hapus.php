<?php
require_once 'class.php';
$idMataPraktikum= $_REQUEST['idMataPraktikum'];
$conn = new db_class();
$conn->delete($idMataPraktikum);
header('location: index.php?lihat=matapraktikum/index');
?>