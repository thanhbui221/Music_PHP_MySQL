<?php
include("dbconn.php");
session_start();

$userName = htmlspecialchars($_REQUEST['uname']);
$lastName = htmlspecialchars($_REQUEST['lname']);
$firstName = htmlspecialchars($_REQUEST['fname']);
$email = htmlspecialchars($_REQUEST['email']);
$source = htmlspecialchars($_REQUEST['source']);
$admin = htmlspecialchars($_REQUEST['admin']);
$pwd =  htmlspecialchars($_REQUEST['pwd']);
$sql1 = "SELECT userName from tiptop_user";


if ($stmt = mysqli_prepare($conn, $sql1)){
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $queryResult1);
	if (mysqli_stmt_fetch($stmt)) {
		while(mysqli_stmt_fetch($stmt)){
			if ($userName == $queryResult1){
				echo "<p>Username already exists</p>";
				echo "<a href='signup.php'>Click here to go back</a>";
			}
		}	
	}
	else {
		return false;
	}
	mysqli_stmt_close($stmt);
}
else {
	echo "<p>Could not prepare statement</p>";
}



$phash = password_hash($pwd, PASSWORD_DEFAULT);


$sql = "INSERT INTO tiptop_user(userName, FirstName,LastName,password,email,IDSource,RegistrationDate,LastLogin,admin) VALUES(?, ?, ?, ?, ?, ?, NOW(), NOW(), ?)";



if ($stmt = mysqli_prepare($conn, $sql)){
	mysqli_stmt_bind_param($stmt, "sssssss", $userName, $firstName, $lastName, $phash, $email, $source, $admin); 
	mysqli_stmt_execute($stmt);
	if (mysqli_affected_rows($conn) > 0) {
		if ($debug){
			echo "<p>User is created successfully</p>";
            $_SESSION['userName'] = $userName;
            $_SESSION['admin'] =  $admin;
			if ($admin == 'N'){
				echo("<p>Welcome, user!</p>");
			}else{
				echo("<p>Welcome, admin!</p>");
			}
            echo "<a href='index.php'>Click here to go homepage</a>"; 
		}
		else {
			echo "<p>Password: NOT Inserted</p>";
		}
	}
	else {
		return false;
	}
	mysqli_stmt_close($stmt);
}
else {
	echo "<p>Could not prepare statement</p>";
}

mysqli_close($conn);

?>