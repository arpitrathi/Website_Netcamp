<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("day5");
$a=$_POST['us'];
$b=$_POST['pass'];
$flag=0;
if(strlen($a)!=0)
{
  $flag+=1;
}
if(strlen($b)!=0)
{
  $flag+=1;
}

if($flag!=2)
{
   echo "Complete All The fields";
   die("Error");
}
else{
	$a=htmlentities(trim($a));
	echo $a;
	$q="select * from login where uname='$a'";

	$tab=mysql_query($q);
	
	if(!$tab)
	{
	  echo "Login Unsuceess</br>";
	  die("Enter a correct username");
	}
	if($row=mysql_fetch_array($tab))
	{
	   $pass=$row['pass'];
	   if($pass===$b)
	   {
		echo "<center>Login Successful</br>";
		$_SESSION['username']=$a;
		echo $_SESSION['username'];
		echo "<table border=\"1\">";
		echo "<tr><td>".$row['name']."</td><td>".$row['uname']."</td><td>".$row['pass']."</td><td>".$row['nick']."</td><td>".$row['phone']."</td></tr>";
		echo "<table></center>";
		echo "</br></br></br></br></br>Redirecting to Train Details";
		echo "<script>
		setTimeout(function(){window.location.href='loginhome.php'},3000);</script>";
	   }
	   else {
	   echo "Login Unsuccessful</br> ";
	#die("Mysql Error");
	   }
	}
	else
	{
	  echo "Unsuccessfulksdmvklnszdkl</br>";
	}
}
?>