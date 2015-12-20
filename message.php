<?php
		

	$isConn = mysqyl_connect("localhost","root", " ");
	// Testing our connection 
	if ($isCon)
	{
		echo "CONNECTION MADE";
		$isDataBase = mysql_select_db("info2180project4");
		//Testing if the data base if found.
		if ($isDataBase)
		{
			echo "DATABASE FOUND";
			
				$userid = $_POST['userid'];
				$body=$_POST['body'];
				$subj = $_POST['subject'];
				$recip = $_POST['recip'];
				$msg = $_POST['message'];
				
				$sqlTitle = "SELECTT 'title' FROM 'message'";
				
				$isQuery = mysql_query($sqlTitle);
				
				// The name of the column in the message table . 
				$sql = "INSERT INTO 'info2180project4' . 'message' ('id', 'body',  'subject', 'user_id', 'recipient_id') VALUES (NULL, '$msg','$body','$subj','$userid','$recip',);";
				
				mysql_query($sql);
				
		}
		else 
		{
			die("DATABASE ERROR ". mysql_error());
		}
	}
	else 
	{
		die("CONNECTION NOT FOUND ". mysql_error());	
	}
	
	mysql_close($isConn);
	
	
	/*
	Group Members ID
	620057953
	620053878
	620070170
	*/
?>

