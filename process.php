<?php
  
 include 'database.php';

// check if the form is submitted 
if(isset($_POST['submit'])){
	
	$user = mysqli_real_escape_string($con, $_POST['user']);
	
	$message = mysqli_real_escape_string($con, $_POST['message']);
	
	// set the time zone 
	date_default_timezone_set('Asia/Riyadh');
	
	$time = date('h:j:s a',time());
	
	if(!isset($user) || $user == '' || !isset($message) || $message == '') {
		echo $error = 'please fill your name and message';
		header('location: index.php?error='.urlencode($error));
		exit();
	}else{
		$query = "INSERT INTO shouts (user, message, time) VALUES ('$user','$message','$time')";
		if(!mysqli_query($con, $query)){
			die('Error: '.mysqli_error($con));
		}else{
			header("Location: index.php");
			exit();
		}
	}
}

	// clear the database 
	/* if(isset($_POST['clear'])){
		$clear_query = "DELETE FROM shouts WHERE id = 2";
		$result = mysqli_query($clear_query);
		header("location: index.php");
	} */

?>