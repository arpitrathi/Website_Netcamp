

<?php
session_start();
include_once("function.php");
connect();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_POST['sub']))
{ 
?>
<html>
<head>
<title>Netcamp</title>
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
header{
margin-left:autorion;
margin-right:auto;
width:35%;
height:10%;
font-size:200%;
}
</style>
</head>
<header>
Welcome to Netcamp Solutions
</header>
<body>
	<div>
	<form action="index.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Enter your Credentials		
	</legend>	
	<ul>
	<li><label>User Id: </label><input type="text" name="rid" required="required">*</li>
	<li><label>Password: </label><input type="password" name="pass" required="required" >*</li>
	<li><label>Type: </label><select name="typeof">
	<option value="199">Admin</option>
	<option value="299">User</option>
	</select>
	</li>
	
	<li><input type="submit" value="Login" name="sub"></li>
	<li><a href="forgot.php">Forgot Password</a></li>
	</ul>
	</fieldset>
	</form>
	
	</div>
	<div>
	
	
	<form action="insert.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Register Here 
	</legend>	
	<ul>
	<li><label>Name: </label><input type="text" name="name" required="required">*</li>
	<li><label>Email: </label><input type="email" name="email" required="required" toolkit="Minimum 8 characters">*</li>
<li><label>User Id: </label><input type="text" name="uid" required="required">*</li>
	
	<li><label>Password: </label><input type="password" name="pass" required="required" >*</li>

	<li><label>College Name </label><input type="text" name="clg"  ></li>
	<li><label>Degree: </label><select name="degree">
	<optgroup label="B.Tech">
	<option value="1">B.Tech 1st Year</option>
	<option value="2">B.Tech 2nd Year</option>
	<option value="3">B.Tech 3rd Year</option>
	<option value="4">B.Tech 4th Year</option>
	</optgroup>
	<optgroup label="M.Tech">
	<option value="5">M.Tech 1st Year</option>
	<option value="6">M.Tech 2nd Year</option>
	</optgroup>
	
	</select></li>
	
		<li><label>Nick Name: </label><input type="text" name="nn" required="required">*</li>
	<li><label>Phone: </label><input type="text" name="phone" required="required">*</li>
	<li><label>Type: </label><select name="typeof"><option value="299">User</option></select></li>
	
	
	<li><input type="submit" value="Register " name="resub"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>
	
</body>
</html>

<?php
}
else 
{
  
  if(isset($_SESSION['user']))
  {
  	 echo "<script>
  setTimeout(function(){window.location.href='user.php'},2000);
  </script>";
	
  }
   if(isset($_SESSION['admin']))
  {
  	echo "<script>
  setTimeout(function(){window.location.href='admin.php'},500);
  </script>";
	
  }
  $reg=$_POST['rid'];
  $pass=$_POST['pass'];
  $type=$_POST['typeof'];
  $reg=fix($reg);
  $pass=fix($pass);
  
  if($type==299){
  
  $qu="select * from ulogin where reg='$reg' and pass='$pass'";
  $tab=mysql_query($qu);
  $row=mysql_fetch_array($tab);
  $no=mysql_num_rows($tab);
  if($no==1)
  {
    echo "Login Successful";
	$_SESSION['uname']=$row['name'];
	$_SESSION['user']=$reg;	
	 echo "<script>
  setTimeout(function(){window.location.href='user.php'},2000);
  </script>";
		
  } else{
  echo "Invalid Credentials</br>";
  unset($_POST['sub']);
  echo "<script>
  setTimeout(function(){window.location.href='index.php'},2000);
  </script>";
  }
 
  }
	else if($type==199)
	{
	  $qu="select * from admin where uname='$reg' and passwd='$pass'";
  $tab=mysql_query($qu);
  $row=mysql_fetch_array($tab);
  $no=mysql_num_rows($tab);
  if($no==1)
  {
    echo "Login Successful";
	$_SESSION['admin']=$reg;

	echo "<script>
  setTimeout(function(){window.location.href='admin.php'},500);
  </script>";
	
  } else{
  echo "Invalid Credentials</br>";
  unset($_POST['sub']);
  echo "<script>
  setTimeout(function(){window.location.href='index.php'},2000);
  </script>";
  }
}
 
}

?>
