<style>
#login{
margin-left:0px;
margin-top:0px;
float:right;
z-index: 1;

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
</style>

<?php
session_start();
include_once("function.php");
connect();
if(isset($_SESSION['admin']))
{

  echo "<div id='login'><h3>
  Log Out <a href='logoutadmin.php'>".$_SESSION['admin']."</a></h3></div>" ;
  echo "Hello everybody this is admin";
  echo "<div>
  Add a Course <a href='addcourse.php'>New Course</a></div>";
  echo "Courses Available:";   
  $qu="select * from Course";
  $table=mysql_query($qu);
  while($row=mysql_fetch_array($table))
  {
  	$id=$row['id'];

	
   echo "<div id=\"display\">
   <li><label>Name </label>".$row['name']."</li>
   </br><p><label>Details</label>".$row['details']."</p></br>
   <li><label>Fees</label>".$row['fees']."</li></br>
   <li><label>College</label>".$row['clg']."</li></br>
	<li><label>Period </label>".$row['start']." to ".$row['end']."</li></br>
	
	<li><label><a href='student.php?id=$id'>Student List</a></label><label><a href='update.php?id=$id'>Update</a></label></li>

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