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
$idKrp = $_REQUEST['idKrp'];
$fetch = $conn->tampil($idKrp);
$con = mysqli_connect("localhost","root","","demosiapraktikum");
?>
<div class="row">
	<div class="col-lg-6">
		<form action="panggil/krp/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>id Krp</label>
				<input type ="text"  value = "<?php echo $fetch['idKrp']?>" name = "idKrp" class="form-control" readonly required>
			</div>
			<div class="form-group">
				<label>NPM</label>
				<input type ="text"  value = "<?php echo $fetch['npm']?>" name = "npm" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>Tahun Ajaran</label>
				<input type ="text"  value = "<?php echo $fetch['tahunAjaran']?>" name = "tahunAjaran" class="form-control" autofocus>
			</div>

			<div class="form-group">
				<label>Tanggal</label>
				<input type ="text"  value = "<?php echo $fetch['tanggal']?>" name = "tanggal" class="form-control" autofocus required>
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