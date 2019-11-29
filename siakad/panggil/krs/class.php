 <?php
 require 'koneksi.php';
 class db_class extends db_connect{	
 	public function __construct(){
 		$this->connect();
 	}
	

 	public function create($idKrs,$npm, $tahunAjaran){
 		$stmt = $this->conn->prepare("INSERT INTO `krs` (`idKrs`, `npm`,`tahunAjaran`) VALUES (?,?,?)") or die($this->conn->error);
 		$stmt->bind_param("sss", $idKrs, $npm,$tahunAjaran);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function read(){
 		$stmt = $this->conn->prepare("select * from krs") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}


 	public function tampil($idKrs){
 		$stmt = $this->conn->prepare("select * from krs where idKrs =?") or die($this->conn->error);
 		$stmt->bind_param("s", $idKrs);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$fetch = $result->fetch_array();
 			$stmt->close();
 			$this->conn->close();
 			return $fetch;
 		}
 	}

 	public function delete($idKrs){
 		$stmt = $this->conn->prepare("DELETE FROM `krs` WHERE `idKrs` = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $idKrs);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function update($idKrs, $npm, $tahunAjaran){
 		$stmt = $this->conn->prepare("UPDATE `krs` SET `npm` = ?, `tahunAjaran`=?  WHERE `idKrs` = ?") or die($this->conn->error);
 		$stmt->bind_param("sss", $npm, $tahunAjaran, $idKrs);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}
 }
 ?>