<?php 
session_start();
if (!isset($_SESSION['username']) && empty($_SESSION['username']) && $_SESSION['status'] != "login") {
  header("location:login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Siakad Unikama</title>
  <link rel="shortcut icon" type="image/icon" href="kanjuruhan.png">
  <!-- Panggil Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      background-color: #FFA500;
    }
  </style>
  <style type="text/css">
    .navbar-inverse{
      background-color:  #FFA500;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <!-- Skrip dibawah ini akan aktif ketika posisi mobile -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <p class="text-danger"><a class="navbar-brand" href="index.php"></span> &nbsp;Siakad UNIKAMA</a></p>
      </div>
      <!-- Daftar menu yang diinginkan-->
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

          <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <p class="text-danger"> <span class="glyphicon glyphicon-folder-open"></span> &nbsp;Data KRS
                <b class="caret"></b></p>
              </a>
              <ul class="dropdown-menu">

                <li>
                  <a href="index.php?lihat=detailkrs/index">
                    <p class="text-danger"> <span class="glyphicon glyphicon-file"></span> &nbsp; Detail KRS</p></a>
                  </li>
                  <li>
                    <a href="index.php?lihat=krs/index">
                      <p class="text-danger"><span class="glyphicon glyphicon-edit"></span> &nbsp; KRS</p></a>
                    </li>  
                  </ul>

                </li>

                <li>
                  <a href="index.php?lihat=mahasiswa/index">
                    <p class="text-danger"><span class="glyphicon glyphicon-user"></span> &nbsp; Mahasiswa</p></a>
                  </li>

                  <li>
                    <a href="index.php?lihat=matkul/index">
                      <p class="text-danger"> <span class="glyphicon glyphicon-tags"></span> &nbsp; Mata Kuliah</p></a>
                    </li>

                    <li>
                      <a href="logout.php">
                        <p class="text-danger"> <span class="glyphicon glyphicon-tags"></span> &nbsp; logout</p></a>
                      </li>
                    </ul>
                  </div><!-- #navbar -->
                </div><!-- .container -->
              </nav><!-- .navbar -->


              <div class="container">

                <?php
                /*Skrip dibawah berfungsi memanggil perintah sesuai nama file*/
                if(!empty($_GET['lihat'])){
                  include('panggil/'.$_GET['lihat'].'.php');
                }

                else{
                  include 'beranda.php';
                }
                ?>

              </div> <!-- .container -->


              <!-- Panggil JavaScript -->
              <!-- <script src="jquery/jquery.min.js"></script> -->
              <!-- <script src="bootstrap/js/bootstrap.min.js"></script>     -->
            </body>

            </html>
