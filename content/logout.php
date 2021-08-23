<?php
session_start();
echo("<p>Log out...</p>");
unset($_SESSION["userName"]);
unset($_SESSION["admin"]);
unset($_SESSION["userID"]);
header("Location:index.php");
?>