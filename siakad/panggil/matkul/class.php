 <?php
 require 'koneksi.php';
 class db_class extends db_connect{	
 	public function __construct(){
 		$this->connect();
 	}
	

 	public function create($idMk, $namaMk, $tahunAjaran){
 		$stmt = $this->conn->prepare("INSERT INTO `mk` (`idMk`, `namaMk`,`tahunAjaran`) VALUES (?,?,?)") or die($this->conn->error);
 		$stmt->bind_param("sss", $idMk, $namaMk,$tahunAjaran);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function read(){
 		$stmt = $this->conn->prepare("select * from mk") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}


 	public function tampil($idMk){
 		$stmt = $this->conn->prepare("select * from mk where idMk =?") or die($this->conn->error);
 		$stmt->bind_param("s", $idMk);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$fetch = $result->fetch_array();
 			$stmt->close();
 			$this->conn->close();
 			return $fetch;
 		}
 	}

 	public function delete($idMk){
 		$stmt = $this->conn->prepare("DELETE FROM `mk` WHERE `idMk` = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $idMk);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function update($idMk, $namaMk, $tahunAjaran){
 		$stmt = $this->conn->prepare("UPDATE `mk` SET `namaMk` = ?, `tahunAjaran`=?  WHERE `idMk` = ?") or die($this->conn->error);
 		$stmt->bind_param("sss", $namaMk, $tahunAjaran, $idMk);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}
 }
 ?>