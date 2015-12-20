<?php

$con = mysql_connect('localhost','root','');
if (!$con){
	die('Could Not Connect!');
}

@mysql_select_db("info2180project4") or die ("Sorry but database not found. Please try again.");

$fn=$_POST['fn'];
$ln=$_POST['ln'];
$un=$_POST['un'];
$pw=$_POST['pw'];


$first = "'".$fn."',";
$last = "'".$ln."',";
$user = "'".$un."')";
$pass = "'".$pw."',";

function valid()
	{
		global $pw;
		
		
		if (!preg_match("/^([a-zA-Z0-9]+){8,}$/",$pw)) {
			return false;
		}
		
		return true;
		
	}
	
	
	
	if(valid()==true){
		
	
		global $first,$last,$user,$pass;
		
		try{

		$db = new PDO('mysql:dbname=info2180project4;host=localhost', 'root', '');
		}catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
		}
		
		
		
		
		$sql = "INSERT INTO user(first_name,last_name,password,username) VALUES(".$first.$last.$pass.$user;
		

		$db ->exec($sql);
		
	
	echo "User has been entered";
	}
	

?>