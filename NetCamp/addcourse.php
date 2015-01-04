<html>
<head>
<title>Login Form</title>
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
		if(!isset($_POST['course']))
{

?>
<form action="addcourse.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Add a course
	</legend>	
	<ul>
	<li><label>Name </label><input type="text" name="name" required="required">*</li>
	<li id="ta"><label>Details </label><textarea name="det" rows="3" cols="40"></textarea></li>
<li><label>Fees </label><input type="text" name="fees" required="required">*</li>
	<li><label>College Name </label><input type="text" name="clg"  ></li>
		<li><label>Starting Date </label>
		
<select name="date"  style="width:40px; height:19px; " required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=31;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>

<select name="month" style="width:51px; height:19px; " required="required" >
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=12;$i++)
echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>"
?>
</select>

<select name="year" style=" height:19px; width:52px;" required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=2010;$i<=2020;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>*</li>

<li><label>Ending Date </label>
		
<select name="date1"  style="width:40px; height:19px; " required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=31;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>

<select name="month1" style="width:51px; height:19px; " required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=1;$i<=12;$i++)
echo "<option value=\"$i\">".date("M",$i*3600*24*29)."</option>"
?>
</select>

<select name="year1" style=" height:19px; width:52px;" required="required">
<?php
echo "<option value=\"0\">".""."</option>";
for($i=2010;$i<=2020;$i++)
echo "<option value=\"$i\">".$i."</option>";
?>
</select>*</li>


		<li><input type="submit" value="Submit Course" name="course"></li>
	
</form>



<?php
}
else{
	unset($_POST['course']);
	
   $name=fix($_POST['name']);
   $detail=fix($_POST['det']);
   $fees=($_POST['fees']);
   $clg=($_POST['clg']);
   $d=fix($_POST['date']);
   $m=fix($_POST['month']);
   $y=fix($_POST['year']);
   $d1=fix($_POST['date1']);
   $m1=fix($_POST['month1']);
   $y1=fix($_POST['year1']);  
if($d==0 || $m==0 || $y==0 || $d1==0 || $m1==0 || $y1==0  ) 
   {
   	echo "Please Fill the dates</br>";
   	echo "<script>
  setTimeout(function(){
  window.location.href='addcourse.php',10000
  });
  </script>";
  
die("returning");
   }
   else if(!is_numeric($fees))
   {
   	   	echo "Please Fill the Numeric fees</br>";
   	echo "<script>
  setTimeout(function(){
  window.location.href='addcourse.php',10000
  });
  </script>";
  die("returning");
   }
 	$start=$y."-".$m."-".$d;
 	$end=$y1."-".$m1."-".$d1;
    $tab=mysql_query("select * from course");
    $res=mysql_num_rows($tab);
    $res+=1;

    $q="insert into course values('$name','$detail','$fees','$clg','$start','$end','$res')";
    mysql_query($q) or die("Could not connect to database");
    echo "The course has been successfully submitted</br>";
    echo "Click here to go to <a href='admin.php'>Home</a> page";
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