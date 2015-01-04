<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("netcamp");
include_once("function.php");
$a=$_SESSION['user'];
$b=fix($_POST['pass']);
$c=fix($_POST['name']);
$d=fix($_POST['nn']);
$e=fix($_POST['phone']);
$email=fix($_POST['email']);
$clg=fix($_POST['clg']);
$deg=$_POST['degree'];

$q="update ulogin set name='$c',email='$email',pass='$b',college='$clg',degree='$deg',nick='$d',phone='$e' where reg='$a'";
mysql_query($q) or die("Error in Updateng data");
echo "You Have  Successfully Updated the profile</br><hr>";
unset($_POST['upsub']);
echo "<a href=\"user.php\">Back</a>";
?>