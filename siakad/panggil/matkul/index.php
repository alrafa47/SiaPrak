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
$read = $conn->read();
$link 	= "index.php?lihat=matkul/";
$con = mysqli_connect("localhost","root","","demosiakad");

?>
<div class = "row">	
	<div class = "col-lg-12">
		<h3 class = "text-primary">Data Mata Kuliah</h3>
		<hr style = "border-top:1px dotted #000;"/>

		<div class = "row">	
			<!-- <div class = "col-lg-3"></div> -->
			<div class = "col-lg-6">
				<form method ="POST"action = "panggil/matkul/tambah.php">

					<div class="form-group">
						<label>Mata Kuliah</label>
						<input type ="text" id="namaMk" name = "namaMk" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tahun Ajaran</label>
						<input type ="text" id="tahunAjaran" name = "tahunAjaran" class="form-control" required>
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
				<!-- <th>kode materi</th> -->
				<th>id Mata Kuliah</th>
				<th>Mata Kuliah</th>
				<th>Tahun Ajaran</th>
				<th>Aksi</th>
			</tr>
			<tbody>

				<?php
				$no=1;
				while($tampil = $read->fetch_array()){ 
					?>

					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $tampil['idMk']?></td>
						<td><?php echo $tampil['namaMk']?></td>
						<td><?php echo $tampil['tahunAjaran']?></td>
				
						
						<td style="text-align: center;">
							<a href="<?= $link.'edit&idMk='.$tampil['idMk'] ?>" class="btn btn-primary btn-sm">
								<span class = "glyphicon glyphicon-edit"></span> Edit
							</a> 
							<a onclick="return confirm('Apakah yakin data akan di hapus?')" href="	<?= $link.'hapus&idMk='.$tampil['idMk'] ?>" class="btn btn-danger btn-sm">
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
<!-- 
<script type="text/javascript">
	// Add your javascript here
	$(function(){
		$("#mp").chained("#jurusan");
	});
</script>
 -->