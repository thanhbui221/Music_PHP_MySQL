<?php
include("dbconn.php");
session_start();

$userID = $_SESSION['userID'];
$CDID = $_REQUEST['CDID'];

$reviewDate = $_REQUEST['reviewDate'];
$reviewText = htmlspecialchars($_REQUEST['reviewText']);

//echo("<p>$userID</p>");
// echo("<p>$CDID</p>");
// echo("<p>$reviewDate</p>");
// echo("<p>$reviewText</p>");

if ($reviewDate == ""){
    $sql1 = "INSERT INTO tiptop_cdreview(reviewText, userID, CDID, reviewDate) VALUES(?,?,?, NOW())";

}else{
    $sql1 = "UPDATE tiptop_cdreview SET reviewText = ? WHERE userID = ? and CDID = ?";
}


if ($stmt = mysqli_prepare($conn, $sql1)){
    mysqli_stmt_bind_param($stmt, "sii", $reviewText, $userID, $CDID); 
    mysqli_stmt_execute($stmt);
    if (mysqli_affected_rows($conn) >= 0) {
        if ($debug){
            echo "<p>Review is created/updated successfully</p>";
            echo "<a href='comments.php'>Click here to go back</a>"; 
        }
        else {
            echo "<p>Review is not created/updated</p>";
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
