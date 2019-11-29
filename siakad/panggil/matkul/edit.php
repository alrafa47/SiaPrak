<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
      body{
        background-color:  #f0f5f5;
        /*background: transparent;*/
      }
      form, table{
      	background-color: white;
      	padding:20px;
      	border-radius: 5px;

      }
    </style>

</body>
</html>
<?php

require_once 'class.php';
$conn = new db_class();
//Memgambil id data get dari url
$idKrs = $_REQUEST['idMk'];
$fetch = $conn->tampil($idKrs);
$con = mysqli_connect("localhost","root","","demosiakad");
?>
<div class="row">
	<div class="col-lg-6">
		<form action="panggil/matkul/proses.php" method="POST">
			
			<div class="form-group">
				<label>id Mata Kuliah</label>
				<input type ="text"  value = "<?php echo $fetch['idMk']?>" name = "idMk" class="form-control" readonly required>
			</div>
			<div class="form-group">
				<label>Nama Mata Kuliah</label>
				<input type ="text"  value = "<?php echo $fetch['namaMk']?>" name = "namaMk" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Tahun Ajaran</label>
				<input type ="text"  value = "<?php echo $fetch['tahunAjaran']?>" name = "tahunAjaran" class="form-control" autofocus>
			</div>

			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>
		</form>
	</div>
</div>

<!-- <script type="text/javascript">
	// Add your javascript here
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script> -->