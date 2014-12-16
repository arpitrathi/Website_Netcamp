<?php
session_start();
include_once("function.php");
connect_db();
$un=$_SESSION['username'];
$hist="select * from booking where uname='$un' ";

$table=mysql_query($hist) or die("Error in fetching from database");
echo "<center><h1>Booking History</h1><table border=\"1\">";
echo "<tr><td>PNR No</td><td>Train No</td><td>Seats Booked</td></tr>";
while($row=mysql_fetch_array($table)){
$val=$row['pnr'];
echo "<tr><td><a href='cancel.php?id=$val'>".$val."</a></td><td>".$row['tno']."</td><td>".$row['seats']."</td></tr>";
}
echo "</table>";
echo "<h4>Click on PNR no to cancel any booked tickets</h4></center>";
?>
