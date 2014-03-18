<?php
	require_once("Query.php");
	$sqlObj = new Query();
	
	if(isset($_POST['message'])){
		$name = $_POST['name'];
		$message = $_POST['message'];
		$sqlObj->insertOne($name,$message);
	}

	$sqls = $sqlObj->getAll();
	$container = "";
	while($row = mysql_fetch_assoc($sqls)){
		$container.= "<p><b>".$row['name'].": </b>".$row['message'];
	}
	echo <<< _HTMLd
	<html>
	<head>
			<meta http-equiv="refresh" content="4">
			<link href='http://fonts.googleapis.com/css?family=Lato:100,400' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Quicksand:300' rel='stylesheet' type='text/css'>
			<style rel="stylesheet" type="text/css">
				body {
				    overflow-x:hidden;
				    height:100%; //optional, but it can't hurt.
				}
			</style>	
	</head>
	<body>
		<div style="width:685;padding-left:10px;padding-right:40px;font-family: 'Quicksand', sans-serif;;color:#89b3db; text-wrap:suppress;">
			<p style="color:#e0effe;font-family: 'Lato', sans-serif;">What will others do this Earth hour ...</p>
			$container
		</div>
	</body>
	</html>
_HTMLd;
?>