<style>
#login{
margin-left:0px;
margin-top:0px;
float:right;
z-index: 1;

}
</style>
<?php
session_start();
include_once("function.php");
connect();

if(isset($_SESSION['admin']))
{
echo "<div id='login'><h3>
  Log Out <a href='logoutadmin.php'>".$_SESSION['admin']."</a></h3></div>" ;
$sid=fix($_GET['sid']);
$id=fix($_GET['id']);
$qu="update studentlist set status=1 where sid='$sid' and cid='$id'";
mysql_query($qu) or die("Error in updating database</br> Try Again later");
echo "Confirmed Registration of ".$sid."  </br> <a href=\"student.php?id=$id\">Back</a>";
}
else
{
	 echo "<script>alert('Dont Try to be over smart');
  setTimeout(function(){
  window.location.href='index.php',200
  });
  </script>";
}
?>