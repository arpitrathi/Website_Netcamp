<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("netcamp");
include_once("function.php");
$a=fix($_POST['uid']);
$b=fix($_POST['pass']);
$c=fix($_POST['name']);
$d=fix($_POST['nn']);
$e=fix($_POST['phone']);
$email=fix($_POST['email']);
$clg=fix($_POST['clg']);
$deg=$_POST['degree'];
$var=1;
 if(strlen($a)<8 )
 {
 	echo "user Id should be more than 8 letters</br>";
 	  echo "<script>
  setTimeout(function(){window.location.href='index.php'},4000);
  </script>";
 	die();
 }
 else if(!is_numeric($e) && strlen($e)!=10)
{
	echo "Phone number should be numeric Or it should be of 10 characters";
	  echo "<script>
  setTimeout(function(){window.location.href='index.php'},4000);
  </script>";
	die();
}
else if(strlen($b)!=8)
{
	echo "Min 8 characters in password required";
	  echo "<script>
  setTimeout(function(){window.location.href='index.php'},4000);
  </script>";
	die();
}

$q="insert into ulogin values('$c','$email','$b','$clg','$deg','$d','$e','$a')";
mysql_query($q) or die("Error in innserting data");
echo "You Have Been Successfully Registered</br><hr>Login to view the courses available";
unset($_POST['resub']);
echo "<a href=\"index.php\">Back</a>";
?>