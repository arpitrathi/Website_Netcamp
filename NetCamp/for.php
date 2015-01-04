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

    include_once("function.php");
    connect();
  $a=fix($_POST['us']);
  $b=fix($_POST['nn']);
  $c=fix($_POST['email']);
  $d=fix($_POST['phone']);
  
  $q="select * from ulogin where reg='$a' and nick='$b' and phone='$d' and email='$c'";
  
  $table = mysql_query($q) or die("Error in executing query");
  
  $row=mysql_fetch_array($table);
  if($row)
  {
    echo "<label>password is :".$row['pass']."</label>";
  }
 else
{
  echo "<label>Authhentication failure</label></br>Try Again";

} 
echo "<a href=\"forgot.php\">Back</a>";
  ?>