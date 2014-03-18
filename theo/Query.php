<?php
require_once('Connection/Connect.php');	

	class Query{
	
		private $sql,$connect;
	
	public function __construct(){
		$this->connect = new Connect();
		$this->connect->serverConnect();
		$this->connect->selectDb();
	}

	public function getAll(){
		$stm = "SELECT * FROM entries";
		$this->sql = mysql_query($stm,$this->connect->serverConnect()) or die(mysql_error());
		return $this->sql;
	}

	public function insertOne($name,$message){
		if($name == ""){
			$name = "Anonymous";
		}
		if($message == ""){
			$message = "I will turn my lights off, and then sleep, as to conserve alot of energy :D";		
		}
		$stm = "INSERT INTO entries VALUES('$name','$message')";
		$this->sql = mysql_query($stm,$this->connect->serverConnect()) or die(mysql_error());
	}

}
?>		