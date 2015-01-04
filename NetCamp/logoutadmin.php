<?php
session_start();
session_unset($_SESSION['admin']);


echo "<div><p>";
echo "</br></br></br></br>You have been successfully Logged out</br>";
echo "Click here to go to <a href='index.php'>Home</a> page";
echo "</p></div>";
?>
