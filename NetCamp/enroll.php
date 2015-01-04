<?php
session_start();
include_once("function.php");
connect();
if(isset($_SESSION['user']))
{
	  $sid=$_SESSION['user'];  
	 echo "<div id='login'><h3>
  Log Out <a href='logoutuser.php'>".$_SESSION['uname']."</a></h3></div>" ;
  $id=fix($_GET['id']);
  $q="select * from studentlist where cid='$id' and sid='$sid'";
 
  $tab=mysql_query($q);
  $seq=mysql_num_rows($tab);
 
  if($seq==1)
  {
  	echo "You have already registered for this course </br>";
  	$r=mysql_fetch_array($tab);
  	if($r['status']==0)
  	{
  		echo "You are not yet confirmed in this course.Please confirm a seat as early as possible</br>";

  	}
  	else
  	{
  		echo "You have already confirmed a seat in this course";
  	}
  }
  else
  {
  	$q="select * from studentlist where cid='$id'";
  $tab=mysql_query($q);
  $seq=mysql_num_rows($tab);
  
  $seq+=1;
  $ap=sprintf("%04d",$id);
  $ap2=sprintf("%04d",$seq);
  $ap=$ap.$ap2;

  $ins="insert into studentlist values('$id','$sid',0,$ap)";
  mysql_query($ins) or die("Error in mysql Query");
  echo "Your registration id for this course is ".$ap."</br>";

}
  echo "<a href='user.php'>Back</a>";


}
?>