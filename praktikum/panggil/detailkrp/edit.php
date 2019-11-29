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
$idDetilKrp = $_REQUEST['idDetilKrp'];
$fetch = $conn->tampil($idDetilKrp);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/detailkrp/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>ID Detail KRP</label>
				<input type ="text"  value = "<?php echo $fetch['idDetilKrp']?>" name = "idDetilKrp" class="form-control" readonly>
			</div>
			<div class="form-group">
				<label>NPM</label>
				<select class="form-control" name="idKrp" value="<?= $data->idKrp ?>">
					<?php
					$con = mysqli_connect("localhost","root","","demosiapraktikum");
					$result = mysqli_query($con,"SELECT *FROM krp ORDER BY idKrp");
					echo "<option>--pilih NPM--</option>";
					while($row = mysqli_fetch_assoc($result)){
						if ($fetch['idKrp']==$row['idKrp']) {

						echo "<option value=$row[idKrp] selected>$row[npm]</option>";
					}
					echo "<option value=$row[idKrp]>$row[npm]</option>"; 
				}
					?>
					</select>
			</div>
			<div class="form-group">
				<label>Mata Praktikum</label>
				<select class="form-control" name="idMataPraktikum" value="<?= $data->idMataPraktikum ?>">
					<?php
					$con = mysqli_connect("localhost","root","","demosiapraktikum");
					$result = mysqli_query($con,"SELECT *FROM matapraktikum ORDER BY idMataPraktikum");
					echo "<option>--pilih Mata Praktikum--</option>";
					while($row = mysqli_fetch_assoc($result)){

						if ($fetch['idMataPraktikum']==$row['idMataPraktikum']) {

						echo "<option value=$row[idMataPraktikum] selected>$row[namaMataPraktikum]</option>";
					}
					echo "<option value=$row[idMataPraktikum]>$row[namaMataPraktikum]</option>"; 
				}
				?>
					</select>
			</div>
			<div class="form-group">
				<label>Tugas</label>
				<input type ="text"  value = "<?php echo $fetch['tugas']?>" name = "tugas" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>UTS</label>
				<input type ="text"  value = "<?php echo $fetch['uts']?>" name = "uts" class="form-control" autofocus>
			</div>
			<div class="form-group">
				<label>UAS</label>
				<input type ="text"  value = "<?php echo $fetch['uas']?>" name = "uas" class="form-control" autofocus>
			</div>
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

