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
$idDetilKrs = $_REQUEST['idDetilKrs'];
$fetch = $conn->tampil($idDetilKrs);
?>

<div class="row">
	<div class="col-lg-6">
		<form action="panggil/detailkrs/proses_ubah.php" method="POST">
			
			<div class="form-group">
				<label>ID Detail KRS</label>
				<input type ="text"  value = "<?php echo $fetch['idDetilKrs']?>" name = "idDetilKrs" class="form-control" readonly>
			</div>
			<div class="form-group">
			<label>ID KRS</label>
			<select class="form-control" name="idKrs"  value="<?= $data->idKrs ?>">
				<?php
				$con = mysqli_connect("localhost","root","","demosiakad");
				$result = mysqli_query($con,"SELECT *FROM krs ORDER BY idKrs");
				while($row = mysqli_fetch_assoc($result)){
					if ($fetch['idKrs']==$row['idKrs']){
						echo "<option value=$row[idKrs] selected>$row[idKrs] : $row[npm]</option>";
					}
					echo "<option value=$row[idKrs]>$row[idKrs] : $row[npm]</option>";
				} 
				?>
				</select>
		</div>
		<div class="form-group">
			<label>ID Mata Kuliah</label>
			<select class="form-control" name="idMk" value="<?= $data->idMk?>">
				<?php
				$con = mysqli_connect("localhost","root","","demosiakad");
				$result = mysqli_query($con,"SELECT *FROM mk ORDER BY idMk");
				while($row = mysqli_fetch_assoc($result)){
					if ($fetch['idMk']==$row['idMk']){
						echo "<option value=$row[idMk] selected>$row[idMk] : $row[namaMk]</option>";
					}
					echo "<option value=$row[idMk]>$row[idMk] : $row[namaMk]</option>";
				} 
				?>
				</select>
		</div>
		
		<div class="form-group">
			<label>UTS</label>
			<input type ="text" id="uts" value = "<?php echo $fetch['uts']?>" name = "uts" class="form-control" >
		</div>
		<div class="form-group">
			<label>UAS</label>
			<input type ="text" id="uas" value = "<?php echo $fetch['uas']?>" name = "uas" class="form-control" >
		</div>
		<div class="form-group">
			<label>Praktikum</label>
			<input type ="text" id="praktikum" value = "<?php echo $fetch['praktikum']?>" name = "praktikum" class="form-control" >
		</div>
		<div class="form-group">
			<label>Tugas</label>
			<input type ="text" id="tugas" value = "<?php echo $fetch['tugas']?>" name = "tugas" class="form-control" >
		</div>
			
			
			<button class="btn btn-warning" name="update">
				<span class = "glyphicon glyphicon-pencil"></span> Ubah
			</button>

		</form>
	</div>
</div>

