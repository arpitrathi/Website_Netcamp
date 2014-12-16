<?php 
{
?>
<html>
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
<?php
}
	mysql_connect("localhost","root","");
	mysql_select_db("day5");
  $a=$_POST['us'];
  $b=$_POST['nn'];
  $a=htmlentities(trim($a));
  $b=htmlentities(trim($b));
  $q="select * from login where uname='$a' and nick='$b'";
  
  $table = mysql_query($q) or die("Error in executing query");
  
  $row=mysql_fetch_array($table);
  if($row)
  {
    echo "<label>password is :".$row['pass']."</label>";
  }
 else
{
  echo "<label>Authhentication failure</label></br>";
} 
  ?>