<?php
function connect_db()
{
 mysql_connect("localhost","root","");
mysql_select_db("day5");
		
 
}
function fix($a)
{
   return htmlentities(trim($a));
}
?>