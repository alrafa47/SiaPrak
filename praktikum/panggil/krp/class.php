 <?php
 require 'koneksi.php';
 class db_class extends db_connect{	
 	public function __construct(){
 		$this->connect();
 	}
	

 	public function create($idKrp,$npm, $tahunAjaran, $tanggal){
 		$stmt = $this->conn->prepare("INSERT INTO `krp` (`idKrp`, `npm`,`tahunAjaran`, `tanggal`) VALUES (?,?,?,?)") or die($this->conn->error);
 		$stmt->bind_param("ssss", $idKrp, $npm,$tahunAjaran, $tanggal);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function read(){
 		$stmt = $this->conn->prepare("select * from krp") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}


 	public function tampil($idKrp){
 		$stmt = $this->conn->prepare("select * from krp where idKrp =?") or die($this->conn->error);
 		$stmt->bind_param("s", $idKrp);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$fetch = $result->fetch_array();
 			$stmt->close();
 			$this->conn->close();
 			return $fetch;
 		}
 	}

 	public function delete($idKrp){
 		$stmt = $this->conn->prepare("DELETE FROM `krp` WHERE `idKrp` = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $idKrp);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function update($idKrp, $npm, $tahunAjaran, $tanggal){
 		$stmt = $this->conn->prepare("UPDATE `krp` SET `npm` = ?, `tahunAjaran`=? , `tanggal`=? WHERE `idKrp` = ?") or die($this->conn->error);
 		$stmt->bind_param("ssss", $npm, $tahunAjaran, $tanggal, $idKrp);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}
 }
 ?>