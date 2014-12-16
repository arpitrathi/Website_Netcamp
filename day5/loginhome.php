<html>
<style>
#log
{
  margin-right:0px;
  margin-top:0px;
  float:right;
  position:relative;
}
</style>

<?php
session_start();
include_once("function.php");

connect_db();
 $q="select * from train where seats>0";
 $table=mysql_query($q);
 echo "<center><label><h1>Indian Reservation System</h1></label></center>"; 
 $a=$_SESSION['username'];
 $tab=mysql_query("select name from login where uname='$a'");
 $row=mysql_fetch_array($tab);
 echo "<div id=\"log\">Logged in as ".$row['name']."</div>";
 echo "<center><table border=\"1\"><tr><td>Train No.</td><td>Train Name</td><td>Vacant Seats</td></tr>";
 while($row=mysql_fetch_array($table))
 {
    $n=$row['tno'];
	$na=$row['tname'];
	$s=$row['seats'];
	echo "<tr><td><a href='book.php?no=$n'>".$n."</a></td>";
	echo "<td>".$na."</td>";
	echo "<td>".$s."</td></tr>";
 }
 echo "</table>";
 echo "<h3>To book a ticket click on the train Number Or <a href='bookk.php'>Click Here</a></h3>";
 echo "<h3>To See the Booking History  <a href='history.php'>Booked</a></h3></center>";
?>

</html>