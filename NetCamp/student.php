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

if(isset($_SESSION['admin'])){
echo "<div id='login'><h3>
  Log Out <a href='logoutadmin.php'>".$_SESSION['admin']."</a></h3></div>" ;

$id=fix($_GET['id']);

$t=mysql_query("select name from course where id='$id'") or die("course db error");
$r=mysql_fetch_array($t);
echo "Student list for the course  ".$r['name']."</br>";
$qu="select * from studentlist where cid='$id'";
$tab=mysql_query($qu) or die("Error in getting results");
echo "<table border='1'><tr><th>User Id</th><th>Status</th><th>Course Id</th></tr>";
while($row=mysql_fetch_array($tab))
{
	$sid=$row['sid'];
	$regid=$row['regid'];
	echo "<tr>
	<td><a href=\"stud.php?sid=$sid&id=".urlencode($id)."\">".$sid."</a></td>";
	if($row['status']==0)
	{
		$status="Yet to be Confirmed";
	}
	else
	{
		$status="Confirmed for course";
	}
	echo "<td>$status</td>
	<td>".$regid."</td>
	</tr>";


}
echo "</table>";
echo "<h4>Click on User id of student to confirm his/her registration</h4></br>";
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
