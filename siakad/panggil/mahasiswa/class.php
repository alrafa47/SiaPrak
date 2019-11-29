	<?php
	require 'koneksi.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($npm, $nama, $alamat, $password, $status){
			$stmt = $this->conn->prepare("INSERT INTO `mahasiswa` (`npm`, `nama`, `alamat`, `password`, `status`) VALUES (?,?,?,?,?)") or die($this->conn->error);
			$stmt->bind_param("sssss", $npm, $nama, $alamat, $password, $status);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("select * from mahasiswa") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}

	
		public function tampil($npm){
			$stmt = $this->conn->prepare("select * from mahasiswa where npm =?") or die($this->conn->error);
			$stmt->bind_param("s", $npm);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($npm){
			$stmt = $this->conn->prepare("DELETE FROM `mahasiswa` WHERE `npm` = ?") or die($this->conn->error);
			$stmt->bind_param("s", $npm);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($npm, $nama, $alamat, $password, $status){
			$stmt = $this->conn->prepare("UPDATE `mahasiswa` SET `nama` = ?, `alamat`=?, `password` = ?, `status` = ? WHERE `npm` = ?") or die($this->conn->error);
			$stmt->bind_param("sssss", $nama, $alamat, $password, $status, $npm);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>