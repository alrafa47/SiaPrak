<?php

session_start();
require_once 'koneksi.php';
// membaca username dari form login
$username = $_POST['username'];
// membaca password dari form login
$password = $_POST['password'];


// membuat URL GET request ke sistem A
$url = "http://localhost/P_Pemrogweb/webService/Login_v14/service.php?username=".$username."&password=".$password."&api=afin"; 

// mengirim GET request ke sistem A dan membaca respon XML dari sistem A
$bacaxml = simplexml_load_file($url);

// membaca data XML hasil dari respon sistem A
foreach($bacaxml->response as $respon)
{
  // jika responnya TRUE maka login sukses
  // jika FALSE maka login gagal
  if ($respon == "TRUE"){
  	echo "Login Sukses";

  	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:home.php");

  }
  else if ($respon == "FALSE"){
      header("location:index1?msg=1.php");

  }
}  

?>