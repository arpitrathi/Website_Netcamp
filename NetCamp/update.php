<style>
ul{
}
li{
list-style-type:none;
height:35px;


} #ta{ list-style-type:none; height:100px;

}
#login{
margin-left:0px;
margin-top:0px;
float:right;
z-index: 1;
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
echo "<div id='login'><h3>
  Log Out <a href='logoutadmin.php'>".$_SESSION['admin']."</a></h3></div>";
if(isset($_SESSION['admin']))
{

	$id=$_GET['id'];
	echo $id;
	
		$tab=mysql_query("select * from course where id='$id'") or die("Error in connecting to database");
		$row=mysql_fetch_array($tab);
		{
			?>
<form action="update1.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Update The course
	</legend>	
	<ul>
		<input type="hidden" value="<?php  echo $id; ?>" name="id">
	<li><label>Name </label><input type="text" name="name" value="<?php echo $row['name']; ?>" required="required">*</li>
	<li id="ta"><label>Details </label><textarea name="det" rows="3" cols="40"><?php echo $row['details']; ?> </textarea></li>
	<li><label>Fees </label><input type="text" name="fees" value="<?php echo $row['fees']; ?>"  required="required">*</li>
	<li><label>College Name </label><input type="text" name="clg"  value="<?php echo $row['clg']; ?>" ></li>
	
	<li><label>Starting Date </label>
		
	<select name="date"  style="width:40px; height:19px; " selected>
	<?php
	echo "<option value=\"0\">".""."</option>";
	for($i=1;$i<=31;$i++)
	{
		if($i==1)
	echo "<option value=\"$i\" selected>".$i."</option>";
	else
		echo "<option value=\"$i\">".$i."</option>";

	}

	?>
	</select>

	<select name="month" style="width:51px; height:19px; " required="required" >
	<?php
	echo "<option value=\"0\">".""."</option>";
	for($i=1;$i<=12;$i++)
	{
	if($i==1)
		echo "<option value=\"$i\" selected>".date("M",$i*3600*24*29)."</option>";

	else
	echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>";
	}
	?>
	</select>

	<select name="year" style=" height:19px; width:52px;" required="required">
	<?php
	echo "<option value=\"0\">".""."</option>";
	for($i=2010;$i<=2020;$i++)
	{
		if($i==2010){
	echo "<option value=\"$i\" selected>".$i."</option>";
	}
	else
	{
	echo "<option value=\"$i\">".$i."</option>";	
	}
	}
	?>
	</select>*</li>

<li><label>Ending Date </label>
		
<select name="date1"  style="width:40px; height:19px; " required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=31;$i++)
{

	if($i==1){
echo "<option value=\"$i\" selected>".$i."</option>";
}
else
echo "<option value=\"$i\">".$i."</option>";	
}
?>
</select>

<select name="month1" style="width:51px; height:19px; " required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=12;$i++)
{
if($i==1){
echo "<option value=\"$i\" selected>".date("M",$i*3600*24*29)."</option>";
}else
{
	echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>";
}

}
?>
</select>

<select name="year1" style=" height:19px; width:52px;" required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=2010;$i<=2020;$i++)
{
	if($i==2010){
echo "<option value=\"$i\" selected>".$i."</option>";
}
else
{
echo "<option value=\"$i\">".$i."</option>";	
}
}
?>
</select>*</li>


		<li><input type="submit" value="Update Course" name="course1"></li>
</form>

	<?php
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
