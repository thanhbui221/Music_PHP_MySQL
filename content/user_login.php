<?php
include("dbconn.php");
session_start();



$user = htmlspecialchars($_REQUEST['userName']);
$pwd =  htmlspecialchars($_REQUEST['password']);


$debug = true;                 // change to true to follow mechanism

$sql1 = "SELECT userName, userID, password, admin from tiptop_user WHERE userName = '$user'";

if ($stmt = mysqli_prepare($conn, $sql1)){
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $userName, $userID, $password, $admin);
	if (mysqli_stmt_fetch($stmt)) {
        if ($password == ""){
            $ok_username = false;
            echo("<p>Wrong username</p>");
            echo("<a href='login.php'>Click here to go back</a>"); 
        }else{
            $ok_username = true;
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
if ($ok_username){
    $ok = password_verify($pwd, $password);
    if ($ok) {
        $_SESSION['userName'] = $_REQUEST['userName'];
        $_SESSION['userID'] = $userID;
        $_SESSION['admin'] = $admin;
        if ($admin == 'N'){
            echo("<p>Welcome, user!</p>");
        }else{
            echo("<p>Welcome, admin!</p>");
        }
        echo "<a href='index.php'>Click here to go homepage</a>"; 
    }
    else {
        echo("<p>Wrong password</p>");
        echo("<a href='login.php'>Click here to go back</a>");
    }
           
}
        
?>
