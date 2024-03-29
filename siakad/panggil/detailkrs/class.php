	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
			$this->DataNilai();
		}

		// ambil data nilai dari API
		public function DataNilai(){
			$url = "http://localhost/SIAPRAK/praktikum/API/api.php";
			$json = file_get_contents($url);

			$krs = json_decode($json, true);
			foreach ($krs as $data) {
				$this->updateDataNilai($data['npm'], $data['idMk'], $data['nilai']);
			}
		}

		public function CheckMahasiswa($idkrs){
			$con = mysqli_connect('localhost', 'root', '', 'demosiakad') or die('unable to connect');
			$sql = "select * from krs where idkrs = '$idkrs'";

			if ($query = mysqli_query($con, $sql)) {
				if (mysqli_num_rows($query) == 1) {
					return true;
				}else{
					return false;
				}
			}
		}

		public function updateDataNilai($npm, $idMk, $nilai){
			$con = mysqli_connect('localhost', 'root', '', 'demosiakad') or die('unable to connect');
			$sql = "UPDATE dataNilai SET praktikum = '$nilai' WHERE idMk = '$idMk' and npm = '$npm'";
			mysqli_query($con, $sql);
		}

		public function create($idDetilKrs, $idKrs, $idMk, $uts, $uas, $praktikum, $tugas){
			$stmt = $this->conn->prepare("INSERT INTO `detilkrs` (`idDetilKrs`, `idKrs`, `idMk`, `uts`, `uas`, `praktikum`, `tugas`) VALUES (?,?,?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sssssss", $idDetilKrs, $idKrs, $idMk, $uts, $uas, $praktikum, $tugas);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read1($npm){
			$stmt = $this->conn->prepare("select * from datanilai where npm='$npm'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

		public function read(){
			$stmt = $this->conn->prepare("select * from datanilai") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}
		public function tampil($idDetilKrs){
			$stmt = $this->conn->prepare("select * from detilkrs where idDetilKrs =?") or die($this->conn->error);
			$stmt->bind_param("s", $idDetilKrs);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($idDetilKrs){
			$stmt = $this->conn->prepare("DELETE FROM `detilkrs` WHERE `idDetilKrs` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $idDetilKrs);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($idDetilKrs, $idKrs, $idMk, $uts, $uas, $praktikum, $tugas){
			$stmt = $this->conn->prepare("UPDATE `detilkrs` SET `idKrs` = ?, `idMk`=?, `uts` = ?, `uas` = ?, `praktikum` = ?, `tugas` = ? WHERE `idDetilKrs` = ?") or die($this->conn->error);
			$stmt->bind_param("sssssss", $idKrs, $idMk, $uts, $uas, $praktikum, $tugas, $idDetilKrs);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
	}	
	?>