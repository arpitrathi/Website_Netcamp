<style>
#login{
margin-left:0px;
margin-top:0px;
float:right;
z-index: 2;

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

<?php
session_start();
include_once("function.php");
connect();
if(isset($_SESSION['user']))
{
	$sid=$_SESSION['user'];
	 echo "<div id='login'><h3>
  Log Out <a href='logoutuser.php'>".$_SESSION['uname']."</a></h3></div>" ;

  	$query="select * from ulogin where reg='$sid'";
	$table=mysql_query($query);
	$row=mysql_fetch_array($table);
?>

	<form action="updateprof.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Update Profile
	</legend>	
	<ul>
	<li><label>Name: </label><input type="text" name="name" value="<?php echo $row['name']; ?>"  required="required">*</li>
	<li><label>Email: </label><input type="email" name="email" value="<?php echo $row['email']; ?>" required="required">*</li>
	
	<li><label>Password: </label><input type="password" name="pass" value="<?php echo $row['pass']; ?>"  required="required" >*</li>

	<li><label>College Name </label><input type="text" name="clg" value="<?php echo $row['college']; ?>"  ></li>
	<li><label>Degree: </label><select name="degree">
	<optgroup label="B.Tech">
	<option value="1" selected>B.Tech 1st Year</option>
	<option value="2">B.Tech 2nd Year</option>
	<option value="3">B.Tech 3rd Year</option>
	<option value="4">B.Tech 4th Year</option>
	</optgroup>
	<optgroup label="M.Tech">
	<option value="5">M.Tech 1st Year</option>
	<option value="6">M.Tech 2nd Year</option>
	</optgroup>
	
	</select></li>
	
		<li><label>Nick Name: </label><input type="text" name="nn"  value="<?php echo $row['nick']; ?>" required="required">*</li>
	<li><label>Phone: </label><input type="text" name="phone" value="<?php echo $row['phone']; ?>"  required="required">*</li>
	<li><label>Type: </label><select name="typeof"><option value="299">User</option></select></li>
	
	
	<li><input type="submit" value="Update" name="upsub"></li>
	
	</ul>
	</fieldset>
	</form>


<?php




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