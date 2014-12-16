<?php
session_start();

include_once("function.php");
connect_db();
$un=$_SESSION['username'];
$pnr=$_GET['id'];

$hist="select tno,seats from booking where uname='$un' and pnr='$pnr' ";
$tab=mysql_query($hist);
$row=mysql_fetch_array($tab);

{?>
<style>
ul{
}
li{
list-style-type:none;
height:35px;


}
label{
width:200px;
display:inline-block;
}
#fs{
margin-left:auto;
margin-right:auto;
width:35%;
}
</style>
<div>
	<form action="#" method="GET" >
	<fieldset id="fs">
	<legend>
	Enter Seats number for cancelling		
	</legend>	
	<ul>
	<?php
	}
	echo "<li><label>Train No ".$row['tno']."</label></li>";
	echo "<li><label>Seats Booked ".$row['seats']."</label></li>";
	{
	?>
	<li><label>No of Seats to be cancelled: </label><input type="text" name="seat" >*</li>
	<li><input type="submit" value="Login" name="sub"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>
<?php 
}
if(isset($_GET['sub']))
{
   unset($_GET['sub']);
   $canseat=$_GET['seat'];
   if($canseat>$row['seats'])
   {
     echo "<center><h2>No of seats to be cancelled must be lee than the booked tickets</h2></center>";
   }
   else
   {
     $availseat=$row['seats']-$canseat;
	 
	 mysql_query("update booking set seats='$availseat' where pnr='$pnr'") or die("Error in updating database");
   }
}


?>