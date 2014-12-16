<?php
include_once("function.php");
connect_db();
if(isset($_POST['tdet']))
{unset($_POST['tdet']);
	$no=$_POST['tno'];
	$no=fix($no);
	$name=$_POST['tname'];
	$name=fix($name);
	$seat=$_POST['seats'];
	$seat=fix($seat);
	$q="insert into train values('$no','$name','$seat')";
	
	echo $q."</br>";
	mysql_query($q) or die("Error connecting to db");
	echo "Data Inserted in database";
	
}
?>