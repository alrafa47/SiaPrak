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
require 'class.php';
$conn = new db_class();
$read = $conn->read();

$link 	= "index.php?lihat=detailkrs/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Detail KRS</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/detailkrs/tambah.php">
			<!-- <div class="form-group">
						<label>ID Detail KRP</label>
						<input type ="text" id="idDetilKrp" name = "idDetilKrp" class="form-control" readonly>
					</div> -->

			<div class="form-group">
				<label>ID KRS</label>
				<select class="form-control" name="idKrs"  value="<?= $data->idKrs ?>">
					<?php
					$con = mysqli_connect("localhost","root","","demosiakad");
					$result = mysqli_query($con,"SELECT *FROM krs ORDER BY idKrs");
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[idKrs]>NPM : $row[npm] Tahun Ajaran : $row[tahunAjaran]</option>";
					} 
					?>
					</select>
			</div>
			<div class="form-group">
				<label>Mata Kuliah</label>
				<select class="form-control" name="idMk" value="<?= $data->idMk?>">
					<?php
					$con = mysqli_connect("localhost","root","","demosiakad");
					$result = mysqli_query($con,"SELECT *FROM mk ORDER BY idMk");
					while($row = mysqli_fetch_assoc($result)){

						echo "<option value=$row[idMk]>$row[namaMk]</option>";
					} 
					?>
					</select>
			</div>
			
			<div class="form-group">
				<label>UTS</label>
				<input type ="text" id="uts" name = "uts" class="form-control" >
			</div>
			<div class="form-group">
				<label>UAS</label>
				<input type ="text" id="uas" name = "uas" class="form-control" >
			</div>
			<div class="form-group">
				<label>Praktikum</label>
				<input type ="text" id="praktikum" name = "praktikum" class="form-control" >
			</div>
			<div class="form-group">
				<label>Tugas</label>
				<input type ="text" id="tugas" name = "tugas" class="form-control" >
			</div>
			
					
					<div class = "form-group">
						<button name = "save" class = "btn btn-success">
							<span class = "glyphicon glyphicon-floppy-disk"></span> 
							Simpan
						</button>
					</div>
				</form>
			</div><!-- .col-lg-6 -->
			<div class = "col-lg-3"></div>
		</div><!-- .row -->
		<br>
		<br>

		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>ID Detail KRS</th>
				<th>ID KRS</th>
				<th>Mata Kuliah</th>
				<th>UTS</th>
				<th>UAS</th>
				<th>PRAKTIKUM</th>
				<th>Tugas</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['idDetilKrs']?></td>
						<td><?php echo $tampil['idKrs']; ?></td>
						<td><?php echo $tampil['idMk']?></td>
						<td><?php echo $tampil['uts']?></td>
						<td><?php echo $tampil['uas']?></td>
						<td><?php echo $tampil['praktikum']?></td>
						<td><?php echo $tampil['tugas']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&idDetilKrs='.$tampil['idDetilKrs'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data ini akan di hapus?')" href="	<?= $link.'hapus&idDetilKrs='.$tampil['idDetilKrs'] ?>" class="btn btn-danger btn-sm">
								<span class = "glyphicon glyphicon-trash"></span> Hapus
							</a>
						</td>
					</tr>

					<?php
				}
				?>	

			</tbody>
		</table>
	</div>
</div>
