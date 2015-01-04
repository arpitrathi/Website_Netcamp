<?php
session_start();
include_once("function.php");
connect();
if(isset($_SESSION['admin'])){
unset($_POST['course1']);
	
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


   $start=$y."-".$m."-".$d;
 	$end=$y1."-".$m1."-".$d1;
   $id=fix($_POST['id']);

    $q="update course set name='$name',details='$detail',fees='$fees',clg='$clg',start='$start',end='$end' where id='$id'";
    mysql_query($q) or die("Could not connect to database");
    echo "The course has been successfully Updated</br>";
    echo "Click here to go to <a href='admin.php'>Home</a> page";
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