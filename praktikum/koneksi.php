<?php
	
	$koneksi = new mysqli('localhost', 'root', '','demosiapraktikum');

	//Jika koneksi gagal jalankan perintah dibawah
	if ($koneksi->connect_error) {
    	die("Koneksi Gagal: " . $koneksi->connect_error);
	} 
?>