<?php

function fix_string($string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return htmlentities ($string);
}
class Connect{
	
	private $server,$user,$passsword,$connect,
	$database;
	
	
	public function __construct(){
	$this->server = "localhost";
	$this->user="root";
	$this->password="bloodhound";
	$this->database="earth";
	}

	public function serverConnect(){
		$this->connect = mysql_connect($this->server,
		$this->user,$this->password) or die('Invalid Connection');
		return $this->connect;
	}
	
  	public function selectDb(){
		return mysql_select_db($this->database,$this->connect) or die('Invalid database');
	}
}
?>
