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

$link 	= "index.php?lihat=mahasiswa/";
?>

<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">MAHASISWA</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/mahasiswa/tambah.php">

					<div class="form-group">
						<label>NPM</label>
						<input type ="text" id="npm" name = "npm" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type ="text" id="nama" name = "nama" class="form-control" >
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type ="text" id="alamat" name = "alamat" class="form-control" >
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type ="password" id="pass" name = "pass" class="form-control" >
					</div>
			<!-- <div class="form-group">
				<label>Status</label>
				<select type ="text" id="status" name = "status" class="form-control" >
	  				<?php
						echo "<option>Aktif</option>";
						echo "<option>Tidak Ktif</option>";
					?>
				</select>
			</div> -->

			<div class="form-group">
				<label>Status</label>
				<div class="radio">
					<label>
						<input type="radio" name="Status" value="Aktif" placeholder="Aktif" required>
						Aktif
					</label>
					<label>
						<input type="radio" name="Status" value="Tidak Aktif" placeholder="Tidak Aktif" required>
						Tidak Aktif
					</label>
				</div>
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
		<th>NPM</th>
		<th>Nama</th>
		<th>Alamat</th>
		<!-- <th>Password</th> -->
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	<tbody>

		<?php
		$no=1;
		while($tampil = $read->fetch_array()){ 
			?>

			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $tampil['npm']?></td>
				<td><?php echo $tampil['nama']; ?></td>
				<td><?php echo $tampil['alamat']?></td>
				<td><?php echo $tampil['status']?></td>

				<td style="text-align: center;">
					<?php 
					$disabled = ($tampil['status'] == 'Aktif' || $tampil['status'] == 'aktif') ? '' : 'disabled' ;
					 ?>
					<a href="<?= 'index.php?lihat=krs/index&npm='.$tampil['npm'] ?>" class="btn btn-success btn-sm <?= $disabled ?>">
							<span class = "glyphicon glyphicon-edit"></span> Isi Krs
					</a> 
					<a href="<?= $link.'edit&npm='.$tampil['npm'] ?>" class="btn btn-primary btn-sm">
						<span class = "glyphicon glyphicon-edit"></span> Edit
					</a> 
					<a onclick="return confirm('Apakah yakin data ini akan di hapus?')" href="	<?= $link.'hapus&npm='.$tampil['npm'] ?>" class="btn btn-danger btn-sm">
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
