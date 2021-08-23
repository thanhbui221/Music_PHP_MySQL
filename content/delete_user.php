<?php
include("dbconn.php");
session_start();

$userID = $_REQUEST['userID'];


$sql = "DELETE FROM tiptop_user WHERE userID = ?";

if ($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $userID); 
    mysqli_stmt_execute($stmt);
    if (mysqli_affected_rows($conn) != 0) {
        if ($debug){
            echo "<p>User is deleted</p>";
            echo "<a href='users.php'>Click here to go back</a>"; 
        }
        else {
            echo "<p>User is not Deleted</p>";
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
