<?php

session_start();
require_once 'koneksi.php';
// membaca username dari form login
$username = $_POST['username'];
// membaca password dari form login
$password = $_POST['password'];

$sql = "select * from mahasiswa where npm = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
if (mysqli_num_rows($query) == 1) {
  echo "berhasil";
  $fetch = mysqli_fetch_assoc($query);
  $_SESSION['username'] = $fetch['nama'];
  $_SESSION['status'] = "login";
  header("location:index.php");
}else{
  // echo "gagal";
  header("location:login.php?msg=1");

}
?>