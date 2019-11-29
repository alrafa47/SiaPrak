	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($idDetilKrp, $idKrp, $idMataPraktikum, $tugas, $uts, $uas){
			$stmt = $this->conn->prepare("INSERT INTO `detilkrp` (`idDetilKrp`, `idKrp`, `idMataPraktikum`, `tugas`, `uts`, `uas`) VALUES (?,?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("ssssss", $idDetilKrp, $idKrp, $idMataPraktikum, $tugas, $uts, $uas);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select detilkrp.*, krp.npm,krp.tahunAjaran, matapraktikum.namaMataPraktikum from matapraktikum inner join(detilkrp INNER JOIN krp ON krp.idKrp=detilkrp.idKrp)ON detilkrp.idMataPraktikum= matapraktikum.idMataPraktikum") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($idDetilKrp){
			$stmt = $this->conn->prepare("select * from detilkrp where idDetilKrp =?") or die($this->conn->error);
			$stmt->bind_param("s", $idDetilKrp);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($idDetilKrp){
			$stmt = $this->conn->prepare("DELETE FROM `detilkrp` WHERE `idDetilKrp` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $idDetilKrp);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($idDetilKrp, $idKrp, $idMataPraktikum, $tugas, $uts, $uas){
			$stmt = $this->conn->prepare("UPDATE `detilkrp` SET `idKrp` = ?, `idMataPraktikum`=?, `tugas` = ?, `uts` = ?, `uas` = ? WHERE `idDetilKrp` = ?") or die($this->conn->error);
			$stmt->bind_param("ssssss", $idKrp, $idMataPraktikum, $tugas, $uts, $uas, $idDetilKrp);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>