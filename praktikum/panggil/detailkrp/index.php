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

	$link 	= "index.php?lihat=detailkrp/";
	?>

	<div class = "row">	
		<div class = "col-lg-12">
			<h3 class = "text-primary">Master Detail KRP</h3>
			<hr style = "border-top:1px dotted #000;"/>

			<div class = "row">	
				<!-- <div class = "col-lg-3"></div> -->
				<div class = "col-lg-6">
					<form method ="POST"action = "panggil/detailkrp/tambah.php">
			<!-- <div class="form-group">
						<label>ID Detail KRP</label>
						<input type ="text" id="idDetilKrp" name = "idDetilKrp" class="form-control" readonly>
					</div> -->

					<div class="form-group">
						<label>NPM</label>
						<?php
						$con = mysqli_connect("localhost","root","","demosiapraktikum");
						$queryDetailData = "SELECT *FROM krp ORDER BY idKrp";
						$readonly = "";
						// $hidden = "";
						if (isset($_GET['idKrp'])) {
							$detailData = $_GET['idKrp'] ; 
							$readonly = "readonly";
							// $hidden = "hidden";
							$queryDetailData = "SELECT * FROM krp where idKrp = '$detailData' ORDER BY idKrp";
							$hasil = mysqli_query($con, $queryDetailData);
							$row = mysqli_fetch_assoc($hasil);
							?>
							<br>
							<input type="hidden" name="idKrp" value="$detailData">
							<input class="form-control" type="text" value="<?php echo $row['npm'] ?>" placeholder="" readonly >
							<?php
						}else{
							?>
							<select class="form-control" name="idKrp" value="<?= $data->idKrp ?>" <?php echo $readonly ?>>
								<?php
								$result = mysqli_query($con, $queryDetailData);
								while($row = mysqli_fetch_assoc($result)){
									echo "<option value=$row[idKrp]>$row[npm]</option>";
								} 
								?>
							</select>
							<?php
						}
						?>

						

					</div>
					<div class="form-group">
						<label>Mata Praktikum</label>
						<select class="form-control" name="idMataPraktikum" value="<?= $data->idMataPraktikum ?>">
							<?php
							$con = mysqli_connect("localhost","root","","demosiapraktikum");
							$result = mysqli_query($con,"SELECT *FROM matapraktikum ORDER BY idMataPraktikum");
							echo "<option>--pilih Mata Praktikum--</option>";
							while($row = mysqli_fetch_assoc($result)){

								echo "<option value=$row[idMataPraktikum]>$row[namaMataPraktikum]</option>";
							} 
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Tugas</label>
						<input type ="text" id="tugas" name = "tugas" class="form-control" >
					</div>
					<div class="form-group">
						<label>UTS</label>
						<input type ="text" id="uts" name = "uts" class="form-control" >
					</div>
					<div class="form-group">
						<label>UAS</label>
						<input type ="text" id="uas" name = "uas" class="form-control" >
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

		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>ID Detail KRP</th>
				<th>NPM</th>
				<th>Mata Praktikum</th>
				<th>Tugas</th>
				<th>UTS</th>
				<th>UAS</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['idDetilKrp']?></td>
						<td><?php echo $tampil['npm']; 
						?></td>
						<td><?php echo $tampil['namaMataPraktikum']?></td>
						<td><?php echo $tampil['tugas']?></td>
						<td><?php echo $tampil['uts']?></td>
						<td><?php echo $tampil['uas']?></td>
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&idDetilKrp='.$tampil['idDetilKrp'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&idDetilKrp='.$tampil['idDetilKrp'] ?>" class="btn btn-danger btn-sm">
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
