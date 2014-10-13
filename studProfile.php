<?php 
	include 'db-con.php';
	session_start();
	$username = $_SESSION['username'];
	$internship = mysql_real_escape_string($_POST['internship']);
	if(isset($_POST['interest1'])){
		$interest1 = mysql_real_escape_string($_POST['interest1']);	
	}else{
		$interest1="";
	}
	if(isset($_POST['interest2'])){
		$interest2 = mysql_real_escape_string($_POST['interest2']);	
	}else{
		$interest2="";
	}
	if(isset($_POST['interest3'])){
		$interest3 = mysql_real_escape_string($_POST['interest3']);	
	}else{
		$interest3="";
	}
	$query = "SELECT * FROM userProfile WHERE Roll_No='$username'";
	$queryResult = mysql_query($query);
	$result = mysql_fetch_array($queryResult);
	if($result['Roll_No']){	
		$query = "UPDATE userProfile SET internship='$internship', interest1='$interest1', interest2='$interest2', interest3='$interest3' WHERE Roll_No='$username'";
		mysql_query($query);
	}else{
		$query = "INSERT INTO userProfile (id, Roll_No, internship, interest1, interest2, interest3) VALUES ('','$username','$internship','$interest1','$interest2','$interest3')";
		mysql_query($query);
	}
?>