<?php
session_start();
include_once("function.php");
connect_db();
if(isset($_POST['bookt']))
{
unset($_POST['bookt']);
  $no=$_POST['tno'];
  $seat=$_POST['tseat'];
  
  $q="select seats from train where tno='$no'";
 
  $tab=mysql_query($q) or die("Error in Executing Query Select");
  if(mysql_num_rows($tab)==1)
  {
    $row=mysql_fetch_array($tab);
	if($row['seats']>$seat)
	{
	  //Updating the train booking;
	  $st=$row['seats']-$seat;
	  $upd="update train set seats='$st' where tno='$no'";
	 
	  
	  //Finding the pnr No.
	  $sel="select count(*) as cnt from booking";
	  $seltab=mysql_query($sel) or dir("Error in selecting database");
	  $row=mysql_fetch_array($seltab);
	  $cnt=$row['cnt'];
	  $cnt+=1;
	  
	  //Making the final Booking
	  $a=$_SESSION['username'];
	  $ins="insert into booking ( tno,seats,uname) values('$no','$seat','$a')";
	  
	  mysql_query($upd) or die("Error in executing Update");
	  mysql_query($ins) or die("Error in inserting data");
	  
	  echo "Booked Successfully</br>";
	  echo "<h1>Your Pnr No is ".$cnt."</h1></br>";
	}
	else
	{
	   echo "Required No of seats not available in the train</br>Please book in some other train</br>";
	}
  }
  else {
  echo "No train Found</br>Please Try Again";
  }
  
}
else  {
?>
<html>
<head>
<title>train Book</title>
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
</head>
<body>
	<div>
	<form action="bookk.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Enter The Train Details	
	</legend>	
	<ul>
	<li><label>Train No: </label><input type="text" name="tno"  required="required">*</li>
	<li><label>No of Seats To book: </label><input type="text" name="tseat" required="required" >*</li>
	<li><input type="submit" value="Book" name="bookt"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>

<?php
	}
?>
	
	