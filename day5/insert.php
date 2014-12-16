<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("day5");
$a=$_POST['us'];
$b=$_POST['pass'];
$c=$_POST['name'];
$d=$_POST['nn'];
$e=$_POST['phone'];
$q="insert into login values('$c','$a','$b','$d','$e')";
mysql_query($q) or die("Error in innserting data");
echo "Data inserted";
?>