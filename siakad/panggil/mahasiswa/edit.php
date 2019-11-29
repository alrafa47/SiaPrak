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
$npm = $_REQUEST['npm'];
$fetch = $conn->tampil($npm);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/mahasiswa/proses_ubah.php" method="POST">
			
		<div class="form-group">
		<label>NPM</label>
		<input type ="text" id="npm" value="<?php echo $fetch['npm'] ?>" name = "npm" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type ="text" id="nama" value="<?php echo $fetch['nama'] ?>" name = "nama" class="form-control" >
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<input type ="text" id="alamat" value="<?php echo $fetch['alamat'] ?>" name = "alamat" class="form-control" >
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type ="text" id="pass" value="<?php echo $fetch['password'] ?>" name = "pass" class="form-control" >
	</div>
	<!-- <div class="form-group">
		<label>Status</label>
		<select type ="text" id="status" value="<?php echo $fetch['status']?>" name = "status" class="form-control" >
			<?php
				echo "<option>Aktif</option>";
				echo "<option>Tidak Ktif</option>";
			?>
		</select>
	</div> -->
	
	<?php 
	$aktif = "";
	$tidakAktif ="";
	if ($fetch['status']) {
		$aktif = "checked";
	}else{
		$tidakAktif = "checked";	
	}
	 ?>

	<div class="form-group">
						<label>Status</label>
						<div class="radio">
							<label>
								<input type="radio" name="status" value="Aktif" placeholder="Aktif" <?php echo $aktif; ?> required>
								Aktif
							</label>
							<label>
								<input type="radio" name="status" value="Tidak Aktif" placeholder="Tidak Aktif" <?php echo $tidakAktif; ?> required >
								Tidak Aktif
							</label>
						</div>
					</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

