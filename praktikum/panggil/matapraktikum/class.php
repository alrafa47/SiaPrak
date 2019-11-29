 <?php
 require 'koneksi.php';
 class db_class extends db_connect{	
 	public function __construct(){
 		$this->connect();
 	}
	

 	public function create($idMataPraktikum,$namaMataPraktikum, $tahunAjaran){
 		$stmt = $this->conn->prepare("INSERT INTO `matapraktikum` (`idMataPraktikum`, `namaMataPraktikum`,`tahunAjaran`) VALUES (?,?,?)") or die($this->conn->error);
 		$stmt->bind_param("sss", $idMataPraktikum, $namaMataPraktikum,$tahunAjaran);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function read(){
 		$stmt = $this->conn->prepare("select * from matapraktikum") or die($this->conn->error);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$stmt->close();
 			$this->conn->close();
 			return $result;
 		}
 	}


 	public function tampil($idMataPraktikum){
 		$stmt = $this->conn->prepare("select * from matapraktikum where idMataPraktikum =?") or die($this->conn->error);
 		$stmt->bind_param("s", $idMataPraktikum);
 		if($stmt->execute()){
 			$result = $stmt->get_result();
 			$fetch = $result->fetch_array();
 			$stmt->close();
 			$this->conn->close();
 			return $fetch;
 		}
 	}

 	public function delete($idMataPraktikum){
 		$stmt = $this->conn->prepare("DELETE FROM `matapraktikum` WHERE `idMataPraktikum` = ?") or die($this->conn->error);
 		$stmt->bind_param("s", $idMataPraktikum);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}

 	public function update($idMataPraktikum, $namaMataPraktikum, $tahunAjaran){
 		$stmt = $this->conn->prepare("UPDATE `matapraktikum` SET `namaMataPraktikum` = ?, `tahunAjaran`=?  WHERE `idMataPraktikum` = ?") or die($this->conn->error);
 		$stmt->bind_param("sss", $namaMataPraktikum, $tahunAjaran, $idMataPraktikum);
 		if($stmt->execute()){
 			$stmt->close();
 			$this->conn->close();
 			return true;
 		}
 	}
 }
 ?>