<?php 
	include 'db-con.php';
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$query = "SELECT * FROM USER where USER_NAME='$username' AND md5($password)";
	$queryResult = mysql_query($query);
	if($queryResult){
		$result = mysql_fetch_array($queryResult);
		$_SESSION['username'] = $result['USER_NAME']; 
	}
	else{
		echo "error";
	}
?>