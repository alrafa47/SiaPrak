<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '');
define('db_name', 'demosiapraktikum');

class db_connect{
	public $host =db_host;
	public $user =db_user;
	public $pass =db_pass;
	public $dbname =db_name;
	public $conn;
	public $error;

	public function connect(){
		$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		//perintah ketika error
		if (!$this->conn) {
			$this->error="Terjadi Kesalahan Database tidak Terkoneksi !".$this->connect_error();
			return false;
			# code... 
		}
	}
}

 ?>
