<?php 
session_start();
if (!isset($_SESSION['username']) && empty($_SESSION['username']) && $_SESSION['status'] != "login") {
  header("location:login.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Sisfo Praktikum</title>
  <link rel="shortcut icon" type="image/icon" href="kanjuruhan.png">
  <!-- Panggil Bootstrap -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/bootstrap.min.js"></script>
  <style type="text/css">
    body{
      background-color: #00008B;
    }
  </style>
  <style type="text/css">
    .navbar-inverse{
      background-color:  #00008B;
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
        <a class="navbar-brand" href="index.php">Sisfo Praktikum</a>
      </div>
      <!-- Daftar menu yang diinginkan-->
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="glyphicon glyphicon-folder-open"></span> &nbsp;Data KRP
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="index.php?lihat=detailkrp/index">
                  <span class="glyphicon glyphicon-file"></span> &nbsp; Detail KRP</a>
                </li>
                <li>
                  <a href="index.php?lihat=krp/index">
                    <span class="glyphicon glyphicon-edit"></span> &nbsp; KRP</a>
                  </li>
                </ul>
                <li>
                 <a href="index.php?lihat=matapraktikum/index">
                  <span class="glyphicon glyphicon-tags"></span> &nbsp; Mata Praktikum</a>
                </li>
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
