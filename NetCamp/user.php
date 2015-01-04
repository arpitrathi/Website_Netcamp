<style>
#login{
margin-left:0px;
margin-top:0px;
float:right;
z-index: 2;

}

#display{

	margin-left: auto;
	border: 10px;
	border-style: solid;
	border-width: medium;
	box-shadow: 1px;
	
	margin-right: auto;
	width: 35%;
}
p{
	height: 50px;
}
li{

	list-style-type: none;
	height: 50px;
	display: inline-block;	 

}
label{
	width:200px;
	padding: 5px;
	display: inline-block;
}
#profile{
	line-height: 30px;
	margin-top: 0px;
	margin-right: 0px;
	float: left;
}
</style>

<?php
session_start();
include_once("function.php");
connect();
if(isset($_SESSION['user']))
{
	$sid=$_SESSION['user'];
	 echo "<div id='login'><h3>
  Log Out <a href='logoutuser.php'>".$_SESSION['uname']."</a></h3></div>" ;
  echo "<div id='profile'>
Change your <a href='profile.php?id=$sid'>profile</a></div>
  ";

  echo "<h2><center>Courses Opted and their status </center></h2></br>";

  $qu="select * from studentlist where sid='$sid'";
  
  $table=mysql_query($qu);
  
  echo "<center><table border=\"1\">";
  echo "<tr><th>Course Name</th><th>College</th><th>Status</th></tr>";
  while($ro=mysql_fetch_array($table))
  {

  		$cid=$ro['cid'];
  		$tab1=mysql_query("select name,clg from course where id='$cid'");
  		$row1=mysql_fetch_array($tab1);
  		echo "
  		<tr><td>".$row1['name']."</td>
  		<td>".$row1['clg']."</td>
  		";
  		if($ro['status']==0){
  		echo "
  		<td>Not yet Confirmed</td></tr>
  		" ;
  	}else
  	{
  		echo "<td> Confirmed</td></tr>
  		" ;
  	}

  }
echo "</table></center>";

  echo "<h2><center>Courses Available</center></h2></br>";
  $qu="select * from course";
  $tab=mysql_query($qu);
  while($row=mysql_fetch_array($tab))
  {
  	$id=$row['id'];
  	 echo "<div id=\"display\">
   <li><label>Name </label>".$row['name']."</li>
   </br><p><label>Details</label>".$row['details']."</p></br>
   <li><label>Fees</label>".$row['fees']."</li></br>
   <li><label>College</label>".$row['clg']."</li></br>
	<li><label>Period </label>".$row['start']." to ".$row['end']."</li></br>
	<li><a href='enroll.php?id=$id'>Click here</a> to enroll for the course</li>

   </div>
   ";

  }

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