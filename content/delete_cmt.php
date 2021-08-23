<?php
include("dbconn.php");
session_start();

$userID = $_REQUEST['userID'];
$CDID = $_REQUEST['CDID'];

$sql = "DELETE FROM tiptop_cdreview WHERE userID = ? and CDID = ?";

if ($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "ii", $userID, $CDID); 
    mysqli_stmt_execute($stmt);
    if (mysqli_affected_rows($conn) != 0) {
        if ($debug){
            echo "<p>Review is deleted</p>";
            echo "<a href='comments.php'>Click here to go back</a>"; 
        }
        else {
            echo "<p>Review is not Deleted</p>";
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
